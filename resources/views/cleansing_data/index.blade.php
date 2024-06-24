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
                                    <th>--</th>
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
                                    <th>--</th>

                                </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->umkm }}</td>
                                    <td>{{ $item->rules }}</td>
                                    <td>{{ $item->source }}</td>
                                    <td>{{ $item->yearly_turnover }}</td>
                                    <td>{{ $item->business_age }}</td>
                                    <td>{{ $item->total_manpower }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <button id="btnEdit" onclick="edit('{{ $item->id }}')"  type="button" class="btn btn-warning waves-effect">
                                            <i class="material-icons">mode_edit</i>
                                        </button>
                                        <button type="button"  class="btn btn-danger waves-effect deleteRecord" data-id="{{ $item->id }}">
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
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header bg-light-blue">
                  <h4 class="modal-title" id="largeModalLabel">FORM CLEANSING DATA 111</h4>
              </div>
              <div class="modal-body">
                  <div class="body">
                    <form id="form-modal-data" action="" method="" data-action="{{ route('cleansing_data.store') }}" data-id="" data-type="post" method="POST">
                        @csrf
                        <label for="id_umkm">UMKM : 
                            <span id='selected-umkm' style="color: black;text-decoration: underline;font-weight: 600"></span>
                        </label>
                        <div class="form-group ">
                            <div id="line-id_umkm-error" class="form-line ">
                               <select name="id_umkm" class="form-control show-tick">
                                    <option value="">-- Pilih UMKM --</option>
                                    @foreach($umkm as $r)
                                    <option value="{{$r->id}}">{{$r->umkm_name}}-{{ $r->owner_nik }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label id="id_umkm-error" style="display: none" class="error" for="id_umkm"></label>
                        </div>
                        <label for="id_rules">Naive Bayes Rules : 
                            <span id='selected-rules' style="color: black;text-decoration: underline;font-weight: 600"></span>
                        </label>
                        <div class="form-group">
                            <div id="line-id_rules-error" class="form-line">
                                <select name="id_rules" class="form-control show-tick">
                                    <option value="">-- Pilih Rules --</option>
                                    @foreach($rules as $r)
                                        <option value="{{$r->id}}">{{$r->rules_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label id="id_rules-error" style="display: none" class="error" for="id_rules"></label>

                        </div>
                        <label for="source">Source: 
                            <span id='selected-source' style="color: black;text-decoration: underline;font-weight: 600"></span>
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
                        <label for="yearly_turnover">Yearly Turnover:
                            <span id='selected-yearly_turnover' style="color: black;text-decoration: underline;font-weight: 600"></span>
                        </label>
                        <div class="form-group">
                            <div id="line-yearly_turnover-error" class="form-line">
                                <select id="yearly_turnover" name="yearly_turnover" class="form-control show-tick">
                                    <option value="">-- Pilih Yearly Turnover --</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <label id="yearly_turnover-error" style="display: none" class="error" for="yearly_turnover"></label>

                        </div>
                        <label for="business_age">Business Age:
                            <span id='selected-business_age' style="color: black;text-decoration: underline;font-weight: 600"></span>
                        </label>
                        <div class="form-group">
                            <div id="line-business_age-error" class="form-line">
                                <select id="business_age" name="business_age" class="form-control show-tick">
                                    <option value="">-- Pilih Business Age --</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <label id="business_age-error" style="display: none" class="error" for="business_age"></label>

                        </div>
                        <label for="total_manpower">Total Manpower:
                            <span id='selected-total_manpower' style="color: black;text-decoration: underline;font-weight: 600"></span>
                        </label>
                        <div class="form-group">
                            <div id="line-total_manpower-error" class="form-line">
                                <select id="total_manpower" name="total_manpower" class="form-control show-tick">
                                    <option value="">-- Pilih Total Manpower --</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <label id="total_manpower-error" style="display: none" class="error" for="total_manpower"></label>

                        </div>
                        <label for="status">Status:
                            <span id='selected-status' style="color: black;text-decoration: underline;font-weight: 600"></span>
                        </label>
                        <div class="form-group">
                            <div id="line-status-error" class="form-line">
                                <select id="status" name="status" class="form-control show-tick">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Layak">Layak</option>
                                    <option value="Tidak Layak">Tidak Layak</option>
                                </select>
                            </div>
                            <label id="status-error" style="display: none" class="error" for="status"></label>

                        </div>

                        
                        
                    </div>
                </div>
                        <div class="modal-footer">
                            <button onclick="closeModal()" type="button" class="btn btn-danger waves-effect" data-dismiss="modal">TUTUP</button>
                            <button id="button-simpan" type="submit" class="btn btn-success waves-effect">
                                SIMPAN
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
      </div>
  </div>
                </form>
@endsection

@push('scriptPlus')
    {{-- POST DATA --}}
    <script>
        //Get form element
        var form = document.getElementById("form-modal-data");
        var modal = document.getElementById('modal');
        // var submitButton = '#buton-simpan'
        function submitForm(event){
            event.preventDefault();
            const submitButton = document.querySelector('#button-simpan');
            const url = form.getAttribute('data-action');
            const type = form.getAttribute('data-type');
            const id = form.getAttribute('data-id');
            const formData = new FormData(form);

            // Function to handle success and error responses
            const handleResponse = function (response) {
                console.log('RESPONSE', response.message);
                form.reset();
                // modal.style.display = 'none'; // You can adjust this based on your modal hiding mechanism
                $('#modal').modal('hide');
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
            };

            // Function to handle error responses
            const handleError = function (response) {
                submitButton.classList.remove('button--loading');
                console.log('RESPONSE ERROR', response.responseJSON);
                const errorMessage = response.responseJSON;
                if (errorMessage.error) {
                    for (const erMsg in errorMessage.errors) {
                        console.log('OBJ', errorMessage.errors[erMsg][0]);
                        const element = document.querySelector(`#line-${erMsg}-error`);
                        const labelError = document.querySelector(`#${erMsg}-error`);
                        // element.classList.add('error');
                        element.classList.add('focused');
                        labelError.style.display = 'block';
                        labelError.innerText = `${errorMessage.errors[erMsg][0]}`;
                        // element.classList.add('mystyle');
                    }
                }
            };
            if(type==='edit'){
                // let formData = 
                formData.set("_method", "PUT");
            }
            // Create AJAX request
            const ajaxOptions = {
                url: type === 'post' ? url : `/cleansing_data/${id}`,
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: handleResponse,
                error: handleError,
            };

            // Send AJAX request
            $.ajax(ajaxOptions);
        }

        //Calling a function during form submission.
        form.addEventListener('submit', submitForm);
    </script>
    {{-- EDIT DATA --}}
    <script>
        // const form = document.getElementById('form-modal-data');
        const btnEdit = document.getElementById('btnEdit');
        
        let fileFoto = document.getElementById('foto_pemilik');
        var output = document.getElementById('showFoto');
        // fungsi update foto
        function loadFile(event) {
            console.log('EVENT', event.target);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        
        
        function closeModal(){
            const id_umkmError = document.querySelector(`#id_umkm-error`);
            id_umkmError.style.display = 'none';
            const id_rulesError = document.querySelector(`#id_rules-error`);
            id_rulesError.style.display = 'none';
            const source = document.querySelector(`#source-error`);
            source.style.display = 'none';
            const sourceError = document.querySelector(`#source-error`);
            sourceError.style.display = 'none';
            const yearly_turnover = document.querySelector(`#yearly_turnover-error`);
            yearly_turnover.style.display = 'none';
            const business_ageError = document.querySelector(`#business_age-error`);
            business_ageError.style.display = 'none';
            const total_manpowerError = document.querySelector(`#total_manpower-error`);
            total_manpowerError.style.display = 'none';
            const statusError = document.querySelector(`#status-error`);
            statusError.style.display = 'none';
            form.setAttribute('data-type', 'post');
            $('#id_umkm').val('');
            $('#id_rules').val('');
            $('#source').val('');
            $('#selected-source').text('')
            $('#selected-yearly_turnover').text('')
            $('#yearly_turnover').val('');
            $('#selected-yearly_turnover').text('')
            $('#business_age').val('');
            $('#selected-business_age').text('')
            $('#total_manpower').val('');
            $('#selected-total_manpower').text('')
            $('#status').val('');
            $('#selected-status').text('')
            //forInputFile

            // $('#foto_pemilik').val(null);
            // output.src = ''
            
            //endForInputFile
            console.log('FORMCLOSE', form.getAttribute('data-type'), output.src);
        }
        
        function edit(id){
            console.log('ID', id);
            $('#modal').modal({backdrop: 'static', keyboard: false})
            const url =`/cleansing_data/${id}/edit`;
            form.setAttribute('data-type', 'edit');
            console.log('ID', id);

            $.get(url, function (data) {
                console.log('DATA', data)
                $('#id_umkm').val(data.id_umkm);
                // $("#source option").each(function(){
                //     // if ($(this).val() == data.source)
                //     if ($(this).val() == data.source){
                //     console.log('TESTING', $(this).val())
                //         $(this).attr("selected", 'selected');
                //     }
                // });
                // $('#selected-source').css('color','black').css('font-weight','600').css('text-decoration','underline')
                $('#selected-source').text(data.source)
                $('#selected-umkm').text(data.umkm)
                $('#selected-rules').text(data.rules)
                $('#id_rules').val(data.id_rules);
                $('#source').val(data.source);
                $('#yearly_turnover').val(data.yearly_turnover);
                $('#selected-yearly_turnover').text(data.yearly_turnover)
                $('#business_age').val(data.business_age);
                $('#selected-business_age').text(data.business_age)
                $('#total_manpower').val(data.total_manpower);
                $('#selected-total_manpower').text(data.total_manpower)
                $('#status').val(data.status);
                $('#selected-status').text(data.status)

                //forInputFoto
                // output.src = `{{ asset('foto_pemilik')}}/${data.foto_pemilik}`
                form.setAttribute('data-id', data.id);
                //endForInputFoto
            })
        }


    </script>
    {{-- HAPUS DATA --}}
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
                    url: "cleansing_data/"+id,
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