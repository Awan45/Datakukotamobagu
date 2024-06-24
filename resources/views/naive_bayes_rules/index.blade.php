@extends('partial.layout')

@section('content')
    <div class="block-header">
        <h1>
            Data Aturan Naive Bayes
        </h1>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header" style="display: flex;justify-content: space-between;align-items: center;">
                    <h2 style="text-transform: uppercase;font-weight:600">
                      Table Aturan Naive Bayes
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
                                    <th>Nama Aturan</th>
                                    <th>Operator Pendapatan</th>
                                    <th>Nilai pendapatan</th>
                                    <th>Operator Usia usaha</th>
                                    <th>Nilai Usia usaha</th>
                                    <th>Operator Total Karyawan</th>
                                    <th>Nilai Total Karyawan</th>
                                    <th>--</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Aturan</th>
                                    <th>Operator Pendapatan</th>
                                    <th>Nilai pendapatan</th>
                                    <th>Operator Usia usaha</th>
                                    <th>Nilai Usia usaha</th>
                                    <th>Operator Total Karyawan</th>
                                    <th>Nilai Total Karyawan</th>
                                    <th>--</th>

                                </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->rules_name }}</td>
                                    <td>{{ $item->turnover_opt }}</td>
                                    <td>{{ number_format($item->turnover_value) }}</td>
                                    <td>{{ $item->business_age_opt }}</td>
                                    <td>{{ number_format($item->business_age_value) }}</td>
                                    <td>{{ $item->total_manpower_opt }}</td>
                                    <td>{{ number_format($item->total_manpower_value) }}</td>
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
                  <h4 class="modal-title" id="largeModalLabel">FORM Aturan Naive Bayes</h4>
              </div>
              <div class="modal-body">
                  <div class="body">
                    <form id="form-modal-data" action="" method="" data-action="{{ route('naive_bayes_rules.store') }}" data-id="" data-type="post" method="POST">
                        @csrf
                        
                        <label for="rules_name">Nama Aturan</label>
                        <div class="form-group">
                            <div id="line-rules_name-error" class="form-line">
                                <input type="text" id="rules_name" name="rules_name" class="form-control" placeholder="...">
                            </div>
                            <label id="rules_name-error" style="display: none" class="error" for="rules_name"></label>

                        </div>

                        <label for="turnover_opt">Operator Pendapatan:
                            <span id='selected-turnover_opt' style="color: black;text-decoration: underline;font-weight: 600"></span>
                        </label>
                        <div class="form-group">
                            <div id="line-turnover_opt-error" class="form-line">
                                <select id="turnover_opt" name="turnover_opt" class="form-control show-tick">
                                    <option value="">-- Pilih Operator Pendapatan --</option>
                                    <option value="<"> < </option>
                                    <option value=">"> > </option>
                                    <option value="<="> <= </option>
                                    <option value=">="> >= </option>
                                </select>
                            </div>
                            <label id="turnover_opt-error" style="display: none" class="error" for="turnover_opt"></label>

                        </div>
                        
                        <label for="turnover_value">Nilai Pendapatan</label>
                        <div class="form-group ">
                            <div id="line-turnover_value-error" class="form-line ">
                                <input type="number" id="turnover_value" name="turnover_value" class="form-control" placeholder="...">
                            </div>
                            <label id="turnover_value-error" style="display: none" class="error" for="turnover_value"></label>
                        </div>

                        <label for="business_age_opt">Operator Usia Bisnis :
                            <span id='selected-business_age_opt' style="color: black;text-decoration: underline;font-weight: 600"></span>
                        </label>
                        <div class="form-group">
                            <div id="line-business_age_opt-error" class="form-line">
                                <select id="business_age_opt" name="business_age_opt" class="form-control show-tick">
                                    <option value="">-- Pilih Operator Usia Bisnis  --</option>
                                    <option value="<"> < </option>
                                    <option value=">"> > </option>
                                    <option value="<="> <= </option>
                                    <option value=">="> >= </option>
                                </select>
                            </div>
                            <label id="business_age_opt-error" style="display: none" class="error" for="business_age_opt"></label>

                        </div>
                        
                        <label for="business_age_value">Nilai Usia Bisnis</label>
                        <div class="form-group ">
                            <div id="line-business_age_value-error" class="form-line ">
                                <input type="number" id="business_age_value" name="business_age_value" class="form-control" placeholder="...">
                            </div>
                            <label id="business_age_value-error" style="display: none" class="error" for="business_age_value"></label>
                        </div>

                        <label for="total_manpower_opt">Operator Total Karyawan :
                            <span id='selected-total_manpower_opt' style="color: black;text-decoration: underline;font-weight: 600"></span>
                        </label>
                        <div class="form-group">
                            <div id="line-total_manpower_opt-error" class="form-line">
                                <select id="total_manpower_opt" name="total_manpower_opt" class="form-control show-tick">
                                    <option value="">-- Pilih Operator Total Karyawan  --</option>
                                    <option value="<"> < </option>
                                    <option value=">"> > </option>
                                    <option value="<="> <= </option>
                                    <option value=">="> >= </option>
                                </select>
                            </div>
                            <label id="total_manpower_opt-error" style="display: none" class="error" for="total_manpower_opt"></label>

                        </div>
                        
                        <label for="total_manpower_value">Nilai Total Karyawan</label>
                        <div class="form-group ">
                            <div id="line-total_manpower_value-error" class="form-line ">
                                <input type="number" id="total_manpower_value" name="total_manpower_value" class="form-control" placeholder="...">
                            </div>
                            <label id="total_manpower_value-error" style="display: none" class="error" for="total_manpower_value"></label>
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
                url: type === 'post' ? url : `/naive_bayes_rules/${id}`,
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
            const rules_name = document.querySelector(`#rules_name-error`);
            rules_name.style.display = 'none';
            const turnover_opt = document.querySelector(`#turnover_opt-error`);
            turnover_opt.style.display = 'none';
             const business_age_opt = document.querySelector(`#business_age_opt-error`);
            business_age_opt.style.display = 'none';
            const total_manpower_opt = document.querySelector(`#total_manpower_opt-error`);
            total_manpower_opt.style.display = 'none';
            const turnover_value = document.querySelector(`#turnover_value-error`);
            turnover_value.style.display = 'none';
             const business_age_value = document.querySelector(`#business_age_value-error`);
            business_age_value.style.display = 'none';
            const total_manpower_value = document.querySelector(`#total_manpower_value-error`);
            total_manpower_value.style.display = 'none';
            
            form.setAttribute('data-type', 'post');
            $('#rules_name').val('');
            $('#turnover_opt').val('');
            $('#business_age_opt').val('');
            $('#total_manpower_opt').val('');
            $('#total_manpower_value').val('');
            $('#turnover_value').val('');
            $('#business_age_value').val('');

            $('#selected-turnover_opt').text('')
            $('#selected-business_age_opt').text('')
            $('#selected-total_manpower_opt').text('')
            //forInputFile

            // $('#foto_pemilik').val(null);
            // output.src = ''
            
            //endForInputFile
            console.log('FORMCLOSE', form.getAttribute('data-type'), output.src);
        }
        
        function edit(id){
            console.log('ID', id);
            $('#modal').modal({backdrop: 'static', keyboard: false})
            const url =`/naive_bayes_rules/${id}/edit`;
            form.setAttribute('data-type', 'edit');
            console.log('ID', id);

            $.get(url, function (data) {
                console.log('DATA', data)
                $('#rules_name').val(data.rules_name);
                $('#turnover_opt').val(data.turnover_opt);
                $('#selected-turnover_opt').text(data.turnover_opt);
                $('#business_age_opt').val(data.business_age_opt);
                $('#selected-business_age_opt').text(data.business_age_opt);
                $('#total_manpower_opt').val(data.total_manpower_opt);
                $('#selected-total_manpower_opt').text(data.total_manpower_opt);

                $('#total_manpower_value').val(data.total_manpower_value);
                $('#turnover_value').val(data.turnover_value);
                $('#business_age_value').val(data.business_age_value);

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
                    url: "naive_bayes_rules/"+id,
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