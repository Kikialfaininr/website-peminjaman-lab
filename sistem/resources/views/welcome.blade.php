@extends('layouts.app')
@section('content')
    <!--The slideshow/carousel-->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="sistem/img/img1.png" alt="Laboratorium" class="d-block image">
                <div class="carousel-caption caption">
                    <h3>Selamat Datang Di</h3>
                    <h1 class="big-text">Laboratorium Komputer FST</h1>
                    <p>Tempat pelatihan dan praktikum yang berhubungan dengan ilmu komputer, jaringan, dan IOT bagi
                        dosen dan mahasiswa Fakultas Sains dan Teknologi UHB.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="sistem/img/img2.png" alt="Programming" class="d-block image">
                <div class="carousel-caption caption">
                    <h1 class="big-text">Pemrograman</h1>
                    <p>Aktivitas membuat program komputer dengan barisan kode.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="sistem/img/img3.png" alt="Jaringan" class="d-block image">
                <div class="carousel-caption caption">
                    <h1 class="big-text">Jaringan Komputer</h1>
                    <p>Dua atau lebih perangkat komputer yang saling terhubung untuk berbagi sumber data.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!--Box-->
    <div id="section1"></div>
    <div class="row" style="margin-top: 200px; margin-bottom: 250px;">
        <div class="col-md-4">
            <div class="box" style="background-color: #191972;">
                <center><i class="fa fa-desktop fa-4x"></i></center><br>
                <h4>
                    <center>Komputer</center>
                </h4>
                <p>
                    <center>Lebih dari 50 komputer dan jaringan, dan telah disesuaikan dengan kebutuhan mahasiswa FST.
                    </center>
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box" style="background-color: #3a487f;">
                <center><i class="fa fa-chalkboard-teacher fa-4x"></i></center><br>
                <h4>
                    <center>Dosen</center>
                </h4>
                <p>
                    <center>Lebih dari 20 dosen profesional yang akan memandu proses praktikum di laboratorium.
                    </center>
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box" style="background-color: #191972;">
                <center><i class="fa fa-clock fa-4x"></i></center><br>
                <h4>
                    <center>Jam Aktif</center>
                </h4>
                <p>
                    <center>Dapat digunakan 8 jam per hari selama 5 hari kerja dalam seminggu.</center>
                </p>
            </div>
        </div>
    </div>

    <!--F.A.Q-->
    <div id="section2"></div>
    <div class="row">
        <h1 class="text-center big-text-black">Layanan Kami</h1>
        <h5 class="text-center">Apa yang bisa website lakukan untukmu?</h5><br>
        <img src="sistem/img/coding.gif" style="width: 50%;">
        <div id="accordion">
            <div class="card">
                <div class="card-header" style="background-color: #3a487f;">
                    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseOne" style="color: white">
                        <h5>Apa yang bisa didapatkan dari website Booking Labkom FST ?</h5>
                    </a>
                </div>
                <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        <ol>
                            <li>Melihat informasi akademik Fakultas Sains dan Teknologi Universitas Harapan Bangsa
                            </li>
                            <li>Melakukan booking laboratorium komputer Fakultas Sains dan Teknologi Universitas
                                Harapan Bangsa</li>
                            <li>Cek jadwal penggunaan laboratorium komputer Fakultas Sains dan Teknologi Universitas
                                Harapan Bangsa</li>
                            <li>Melihat laporan resume dari penggunaan laboratorium komputer Fakultas Sains dan
                                Teknologi Universitas Harapan Bangsa</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="background-color: #3a487f;">
                    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo" style="color: white">
                        <h5>Siapa yang dapat melakukan booking pada Booking Labkom FST ?</h5>
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        <ol>
                            <li>Dosen Fakultas Sains dan Teknologi UHB</li>
                            <li>Dosen pengampu matakuliah</li>
                            <li>Dosen lain yang berkepentingan</li>
                            <li>Mahasiswa Fakultas Sains dan Teknologi</li>
                            <li>Mahasiswa penanggung jawab mata kuliah</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="background-color: #3a487f;">
                    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree" style="color: white">
                        <h5>Bagaimana cara booking Laboratorium Komputer FST ?</h5>
                    </a>
                </div>
                <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        <ol>
                            <li>Periksa ketersediaan waktu atau waktu yang belum terbooking pada <a href="{{url('/jadwal')}}" class="card-link">Jadwal Penggunaan Lab Komputer</a></li>
                            <li>Isi form booking pada <a href="{{url('/booking')}}" class="card-link">Booking Lab Komputer</a> dengan mengisikan data :</li>
                            <ul>
                                <li>Nama, yaitu nama pembooking labkom</li>
                                <li>Hari/Tanggal, yaitu hari dan tanggal penggunaan labkom</li>
                                <li>Waktu, yaitu jam penggunaan labkom</li>
                                <li>Mata Kuliah, yaitu mata kuliah yang dilaksanakan selama penggunaan labkom</li>
                                <li>Semester/Prodi, yaitu kelas yang menggunakan labkom</li>
                                <li>Dosen Pengampu, yaitu nama dosen yang mengampu selama penggunaan labkom</li>
                                <li>Keterangan, yaitu keterangan lain yang mungkin dibutuhkan</li>
                            </ul>
                            <li>Klik tombol 'Booking' setelah semua data terisi</li>
                            <li>Akan muncul pemberitahuan keberhasilan atau kegagalan dalam booking</li>
                            <li>Periksa apakah labkom yang sudah berhasil terbooking telah terdaftar pada <a href="{{url('/jadwal')}}" class="card-link">Jadwal Penggunaan Lab Komputer</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
