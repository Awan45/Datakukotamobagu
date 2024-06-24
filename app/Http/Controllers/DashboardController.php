<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Umkm,
    Koperasi
};  
use DB;

class DashboardController extends Controller
{
    //
    
    public function index(){
        // dd('teste');

        $totalUmkm = Umkm::all()->count();
        $totalKoperasi = Koperasi::all()->count();

        return view('dashboard.index',[
            'totalUmkm' => $totalUmkm,
            'totalKoperasi' => $totalKoperasi
        ]);
    }

    public function convertDateArray($data, $year){
        // dd($data);
        $newArray = array();
        // $itemArray = new \ArrayObject();
        
        foreach ($data as $item ) {
            $itemArray = new \stdClass();
            $itemArray->y = date('F', strtotime($year.'-'.$item->month.'-1')); 
            $itemArray->jumlah = $item->value;
            // dd($itemArray);
            array_push($newArray, $itemArray);
        }
        // dd($newArray);
        return $newArray;
    }

    public function requestDataUmkmByYear(Request $req){
        
        $groupByMonth = "YEAR(created_at),MONTH(created_at)";
        $year = $req->year;
        // dd($finish);
        $getByMonth = DB::table('umkms')
                      ->where('status', 'Aktif')
                      ->where('created_at','LIKE',$year."%")
                      ->whereNull('deleted_at');
                    //   ->where('business_category', 'LIKE','%'.$req->kategoriUmkm.'%')
                    //   ->selectRaw("YEAR(created_at) as Year, MONTH(created_at) as month, count(id) as value")
                    //   ->groupByRaw($groupByMonth)
                    //   ->get();
        if($req->kategoriUmkm){
            $getByMonth = $getByMonth->where('business_category', 'LIKE', '%'.$req->kategoriUmkm.'%');
        }
        if($req->kecamatan){
            $getByMonth = $getByMonth->where('district', 'LIKE', $req->kecamatan);
        }
        $getByMonth = $getByMonth->selectRaw("YEAR(created_at) as Year, MONTH(created_at) as month, count(id) as value")
                            ->groupByRaw($groupByMonth)
                            ->get();
        // dd($getByMonth, $newData, $req->kategoriUmkm);
        $getByMonth = $this->convertDateArray($getByMonth, $year);
        return response()->json(['success' => true, 'data' => $getByMonth]);
        
    }
    public function requestDataKoperasiByYear(Request $req){
        
        $groupByMonth = "YEAR(legal_entity_date),MONTH(legal_entity_date)";
        $year = $req->year;
        // dd($finish);
        $getByMonth = DB::table('koperasis')
                      ->where('status', 'Aktif')
                      ->where('legal_entity_date','LIKE',$year."%")
                      ->whereNull('deleted_at');
                    //   ->where('business_category', 'LIKE','%'.$req->kategoriUmkm.'%')
                    //   ->selectRaw("YEAR(created_at) as Year, MONTH(created_at) as month, count(id) as value")
                    //   ->groupByRaw($groupByMonth)
                    //   ->get();
        if($req->kategoriUmkm){
            $getByMonth = $getByMonth->where('k_type', 'LIKE', '%'.$req->kategoriUmkm.'%');
        }
        if($req->kecamatan){
            $getByMonth = $getByMonth->where('district', 'LIKE', $req->kecamatan);
        }
        $getByMonth = $getByMonth->selectRaw("YEAR(legal_entity_date) as Year, MONTH(legal_entity_date) as month, count(id) as value")
                            ->groupByRaw($groupByMonth)
                            ->get();
        // dd($getByMonth, $newData, $req->kategoriUmkm);
        $getByMonth = $this->convertDateArray($getByMonth, $year);
        return response()->json(['success' => true, 'data' => $getByMonth]);
        
    }
}
