
<link href="{{ asset('sistem/css/style.css') }}" rel="stylesheet" type="text/css" />
<div class="container" style="margin-top: 80px;" align="center">
    <h1 class="text-center big-text-black">Laporan Penggunaan Laboratorium Komputer</h1>
    <h3 class="text-center">Fakultas Sains dan Teknologi Universitas Harapan Bangsa</h3><br><br>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>