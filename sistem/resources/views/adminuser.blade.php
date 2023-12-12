@extends('layouts.app-admin')
@extends('layouts.alert')
@section('content')
<section class="content">
    <div class="inner">
        <div class="container" style="margin-top: 80px;">
            <h2 style="color: #3a487f;">User Website Booking Labkom</h2>
            <hr>
            <form class="d-flex" style="float: right; margin-top: 10px;" action="{{url('adminuser')}}" method="GET">
                <input style="width: 200px" class="form-control me-2" type="text" name="search"
                    value="{{$request->search}}" placeholder="Cari Username">
                <button class="btn" type="submit"
                    style="background-color: #3a487f; color: white; height: 33px; margin-top: 15px; margin-right: 30px;">Search</button>
            </form>
            <button type="button" title="tambah data" class="btn btn-success" data-toggle="modal"
                data-target="#TambahAdminUser" style="margin-top: 25px;"><i class="fa fa-plus"></i> Tambah Data User</button>
            <div style=" width: 98%; margin-left: -35px;">
                <table id="jadwal" class="table table-responsive table-bordered table-hover table-striped">
                    <thead>
                        <tr style="background-color: #3a487f;">
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>NIM</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $no => $value)
                        <tr>
                            <td align="center">{{$no+1}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->username}}</td>
                            <td>{{$value->nim}}</td>
                            <td align="center">
                                <button type="button" title="edit data" class="btn btn-primary btn-xs"
                                    data-toggle="modal" data-target="#UbahAdminUser{{$value->id}}"><i
                                        class="fa fa-edit"></i></button>
                                <a href="{{url($value->id.'/hapus-adminuser')}}">
                                    <button title="hapus data" class="btn btn-danger btn-xs"><i
                                            class="fa fa-remove"></i></button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="TambahAdminUser" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="color: white; background: #3a487f;">
                <h4 class="modal-title">Tambah User Lab Komputer FST</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('simpan-data-adminuser')}}">
                    @csrf
                    <label for="name">{{ __('Nama Lengkap*') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label for="username">{{ __('Username*') }}</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                        name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label for="nim">{{ __('NIM*') }}</label>
                    <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror"
                        name="nim" value="{{ old('nim') }}" required autocomplete="nim" autofocus>
                    @error('nim')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="level">{{ __('Level*') }}</label>
                    <select name="level" class="form-control @error('level') is-invalid @enderror" name="level" value="{{ old('level') }}" required autofocus>
                        <option value="pengguna">Pengguna</option>
                        <option value="admin">Admin</option>
                        <option value="kepala">Kepala</option>
                    </select>
                    @error('level')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label for="password">{{ __('Password*') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label for="password-confirm">{{ __('Confirm Password*') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        {{ __('Simpan') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($data as $no => $value)
<div class="modal fade" id="UbahAdminUser{{$value->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="color: white; background: #3a487f;">
                <h4 class="modal-title">Ubah Data User</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('update-adminuser/'.$value->id)}}">
                    @csrf
                    <div>
                        <label for="name">{{ __('Nama Lengkap*') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ $value->name }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="username">{{ __('Username*') }}</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ $value->username }}" required autocomplete="username" autofocus>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="nim">{{ __('NIM*') }}</label>
                        <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror"
                            name="nim" value="{{ $value->nim }}" required autocomplete="nim" autofocus>
                        @error('nim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="level">{{ __('Level*') }}</label>
                        <select name="level" class="form-control @error('level') is-invalid @enderror" name="level" value="{{ $value->level }}" required autofocus>
                            <option value="pengguna">Pengguna</option>
                            <option value="admin">Admin</option>
                            <option value="kepala">Kepala</option>
                        </select>
                        @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="password">{{ __('Password*') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="password-confirm">{{ __('Confirm Password*') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            {{ __('Simpan') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection