<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('template/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('template/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('template/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
</head>

<body class="login-page" style="
    height:80vh;
    max-width:1200px;
    display:flex;
    background: rgb(255,255,255);
background: linear-gradient(139deg, rgba(255,255,255,1) 0%, rgba(251,251,251,1) 40%, rgba(41,41,138,1) 40%, rgba(41,41,138,1) 100%);
">
    <div class="login-box" style="display: flex;width:100%;flex-direction: row;align-items: center;">
        <div  style="margin-right: 25%;display:flex;flex-direction: column;align-items: center;">
            <img src="{{ asset('logo.PNG') }}" width="150" height="180" alt="">
            <h2 style="color: blue">DATAKU</h2>
        </div>
        <div style="display: flex;width:100%;flex-direction: column;">
            <div class="logo">
                <a href="javascript:void(0);" style="color: white">Admin Login</a>
                
            </div>
            <div class="card col-lg-12" style="width: 100%">
                <div class="body">
                    <form id="sign_in" method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="email" placeholder="Username" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-xs-8 p-t-5">
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                <label for="rememberme">Remember Me</label>
                            </div> --}}
                            <div class="col-xs-12">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">LOG IN</button>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('template/plugins/node-waves/waves.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{asset('template/plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{asset('template/js/admin.js') }}"></script>
    <script src="{{ asset('template/js/pages/examples/sign-in.js') }}"></script>
</body>

</html>