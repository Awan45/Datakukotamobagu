@extends('partial.layout')

@section('content')
    <div class="block-header">
        <h1>
            Data Pengguna
        </h1>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header" style="display: flex;justify-content: space-between;align-items: center;">
                    <h2 style="text-transform: uppercase;font-weight:600">
                      Table Pengguna
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
                                    <th>Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>--</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>--</th>

                                </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->password }}</td>
                                    
                                    <td>
                                        <button id="btnEdit" onclick="edit('{{ $item->id }}')"  type="button" class="btn btn-warning waves-effect">
                                            <i class="material-icons">mode_edit</i>
                                        </button>
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
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header bg-light-blue">
                  <h4 class="modal-title" id="largeModalLabel">FORM KOPERASI DATA</h4>
              </div>
              <div class="modal-body">
                  <div class="body">
                    <form id="form-modal-data" action="" method="" data-action="{{ route('users.store') }}" data-id="" data-type="post" method="POST">
                        @csrf
                        
                        <label for="name">Nama Pengguna</label>
                        <div class="form-group">
                            <div id="line-name-error" class="form-line">
                                <input type="text" id="name" name="name" class="form-control" placeholder="...">
                            </div>
                            <label id="name-error" style="display: none" class="error" for="name"></label>

                        </div>
                        <label for="email">Email</label>
                        <div class="form-group ">
                            <div id="line-email-error" class="form-line ">
                                <input type="email" id="email" name="email" class="form-control" placeholder="...">
                            </div>
                            <label id="email-error" style="display: none" class="error" for="email"></label>
                        </div>
                        <label for="password">Password</label>
                        <div class="form-group ">
                            <div id="line-password-error" class="form-line ">
                                <input type="password" id="password" name="password" class="form-control" placeholder="...">
                            </div>
                            <label id="password-error" style="display: none" class="error" for="password"></label>
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
            const name = document.querySelector(`#name-error`);
            name.style.display = 'none';
            const email = document.querySelector(`#email-error`);
            email.style.display = 'none';
            const password = document.querySelector(`#password-error`);
            password.style.display = 'none';
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
            $('#name').val('');
            $('#email').val('');
            $('#password').val('');
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
            const url =`/users/${id}/edit`;
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
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#password').val(data.password);

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
                    url: "users/"+id,
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