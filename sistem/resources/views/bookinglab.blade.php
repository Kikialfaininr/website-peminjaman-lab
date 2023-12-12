@extends('layouts.app')
@extends('layouts.alert')
@section('content')
<!--Tabel bookinglab-->
<div class="bookinglab">
    <div id="section1" style="margin-top: 150px;"></div>
    <h1 class="text-center big-text-black">Booking Laboratorium Komputer</h1>
    <h3 class="text-center">Fakultas Sains dan Teknologi Universitas Harapan Bangsa</h3><br><br>
    <div>
        <form class="d-flex" style="float: right; margin-top: 10px;" action="{{url('bookinglab')}}" method="GET">
            <input style="width: 200px" class="form-control me-2" type="date" name="search"
                value="{{$request->search}}">
            <button class="btn" type="submit"
                style="background-color: #3a487f; color: white; height: 33px; margin-top: 15px; margin-right: 32px;">Search</button>
        </form>
        <button type="button" title="booking lab" class="btn btn-success" data-toggle="modal" data-target="#BookingLab"
            style="margin-top: 30px; margin-left: 30px;"><i class="fa fa-plus"></i> Booking Lab</button>
    </div>
    <div id="section2"></div>
    <table id="bookinglab" class="table table-responsive table-bordered table-hover table-striped" style="width: 95%;">
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
                <th>Persetujuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no => $value)
            <tr>
                <td align="center">{{$no+1}}</td>
                <td>{{$value->nama}}</td>
                <td align="center">{{date_format(date_create($value->tanggal), "l")}}</td>
                <td align="center">{{date_format(date_create($value->tanggal), "d-M-Y")}}</td>
                <td align="center">{{$value->mulai}}</td>
                <td align="center">{{$value->selesai}}</td>
                <td>{{$value->matakuliah}}</td>
                <td align="center">{{$value->semester}}</td>
                <td>{{$value->prodi}}</td>
                <td>{{$value->dosen_pengampu}}</td>
                <td align="center">{{$value->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@foreach($data as $no => $value)
<div class="modal fade" id="BookingLab" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="color: white; background: #3a487f;">
                <h4 class="modal-title">Booking Lab</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('simpan-data-booking')}}">
                    @csrf
                    <div>
                        <label for="nama">{{ __('Nama*') }}</label>
                        <input id="nama" type="text" placeholder="Nama Pemesan Lab"
                            class="form-control @error('nama') is-invalid @enderror" name="nama"
                            value="{{ old('nama') }}" required autofocus>
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="hari">{{ __('Hari*') }}</label>
                        <select name="hari" class="form-control @error('hari') is-invalid @enderror" name="hari"
                            value="{{ old('hari') }}" required autofocus>
                            <option value="">Pilih Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                        @error('hari')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="tanggal">{{ __('Tanggal*') }}</label>
                        <input id="tanggal" type="date" placeholder="Tanggal Penggunaan Lab"
                            class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                            value="{{ old('tanggal') }}" required autofocus>
                        @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="mulai">{{ __('Jam Mulai*') }}</label>
                        <input id="mulai" type="time" placeholder="Jam Mulai Penggunaan Lab"
                            class="form-control @error('mulai') is-invalid @enderror" name="mulai"
                            value="{{ old('mulai') }}" required autofocus>
                        @error('mulai')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="selesai">{{ __('Jam Selesai*') }}</label>
                        <input id="selesai" type="time" placeholder="Jam Selesai Penggunaan Lab"
                            class="form-control @error('selesai') is-invalid @enderror" name="selesai"
                            value="{{ old('selesai') }}" required autofocus>
                        @error('selesai')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="matakuliah">{{ __('Mata Kuliah') }}</label>
                        <input id="matakuliah" type="text" placeholder="Mata Kuliah"
                            class="form-control @error('matakuliah') is-invalid @enderror" name="matakuliah"
                            value="{{ old('matakuliah') }}" required autofocus>
                        @error('matakuliah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="semester">{{ __('Semester') }}</label>
                        <input id="semester" type="number" placeholder="Semester"
                            class="form-control @error('semester') is-invalid @enderror" name="semester"
                            value="{{ old('semester') }}" required autofocus>
                        @error('semester')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="prodi">{{ __('Program Studi') }}</label>
                        <input id="prodi" type="text" placeholder="Program Studi"
                            class="form-control @error('prodi') is-invalid @enderror" name="prodi"
                            value="{{ old('prodi') }}" required autofocus>
                        @error('prodi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="dosen_pengampu">{{ __('Dosen Pengampu') }}</label>
                        <input id="dosen_pengampu" type="text" placeholder="Dosen Pengampu"
                            class="form-control @error('dosen_pengampu') is-invalid @enderror" name="dosen_pengampu"
                            value="{{ old('dosen_pengampu') }}" required autofocus>
                        @error('dosen_pengampu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection