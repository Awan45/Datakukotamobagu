<?php

namespace App\Http\Controllers;

use App\Models\ResultData;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;

class ResultDataController extends Controller
{
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'id_umkm' => 'required',
            'td_name' => 'required',
            'yearly_turnover' => 'required',
            'business_age' => 'required',
            'total_manpower' => 'required',
            'rules' => 'required',
            'status' => 'required',
            'is_include' => 'required',
            // 'foto' => 'required',
        ]);
        return $validator;
    }

    public function index()
    {
        //
        return view('umkm.result', [
            'data' => ResultData::leftJoin('umkms','umkms.id','result_data.id_umkm')
                        ->leftJoin('naive_bayes_rules','naive_bayes_rules.id','result_data.id_rules')
                        ->select('result_data.*','umkms.umkm_name as umkm','naive_bayes_rules.rules_name as rules')->get(),
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
        $data = MainController::store(ResultData::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show( $result_data)
    {
        //
    }

    
    public function edit($id)
    {
        return MainController::findId(ResultData::class, $id);
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
        $data = MainController::update(ResultData::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(ResultData::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
