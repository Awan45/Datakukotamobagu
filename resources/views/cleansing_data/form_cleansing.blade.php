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
               
            </div>
            <div class="body">
                <form action="{{ url('/cleansing_the_data') }}" data-id="" data-type="post"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="id_rules">Cleansing Rules</label>
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
                            <label for="source">Source:
                                <span id='source'
                                    style="color: black;text-decoration: underline;font-weight: 600"></span>
                            </label>
                            <div class="form-group">
                                <div id="line-source-error" class="form-line">
                                    <select id="source" name="source" class="form-control show-tick">
                                        <option value="">-- Pilih Source --</option>
                                        <option value="training">Training</option>
                                        <option value="real">Real</option>
                                    </select>
                                </div>
                                <label id="source-error" style="display: none" class="error" for="source"></label>

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
