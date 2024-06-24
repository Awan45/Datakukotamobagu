@extends('partial.layout')

@section('content')
    <div class="block-header">
        <h1>
            Data UMKM
        </h1>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header" style="display: flex;justify-content: space-between;align-items: center;">
                    <h2 style="text-transform: uppercase;font-weight:600">
                      Table UMKM
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
                                    <th>Nama UMKM</th>
                                    <th>NIK</th>
                                    <th>Alamat Lengkap</th>
                                    <th>Nomor HP</th>
                                    <th>Bidang Bisnis</th>
                                    <th>Dokument Legal</th>
                                    <th>Aset</th>
                                    <th>Omzet bulanan</th>
                                    <th>Omzet Tahunan</th>
                                    <th>Tahun berdiri</th>
                                    <th>Total Pekerja</th>
                                    <th>Kategori Bisnis</th>
                                    <th>Tipe Subsidi</th>
                                    <th>Status</th>
                                    <th>--</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama UMKM</th>
                                    <th>NIK</th>
                                    <th>Alamat Lengkap</th>
                                    <th>Nomor HP</th>
                                    <th>Bidan Bisnis</th>
                                    <th>Dokument Legal</th>
                                    <th>Aset</th>
                                    <th>Omzet bulanan</th>
                                    <th>Omzet Tahunan</th>
                                    <th>Tahun berdiri</th>
                                    <th>Total Pekerja</th>
                                    <th>Kategori Bisnis</th>
                                    <th>Tipe Subsidi</th>
                                    <th>Status</th>
                                    <th>--</th>

                                </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$item->umkm_name}}</td>
                                    <td>{{ $item->owner_nik }}</td>
                                    <td>
                                        Kec : {{ $item->district }} <br>
                                        Kel : {{ $item->subdistrict }} <br>
                                        RT/RW : {{ $item->rt_rw }} <br>
                                        {{ $item->address }}
                                    </td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->business_field }}</td>
                                    <td>{{ $item->legal_document }}</td>
                                    <td>{{ $item->asset }}</td>
                                    <td>{{ $item->monthly_turnover }}</td>
                                    <td>{{ number_format($item->yearly_turnover) }}</td>
                                    <td>{{ $item->date_establish }}</td>
                                    <td>{{ $item->total_manpower }}</td>
                                    <td>{{ $item->business_category }}</td>
                                    <td>{{ $item->subsidies_type }}</td>
                                    <td>{{ $item->status }}</td>
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
                  <h4 class="modal-title" id="largeModalLabel">FORM UMKM DATA</h4>
              </div>
              <div class="modal-body">
                  <div class="body">
                    <form id="form-modal-data" action="" method="" data-action="{{ route('umkm.store') }}" data-id="" data-type="post" method="POST">
                        @csrf
                        <label for="umkm_name">Nama UMKM</label>
                        <div class="form-group ">
                            <div id="line-umkm_name-error" class="form-line ">
                                <input type="text" id="umkm_name" name="umkm_name" class="form-control" placeholder="Nama UMKM...">
                            </div>
                            <label id="owner_nik-error" style="display: none" class="error" for="owner_nik"></label>
                        </div>
                        <label for="owner_nik">NIK</label>
                        <div class="form-group ">
                            <div id="line-owner_nik-error" class="form-line ">
                                <input type="number" id="owner_nik" name="owner_nik" class="form-control" placeholder="NIK...">
                            </div>
                            <label id="owner_nik-error" style="display: none" class="error" for="owner_nik"></label>
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
                        <label for="rt_rw">RT/RW</label>
                        <div class="form-group">
                            <div id="line-rt_rw-error" class="form-line">
                                <input type="text" id="rt_rw" name="rt_rw" class="form-control" placeholder="001/002...">
                            </div>
                            <label id="rt_rw-error" style="display: none" class="error" for="rt_rw"></label>

                        </div>
                        <label for="address">Alamat</label>
                        <div class="form-group">
                            <div id="line-address-error" class="form-line">
                                <textarea type="text" id="address" name="address" class="form-control" placeholder="..."></textarea>
                            </div>
                            <label id="address-error" style="display: none" class="error" for="address"></label>

                        </div>
                        <label for="phone">Phone</label>
                        <div class="form-group ">
                            <div id="line-phone-error" class="form-line ">
                                <input type="number" id="phone" name="phone" class="form-control" placeholder="08xx...">
                            </div>
                            <label id="phone-error" style="display: none" class="error" for="phone"></label>
                        </div>
                        <label for="business_field">Bidang bisnis</label>
                        <div class="form-group">
                            <div id="line-business_field-error" class="form-line">
                                <input type="text" id="business_field" name="business_field" class="form-control" placeholder="...">
                            </div>
                            <label id="business_field-error" style="display: none" class="error" for="business_field"></label>

                        </div>
                        <label for="legal_document">Legal Document</label>
                        <div class="form-group">
                            <div id="line-legal_document-error" class="form-line">
                                <input type="text" id="legal_document" name="legal_document" class="form-control" placeholder="...">
                            </div>
                            <label id="legal_document-error" style="display: none" class="error" for="legal_document"></label>

                        </div>
                        <label for="asset">Asset</label>
                        <div class="form-group">
                            <div id="line-asset-error" class="form-line">
                                <input type="text" id="asset" name="asset" class="form-control" placeholder="...">
                            </div>
                            <label id="asset-error" style="display: none" class="error" for="asset"></label>

                        </div>
                        <label for="monthly_turnover">Omzet Bulanan</label>
                        <div class="form-group ">
                            <div id="line-monthly_turnover-error" class="form-line ">
                                <input type="number" id="monthly_turnover" name="monthly_turnover" class="form-control" placeholder="10xx...">
                            </div>
                            <label id="monthly_turnover-error" style="display: none" class="error" for="monthly_turnover"></label>
                        </div>
                        <label for="yearly_turnover">Omzet Tahunan</label>
                        <div class="form-group ">
                            <div id="line-yearly_turnover-error" class="form-line ">
                                <input type="number" id="yearly_turnover" name="yearly_turnover" class="form-control" placeholder="10xx...">
                            </div>
                            <label id="yearly_turnover-error" style="display: none" class="error" for="yearly_turnover"></label>
                        </div>
                        <label for="date_establish">Tahun berdiri</label>
                        <div class="form-group">
                            <div id="line-date_establish-error" class="form-line">
                                <input type="date" id="date_establish" name="date_establish" class="form-control" placeholder="...">
                            </div>
                            <label id="date_establish-error" style="display: none" class="error" for="date_establish"></label>

                        </div>
                        <label for="total_manpower">Total Pekerja</label>
                        <div class="form-group ">
                            <div id="line-total_manpower-error" class="form-line ">
                                <input type="number" id="total_manpower" name="total_manpower" class="form-control" placeholder="...">
                            </div>
                            <label id="total_manpower-error" style="display: none" class="error" for="total_manpower"></label>
                        </div>
                        <label for="business_category">Kategori Bisnis</label>
                        <div class="form-group ">
                            <div id="line-business_category-error" class="form-line ">
                                <input type="text" id="business_category" name="business_category" class="form-control" placeholder="...">
                            </div>
                            <label id="business_category-error" style="display: none" class="error" for="business_category"></label>
                        </div>
                        <label for="subsidies_type">Tipe Subsidi</label>
                        <div class="form-group ">
                            <div id="line-subsidies_type-error" class="form-line ">
                                <input type="text" id="subsidies_type" name="subsidies_type" class="form-control" placeholder="...">
                            </div>
                            <label id="subsidies_type-error" style="display: none" class="error" for="subsidies_type"></label>
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
                url: type === 'post' ? url : `/umkm/${id}`,
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
            const umkm_name = document.querySelector(`#umkm_name`);
            umkm_name.style.display = 'none';
            const owner_nik = document.querySelector(`#owner_nik-error`);
            owner_nik.style.display = 'none';
            const district = document.querySelector(`#district-error`);
            district.style.display = 'none';
            const subdistrict = document.querySelector(`#subdistrict-error`);
            subdistrict.style.display = 'none';
            const rt_rw = document.querySelector(`#rt_rw-error`);
            rt_rw.style.display = 'none';
            const address = document.querySelector(`#address-error`);
            address.style.display = 'none';
            const phone = document.querySelector(`#phone-error`);
            phone.style.display = 'none';
            const business_field = document.querySelector(`#business_field-error`);
            business_field.style.display = 'none';
            const legal_document = document.querySelector(`#legal_document-error`);
            legal_document.style.display = 'none';
            const asset = document.querySelector(`#asset-error`);
            asset.style.display = 'none';
            const monthly_turnover = document.querySelector(`#monthly_turnover-error`);
            monthly_turnover.style.display = 'none';
            const yearly_turnover = document.querySelector(`#yearly_turnover-error`);
            yearly_turnover.style.display = 'none';
            const date_establish = document.querySelector(`#date_establish-error`);
            date_establish.style.display = 'none';
            const total_manpower = document.querySelector(`#total_manpower-error`);
            total_manpower.style.display = 'none';
            const business_category = document.querySelector(`#business_category-error`);
            business_category.style.display = 'none';
            const subsidies_type = document.querySelector(`#subsidies_type-error`);
            subsidies_type.style.display = 'none';
            const statusError = document.querySelector(`#status-error`);
            statusError.style.display = 'none';
            form.setAttribute('data-type', 'post');
            $('#umkm_name').val('');
            $('#owner_nik').val('');
            $('#district').val('');
            $('#subdistrict').val('');
            $('#rt_rw').val('');
            $('#address').val('');
            $('#phone').val('');
            $('#business_field').val('');
            $('#legal_document').val('');
            $('#asset').val('');
            $('#monthly_turnover').val('');
            $('#yearly_turnover').val('');
            $('#date_establish').val('');
            $('#total_manpower').val('');
            $('#business_category').val('');
            $('#subsidies_type').val('');

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
            const url =`/umkm/${id}/edit`;
            form.setAttribute('data-type', 'edit');
            console.log('ID', id);

            $.get(url, function (data) {
                console.log('DATA', data)
                $('#umkm_name').val(data.umkm_name);
                $('#owner_nik').val(data.owner_nik);
                $('#selected-source').text(data.source)
                $('#district').val(data.district);
                $('#subdistrict').val(data.subdistrict);
                $('#rt_rw').val(data.rt_rw);
                $('#address').val(data.address);
                $('#yearly_turnover').val(data.yearly_turnover);
                $('#monthly_turnover').val(data.monthly_turnover);
                $('#phone').val(data.phone);
                $('#business_field').val(data.business_field);
                $('#legal_document').val(data.legal_document);
                $('#asset').val(data.asset);
                $('#monthly_turnover').val(data.monthly_turnover);
                $('#yearly_turnover').val(data.yearly_turnover);
                $('#date_establish').val(data.date_establish);
                $('#total_manpower').val(data.total_manpower);
                $('#business_category').val(data.business_category);
                $('#subsidies_type').val(data.subsidies_type);
                
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
                    url: "umkm/"+id,
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