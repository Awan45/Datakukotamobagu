<?php

namespace App\Http\Controllers;

use App\Models\{TrainingData, Umkm};
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;

class TrainingDataController extends Controller
{
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'id_umkm' => 'required',
            'td_name' => 'required',
            'year_turnover' => 'required',
            'business' => 'required',
            'total_manpower' => 'required',
            'status' => 'required',
            'is_include' => 'required'
        ]);
        return $validator;
    }

    public function index()
    {
        //
        return view('training_data.index', [
            'data' => TrainingData::leftJoin('umkms','umkms.id','training_data.id_umkm')
                            ->select('training_data.*','umkms.umkm_name as umkm')
                            ->get(),
            'umkm' => Umkm::all(),
        ]);
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validate = $this->validateForm($request);

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }

        $input = $request->except(['_token']);
        $data = MainController::store(TrainingData::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show( $training_data)
    {
        //
    }

    
    public function edit($id)
    {
        return TrainingData::leftJoin('umkms','umkms.id','training_data.id_umkm')
                            ->where('training_data.id', $id)
                            ->select('training_data.*','umkms.umkm_name as umkm')
                            ->first();
    }

    
    public function update(Request $request, $id)
    {
        $validate = $this->validateForm($request);

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }

        $input = $request->except(['_token', '_method']);
        $data = MainController::update(TrainingData::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(TrainingData::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
    public function convertFromUMKMToTraining(){
        $data = Umkm::get();
        if(count($data)>0){
            $new = array();
            foreach($data as $d){
                $business_age = date('Y',strtotime('now'))-date('Y',strtotime($d->date_establish));
                $n = array(
                    'id_umkm'=>$d->id,
                    'td_name'=>$d->umkm_name,
                    'year_turnover'=>$d->yearly_turnover,
                    'business'=>$business_age,
                    'total_manpower'=>$d->total_manpower,
                    'status'=>'Layak',
                    'is_include'=>'Yes'
                );
                $n = TrainingData::create($n);
                if($n){
                    $n['status_insert'] = 'Success';
                }else{
                    $n['status_insert']='Failed';
                }
                array_push($new,$n);
            }
            if(count($new)>0){
                return response()->json(['status'=>'success','data'=>$new],200);
            }
        }
        return response()->json(['status'=>'failed','message'=>'No Data'],200);
    }
}
