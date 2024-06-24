@extends('partial.layout')

@section('content')
    <div class="block-header">
        <h1>
            Data Hasil Check Kelayakan
        </h1>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header" style="display: flex;justify-content: space-between;align-items: center;">
                    <h2 style="text-transform: uppercase;font-weight:600">
                      Table Cleansing
                    </h2>
                        {{-- <button class="btn btn-success btn-lg waves-effect m-r-20 " data-toggle="modal" data-target="#modal">
                        <i class="material-icons">add_box</i>
                        <span>TAMBAH DATA</span> 
                        </button> --}}
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>UMKM</th>
                                    <th>Aturan</th>
                                    <th>Pemasukan Tiap Tahun</th>
                                    <th>Lama Berdiri UMKM</th>
                                    <th>Total Karyawan</th>
                                    <th>Status</th>
                                    <th>LOG</th>
                                    <th>--</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>UMKM</th>
                                    <th>Aturan</th>
                                    <th>Pemasukan Tiap Tahun</th>
                                    <th>Lama Berdiri UMKM</th>
                                    <th>Total Karyawan</th>
                                    <th>Status</th>
                                    <th>LOG</th>
                                    <th>--</th>
                                </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->umkm }}</td>
                                    <td>{{ $item->rules }}</td>
                                    <td align="right">Rp.{{ number_format($item->yearly_turnover) }}</td>
                                    <td>{{ $item->business_age }} tahun</td>
                                    <td>{{ $item->total_manpower }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td style="font-size:10px">created at {{date('d F Y H:i:s',strtotime($item->created_at))}}<br>
                                        updated at {{date('d F Y H:i:s',strtotime($item->updated_at))}}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger waves-effect deleteRecord" data-id="{{ $item->id }}">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                    </td>
                                </tr>
                              @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL START --}}

                </form>
@endsection

@push('scriptPlus')
    {{-- HAPUS DATA --}}
    <script>
        $(".deleteRecord").click(function(){
             var rep = confirm("apakah anda ingin menghapus data ini !");
            

            if(rep){
                alert('data sedang dihapus');
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");
            
                $.ajax(
                {
                    url: "result_data/"+id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response){
                        console.log("it Works");
                        $.notify(
                                {
                                    message: response.message,
                                },
                                {
                                    type: 'bg-green',
                                    allow_dismiss: true,
                                    newest_on_top: true,
                                    timer: 1500,
                                    placement: {
                                        from: 'top',
                                        align: 'center',
                                    },
                                    animate: {
                                        enter: 'animated fadeInDown',
                                        exit: 'animated fadeOutUp',
                                    },
                                    template:
                                        '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' +
                                        (true ? "p-r-35" : "") +
                                        '" role="alert">' +
                                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                        '<span data-notify="icon"></span> ' +
                                        '<span data-notify="title">{1}</span> ' +
                                        '<span data-notify="message">{2}</span>' +
                                        '<div class="progress" data-notify="progressbar">' +
                                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                                        "</div>" +
                                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                                        "</div>",
                                }
                            );
                        setTimeout(() => {
                            location.reload() 
                        }, 1700);
                    }
                });
            }
        
        });
    </script>
@endpush