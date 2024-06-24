@extends('partial.layout')

@section('content')
    <div class="block-header">
        <h1>
            Hasil Kelayakan UMKM : {{$data->td_name}}
        </h1>
        <h1 style="background-color:{{$data->status=="Layak"?'green':'red'}};padding:10px;color:white;text-align:center;">{{$data->status}}</h1>
    </div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-{{$data->status=="Layak"?'green':'red'}}" style="display: flex;justify-content: space-between;align-items: center;">
                    <h2 style="text-transform: uppercase;font-weight:600">
                      Hasil Perhitungan Kelayakan 
                    </h2>
                    
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <tr><th>Parameter/Attribute</th><th>Nilai</th><th>Cleansing</th></tr>
                            <tr>
                                <th>Pendapatan Tahunan</th><td>Rp. {{number_format($data->yearly_turnover)}}</td><td>{{$parameters["cleansing_data"]->yearly_turnover}}</td>
                            </tr>
                            <tr>
                                <th>Umur Bisnis</th><td>{{number_format($data->business_age)}} Tahun</td><td>{{$parameters["cleansing_data"]->business_age}}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Pegawai</th><td>{{number_format($data->total_manpower)}} Orang</td><td>{{$parameters["cleansing_data"]->total_manpower}}</td>
                            </tr>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-blue" style="display: flex;justify-content: space-between;align-items: center;">
                    <h2 style="text-transform: uppercase;font-weight:600">
                      Aturan Perhitungan Yang di Pakai (Naive Bayes) : {{$parameters["rules"]->rules_name}}
                    </h2>
                    
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <tr><th>Parameters/Attribute</th><th>Operator</th><th>Nilai Perbandingan</th></tr>
                            <tr>
                                <th>Pendapatan Tahunan</th><td>{{$parameters["rules"]->turnover_opt}}</td><td>Rp. {{number_format($parameters["rules"]->turnover_value)}}</td>
                            </tr>
                            <tr>
                                <th>Umur Bisnis</th><td>{{$parameters["rules"]->business_age_opt}}</td><td>{{number_format($parameters["rules"]->business_age_value)}} Tahun</td>
                            </tr>
                            <tr>
                                <th>Jumlah Pegawai</th><td>{{$parameters["rules"]->total_manpower_opt}}</td><td>{{number_format($parameters["rules"]->total_manpower_value)}} Orang</td>
                            </tr>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-orange" style="display: flex;justify-content: space-between;align-items: center;">
                    <h2 style="text-transform: uppercase;font-weight:600">
                      Data Perhitungan Dari Data Set
                    </h2>
                    
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <?php
                            // $yearlyTurnOver = $parameters["cleansing_data"]->yearly_turnover;
                            // $bAge = $parameters['cleansing_data']->business_age;
                            // $totalManpower = $parameters['cleansing_data']->total_manpower;
                            // $total =$parameters["total_per_label"];
                            // //count all probability base on attribute
                            // $yearlyProbability = $parameters["yearly_probability"];
                            // $bAgeProbability = $parameters["business_age_probability"];
                            // $tManpowerProbability = $parameters["total_manpower_probability"];
                            // //get the probability value base on cleansing data value 'Yes' or 'No'
                            // $yearlyLayakValue = $yearlyTurnOver=="Yes"?$yearlyProbability["layakYes"]:$yearlyProbability["layakNo"];
                            // $yearlyTLValue = $yearlyTurnOver=="Yes"?$yearlyProbability["tidakLayakYes"]:$yearlyProbability["tidakLayakNo"];
                            // $bAgeLayakValue = $bAge=="Yes"?$bAgeProbability["layakYes"]:$bAgeProbability["layakNo"];
                            // $bAgeTLValue = $bAge=="Yes"?$bAgeProbability["tidakLayakYes"]:$bAgeProbability["tidakLayakNo"];
                            // $tManpowerLayakValue = $totalManpower=="Yes"?$tManpowerProbability["layakYes"]:$tManpowerProbability["layakNo"];
                            // $tManpowerTLValue = $totalManpower=="Yes"?$tManpowerProbability["tidakLayakYes"]:$tManpowerProbability["tidakLayakNo"];
                            // $totalData = $total["layak"] + $total["tidak_layak"];
                            // $layakProbability =($total["layak"]/$totalData) * ($yearlyLayakValue/$total["layak"])
                            //                 * ($bAgeLayakValue/$total["layak"]) * ($tManpowerLayakValue/$total["layak"]);
                            // $tidakLayakProbability = ($total["tidak_layak"]/$totalData) * ($yearlyTLValue/$total["tidak_layak"])
                            //                 * ($bAgeTLValue/$total["tidak_layak"]) * ($tManpowerTLValue/$total["tidak_layak"]);
                            // $resultData["status"] = $layakProbability>$tidakLayakProbability?"Layak":"Tidak Layak";
                        ?>
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <tr><th>Parameter / Attribute</th><th colspan='3'>Layak</th><th colspan='3'>Tidak Layak</th></tr>
                            <tr><th>Jumlah Total Per Label</th><td colspan='3'>{{$parameters['total_per_label']['layak']}}</td><td colspan='3'>{{$parameters["total_per_label"]['tidak_layak']}}</td></tr>
                            <tr><th>Pendapatan Pertahun</th><td>Layak : Yes = {{$parameters['yearly_probability']['layakYes']}}</td><td>Layak : No = {{$parameters["yearly_probability"]['layakNo']}}</td><th>Nilai : {{$parameters['yearlyLayakValue']}}</th>
                                    <td>Tidak Layak : Yes = {{$parameters["yearly_probability"]['tidakLayakYes']}}</td><td>Tidak Layak : No = {{$parameters["yearly_probability"]['tidakLayakNo']}}</td><th>Nilai : {{$parameters['yearlyTLValue']}}</th></tr>
                            <tr><th>Umur Bisnis</th><td>Layak : Yes = {{$parameters['business_age_probability']['layakYes']}}</td><td>Layak : No = {{$parameters["business_age_probability"]['layakNo']}}</td><th>Nilai : {{$parameters['bAgeLayakValue']}}</th>
                                    <td>Tidak Layak : Yes = {{$parameters["business_age_probability"]['tidakLayakYes']}}</td><td>Tidak Layak : No = {{$parameters["business_age_probability"]['tidakLayakNo']}}</td><th>Nilai : {{$parameters['bAgeTLValue']}}</th></tr>
                            <tr><th>Jumlah Pegawai</th><td>Layak : Yes = {{$parameters['total_manpower_probability']['layakYes']}}</td><td>Layak : No = {{$parameters["total_manpower_probability"]['layakNo']}}</td><th>Nilai : {{$parameters['tManpowerLayakValue']}}</th>
                                    <td>Tidak Layak : Yes = {{$parameters["total_manpower_probability"]['tidakLayakYes']}}</td><td>Tidak Layak : No = {{$parameters["total_manpower_probability"]['tidakLayakNo']}}</td><th>Nilai : {{$parameters['tManpowerTLValue']}}</th></tr>
                            <tr><th>Probabilitas</th><td colspan='3'>{{number_format($parameters['layak_probability'],10)}}</td><td colspan='3'>{{number_format($parameters['tidak_layak_probability'],10)}}</td></tr>
                            <tr><th>Hasil</th><td>{{$data->status}}</td><th>Alasan</th><td colspan='4'>@if($data->status=='Layak') Hasil perhitungan Probabilitas Nilai <b>Layak</b> berdasarkan Data Set <b>Lebih besar</b> dari Probabilitas Nilai <b>Tidak Layak</b> @else Hasil perhitungan Probabilitas Nilai <b>Tidak Layak</b> berdasarkan Data Set <b>Lebih besar</b> dari Probabilitas Nilai <b>Layak</b> @endif</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-green" style="display: flex;justify-content: space-between;align-items: center;">
                    <h2 style="text-transform: uppercase;font-weight:600">
                      Data UMKM
                    </h2>
                    
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <tr><th>Nama UMKM</th><td>{{$parameters["raw_data"]->umkm_name}}</td><th>Asset</th><td>{{$parameters["raw_data"]->asset}}</td></tr>
                            <tr><th>NIK Pemilik</th><td>{{$parameters["raw_data"]->owner_nik}}</td><th>Pendapatan Bulanan</th><td>{{number_format($parameters["raw_data"]->monthly_turnover)}}</td></tr>
                            <tr><th>Kecamatan - Kelurahan</th><td>{{$parameters["raw_data"]->district}} - {{$parameters["raw_data"]->subdistrict}}</td><th>Pendapatan Tahunan</th><td>{{number_format($parameters["raw_data"]->yearly_turnover)}}</td></tr>
                            <tr><th>Alamat Lengkap</th><td>{{$parameters["raw_data"]->address}}</td><th>Tahun Berdiri</th><td>{{date('d F Y',strtotime($parameters["raw_data"]->date_establish))}}</td></tr>
                            <tr><th>RT/RW</th><td>{{$parameters["raw_data"]->rt_rw}}</td><th>Jumlah Pegawai</th><td>{{$parameters["raw_data"]->total_manpower}}</td></tr>
                            <tr><th>No. Telp</th><td>{{$parameters["raw_data"]->phone}}</td><th>Kategori Bisnis</th><td>{{$parameters["raw_data"]->business_category}}</td></tr>
                            <tr><th>Bidang Bisnis</th><td>{{$parameters["raw_data"]->business_field}}</td><th>Tipe Subsidi</th><td>{{$parameters["raw_data"]->subsidies_type}}</td></tr>
                            <tr><th>Dokumen Legal</th><td>{{$parameters["raw_data"]->legal_document}}</td><th>Status</th><td>{{$parameters["raw_data"]->status}}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
@endsection

