
<link href="{{ asset('sistem/css/style.css') }}" rel="stylesheet" type="text/css" />
<div class="container" style="margin-top: 80px;" align="center">
    <h1 class="text-center big-text-black">Laporan Pengguna Website</h1>
    <h3 class="text-center">Fakultas Sains dan Teknologi Universitas Harapan Bangsa</h3><br><br>
    <div style=" width: 100%;">
        <table id="jadwal" class="table table-responsive table-bordered table-hover table-striped" style="width: 95%;">
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