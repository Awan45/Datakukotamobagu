<?php

namespace App\Http\Controllers;

use App\Models\{CleansingData,Umkm, NaiveBayesRules,ResultData,TrainingData};
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;

class CleansingDataController extends Controller
{
    
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'id_umkm' => 'required',
            'id_rules' => 'required',
            'source' => 'required',
            'yearly_turnover' => 'required',
            'business_age' => 'required',
            'total_manpower' => 'required',
            'status' => 'required',
            // 'foto' => 'required',
        ]);
        return $validator;
    }

    public function index()
    {
        //
        return view('cleansing_data.index', [
            'data' => CleansingData::leftJoin('umkms','umkms.id','cleansing_data.id_umkm')
                            ->leftJoin('naive_bayes_rules','naive_bayes_rules.id','cleansing_data.id_rules')
                            ->select('cleansing_data.*','umkms.umkm_name as umkm','naive_bayes_rules.rules_name as rules')->get(),
            'umkm' => Umkm::all(),
            'rules' => NaiveBayesRules::all(),
        ]);
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);
        $validate = $this->validateForm($request);

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }

        $input = $request->except(['_token']);
        $data = MainController::store(CleansingData::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show( $cleansing_data)
    {
        //
    }

    
    public function edit($id)
    {
        return  CleansingData::leftJoin('umkms','umkms.id','cleansing_data.id_umkm')
                            ->leftJoin('naive_bayes_rules','naive_bayes_rules.id','cleansing_data.id_rules')
                            ->where('cleansing_data.id', $id)
                            ->select('cleansing_data.*','umkms.umkm_name as umkm','naive_bayes_rules.rules_name as rules')
                            ->first();
            
    }

    
    public function update(Request $request, $id)
    {
        // dd($request);
        $validate = $this->validateForm($request);

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }

        $input = $request->except(['_token', '_method']);
        $data = MainController::update(CleansingData::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        // dd($id);
        $destroy = MainController::destroy(CleansingData::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
    public function cleansingDataPerUmkm($idUmkm,$rulesId){
        $umkm = Umkm::where('id',$idUmkm)->first();
        if($umkm){
            CleansingData::where('id_rules',$rulesId)->where('id_umkm',$idUmkm)->forceDelete();
            $businessAge = date('Y',strtotime('now'))-date('Y',strtotime($umkm->date_establish));
            $cleansingData = array();
            $cleansingData['source'] = 'real';
            $rules = NaiveBayesRules::where('id',$rulesId)->first();
            $cleansingData['yearly_turnover'] = $this->compareData($rules->turnover_opt,$rules->turnover_value,$umkm->yearly_turnover)?'Yes':'No';
            $cleansingData['business_age'] = $this->compareData($rules->business_age_opt,$rules->business_age_value,$businessAge)?'Yes':'No';
            $cleansingData['total_manpower'] = $this->compareData($rules->total_manpower_opt,$rules->total_manpower_value,$umkm->total_manpower);
            $cleansingData['status'] = 'Not Include';
            $cleansingData['id_rules'] = $rulesId;
            $cleansingData['id_umkm'] = $idUmkm;
            $new = CleansingData::create($cleansingData);
            if($new){
                return ["message"=>"success","status"=>"success","data"=>$new];
            }else{
                return ["message"=>"Error","status"=>"error"];
            }
        }
        return ['message'=>'error data not found','status'=>'error'];
    }

    public function createCleansingData(Request $req){
        $rulesId = $req->rulesId;
        $source = $req->source;
        $resultData = array();
        if($source=='real'){
            $resultData = ResultData::where('is_include','Yes')->get();
        }else{
            $resultData = TrainingData::where('is_include','Yes')->get();
        }
        $rules = NaiveBayesRules::where('id',$rulesId)->first();

        $check = CleansingData::where('id_rules',$rulesId)->count();
        if($check>0){
            CleansingData::where('id_rules',$rulesId)->forceDelete();
        }
        $temp = array();
        foreach($resultData as $data){
            $cleansingData = array();
            $cleansingData['source'] = $req->source;
            $cleansingData['yearly_turnover'] = $this->compareData($rules['turnover_opt'],$rules['turnover_value'],$data->year_turnover)?'Yes':'No';
            $cleansingData['business_age'] = $this->compareData($rules['business_age_opt'],$rules['business_age_value'],$data->business)?'Yes':'No';
            $cleansingData['total_manpower'] = $this->compareData($rules['total_manpower_opt'],$rules['total_manpower_value'],$data->total_manpower)?'Yes':'No';
            $cleansingData['status'] = $data->status;
            $cleansingData['id_rules'] = $rulesId;
            $cleansingData['id_umkm'] = $data->id_umkm;
            $clean = CleansingData::create($cleansingData);
            $clean["data_yearly_value"] = $data->year_turnover;
            $clean["yearly_rules"] = $rules["turnover_opt"];
            $clean["yearly_rules_value"] = $rules['turnover_value'];
            $clean["data_age"] = $data->business;
            $clean["business_age_opt"] = $rules['business_age_opt'];
            $clean["business_age_value"] = $rules["business_age_value"];
            $clean["data_manpower"] = $data->total_manpower;
            $clean["manpower_opt"] = $rules["total_manpower_opt"];
            $clean["manpower_value"] = $rules["total_manpower_value"];
            if($clean){
                $clean["status_clean"]="success";
            }else{
                $clean["status_clean"]="Error";
            }
            $clean["td_name"] = $data->td_name;
            $clean["rules"] = $rules["rules_name"];
            array_push($temp,$clean);
        }
        return view('cleansing_data.generated_cleansing_data',compact('temp','rules'));
        // return response()->json(['status'=>'success','data'=>$temp],200);
    }
    public function compareData($rules, $minValue,$data){
        if($rules=='<'){
            return $data<$minValue;
        }else if($rules=='>'){
            return $data>$minValue;
        }else if($rules=='<='){
            return $data<=$minValue;
        }else{
            return $data>=$minValue;
        }
    }
    public function formCleansingData(){
        $rules = NaiveBayesRules::get();
        return view('cleansing_data.form_cleansing',compact('rules'));
    }

}
