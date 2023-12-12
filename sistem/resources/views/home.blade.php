@extends('layouts.app-admin')
@section('content')
<section class="content">
    <div class="inner">
        <div class="card rounded" style="margin-top: 100px; color: white;">
            <div class="card-header" style="background: #777B7E;">
                <h3>Dashboard</h3>
            </div>
            <div class="card-body" style="background: #999DA0;">
                <h4 class="card-title">Dashboard Admin</h4>
                <h6 class="card-text">Dashboard sebagai pusat kontrol untuk mengatur kegiatan website Booking Labkom
                    FST</h6>
                <a href="{{url('/')}}" class="btn" style="background: white; color: #999DA0;">Website Booking</a>
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-6" style="margin-top: 20px;">
                <div class="box"
                    style="background-color: #white; color: #777B7E; border-radius: 10px; border: 3px solid #777B7E;">
                    <center><i class="fa fa-user fa-4x"></i></center><br>
                    <h1>
                        <center>
                            @foreach($jumlahpengguna as $no => $value)
                            {{$value->jumlahpengguna}}
                            @endforeach
                        </center>
                    </h1>
                    <h4>
                        <center>Pengguna Website
                        </center>
                    </h4>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 20px;">
                <div class="box"
                    style="background-color: #white; color: #777B7E; border-radius: 10px; border: 3px solid #777B7E;">
                    <center><i class="fa fa-edit fa-4x"></i></center><br>
                    <h1>
                        <center>
                            @foreach($jumlahbooking as $no => $value)
                            {{$value->jumlahbooking}}
                            @endforeach
                        </center>
                    </h1>
                    <h4>
                        <center>Booking Laboratorium Komputer
                        </center>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection