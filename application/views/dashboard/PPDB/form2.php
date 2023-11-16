<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <!-- Tambahkan link CSS dari Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Tambahkan CSS khusus untuk tata letak -->

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/montserrat-font2.css">
    <link rel="stylesheet" type="text/css"
        href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style2.css')?>" />


    <style>
    .logo {
        font-size: 24px;
        font-weight: bold;
        margin-right: 10px;
        /* Tambahkan jarak antara gambar dan teks SMK TI */
    }

    .navbar {
        background-color: #002147;
        /* Ganti warna background navbar menjadi #002147 */
        height: 90px;
        /* Ukuran navbar */
        justify-content: flex-end;
    }

    .navbar img {
        width: 45px;
        /* Lebar logo */
        height: 45px;
        /* Tinggi logo */
    }

    .navbar .navbar-nav {
        font-size: 17px;
    }

    .navbar .navbar-nav .nav-link {
        color: #ffffff;
    }

    .navbar .navbar-brand {
        font-size: 30px;
        /* Ukuran teks SMK TI */
        color: #ffffff;
        /* Warna teks SMK TI menjadi putih */
        display: flex;
        align-items: center;
        /* Vertikal tengahkan teks dengan gambar */
    }

    .navbar .navbar-brand img {
        margin-right: 15px;
        /* Tambahkan margin antara gambar dan teks SMK TI */
    }

    .judul {
        top: 10px;
        text-align: center;
        color: black;
        font-size: 32px;
        font-family: Montserrat;
        font-weight: 400;
    }

    /* 
    .card {
        max-width: 58rem;
        margin-left: 50px;
        background-color: #013876;
    } */

    .dd {
        max-width: 58rem;
        margin-top: -50px;
        margin-left: 50px;
        background-color: #013876;
        display: flex;
        justify-content: center;
        height: 100px;
    }

    .daftar {
        width: 100%;
        height: 100%;
        font-size: 48px;
    }

    .isi {
        float: left;
    }

    .isi-text {
        text-align: justify;
        letter-spacing: -0.5px;
    }

    .jppdb {
        padding-top: 150px;
    }

    .kepsek {
        height: 440px;
        width: 300px;
        float: right;
        right: 100px;
    }

    .kepsek .isi img {
        margin-left: 25px;
    }

    .kepsek .jabatan {
        margin-top: 20px;
        text-align: center;
    }

    .kepsek .isi-text {
        text-align: center;
        margin-bottom: 30px;
    }

    .custom {
        max-width: 100%;
    }

    .arsip {
        float: right;
        right: 70px;
        bottom: 100rem;
    }

    .arsip-title {
        color: white;
        float: right;
    }

    .tulisan {
        float: right;
        background-color: white;
        max-width: 300px;
        right: 70px;
        bottom: 99rem;
    }

    .tulisan img {
        height: 200px;
        width: 130px;
        border-radius: 0px;

    }

    .tulisan h5 {
        font-size: 18px;
        text-align: center;
    }

    .tulisan p {
        font-size: 12px;
        margin-left: 20px;
    }

    footer {
        background-color: #002147;
        color: white;
    }

    .mail {
        margin-left: -100px;
    }

    .no {
        margin-left: 100px;
    }

    .alm {
        padding-right: 100px;
    }

    .icon {
        margin-right: 40px;
    }

    .icon {
        justify-content: end;
    }

    .fa {
        padding: 20px;
        font-size: 30px;
        width: 50px;
        text-decoration: none;
    }

    .fa-facebook {
        color: white;
    }

    .fa-instagram {
        color: white;
    }

    .fa-google-plus {
        color: white;
    }

    .foot-2 {
        background-color: #032E5F;
        color: white;
    }

    .navbar {
        background-color: #002147;
        /* Warna background navbar */
    }

    .navbar-brand img {
        max-width: 50px;
        /* Sesuaikan dengan ukuran logo */
        margin-right: 10px;
        /* Jarak antara logo dan teks */
    }

    .navbar-brand,
    .navbar-nav .nav-link {
        color: #ffffff;
        /* Warna teks */
    }

    .navbar-text {
        color: #ffffff;
        /* Warna teks navbar-text */
        margin: 0 10px;
        /* Jarak antara navbar-text dan elemen sekitarnya */
    }

    .form-control {
        width: 100%;
        padding: 10px;
        background-color: #f4f4f4;
        color: #333;
        border: none;
        border-radius: 5px;
        transition: box-shadow 0.3s ease;
    }

    .form-control:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    </style>
</head>

