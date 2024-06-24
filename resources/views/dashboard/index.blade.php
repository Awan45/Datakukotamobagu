@extends('partial.layout')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                {{-- <a href="{{ route('produk.index') }}" style="text-decoration: none;"> --}}
                <div class="info-box bg-cyan hover-expand-effect" style="cursor:pointer;">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL UMKM</div>
                        <div class="number count-to" data-from="0" data-to="{{$totalUmkm }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                {{-- <a href="{{ route('transaksi.index') }}" style="text-decoration: none;"> --}}
                <div class="info-box bg-light-green hover-expand-effect" style="cursor:pointer;">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL Koperasi</div>
                        <div class="number count-to" data-from="0" data-to="{{ $totalKoperasi }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
                </a>
            </div>
            
        </div>
        <!-- #END# Widgets -->
        <!-- CPU Usage -->
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="display: flex;justify-content:space-between">
                            <h2>DATA UMKM</h2>
                            {{-- <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <select class="dropdown-menu pull-right">
                                        <option><a href="javascript:void(0);">Action</a></option>
                                        <option><a href="javascript:void(0);">Another action</a></option>
                                        <option><a href="javascript:void(0);">Something else here</a></option>
                                    </select>
                                </li>
                            </ul> --}}
                            <div>

                            <select onchange="getUmkmByYear()" name="kecamatan" id="kecamatan" class="">
                                <option value="" selected >
                                   Pilih Kecamatan
                                </option>
                                <option value="Kotamobagu Barat">
                                    Kotamobagu Barat
                                </option>
                                <option value="Kotamobagu Selatan">
                                    Kotamobagu Selatan
                                </option>
                                <option value="Kotamobagu Timur">
                                    Kotamobagu Timur
                                </option>
                                <option value="Kotamobagu Utara">
                                    Kotamobagu Utara
                                </option>
                            </select>
                            <select onchange="getUmkmByYear()" name="kategoriUmkm" id="kategoriUmkm" class="">
                                <option value="" selected >
                                   Pilih Kategori UMKM
                                </option>
                                <option value="Pendidikan">
                                    Pendidikan
                                </option>
                                <option value="Bengkel">
                                    Bengkel
                                </option>
                                <option value="AGRO BISNIS">
                                    Agro bisnis
                                </option>
                                <option value="Fashion">
                                    Fashion
                                </option>
                                <option value="IT">
                                    IT
                                </option>
                                <option value="Kuliner">
                                    Kuliner
                                </option>
                                <option value="dll">
                                    dan lain-lain
                                </option>
                            </select>
                            <select onchange="getUmkmByYear()" name="tahunTransaksi" id="tahunTransaksi" class="">
                                <option value="" selected >
                                   Pilih Tahun
                                </option>
                                 <?php
                                for ($year = (int)date('Y'); 2020 <= $year; $year--): ?>
                                    <option value="<?=$year;?>"><?=$year;?></option>
                                <?php endfor; ?>
                            </select>
                            </div>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Bar Chart -->
            </div>
        <!-- #END# CPU Usage -->
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="display: flex;justify-content:space-between">
                            <h2>DATA Koperasi</h2>
                            {{-- <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <select class="dropdown-menu pull-right">
                                        <option><a href="javascript:void(0);">Action</a></option>
                                        <option><a href="javascript:void(0);">Another action</a></option>
                                        <option><a href="javascript:void(0);">Something else here</a></option>
                                    </select>
                                </li>
                            </ul> --}}
                            <div>

                            <select onchange="getKoperasiByYear()" name="kecamatanKoperasi" id="kecamatanKoperasi" class="">
                                <option value="" selected >
                                   Pilih Kecamatan
                                </option>
                                <option value="Kotamobagu Barat">
                                    Kotamobagu Barat
                                </option>
                                <option value="Kotamobagu Selatan">
                                    Kotamobagu Selatan
                                </option>
                                <option value="Kotamobagu Timur">
                                    Kotamobagu Timur
                                </option>
                                <option value="Kotamobagu Utara">
                                    Kotamobagu Utara
                                </option>
                            </select>
                            <select onchange="getKoperasiByYear()" name="kategoriKoperasi" id="kategoriKoperasi" class="">
                                <option value="" selected >
                                   Pilih Kategori Koperasi
                                </option>
                                <option value="KSU">
                                    KSU
                                </option>
                                <option value="KSP">
                                    KSP
                                </option>
                                <option value="KP">
                                    KP
                                </option>
                                <option value="KK">
                                    KK
                                </option>
                            </select>
                            <select onchange="getKoperasiByYear()" name="tahunKoperasi" id="tahunKoperasi" class="">
                                <option value="" selected >
                                   Pilih Tahun
                                </option>
                                 <?php
                                for ($year = (int)date('Y'); 2020 <= $year; $year--): ?>
                                    <option value="<?=$year;?>"><?=$year;?></option>
                                <?php endfor; ?>
                            </select>
                            </div>
                        </div>
                        <div class="body">
                            <canvas id="chart_koperasi" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Bar Chart -->
            </div>
        
    </div>    
