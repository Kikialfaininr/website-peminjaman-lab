<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard Admin</title>
    <link rel="icon" href="sistem/img/logo.png" type="image">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('sistem/css/style.css') }}" rel="stylesheet" type="text/css"/>
</head>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-fixed-top" style="background-color: #191972; width: 100%">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}" style="color: white;">
                <img src="sistem/img/logo.png" alt="UHB" width="50px" class="d-inline-block"
                    style="color: white;" />
                Booking Labkom FST
            </a>
            <div class="top_bar_content ml-auto" style="float: right;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ url('/') }}" id="navarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;"><i class="fa fa-user"></i>
                      {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </form>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>

    <div class="sidebar"> 
        <ul class="menu-content">
            <a href="{{url('/home')}}"><i class="fa fa-home"></i> Dashboard</a>
            @if(Auth::user()->level == 'admin')
            <a href="{{url('/adminuser')}}"><i class="fa fa-user"></i> Pengguna</a>
            <a href="{{url('/adminbooking')}}"><i class="fa fa-edit"></i> Booking</a>
            @else
            @endif
            <a href="{{url('/laporanbooking')}}"><i class="fa fa-file-text"></i> Laporan Booking</a>
            @if(Auth::user()->level == 'kepala')
            <a href="{{url('/laporanpengguna')}}"><i class="fa fa-file-text-o"></i> Laporan Pengguna</a>
            @else
            @endif
        </ul>
    </div>
<!-- Page content -->
<div class="content">
 @yield('content')
</div>
</body>
</html>
