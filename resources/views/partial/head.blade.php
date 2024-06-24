<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>UMKM</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('template/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('template/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('template/plugins/animate-css/animate.css')}}" rel="stylesheet" />

     <!-- Colorpicker Css -->
    <link href="{{asset ('template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet" />

     <!-- Bootstrap Tagsinput Css -->
    <link href="{{asset ('template/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">

     <!-- Bootstrap Spinner Css -->
    <link href="{{asset ('template/plugins/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet">

    <!-- Sweetalert Css -->
    <link href="{{asset ('template/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('template/plugins/morrisjs/morris.css')}}" rel="stylesheet" />
    
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    {{-- <link href="{{ asset('btn_colvis/css/dataTables.colVis.css')}}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('btn_colvis/css/dataTables.colvis.jqueryui.css')}}" rel="stylesheet"> --}}

   
     <!-- Bootstrap Select Css -->
     <link href="{{ asset('template/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="{{ asset('template/plugins/nouislider/nouislider.min.css') }}" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{ asset('template/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('template/css/themes/all-themes.css') }}" rel="stylesheet" />
    <style>
        /* issue is here! */
        
        .dt-button-collection{
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            width: 200px;
            margin-top: 3px;
            margin-bottom: 3px;
            padding: 4px 4px 2px 4px;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.4);
            background-color: white;
            overflow: hidden;
            z-index: 2002;
            border-radius: 5px;
            box-shadow: 3px 4px 10px 1px rgb(0 0 0 / 30%);
            box-sizing: border-box;
        }
        
        

    </style>