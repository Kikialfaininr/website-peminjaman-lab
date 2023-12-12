@extends('layouts.app-admin')
@section('content')
<section class="content">
    <div class="inner">
        <div class="container" style="margin-top: 80px;">
            <h1 class="text-center big-text-black">Laporan Pengguna Website</h1>
            <h3 class="text-center">Fakultas Sains dan Teknologi Universitas Harapan Bangsa</h3><br><br>
            <div>
                <form class="d-flex" style="float: right; margin-top: 10px;" action="{{url('laporanpengguna')}}"
                    method="GET">
                    <input style="width: 200px" class="form-control me-2" type="text" name="search"
                        value="{{$request->search}}" placeholder="Cari Username">
                    <button class="btn" type="submit"
                        style="background-color: #3a487f; color: white; height: 33px; margin-top: 15px; margin-right: 32px;">Search</button>
                </form>
                <a href="{{url('download-laporanpengguna')}}" target="_blank">
                    <button class="btn btn-success" style="margin-left: 30px; margin-top: 25px;"><i
                            class="fa fa-file-pdf-o"></i> Cetak</button>
                </a>
            </div>
            <div style=" width: 95%; margin-left: -10px">
                <table id="jadwal" class="table table-responsive table-bordered table-hover table-striped">
                    <thead>
                        <tr style="background-color: #3a487f;">
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>NIM</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $no => $value)
                        <tr>
                            <td align="center">{{$no+1}}</td>
                            <td align="center">{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->username}}</td>
                            <td>{{$value->nim}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection