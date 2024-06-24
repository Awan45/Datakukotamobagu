<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;

class UmkmController extends Controller
{
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'umkm_name'=>'required',
            'owner_nik' => 'required',
            'district' => 'required',
            'subdistrict' => 'required',
            'address' => 'required',
            'rt_rw' => 'required',
            'phone' => 'required',
            'business_field' => 'required',
            'legal_document' => 'required',
            'asset' => 'required',
            'monthly_turnover' => 'required',
            'yearly_turnover' => 'required',
            'date_establish' => 'required',
            'total_manpower' => 'required',
            'business_category' => 'required',
            'subsidies_type' => 'required',
            'status' => 'required'
        ]);
        return $validator;
    }

    public function index()
    {
        //
        return view('umkm.index', [
            'data' => Umkm::all()
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
        $data = MainController::store(Umkm::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show( $umkm)
    {
        //
    }

    
    public function edit($id)
    {
        return MainController::findId(Umkm::class, $id);
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
        $data = MainController::update(Umkm::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(Umkm::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
