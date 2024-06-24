<?php

namespace App\Http\Controllers;

use App\Models\NaiveBayesRules;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;
class NaiveBayesRulesController extends Controller
{
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'rules_name' => 'required',
            'turnover_opt' => 'required',
            'business_age_opt' => 'required',
            'total_manpower_opt' => 'required',
            'turnover_value' => 'required',
            'business_age_value' => 'required',
            'total_manpower_value' => 'required',
        ]);
        return $validator;
    }

    public function index()
    {
        //
        return view('naive_bayes_rules.index', [
            'data' => NaiveBayesRules::all()
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
        $data = MainController::store(NaiveBayesRules::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show( $naive_bayes_rules)
    {
        //
    }

    
    public function edit($id)
    {
        // dd($id);
        return MainController::findId(NaiveBayesRules::class, $id);
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
        $data = MainController::update(NaiveBayesRules::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(NaiveBayesRules::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
