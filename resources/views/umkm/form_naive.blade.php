@extends('partial.layout')

@section('content')
<div class="block-header">
    <h1>
        CEK KELAYAKAN UMKM
    </h1>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header" style="display: flex;justify-content: space-between;align-items: center;">
                <h2 style="text-transform: uppercase;font-weight:600">
                    Parameters
                </h2>
            </div>
            <div class="body">
                <form method="POST" action="{{ url('/nb_calculation') }}" data-id="" data-type="post"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="id_rules">Cleansing Rules : </label>
                            <div class="form-group">
                                <div id="line-id_rules-error" class="form-line">
                                    <select name="rulesId" class="form-control show-tick">
                                        @foreach($rules as $r)
                                        <option value="{{$r->id}}">{{$r->rules_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label id="id_rules-error" style="display: none" class="error" for="id_rules"></label>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="umkm">UMKM :
                                <span id='umkm'
                                    style="color: black;text-decoration: underline;font-weight: 600"></span>
                            </label>
                            <div class="form-group">
                                <div id="line-umkm-error" class="form-line">
                                    <select id="umkm" name="umkm" class="form-control show-tick">
                                        @foreach($umkm as $u)
                                            <option value="{{$u->id}}">{{$u->umkm_name}}
                                        @endforeach
                                    </select>
                                </div>
                                <label id="source-error" style="display: none" class="error" for="source"></label>

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="isInclude">Masukan Kedalam Data Training?
                                <span id='selected-isInclude'
                                    style="color: black;text-decoration: underline;font-weight: 600"></span>
                            </label>
                            <div class="form-group">
                                <div id="line-isInclude-error" class="form-line">
                                    <select id="isInclude" name="isInclude" class="form-control show-tick">
                                        <option value="">-- Pilih --</option>
                                        <option value="Yes">Ya</option>
                                        <option value="No">Tidak</option>
                                    </select>
                                </div>
                                <label id="isInclude-error" style="display: none" class="error" for="isInclude"></label>

                            </div>
                        </div>
                        <div class="col-lg-2">
                            
                            <button id="button-simpan" type="submit" class="btn btn-success waves-effect">
                                GENERATE
                                <div class="preloader pl-size-xs" style="display: none">
                                    <div class="spinner-layer pl-white">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="circle-clipper right">
                                            <div class="circle"></div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
