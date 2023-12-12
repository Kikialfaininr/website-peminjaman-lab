<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laboratorium Komputer FST</title>
    <link rel="icon" href="sistem/img/logo.png" type="image">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('sistem/css/style.css') }}" rel="stylesheet" type="text/css"/>
</head>
    
</head>
<body>
    <!--Navigation-->
    <nav class="navbar navbar-expand-lg navbar-fixed-top" style="background-color: #191972;">
        <div class="container">
            <a class="navbar-brand" href="{{url('/welcome')}}">
                <img src="sistem/img/logo.png" alt="UHB" width="50px" class="d-inline-block align-text-center" />
                Booking Lab Komputer FST
            </a>
            <div class="top_bar_content ml-auto" style="float: right;">
                <div class="d-flex top_bar_user">
                    <div style="margin-top: 15px;"><a href="{{ url('register') }}" style="color: white; margin-right: 12px;"><i class="fa fa-user"></i> Register</a></div>
                    <div style="margin-top: 15px;"><a href="{{ url('login') }}" style="color: white;"> Login</a></div>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    
</body>
</html>
