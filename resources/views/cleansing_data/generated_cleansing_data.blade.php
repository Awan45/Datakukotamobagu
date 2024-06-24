@extends('partial.layout')

@section('content')
    <div class="block-header">
        <h1>
            Data Cleansing
        </h1>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header" style="display: flex;justify-content: space-between;align-items: center;">
                    <h2 style="text-transform: uppercase;font-weight:600">
                      Table Cleansing
                    </h2>
                    <button class="btn btn-success btn-lg waves-effect m-r-20 " data-toggle="modal" data-target="#modal">
                      <i class="material-icons">add_box</i>
                      <span>TAMBAH DATA</span> 
                    </button>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th colspan='3'><h5>Parameter Aturan yang di pakai {{$rules->rules_name}}</h5></th>
                            </tr>
                            <tr>
                                <th>Omset Tahunan</th><td>{{$rules->turnover_opt}}</td><td>{{number_format($rules->turnover_value)}}</td>
                            </tr>
                            <tr>
                                <th>Umur Bisnis</th><td>{{$rules->business_age_opt}}</td><td>{{number_format($rules->business_age_value)}}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Pegawai</th><td>{{$rules->total_manpower_opt}}</td><td>{{number_format($rules->total_manpower_value)}}</td>
                            </tr>
                        </table>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>UMKM</th>
                                    <th>Aturan</th>
                                    <th>Sumber</th>
                                    <th>Pemasukan Tiap Tahun</th>
                                    <th>Lama Berdiri UMKM</th>
                                    <th>Total Karyawan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>UMKM</th>
                                    <th>Aturan</th>
                                    <th>Sumber</th>
                                    <th>Pemasukan Tiap Tahun</th>
                                    <th>Lama Berdiri UMKM</th>
                                    <th>Total Karyawan</th>
                                    <th>Status</th>
                                    

                                </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($temp as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->td_name }}</td>
                                    <td>{{ $item->rules }}</td>
                                    <td>{{ $item->source }}</td>
                                    <td>{{ $item->yearly_turnover }}</td>
                                    <td>{{ $item->business_age }}</td>
                                    <td>{{ $item->total_manpower }}</td>
                                    <td>{{ $item->status }}</td>
                                    
                                </tr>
                              @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

