<!DOCTYPE html>
<html>

<head>
    @include('partial.head')
</head>

<body class="theme-blue" onload="showAlert()">

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    @include('partial.topbar')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
       @include('partial.sidebar')
            <!-- #Menu -->
            <!-- Footer -->
           @include('partial.footer')
            <!-- #Footer -->
       
        
    </section>

    <section class="content" style="margin-top: 50px;">
        <div class="container-fluid">
            
            @yield('content')
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.js') }}"></script>
    
    @stack('script')
    <!-- Select Plugin Js -->
    <script src="{{ asset('template/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('template/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset ('template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
    <!-- Select Plugin Js -->
    <script src="{{ asset('template/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{ asset('template/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('template/plugins/node-waves/waves.js') }}"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="{{asset ('template/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('template/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('template/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('template/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('template/plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset ('template/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{asset ('template/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{asset ('template/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{asset ('template/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{asset ('template/plugins/flot-charts/jquery.flot.time.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset ('template/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

     <!-- Jquery DataTable Plugin Js -->
     <script src="{{ asset('template/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
     {{-- <script src="{{ asset('btn_colvis/js/dataTables.colVis.min.js') }}"></script> --}}
     <script src="{{ asset('template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/buttons.colVis.js"></script>
    
      <!-- Custom Js -->
    <script src="{{ asset('template/js/admin.js') }}"></script>
    {{-- <script src="{{ asset('template/js/pages/charts/chartjs.js') }}"></script> --}}
    <script src="{{ asset('template/js/pages/index.js') }}"></script>
    {{-- <script src="{{ asset('template/js/pages/charts/flot.js') }}"></script> --}}

    <script src="{{ asset('template/js/pages/ui/notifications.js') }}"></script>
    <script src="{{ asset('template/js/pages/ui/dialogs.js') }}"></script>
    <script src="{{ asset('template/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('template/js/pages/forms/advanced-form-elements.js') }}"></script>
    <script src="{{ asset('template/js/pages/forms/basic-form-elements.js')}}"></script>
    

    @stack('scriptPlus')
    <!-- Demo Js -->
    <script src="{{ asset('template/js/demo.js') }}"></script>


</body>

</html>
