<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/form.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Navbar menggunakan Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="d-flex align-items-center navbar-brand fs-4" href="<?php echo site_url('#'); ?>">
                <img src="<?php echo base_url('assets/images/logo.png') ?>" alt="Logo" width="45"
                    class="d-inline-block align-text-top me-2">
                <span style="vertical-align: middle;">SMK-TI GNC</span>
            </a>
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header text-white border-bottom">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="<?php echo base_url('assets/images/logo.png') ?>" alt="Logo" width="38"
                                class="d-inline-block align-text-top">
                        </div>
                        <div class="col">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">SMK-TI GNC</h5>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>


                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="<?php echo site_url('#'); ?>">HOME</a>
                        </li>

                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                JURUSAN
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="<?php echo site_url('Jurusan/Animasi'); ?>">Animasi</a></li>
                                <li><a class="dropdown-item" href="<?php echo site_url('Jurusan/DKV'); ?>">DKV</a></li>
                                <li><a class="dropdown-item" href="<?php echo site_url('Jurusan/TKJT'); ?>">TKJT</a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo site_url('Jurusan/TJAT'); ?>">TJAT</a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo site_url('Jurusan/PPLG'); ?>">PPLG</a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo site_url('Jurusan/MPLB'); ?>">MPLB</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="<?php echo site_url('Berita/index'); ?>">BERITA</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="<?php echo site_url('Galeri/FotoVideo'); ?>">GALERI</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="<?php echo site_url('PPDB/index'); ?>">PPDB</a>
                        </li>
                    </ul>
                    <div class="navbar-nav ">
                        <div class="button d-flex flex-column justify-content-center">
                            <a href="<?php echo base_url('auth') ?>"
                                class="text-white text-decoration-none rounded-2">LOGIN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- Tambahkan script JavaScript dari Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <br>
    <!-- Judul -->
    <div class="jppdb container-fluid">
        <div class="judul">FORM PPDB TAHUN 2023-2024</div>
        <div class="judul mb-5">SMK TI GARUDA NUSANTARA CIMAHI</div>
    </div>

    <div class="container mb-5">
        <div class="card">
            <div class="header card-header">Form Pendaftaran</div>
            <div class="container" style="padding: 40px;">
                <div class="position-relative m-4">
                    <div class="progress" style="height: 1px;">
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <button type="button"
                        class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill"
                        style="width: 2rem; height:2rem;">1</button>
                    <button type="button"
                        class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill"
                        style="width: 2rem; height:2rem;">2</button>
                    <button type="button"
                        class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill"
                        style="width: 2rem; height:2rem;">3</button>
                </div>
            </div>

            <!-- form -->
            <form class="form-register" id="mainForm" action="<?php echo base_url('PPDB/simpan_pendaftaran'); ?>"
                method="post" style="padding: 20px;">
                <div class="form-page" data-page="1">
                    <div class="container">
                        <div class="col-12 text-center">
                            <h1>Data Pendaftaran</h1>
                            <p>Isilah data-data berikut:</p>
                        </div>
                    </div>
                    <div class="inner">
                        <div class="form-row">
                            <div class="form-holder form-holder-2">
                                <label for="nisn">NISN</label>
                                <input type="number" class="form-control" id="nisn" name="nisn" style="width: 190%;">
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
                                <input type="text" class="form-control" id="agama" name="agama" style="width: 190%;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2">
                                <label for="Alamat">Alamat</label>
                                <input type="text" class="form-control" id="Alamat" name="Alamat" style="width: 190%;">
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
                                <input type="text" class="form-control" id="kabupaten_kota" name="kabupaten_kota"
                                    style="width: 190%;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                    style="width: 190%;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2">
                                <label for="kelurahan_desa">Kelurahan/Desa</label>
                                <input type="text" class="form-control" id="kelurahan_desa" name="kelurahan_desa"
                                    style="width: 190%;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2">
                                <label for="dusun_kampung">Dusun/Kampung</label>
                                <input type="text" class="form-control" id="dusun_kampung" name="dusun_kampung"
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
                                <input type="text" class="form-control" id="email" name="email" style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-12 mb-4 text-end" style="padding: 0px 30px 0px 0px">
                            <button id="nextButton1" class="btn btn-primary btn-lg">Selanjutnya</button>
                        </div>
                    </div>
                </div>

                <div class="form-page" data-page="2">
                    <div class="container" style="margin-left: -15px;">
                        <div class="col-12">
                            <h1>Data Orang Tua</h1>
                            <p>Isilah data-data berikut:</p>
                        </div>
                    </div>
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
                                <input type="text" class="form-control" id="pendidikan_ayah" name="pendidikan_ayah"
                                    style="width: 100%;">
                            </div>
                            <div class="form-holder form-holder-2" style="flex: 1;">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                    style="width: 100%;">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-holder form-holder-2">
                                <label for="penghasilan_ayah">Penghasilan Bulanan Ayah</label>
                                <input type="text" class="form-control" id="penghasilan_ayah" name="penghasilan_ayah"
                                    style="width: 190%;">
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
                                <input type="text" class="form-control" id="pendidikan_ibu" name="pendidikan_ibu"
                                    style="width: 100%;">
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
                                <input type="text" class="form-control" id="penghasilan_ibu" name="penghasilan_ibu"
                                    style="width: 190%;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2">
                                <label for="No_telp_ortu">Nomor Telepon Orang Tua</label>
                                <input type="text" class="form-control" id="No_telp_ortu" name="No_telp_ortu"
                                    style="width: 190%;" required>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 mb-4 text-right">
                        <button id="backButton2" class="btn btn-primary btn-lg">Kembali</button>
                        <button id="nextButton2" class="btn btn-primary btn-lg">Selanjutnya</button>
                    </div>
                </div>

                <div class="form-page" data-page="3">
                    <div class="container" style="margin-left: -15px;">
                        <div class="col-12">
                            <h1>Data Wali</h1>
                            <p>Isilah data-data berikut:</p>
                        </div>
                    </div>
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
                                <input type="text" class="form-control" id="pendidikan_wali" name="pendidikan_wali"
                                    style="width: 100%;">
                            </div>
                            <div class="form-holder form-holder-2" style="flex: 1;">
                                <label for="pekerjaan_wali">Pekerjaan Wali</label>
                                <input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali"
                                    style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2">
                                <label for="penghasilan_wali">Penghasilan Bulanan Wali</label>
                                <input type="text" class="form-control" id="penghasilan_wali" name="penghasilan_wali"
                                    style="width: 190%;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2">
                                <label for="No_telp_wali">Nomor Telepon Wali</label>
                                <input type="text" class="form-control" id="No_telp_wali" name="No_telp_wali"
                                    style="width: 190%;">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4 text-right">
                        <button id="backButton3" class="btn btn-primary btn-lg">Kembali</button>
                        <button id="nextButton3" class="btn btn-primary btn-lg">Selanjutnya</button>
                    </div>
                </div>
                <div class="form-page" data-page="4">
                    <div class="inner">
                    <div class="container" style="margin-left: -15px;">
                        <div class="col-12">
                            <h1>Data Rinci</h1>
                            <p>Isilah data-data berikut:</p>
                        </div>
                    </div>
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
                                <input type="text" class="form-control" id="jumlah_saudara" name="jumlah_saudara"
                                    style="width: 190%;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2">
                                <label for="Tahun_akademik">Tahun Akademik</label>
                                <input type="text" class="form-control" id="Tahun_akademik" name="Tahun_akademik"
                                    style="width: 190%;">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4 text-right">
                        <button id="backButton4" class="btn btn-primary btn-lg">Kembali</button>
                        <button id="submitButton" type="submit" class="btn btn-primary btn-lg" value="Submit">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('form');
        const nextButtons = document.querySelectorAll('[id^=nextButton]');
        const backButtons = document.querySelectorAll('[id^=backButton]');
        let currentForm = 0;

        // Tombol Selanjutnya
        nextButtons.forEach((nextButton, index) => {
            nextButton.addEventListener('click', function(event) {
                event.preventDefault();
                forms[currentForm].style.display = 'none';
                currentForm++;
                forms[currentForm].style.display = 'block';

                // Gulir halaman ke atas
                window.scrollTo({
                    top: 220,
                    behavior: 'smooth'
                });
            });
        });

        // Tombol Kembali
        backButtons.forEach((backButton, index) => {
            backButton.addEventListener('click', function(event) {
                event.preventDefault();
                forms[currentForm].style.display = 'none';
                currentForm--;
                forms[currentForm].style.display = 'block';

                // Gulir halaman ke atas
                window.scrollTo({
                    top: 220,
                    behavior: 'smooth'
                });
            });
        });
    });
    </script>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.steps.js"></script>
    <script src="js/main.js"></script>

    <!-- Footer -->
    <div class="foot-1 card">
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <div class="kontak row">
                    <div class="col-4 card-body">
                        <h5 class="card-title"><i class="bi bi-envelope"></i>informasi@smktignc.sch.id</h5>
                    </div>
                    <div class="col-4 card-body">
                        <h5 class="card-title"><i class="bi bi-telephone"></i>0821 1900 6081 / 0877 2315 7313
                        </h5>
                    </div>
                    <div class="col-4 card-body">
                        <h5 class="card-title"><i class="bi bi-geo-alt"></i>Jl. Sangkuriang No. 34-36 Cimahi
                        </h5>
                    </div>
                </div>
                <div class="icon-1 col">
                    <a href="#" class="bi bi-facebook"></a>
                    <a href="#" class="bi bi-instagram"></a>
                    <a href="#" class="bi bi-google"></a>
                </div>
            </blockquote>
        </div>
        <footer class="foot-2 blockquote-footer">© 2020 Copyright:</footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>