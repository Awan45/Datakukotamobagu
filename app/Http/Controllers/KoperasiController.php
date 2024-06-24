<?php

namespace App\Http\Controllers;

use App\Models\Koperasi;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;

class KoperasiController extends Controller
{
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'k_name' => 'required',
            'legal_entity_date' => 'required',
            'legal_entity_number' => 'required',
            'district' => 'required',
            'subdistrict' => 'required',
            'address' => 'required',
            'certificate_status' => 'required',
            'k_type' => 'required',
            'owner_nik' => 'required',
            'status' => 'required',
            // 'foto' => 'required',
        ]);
        return $validator;
    }

    public function index()
    {
        //
        return view('koperasi.index', [
            'data' => Koperasi::all()
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
        $data = MainController::store(Koperasi::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show( $koperasi)
    {
        //
    }

    
    public function edit($id)
    {
        return MainController::findId(Koperasi::class, $id);
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
        $data = MainController::update(Koperasi::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(Koperasi::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