<body>
    <!-- Navbar menggunakan Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url('#'); ?>">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo">
                SMK-TI GNC
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="jurusanDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">JURUSAN</a>
                        <div class="dropdown-menu" aria-labelledby="jurusanDropdown">
                            <a class="dropdown-item" href="<?php echo site_url('Jurusan/DKV'); ?>">DKV</a>
                            <a class="dropdown-item" href="<?php echo site_url('Jurusan/PPLG'); ?>">PPLG</a>
                            <a class="dropdown-item" href="<?php echo site_url('Jurusan/TKJT'); ?>">TKJT</a>
                            <a class="dropdown-item" href="<?php echo site_url('Jurusan/TJAT'); ?>">TJAT</a>
                            <a class="dropdown-item" href="<?php echo site_url('Jurusan/Animasi'); ?>">Animasi</a>
                            <a class="dropdown-item" href="<?php echo site_url('Jurusan/MPLB'); ?>">MPLB</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">BERITA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Galeri/FotoVideo'); ?>">GALERI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('#'); ?>">PPDB</a>
                    </li>
                    <li class="nav-item">
                        <span class="navbar-text">|</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('auth'); ?>">SIGN IN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Tambahkan script JavaScript dari Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <br>
    <!-- Judul -->
    <main class="jppdb container-fluid">
        <div class="judul">FORM PPDB TAHUN 2023-2024</div>
        <div class="judul">SMK TI GARUDA NUSANTARA CIMAHI</div>
    </main>

    <!-- form -->
    <div class="page-content"
        style="background-image: url('images/wizard-v10-bg.jpg'); position: relative; top: -200px;">
        <div class="wizard-v10-content">
            <div class="wizard-form">
                <div class="wizard-header">
                    <h3>FORM PPDB</h3>
                </div>
                <form class="form-register" action="<?php echo base_url('PPDB/simpan_pendaftaran');?>" method="POST">
                    <div id="form-total">
                        <!-- SECTION 1 -->
                        <h2>1</h2>
                        <section>
                            <h1>Data Pendaftaran</h1>
                            <div class="inner">
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="NISN">NISN</label>
                                        <input type="text" class="form-control" id="NISN" name="NISN"
                                            style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row" style="display: flex;">
                                    <div class="form-holder form-holder-2" style="flex: 1; margin-right: 10px;">
                                        <label for="pilihan_satu">Pilihan 1</label>
                                        <input type="text" class="form-control" id="pilihan_satu" name="pilihan_satu">
                                    </div>
                                    <div class="form-holder form-holder-2" style="flex: 1;">
                                        <label for="pilihan_dua">Pilihan 2</label>
                                        <input type="text" class="form-control" id="pilihan_dua" name="pilihan_dua">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="Nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="Nama_lengkap" name="Nama_lengkap"
                                            style="width: 190%;" style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="Jenis_kelamin">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="Jenis_kelamin" name="Jenis_kelamin"
                                            style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="asal_sekolah">Asal Sekolah</label>
                                        <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah"
                                            style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row" style="display: flex;">
                                    <div class="form-holder form-holder-2" style="flex: 1; margin-right: 10px;">
                                        <label for="Tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="Tempat_lahir" name="Tempat_lahir"
                                            style="width: 100%;">
                                    </div>
                                    <div class="form-holder form-holder-2" style="flex: 1;">
                                        <label for="Tanggal_Lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="Tanggal_Lahir" name="Tanggal_Lahir"
                                            style="width: 100%;">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="agama">Agama</label>
                                        <input type="text" class="form-control" id="agama" name="agama"
                                            style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="Alamat">Alamat</label>
                                        <input type="text" class="form-control" id="Alamat" name="Alamat"
                                            style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" class="form-control" id="provinsi" name="provinsi"
                                            style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="kabupaten_kota">Kabupaten/Kota</label>
                                        <input type="text" class="form-control" id="kabupaten_kota"
                                            name="kabupaten_kota" style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                            style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row" style="display: flex;">
                                    <div class="form-holder form-holder-2" style="flex: 1; margin-right: 10px;">
                                        <label for="rt">RT</label>
                                        <input type="text" class="form-control" id="rt" name="rt" style="width: 100%;">
                                    </div>
                                    <div class="form-holder form-holder-2" style="flex: 1; margin-right: 10px;">
                                        <label for="rw">RW</label>
                                        <input type="text" class="form-control" id="rw" name="rw" style="width: 100%;">
                                    </div>
                                    <div class="form-holder form-holder-2" style="flex: 1;">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                                            style="width: 100%;">
                                    </div>
                                </div>
                                <div class="form-row" style="display: flex;">
                                    <div class="form-holder form-holder-2" style="flex: 1; margin-right: 10px;">
                                        <label for="nomor_telp">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="nomor_telp" name="nomor_telp"
                                            style="width: 100%;">
                                    </div>
                                    <div class="form-holder form-holder-2" style="flex: 1;">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- SECTION 2 -->
                        <h2>2</h2>
                        <section>
                            <h1>Data Orang Tua</h1>
                            <div class="inner">
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="Nama_ayah">Nama Ayah</label>
                                        <input type="text" class="form-control" id="Nama_ayah" name="Nama_ayah"
                                            style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row" style="display: flex;">
                                    <div class="form-holder form-holder-2" style="flex: 1; margin-right: 10px;">
                                        <label for="pendidikan_ayah">Pendidikan Ayah</label>
                                        <input type="text" class="form-control" id="pendidikan_ayah"
                                            name="pendidikan_ayah" style="width: 100%;">
                                    </div>
                                    <div class="form-holder form-holder-2" style="flex: 1;">
                                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                        <input type="text" class="form-control" id="pekerjaan_ayah"
                                            name="pekerjaan_ayah" style="width: 100%;">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="penghasilan_ayah">Penghasilan Bulanan Ayah</label>
                                        <input type="text" class="form-control" id="penghasilan_ayah"
                                            name="penghasilan_ayah" style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="Nama_ibu">Nama Ibu</label>
                                        <input type="text" class="form-control" id="Nama_ibu" name="Nama_ibu"
                                            style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row" style="display: flex;">
                                    <div class="form-holder form-holder-2" style="flex: 1; margin-right: 10px;">
                                        <label for="pendidikan_ibu">Pendidikan Ibu</label>
                                        <input type="text" class="form-control" id="pendidikan_ibu"
                                            name="pendidikan_ibu" style="width: 100%;">
                                    </div>
                                    <div class="form-holder form-holder-2" style="flex: 1;">
                                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                            style="width: 100%;">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="penghasilan_ibu">Penghasilan Bulanan Ibu</label>
                                        <input type="text" class="form-control" id="penghasilan_ibu"
                                            name="penghasilan_ibu" style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="no_telp_ortu">Nomor Telepon Orang Tua</label>
                                        <input type="text" class="form-control" id="no_telp_ortu" name="no_telp_ortu"
                                            style="width: 190%;">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- SECTION 3 -->
                        <h2>3</h2>
                        <section>
                            <h1>Data Wali</h1>
                            <div class="inner">
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="Nama_wali">Nama Wali</label>
                                        <input type="text" class="form-control" id="Nama_wali" name="Nama_wali"
                                            style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row" style="display: flex;">
                                    <div class="form-holder form-holder-2" style="flex: 1; margin-right: 10px;">
                                        <label for="pendidikan_wali">Pendidikan Wali</label>
                                        <input type="text" class="form-control" id="pendidikan_wali"
                                            name="pendidikan_wali" style="width: 100%;">
                                    </div>
                                    <div class="form-holder form-holder-2" style="flex: 1;">
                                        <label for="pekerjaan_wali">Pekerjaan Wali</label>
                                        <input type="text" class="form-control" id="pekerjaan_wali"
                                            name="pekerjaan_wali" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="penghasilan_wali">Penghasilan Bulanan Wali</label>
                                        <input type="text" class="form-control" id="penghasilan_wali"
                                            name="penghasilan_wali" style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="no_telp_wali">Nomor Telepon Wali</label>
                                        <input type="text" class="form-control" id="no_telp_wali" name="no_telp_wali"
                                            style="width: 190%;">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- SECTION 4 -->
                        <h2>4</h2>
                        <section>
                            <h1>Data Rinci</h1>
                            <div class="inner">
                                <div class="form-row" style="display: flex;">
                                    <div class="form-holder form-holder-2" style="flex: 1; margin-right: 10px;">
                                        <label for="jarak_tempuh">Jarak Rumah Ke Sekolah *km</label>
                                        <input type="text" class="form-control" id="jarak_tempuh" name="jarak_tempuh"
                                            style="width: 100%;">
                                    </div>
                                    <div class="form-holder form-holder-2" style="flex: 1;">
                                        <label for="waktu_tempuh">Waktu Tempuh *Menit</label>
                                        <input type="text" class="form-control" id="waktu_tempuh" name="waktu_tempuh"
                                            style="width: 100%;">
                                    </div>
                                </div>
                                <div class="form-row" style="display: flex;">
                                    <div class="form-holder form-holder-2" style="flex: 1; margin-right: 10px;">
                                        <label for="tb">Tinggi Badan</label>
                                        <input type="text" class="form-control" id="tb" name="tb" style="width: 100%;">
                                    </div>
                                    <div class="form-holder form-holder-2" style="flex: 1;">
                                        <label for="bb">Berat Badan</label>
                                        <input type="text" class="form-control" id="bb" name="bb" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="jumlah_saudara">Jumlah Saudara Kandung</label>
                                        <input type="text" class="form-control" id="jumlah_saudara"
                                            name="jumlah_saudara" style="width: 190%;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="Tahun_akademik">Tahun Akademik</label>
                                        <input type="text" class="form-control" id="Tahun_akademik"
                                            name="Tahun_akademik" style="width: 190%;">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.steps.js')?>"></script>
    <script src="<?php echo base_url('assets/js/main.js')?>"></script>


    <!-- footer -->
    <footer class="text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="card-body">
                    <h5 class="card-title">informasi@smktignc.sch.id</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">0821 1900 6081 / 0877 2315 7313</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Jl. Sangkuriang No. 34-36 Cimahi</h5>
                </div>
            </div>
        </div>
        <!-- icons -->
        <div class="icon row">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-instagram"></a>
            <a href="#" class="fa fa-google-plus"></a>
        </div>

        <!-- Copyright -->
        <div class="foot-2 text-center p-3">
            © 2020 Copyright:
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>