@extends('layouts.app-admin')
@extends('layouts.alert')
@section('content')
<section class="content">
    <div class="inner">
        <div class="container" style="margin-top: 80px;">
            <h2 style="color: #3a487f;">Booking Labkom FST</h2>
            <hr>
            <form class="d-flex" style="float: right; margin-top: 10px;" action="{{url('adminbooking')}}" method="GET">
                <input style="width: 200px" class="form-control me-2" type="date" name="search"
                    value="{{$request->search}}">
                <button class="btn" type="submit"
                    style="background-color: #3a487f; color: white; height: 33px; margin-top: 15px;">Search</button>
            </form>
            <button type="button" title="tambah data" class="btn btn-success" data-toggle="modal"
                data-target="#TambahAdminBooking" style="margin-top: 25px;"><i class="fa fa-plus"></i> Tambah Data Booking</button>
            <div style=" width: 100%; margin-left: -33px;">
                <table id="bookinglab" class="table table-responsive table-bordered table-hover table-striped">
                <thead>
                    <tr style="background-color: #3a487f; color: white;">
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Hari</th>
                        <th style="text-align: center;">Tanggal</th>
                        <th style="text-align: center;">Jam Mulai</th> 
                        <th style="text-align: center;">Jam Selesai</th>
                        <th style="text-align: center;">Mata Kuliah</th>
                        <th style="text-align: center;">Semester</th>
                        <th style="text-align: center;">Prodi</th>
                        <th style="text-align: center;">Dosen Pengampu</th>
                        <th style="text-align: center;">Persetujuan</th>
                        <th style="text-align: center;" width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $no => $value)
                    <tr>
                        <td align="center">{{$no+1}}</td>
                        <td>{{$value->nama}}</td>
                        <td align="center">{{date_format(date_create($value->tanggal), "l")}}</td>
                        <td align="center">{{date_format(date_create($value->tanggal), "d-M-Y")}}</td>                            <td align="center">{{$value->mulai}}</td>
                        <td align="center">{{$value->selesai}}</td>
                        <td>{{$value->matakuliah}}</td>
                        <td align="center">{{$value->semester}}</td>
                        <td>{{$value->prodi}}</td>
                        <td>{{$value->dosen_pengampu}}</td>
                        <td align="center">{{$value->status}}</td>
                        <td align="center">
                            <button type="button" title="edit data" class="btn btn-primary btn-xs"
                                data-toggle="modal" data-target="#UbahAdminBooking{{$value->idbooking}}"><i
                                    class="fa fa-edit"></i></button>
                            <a href="{{url($value->idbooking.'/hapus-adminbooking')}}">
                            <button title="hapus data" class="btn btn-danger btn-xs"><i
                                class="fa fa-remove"></i></button>
                            </a>
                            <button type="button" title="confirm data" class="btn btn-success btn-xs"
                                data-toggle="modal" data-target="#ConfirmAdminBooking{{$value->idbooking}}"><i
                                    class="fa fa-check"></i></button>
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>

            <div class="modal fade" id="TambahAdminBooking" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="color: white; background: #3a487f;">
                            <h4 class="modal-title">Tambah Booking Lab Komputer FST</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{url('simpan-data-adminbooking')}}">
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
                                    <select name="hari" class="form-control @error('hari') is-invalid @enderror"
                                        name="hari" value="{{ old('hari') }}" required autofocus>
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
                                        class="form-control @error('dosen_pengampu') is-invalid @enderror"
                                        name="dosen_pengampu" value="{{ old('dosen_pengampu') }}" required autofocus>
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
        </div>
</section>

@foreach($data as $no => $value)
<div class="modal fade" id="UbahAdminBooking{{$value->idbooking}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="color: white; background: #3a487f;">
                <h4 class="modal-title">Ubah Booking Lab Komputer FST</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('update-adminbooking/'.$value->idbooking)}}">
                    @csrf
                    <div>
                        <label for="nama">{{ __('Nama*') }}</label>
                        <input id="nama" type="text" placeholder="Nama Pemesan Lab"
                            class="form-control @error('nama') is-invalid @enderror" name="nama"
                            value="{{ $value->nama }}" required autofocus>
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="hari">{{ __('Hari*') }}</label>
                        <select name="hari" class="form-control @error('hari') is-invalid @enderror" name="hari"
                            value="{{ $value->hari }}" required autofocus>
                            <option value="{{ $value->hari }}">{{ $value->hari }}</option>
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
                            value="{{ $value->tanggal }}" required autofocus>
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
                            value="{{ $value->matakuliah }}" required autofocus>
                        @error('matakuliah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="semester">{{ __('Semester') }}</label>
                        <input id="semester" type="text" placeholder="Semester"
                            class="form-control @error('semester') is-invalid @enderror" name="semester"
                            value="{{ $value->semester }}" required autofocus>
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
                            value="{{ $value->prodi }}" required autofocus>
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
                            value="{{ $value->dosen_pengampu }}" required autofocus>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ConfirmAdminBooking{{$value->idbooking}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="color: white; background: #3a487f;">
                <h4 class="modal-title">Konfirmasi Booking Lab Komputer FST</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('confirm-adminbooking/'.$value->idbooking)}}">
                    @csrf
                    <div>
                        <label for="status">{{ __('Status') }}</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" name="status"
                            value="{{ $value->status }}" required autofocus>
                            <option value="konfirmasi">Konfirmasi</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                        @error('nama')
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection