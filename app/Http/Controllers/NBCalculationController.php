<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{TrainingData,NaiveBayesRules,CleansingData,ResultData,Umkm};
use App\Http\Controllers\CleansingDataController;

class NBCalculationController extends Controller
{
    //
    public function countTotalPerLabel($rulesId){
        $layak = CleansingData::where('id_rules',$rulesId)->where('status','Layak')->count();
        $tidakLayak = CleansingData::where('id_rules',$rulesId)->where('status','Tidak Layak')->count();

        return ["layak"=>$layak,'tidak_layak'=>$tidakLayak,"rules_id"=>$rulesId];
    }
    public function countPerAttributePerLabel($rulesId, $attribute){
        $layakYes = CleansingData::select($attribute)->where($attribute,'Yes')
                    ->where('id_rules',$rulesId)->where('status','Layak')->count();
        $layakNo = CleansingData::select($attribute)->where($attribute,'No')
                    ->where('id_rules',$rulesId)->where('status','Layak')->count();
        $tidakLayakYes = CleansingData::select($attribute)->where($attribute,'Yes')
                    ->where('id_rules',$rulesId)->where('status','Tidak Layak')->count();
        $tidakLayakNo = CleansingData::select($attribute)->where($attribute,'No')
                    ->where('id_rules',$rulesId)->where('status','Tidak Layak')->count();
        
        return ['layakYes'=>$layakYes==0?1:$layakYes,'layakNo'=>$layakNo==0?1:$layakNo,'tidakLayakYes'=>$tidakLayakYes==0?1:$tidakLayakYes,'tidakLayakNo'=>$tidakLayakNo==0?1:$tidakLayakNo,'attribute'=>$attribute,'rules_id'=>$rulesId];
    }

    public function calculateNaiveBayes(Request $req){
        $idUmkm = $req->umkm;
        $rulesId = $req->rulesId;
        $isInclude= $req->isInclude;
        $umkm = Umkm::where('id',$idUmkm)->first();
        if($umkm){
            $businessAge = date('Y',strtotime('now'))-date('Y',strtotime($umkm->date_establish));
            $resultData = array(
                'yearly_turnover'=>$umkm->yearly_turnover,
                'business_age'=>$businessAge,
                'total_manpower'=>$umkm->total_manpower,
                'id_rules'=>$rulesId,
                'id_umkm'=>$idUmkm,
                'td_name'=>$umkm->umkm_name,
                'is_include'=>$isInclude
            );
            $cleansingData = CleansingData::where('id_umkm',$idUmkm)
                                ->where('id_rules',$rulesId)->first();
            if(!$cleansingData){
                $newCleansing = (new CleansingDataController)->cleansingDataPerUmkm($idUmkm,$rulesId);
                if($newCleansing["status"]=="success"){
                    $cleansingData = $newCleansing["data"];
                }else{
                    return ["message"=>"Error No Cleansing Data"];
                }
            }
            $yearlyTurnOver = $cleansingData->yearly_turnover;
            $bAge = $cleansingData->business_age;
            $totalManpower = $cleansingData->total_manpower;
            $total = $this->countTotalPerLabel($rulesId);
            //count all probability base on attribute
            $yearlyProbability = $this->countPerAttributePerLabel($rulesId,"yearly_turnover");
            $bAgeProbability = $this->countPerAttributePerLabel($rulesId,"business_age");
            $tManpowerProbability = $this->countPerAttributePerLabel($rulesId,"total_manpower");
            //get the probability value base on cleansing data value 'Yes' or 'No'
            $yearlyLayakValue = $yearlyTurnOver=="Yes"?$yearlyProbability["layakYes"]:$yearlyProbability["layakNo"];
            $yearlyTLValue = $yearlyTurnOver=="Yes"?$yearlyProbability["tidakLayakYes"]:$yearlyProbability["tidakLayakNo"];
            $bAgeLayakValue = $bAge=="Yes"?$bAgeProbability["layakYes"]:$bAgeProbability["layakNo"];
            $bAgeTLValue = $bAge=="Yes"?$bAgeProbability["tidakLayakYes"]:$bAgeProbability["tidakLayakNo"];
            $tManpowerLayakValue = $totalManpower=="Yes"?$tManpowerProbability["layakYes"]:$tManpowerProbability["layakNo"];
            $tManpowerTLValue = $totalManpower=="Yes"?$tManpowerProbability["tidakLayakYes"]:$tManpowerProbability["tidakLayakNo"];
            $totalData = $total["layak"] + $total["tidak_layak"];
            $layakProbability =($total["layak"]/$totalData) * ($yearlyLayakValue/$total["layak"])
                            * ($bAgeLayakValue/$total["layak"]) * ($tManpowerLayakValue/$total["layak"]);
            $tidakLayakProbability = ($total["tidak_layak"]/$totalData) * ($yearlyTLValue/$total["tidak_layak"])
                            * ($bAgeTLValue/$total["tidak_layak"]) * ($tManpowerTLValue/$total["tidak_layak"]);
            $resultData["status"] = $layakProbability>$tidakLayakProbability?"Layak":"Tidak Layak";

            $newData = ResultData::create($resultData);
            $parameters = array();
            $rules = NaiveBayesRules::where('id',$rulesId)->first();
            $parameters["rules"] = $rules;
            $parameters["raw_data"] = $umkm;
            $parameters["cleansing_data"] = $cleansingData;
            $parameters["total_per_label"] = $total;
            $parameters["yearly_probability"] = $yearlyProbability;
            $parameters["business_age_probability"] = $bAgeProbability;
            $parameters["total_manpower_probability"] = $tManpowerProbability;
            $parameters["layak_probability"] = $layakProbability;
            $parameters["tidak_layak_probability"] = $tidakLayakProbability;
            $parameters["yearlyLayakValue"] = $yearlyLayakValue;
            $parameters["yearlyTLValue"] = $yearlyTLValue;
            $parameters["bAgeLayakValue"] = $bAgeLayakValue;
            $parameters["bAgeTLValue"] = $bAgeTLValue;
            $parameters["tManpowerLayakValue"] = $tManpowerLayakValue;
            $parameters["tManpowerTLValue"] = $tManpowerTLValue;

            if($newData){
                return view('umkm.umkm_result',["data"=>$newData,'parameters'=>$parameters]);
                // return response()->json(["message"=>'success','data'=>$newData,'parameters'=>$parameters,'status'=>'success'],200);
            }
            return response()->json(["message"=>"error on creating",'status'=>'error'],500);
        }
        return response()->json(["message"=>"Data Not Found","umkm"=>$req->umkm,"rules"=>$req->rulesId,"is-include"=>$req->isInclude],404);
    }
    public function formNBCalculation(){
        $rules = NaiveBayesRules::get();
        $umkm = Umkm::get();
        return view('umkm.form_naive',compact('rules','umkm'));
    }
}
