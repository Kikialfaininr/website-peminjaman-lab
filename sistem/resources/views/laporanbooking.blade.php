@extends('layouts.app-admin')
@section('content')
<section class="content">
    <div class="inner">
        <div class="container" style="margin-top: 80px;">
            <h1 class="text-center big-text-black">Laporan Penggunaan Laboratorium Komputer</h1>
            <h3 class="text-center">Fakultas Sains dan Teknologi Universitas Harapan Bangsa</h3><br><br>
            <div>
                <form class="d-flex" style="float: right; margin-top: 10px;" action="{{url('laporanbooking')}}" method="GET">
                    <input style="width: 200px" class="form-control me-2" type="date" name="search" value="{{$request->search}}">
                    <button class="btn" type="submit" style="background-color: #3a487f; color: white; height: 33px; margin-top: 15px; margin-right: 32px;">Search</button>
                </form>
                <a href="{{url('download-laporanbooking')}}" target="_blank">
                    <button class="btn btn-success" style="margin-left: 30px; margin-top: 25px;"><i class="fa fa-file-pdf-o"></i> Cetak</button>
                </a>
            </div>
            <div style=" width: 95%; margin-left: -10px">
                <table id="jadwal" class="table table-responsive table-bordered table-hover table-striped">
                    <thead>
                        <tr style="background-color: #3a487f;">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Hari</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Mata Kuliah</th>
                            <th>Semester</th>
                            <th>Prodi</th>
                            <th>Dosen Pengampu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $no => $value)
                        <tr>
                            <td class="table table-responsive table-bordered table-hover table-striped">{{$no+1}}</td>
                            <td>{{$value->nama}}</td>
                            <td align="center">{{date_format(date_create($value->tanggal), "l")}}</td>
                            <td align="center">{{date_format(date_create($value->tanggal), "d-M-Y")}}</td>
                            <td align="center">{{$value->mulai}}</td>
                            <td align="center">{{$value->selesai}}</td>
                            <td>{{$value->matakuliah}}</td>
                            <td align="center">{{$value->semester}}</td>
                            <td>{{$value->prodi}}</td>
                            <td>{{$value->dosen_pengampu}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection