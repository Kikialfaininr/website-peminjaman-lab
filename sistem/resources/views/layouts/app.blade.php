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
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="sistem/img/logo.png" alt="UHB" width="50px" class="d-inline-block align-text-center" />
                Home
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{url('/bookinglab')}}" role="button" style="color: white;">
                        Booking Lab Kesehatan
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                            About Us
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#section1">Information</a></li>
                            <li><a class="dropdown-item" href="#section2">Ask Question</a></li>
                            <li><a class="dropdown-item" href="#section3">Contact</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="top_bar_content ml-auto" style="float: right;">
                    <div class="d-flex top_bar_user">
                        @if(Auth::guest())
                        <div style="margin-top: 15px;"><a href="{{ url('register') }}" style="color: white; margin-right: 12px;"><i class="fa fa-user"></i> Register</a></div>
                        <div style="margin-top: 15px;"><a href="{{ url('login') }}" style="color: white;"> Login</a></div>
                        @else
                        <div class="nav-item dropdown" style="margin-top: 10px;">
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
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    
    <!--Footer-->
    <div id="section3"></div>
    <footer class="footer" style="margin-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <img src="sistem/img/logo.png" alt="" width="120px" class="mb-3">
                    <h4 class="text-muted">
                        Laboratorium Komputer Fakultas Sains dan Teknologi
                    </h4>
                    <h4 class="text-muted">
                        Universitas Harapan Bangsa Purwokerto
                    </h4>
                    <p class="text-muted">
                        Lantai 2 Gedung D Kampus 1 UHB Purwokerto
                    </p>
                    <ul class="list-inline mt-8">
                        <li class="list-inline-item">
                            <a href="mailto:info@uhb.ac.id">
                                <i class="fa fa-envelope fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://m.facebook.com/UniversitasHarapanBangsa/">
                                <i class="fa fa-facebook fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/universitasharapanbangsa">
                                <i class="fa fa-instagram fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.youtube.com/c/UniversitasHarapanBangsa">
                                <i class="fa fa-youtube fa-2x"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-5" style="margin-top: 145px;">
                    <h4 class="text-muted">Website Akademik Universitas Harapan Bangsa</h4>
                    <p></p>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <a href="https://www.uhb.ac.id/" class="text-muted">
                                UHB
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="https://siakad.uhb.ac.id/" class="text-muted">
                                SIAKAD
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="https://scalsa.uhb.ac.id/" class="text-muted">
                                SCALSA
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
