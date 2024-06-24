<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MainController extends Controller
{
    public static function store($model, $input){
      // dd($model);
      $dataStore = $model::create($input);
      return $dataStore; 
    }

    public static function storeFile($request, $gambar, $path){
      $imageName = time().'_'.$path.'.'.$request->$gambar->extension();
      $request->$gambar->move($path, $imageName);
      // dd($imageName);
      return $imageName;
  
    }

    public static function update($model, $input, $id){
      $dataUpdate = $model::where('id', $id)->update($input);
      return $dataUpdate;
    }
    public static function getAllData($model){
      $getAllData = $model::all();
      // dd($getAllData);
      return $getAllData;
    }
    
    public static function findId($model, $id){
      // $findId = $model::find($id);
      $findId = $model::where('id', $id)->first();
      // dd($findId);
      return $findId;
    }

    public static function destroy($model, $id){
      // dd($model, $id);
      $destroy = self::findId($model, $id)->delete();
      return $destroy;
    }

    // public static function destroy(Model $model,Request $request)
    // {
    //     try {
    //         $output = $model::where('id', $request->get('id'))->delete();
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Deleted successfully',
    //             'output' => $output
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error', 'message' => 'Something went wrong!!', 'exception_message' => $e]);
    //     }
    // }

}

?>