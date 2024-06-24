@extends('partial.layout')

@section('content')
    <div class="block-header">
        <h1>
            Data Koperasi
        </h1>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header" style="display: flex;justify-content: space-between;align-items: center;">
                    <h2 style="text-transform: uppercase;font-weight:600">
                      Table Koperasi
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
                                    <th>Nama Koperasi</th>
                                    <th>Masa Berlaku</th>
                                    <th>No Ijin</th>
                                    <th>Alamat</th>
                                    <th>Status Ijin</th>
                                    <th>Tipe Koperasi</th>
                                    <th>NIK Pemilik</th>
                                    <th>Status</th>
                                    <th>--</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Koperasi</th>
                                    <th>Masa Berlaku</th>
                                    <th>No Ijin</th>
                                    <th>Alamat</th>
                                    <th>Status Ijin</th>
                                    <th>Tipe Koperasi</th>
                                    <th>NIK Pemilik</th>
                                    <th>Status</th>
                                    <th>--</th>

                                </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->k_name }}</td>
                                    <td>{{ $item->legal_entity_date }}</td>
                                    <td>{{ $item->legal_entity_number }}</td>
                                    <td>
                                        Kec : {{ $item->district }} <br>
                                        Kel : {{ $item->subdistrict }} <br>
                                        {{ $item->address }}
                                    </td>
                                    <td>{{ $item->certificate_status }}</td>
                                    <td>{{ $item->k_type }}</td>
                                    <td>{{ $item->owner_nik }}</td>
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
                  <h4 class="modal-title" id="largeModalLabel">FORM KOPERASI DATA</h4>
              </div>
              <div class="modal-body">
                  <div class="body">
                    <form id="form-modal-data" action="" method="" data-action="{{ route('koperasi.store') }}" data-id="" data-type="post" method="POST">
                        @csrf
                        <label for="owner_nik">NIK Pemilik</label>
                        <div class="form-group ">
                            <div id="line-owner_nik-error" class="form-line ">
                                <input type="number" id="owner_nik" name="owner_nik" class="form-control" placeholder="...">
                            </div>
                            <label id="owner_nik-error" style="display: none" class="error" for="owner_nik"></label>
                        </div>
                        <label for="k_name">Nama Koperasi</label>
                        <div class="form-group">
                            <div id="line-k_name-error" class="form-line">
                                <input type="text" id="k_name" name="k_name" class="form-control" placeholder="...">
                            </div>
                            <label id="k_name-error" style="display: none" class="error" for="k_name"></label>

                        </div>
                        <label for="legal_entity_date">Masa Berlaku</label>
                        <div class="form-group ">
                            <div id="line-legal_entity_date-error" class="form-line ">
                                <input type="date" id="legal_entity_date" name="legal_entity_date" class="form-control" placeholder="...">
                            </div>
                            <label id="legal_entity_date-error" style="display: none" class="error" for="legal_entity_date"></label>
                        </div>
                        <label for="legal_entity_number">Nomor Ijin</label>
                        <div class="form-group ">
                            <div id="line-legal_entity_number-error" class="form-line ">
                                <input type="text" id="legal_entity_number" name="legal_entity_number" class="form-control" placeholder="...">
                            </div>
                            <label id="legal_entity_number-error" style="display: none" class="error" for="legal_entity_number"></label>
                        </div>
                        <label for="district">Kecamatan</label>
                        <div class="form-group">
                            <div id="line-district-error" class="form-line">
                                <input type="text" id="district" name="district" class="form-control" placeholder="kecamatan..">
                            </div>
                            <label id="district-error" style="display: none" class="error" for="district"></label>

                        </div>
                        <label for="subdistrict">Kelurahan</label>
                        <div class="form-group">
                            <div id="line-subdistrict-error" class="form-line">
                                <input type="text" id="subdistrict" name="subdistrict" class="form-control" placeholder="kelurahan...">
                            </div>
                            <label id="subdistrict-error" style="display: none" class="error" for="subdistrict"></label>

                        </div>
                        <label for="address">Alamat</label>
                        <div class="form-group">
                            <div id="line-address-error" class="form-line">
                                <textarea type="text" id="address" name="address" class="form-control" placeholder="..."></textarea>
                            </div>
                            <label id="address-error" style="display: none" class="error" for="address"></label>

                        </div>
                        
                        <label for="certificate_status">Status Ijin:
                            <span id='selected-certificate_status' style="color: black;text-decoration: underline;font-weight: 600"></span>
                        </label>
                        <div class="form-group">
                            <div id="line-certificate_status-error" class="form-line">
                                <select id="certificate_status" name="certificate_status" class="form-control show-tick">
                                    <option value="">-- Pilih Status Ijin --</option>
                                    <option value="Belum">Belum</option>
                                    <option value="Sudah">Sudah</option>
                                </select>
                            </div>
                            <label id="certificate_status-error" style="display: none" class="error" for="certificate_status"></label>

                        </div>
                        <label for="k_type">Tipe Koperasi:
                            <span id='selected-k_type' style="color: black;text-decoration: underline;font-weight: 600"></span>
                        </label>
                        <div class="form-group">
                            <div id="line-k_type-error" class="form-line">
                                <select id="k_type" name="k_type" class="form-control show-tick">
                                    <option value="">-- Pilih Tipe Koperasi --</option>
                                    <option value="KSU">KSU</option>
                                    <option value="KSP">KSP</option>
                                    <option value="KK">KK</option>
                                    <option value="KP">KP</option>
                                </select>
                            </div>
                            <label id="k_type-error" style="display: none" class="error" for="k_type"></label>

                        </div>
                        
                        <label for="status">Status:
                            <span id='selected-status' style="color: black;text-decoration: underline;font-weight: 600"></span>
                        </label>
                        <div class="form-group">
                            <div id="line-status-error" class="form-line">
                                <select id="status" name="status" class="form-control show-tick">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
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
                url: type === 'post' ? url : `/koperasi/${id}`,
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
            const owner_nik = document.querySelector(`#owner_nik-error`);
            owner_nik.style.display = 'none';

            const district = document.querySelector(`#district-error`);
            district.style.display = 'none';
            const subdistrict = document.querySelector(`#subdistrict-error`);
            subdistrict.style.display = 'none';
            
            const address = document.querySelector(`#address-error`);
            address.style.display = 'none';
            const k_name = document.querySelector(`#k_name-error`);
            k_name.style.display = 'none';
            const legal_entity_date = document.querySelector(`#legal_entity_date-error`);
            legal_entity_date.style.display = 'none';
            const legal_entity_number = document.querySelector(`#legal_entity_number-error`);
            legal_entity_number.style.display = 'none';
            const certificate_status = document.querySelector(`#certificate_status-error`);
            certificate_status.style.display = 'none';
            const k_type = document.querySelector(`#k_type-error`);
            k_type.style.display = 'none';
            
            const statusError = document.querySelector(`#status-error`);
            statusError.style.display = 'none';
            form.setAttribute('data-type', 'post');
            $('#owner_nik').val('');
            $('#district').val('');
            $('#subdistrict').val('');
            $('#rt_rw').val('');
            $('#address').val('');
            $('#k_name').val('');
            $('#legal_entity_date').val('');
            $('#legal_entity_number').val('');
            $('#certificate_status').val('');
            $('#selected-certificate_status').text('');
            $('#k_type').val('');
            $('#selected-certificate_status').text('');
            $('#owner_nik').val('');

            $('#status').val('');
            $('#selected-status').text('')
            //forInputFile

            // $('#foto_pemilik').val(null);
            // output.src = ''
            
            //endForInputFile
            console.log('FORMCLOSE', form.getAttribute('data-type'));
        }
        
        function edit(id){
            console.log('ID', id);
            $('#modal').modal({backdrop: 'static', keyboard: false})
            const url =`/koperasi/${id}/edit`;
            form.setAttribute('data-type', 'edit');
            console.log('ID', id);

            $.get(url, function (data) {
                console.log('DATA', data)
                $('#owner_nik').val(data.owner_nik);
                $('#selected-source').text(data.source)
                $('#district').val(data.district);
                $('#subdistrict').val(data.subdistrict);
                $('#rt_rw').val(data.rt_rw);
                $('#address').val(data.address);
                $('#k_type').val(data.k_type);
                $('#k_name').val(data.k_name);
                $('#legal_entity_date').val(data.legal_entity_date);
                $('#legal_entity_number').val(data.legal_entity_number);

                $('#status').val(data.status);
                $('#selected-status').text(data.status)

                $('#certificate_status').val(data.certificate_status);
                $('#selected-certificate_status').text(data.certificate_status);
                $('#selected-k_type').text(data.k_type);
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
                    url: "koperasi/"+id,
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
            }else{
                console.log('CANCEL')
            }
        
        });
    </script>
    
    
    
@endpush