@endsection

@push('script')
    <script>

        $(function () {
            // new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
            // new Chart(
            //     document.getElementById("bar_chart").getContext("2d"),
            //     getChartJs("bar")
            // );
            // new Chart(document.getElehmentById("radar_chart").getContext("2d"), getChartJs('radar'));
            // new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
        });
        
        // var chart = new Chart(
        //         document.getElementById("bar_chart").getContext("2d"),
        //          {
        //             type: "bar",
        //             data: {},
        //             options: {}
        //     }
        // );
        
        function updateChart(ctx, config) {
            let chartInstance;
            chartInstance = chartInstance || new Chart(ctx, config);
            chartInstance.update(config);
            return chartInstance;
        }
        async function getUmkmByYear() {
            let kategoriUmkm = $("#kategoriUmkm").val();
            let kecamatan = $("#kecamatan").val();

            // Get the year, handling the case where it's not provided
            let year = $("#tahunTransaksi").val();
            // if (!year) {
            //     year = new Date();
            //     year = year.getFullYear();
            // }

            
            const newData = {
                label: [],
                jumlah: []
            };
            const ctx = document.getElementById("bar_chart").getContext('2d');
            const initialConfig = {
                        type: 'bar',
                        data: {
                        labels: [],
                        datasets: [{
                            label: 'Data UMKM',
                            data: [],
                            borderWidth: 1,
                            backgroundColor: "rgba(0, 188, 212, 0.8)"
                        }]
                        },
                        options: {
                        scales: {
                            yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                            }]
                        }
                        }
                    }

            let chartinstance;
            if (initialConfig) {
                chartInstance = updateChart(ctx, initialConfig);
            }

            // console.log('myChart', myChart)
            
            await $.ajax({
                type: "POST",
                url: "{{ route('ajax.ts-umkm-byyear') }}",
                data: {
                    _token: `{{ csrf_token() }}`,
                    kecamatan: kecamatan,
                    kategoriUmkm: kategoriUmkm,
                    year: year
                },
                dataType: 'json',
                success: function(res) {
                    console.log('data', res, 'label', res.data.y, 'jlh', res.data.jumlah);

                    res.data.map((v) => {
                        newData.label.push(v.y);
                        newData.jumlah.push(v.jumlah);
                    });

                    updateChart(ctx, {
                        type: 'bar',
                        data: {
                        labels: newData.label,
                        datasets: [{
                            label: 'Data UMKM',
                            data: newData.jumlah,
                            borderWidth: 1,
                            backgroundColor: "rgba(0, 188, 212, 0.8)"
                        }]
                        },
                        options: {
                        scales: {
                            yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                            }]
                        }
                        }
                    })
                    // if(newData.jumlah.length === 0){
                    //     myChart.destroy();
                    // }
                    // addData(myChart, newData)
                    //  myChart =  new Chart(ctx, {
                    //     type: 'bar',
                    //     data: {
                    //         labels:newData?.label,
                    //         datasets: [{
                    //             label: 'Data UMKM',
                    //             data: newData?.jumlah,
                    //             borderWidth: 1,
                    //             backgroundColor: "rgba(0, 188, 212, 0.8)",
                    //         }]
                    //     },
                    //     options: {
                    //         scales: {
                    //             yAxes: [{
                    //                 ticks: {
                    //                     beginAtZero:true
                    //                 }
                    //             }]
                    //         }
                    //     }
                    // });

                    // myChart.data.datasets[0].data = [];
                    // Create the chart only after data is fetched successfully
                    
                    
                    
                    

                }
            });
            
        }
        async function getKoperasiByYear() {
            let kategoriUmkm = $("#kategoriKoperasi").val();
            let kecamatan = $("#kecamatanKoperasi").val();

            // Get the year, handling the case where it's not provided
            let year = $("#tahunKoperasi").val();
            // if (!year) {
            //     year = new Date();
            //     year = year.getFullYear();
            // }

            
            const newData = {
                label: [],
                jumlah: []
            };
            const ctx = document.getElementById("chart_koperasi").getContext('2d');
            const initialConfig = {
                        type: 'bar',
                        data: {
                        labels: [],
                        datasets: [{
                            label: 'Data Koperasi',
                            data: [],
                            borderWidth: 1,
                            backgroundColor: "rgba(0, 188, 212, 0.8)"
                        }]
                        },
                        options: {
                        scales: {
                            yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                            }]
                        }
                        }
                    }

            let chartinstance;
            if (initialConfig) {
                chartInstance = updateChart(ctx, initialConfig);
            }

            // console.log('myChart', myChart)
            
            await $.ajax({
                type: "POST",
                url: "{{ route('ajax.ts-koperasi-byyear') }}",
                data: {
                    _token: `{{ csrf_token() }}`,
                    kecamatan: kecamatan,
                    kategoriUmkm: kategoriUmkm,
                    year: year
                },
                dataType: 'json',
                success: function(res) {
                    console.log('data', res, 'label', res.data.y, 'jlh', res.data.jumlah);

                    res.data.map((v) => {
                        newData.label.push(v.y);
                        newData.jumlah.push(v.jumlah);
                    });

                    updateChart(ctx, {
                        type: 'bar',
                        data: {
                        labels: newData.label,
                        datasets: [{
                            label: 'Data Koperasi',
                            data: newData.jumlah,
                            borderWidth: 1,
                            backgroundColor: "rgba(0, 188, 212, 0.8)"
                        }]
                        },
                        options: {
                        scales: {
                            yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                            }]
                        }
                        }
                    })
                    // if(newData.jumlah.length === 0){
                    //     myChart.destroy();
                    // }
                    // addData(myChart, newData)
                    //  myChart =  new Chart(ctx, {
                    //     type: 'bar',
                    //     data: {
                    //         labels:newData?.label,
                    //         datasets: [{
                    //             label: 'Data UMKM',
                    //             data: newData?.jumlah,
                    //             borderWidth: 1,
                    //             backgroundColor: "rgba(0, 188, 212, 0.8)",
                    //         }]
                    //     },
                    //     options: {
                    //         scales: {
                    //             yAxes: [{
                    //                 ticks: {
                    //                     beginAtZero:true
                    //                 }
                    //             }]
                    //         }
                    //     }
                    // });

                    // myChart.data.datasets[0].data = [];
                    // Create the chart only after data is fetched successfully
                    
                    
                    
                    

                }
            });
            
        }


        

        async function addData(myChart, newData){
            myChart.data.labels.push(newData.label);
            myChart.data.datasets.forEach((dataset) => {
                dataset.data.push(data);
            });
            myChart.update();
        }

        

        function getChartJs(type) {
            var config = null;

             if (type === "bar") {
                config = {
                    type: "bar",
                    data: {
                        labels: [
                            // "January",
                            // "February",
                            // "March",
                            // "April",
                            // "May",
                            // "June",
                            // "July",
                        ],
                        datasets: [
                        //     {
                        //         label: "My First dataset",
                        //         data: [65, 59, 80, 81, 56, 55, 40],
                        //         backgroundColor: "rgba(0, 188, 212, 0.8)",
                        //     },
                        //     {
                        //         label: "My Second dataset",
                        //         data: [28, 48, 40, 19, 86, 27, 90],
                        //         backgroundColor: "rgba(233, 30, 99, 0.8)",
                        //     },
                        ],
                    },
                    options: {
                        responsive: true,
                        legend: false,
                    },
                };
            } 
            return config;
        }

    </script>
@endpush