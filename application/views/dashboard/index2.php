<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK-TI GNC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- Navbar -->
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

    <!-- Sliders -->
    <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-inner">
            <?php $first = true; foreach ($slide->result() as $row) :?>
            <div class="foto-slide carousel-item <?php echo $first ? 'active' : ''; ?>">
                <img src="<?php echo $row->gambar ?>" class="d-block w-100" alt="...">
                <div class="capt carousel-caption">
                    <h5 class="animate__animated animate__bounceInRight" style="animation-delay:0.5s">SMK-TI Garuda
                        Nusantara Cimahi</h5>
                    <p class="animate__animated animate__bounceInLeft d-none d-md-block" style="animation-delay:0.5s">
                        Selamat Datang di SMK-TI Garuda Nusantara Cimahi.
                        SMK-TI Garuda Nusantara merupakan salah satu sekolah terbesar di Kota Cimahi</p>
                    <div class="slider-btn animate__animated animate__bounceInRight" style="animation-delay:1s">
                        <a href="<?php echo site_url('PPDB/index') ?>"><button class="btn-1">DAFTAR ONLINE</button></a>
                    </div>
                </div>
            </div>
            <?php $first = false; endforeach; ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Modal Pop Up -->
    <?php $dataFound = false; ?>
    <?php foreach ($popup as $row) : ?>
    <?php if (stripos($row->aktif, '1') !== false) : ?>
    <?php $dataFound = true; ?>
    <div id="myModal" class="modal" data-auto-open="true">
        <div class="modal-content">
            <span class="close" id="closeModalBtn">&times;</span>
            <h2><?php echo $row->judul; ?></h2>
            <p><?php echo $row->isi; ?></p>
            <a href="<?php echo site_url('PPDB/form'); ?>"><button class="modal-button">Daftar Sekarang</button></a>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>

    <?php if (!$dataFound) : ?>
    <p>Tidak ada data yang cocok.</p>
    <?php endif; ?>

    <script src="script.js"></script>

    <!-- Info -->
    <div class="infoall container">
        <div class="row">
            <?php $counter = 0; $infoterbaru=array_reverse($info->result());?>
            <?php foreach ($infoterbaru as $row) : ?>
            <?php if ($counter < 3) : ?>
            <div class="col-12 col-md-6 col-lg-4 p-0 mb-3">
                <div class="info card">
                    <h5 class="judul-1 judul-card"><?php echo $row->judul ?></h5>
                    <img src="<?php echo $row->gambar ?>" alt="" class="card-img-top">
                    <p><?php echo substr($row->deskripsi, 0,100) ?>...</p>
                </div>
                <a href="<?php echo site_url('K_Konten/detailinfo/'.$row->id_info); ?>"
                    class="btn btn-primary">Selengkapnya</a>
            </div>
            <?php endif; ?>
            <?php $counter++; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Visi,Misis,Tujuan -->
    <div class="container text-center">
        <div class="VMT row">
            <div class="col-6 p-0">
                <div class="Visi card text-center">
                    <div class="card-body">
                        <h2 class="jdl-1 card-title">Visi</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.</p>
                    </div>
                </div>
            </div>
            <div class="col-6 p-0">
                <div class="Misi card text-center">
                    <div class="card-body p-3">
                        <h2 class="jdl-2 card-title">Misi</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 g-0">
                <div class="Tujuan card text-center mb-5">
                    <div class="card-body">
                        <h2 class="jdl-3 card-title">Tujuan</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kepsek -->
    <div class="container mb-5">
        <h1 class="jdl-kepsek card-title mb-5">KEPALA SEKOLAH</h1>
        <div class="kepsek row">
            <div class="col-md-4 p-0">
                <div class="kiri card text-center">
                    <img class="Foto" src="<?php echo base_url('assets/images/background.png') ?>">
                    <h4 class="card-title">Rido Amaludi Toyib, S.T</h4>
                </div>
            </div>
            <div class="col-md-8 g-0">
                <div class="kanan card mb-5">
                    <div class="sambutan card-body">
                        <p class="card-text">Asalamualikum warahmatullahi wabarakatuh<br>

                            <br> Pergeseran era revolusi industri 4.0 ke society 5.0 semakin memantapkan eksistensi
                            teknologi
                            digital bagi kemaslahatan umat manusia. Era society 5.0 menitikberatkan optimalisasi
                            teknologi digital
                            bagi kenyamanan hidup manusia
                            Kebutuhan tenaga kerja dalam industri digital di era industri 4.0 dan society 5.0 ini tentu
                            akan semakin
                            banyak, tidak hanya di bursa tenaga kerja domestik namun juga regional bahkan internasional.
                            <br>
                            SMK TI Garuda Nusantara Cimahi memiliki pilihan jurusan yang sangat relevan dengan kebutuhan
                            tenaga
                            kerja saat ini dan masa depan, dengan cakupan bidang profesi sebagai berikut: <br>
                            1. Bidang Telekomunikasi, jurusan yang dapat dipilih, Teknik Jaringan Akses Telekomunikasi
                            (TJAT) <br>
                            2. Bidang Multimedia, jurusan yang dapat dipilih, Animasi atau Multimedia <br>
                            3. Bidang Teknologi Informasi, jurusan yang dapat dipilih, Rekayasa Perangkat Lunak (RPL)
                            atau Teknik
                            Komputer Jaringan (TKJ) <br>
                            4. Bidang Administrasi Perkantoran, jurusan yang dapat dipilih, Otomatisasi Tata Kelola
                            Perkantoran
                            (OTKP) <br>
                            Para peserta didik pada jurusan-jurusan tersebut digembleng untuk beradaptasi dengan
                            kemajuan teknologi,
                            sehingga ketika lulus sekolah diharapkan mereka siap menghadapi dunia kerja di era society
                            5.0 ini. <br>
                            <br> Wassalamualaikum Wr. Wb.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Post -->
    <div class="container">
        <div class="berita row">
            <div class="col-md-6 p-0">
                <h1 class="jdl-berita card-title mb-3">Post Terbaru</h1>
                <div class="post card">
                    <hr>
                    <div class="card mb-5" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="gambar col-md-4">
                                <img src="assets/images/background.png" class="card-img" alt="...">
                            </div>
                            <div class="text col-md-8">
                                <div class="card-body">
                                    <a href="<?php echo site_url('Berita/isi'); ?>">
                                        <h5 class="card-title">Upacara Pembukaan MPLS Peserta Didik Baru Tahun
                                            2023
                                            - 2024 SMK TI GARUDA NUSANTARA</h5>
                                    </a>
                                    <p class="card-text">Kegiatan MPLS Tahun 2023 - 2024 SMK TI GARUDA NUSANTARA
                                        Kegiatan diikuti oleh siswa-siswi baru.</p>
                                    <p class="card-text"><small class="text-muted">Rabu 19 Juli</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-5" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="gambar col-md-4">
                                <img src="assets/images/background.png" class="card-img" alt="...">
                            </div>
                            <div class="text col-md-8">
                                <div class="card-body">
                                    <a href="<?php echo site_url('Berita/isi'); ?>">
                                        <h5 class="card-title">Upacara Pembukaan MPLS Peserta Didik Baru Tahun
                                            2023
                                            - 2024 SMK TI GARUDA NUSANTARA</h5>
                                    </a>
                                    <p class="card-text">Kegiatan MPLS Tahun 2023 - 2024 SMK TI GARUDA NUSANTARA
                                        Kegiatan diikuti oleh siswa-siswi baru.</p>
                                    <p class="card-text"><small class="text-muted">Rabu 19 Juli</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 g-0">
                <h1 class="jdl-berita card-title mb-3">Acara Akan Datang</h1>
                <div class="acara card mb-5">
                    <hr>
                    <div class="txt card mb-5" style="max-width: 540px;">
                        <div class="card-header bg-warning">
                            <h4>Pembagian Rapor Semester</h4>
                        </div>
                        <ul class="judul list-group list-group-flush">
                            <li class="list-group-item">
                                <p class="card-text">Pembagian Rapor Semester 1 yang di laksanakan di masing masing
                                    kelas semua tingkatan peserta didik
                                </p>
                                <div class="tgl">
                                    <p class="card-text"><small class="text-muted">23 Desember 2023</small></p>
                                    <p class="card-text"><small class="text-muted">|</small></p>
                                    <p class="card-text"><small class="text-muted">07.00 - 15.00</small></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="txt card mb-5" style="max-width: 540px;">
                        <div class="card-header bg-warning">
                            <h4>Masa Tamu Pramuka</h4>
                        </div>
                        <ul class="judul list-group list-group-flush">
                            <li class="list-group-item">
                                <p class="card-text">Masa Tamu Pramuka di laksanakan bertujuan untuk melatih para
                                    peserta didik dalam mencapai karakter dalam kehidupan dan pembiasaan dalam sikap dan
                                    perilaku dalam menjalani keseharian sebagai peserta didik</p>
                                <div class="tgl">
                                    <p class="card-text"><small class="text-muted">27 Desember 2023</small></p>
                                    <p class="card-text"><small class="text-muted">|</small></p>
                                    <p class="card-text"><small class="text-muted">07.00 - Selesai</small></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="video col-md-12 mb-5">
            <h1 class="jdl-berita">Video Sekolah</h1>
            <hr>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="vid embed-responsive-item"
                    src="https://www.youtube.com/embed/u8lwQdnVBB8?si=hq1ScqIBN6bJeVgJ" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- manajemen sekolah -->
    <div class="container-fluid">
        <h1 class="jdl-kepsek mb-5">MANAJEMEN SEKOLAH</h1>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active mb-5">
                    <div class="row">
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Pembina Yayasan</h4>
                            <img src="assets/images/background.png" class="img-man d-block">
                            <div class="nama">
                                <p>Rido Amaludin Toyib, S.T</p>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Kepala Sekolah</h4>
                            <img src="assets/images/background.png" class="img-man d-block">
                            <div class="nama">
                                <p>Rido Amaludin Toyib, S.T</p>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Wakasek Kurikulum</h4>
                            <img src="assets/images/background.png" class="img-man d-block">
                            <div class="nama">
                                <p>Rido Amaludin Toyib, S.T</p>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Wakasek Hubin</h4>
                            <img src="assets/images/background.png" class="img-man d-block">
                            <div class="nama">
                                <p>Rido Amaludin Toyib, S.T</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item mb-5">
                    <div class="row">
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Pembina Yayasan</h4>
                            <img src="assets/images/background2.png" class="img-man d-block">
                            <div class="nama">
                                <p>Rido Amaludin Toyib, S.T</p>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Kepala Sekolah</h4>
                            <img src="assets/images/background2.png" class="img-man d-block">
                            <div class="nama">
                                <p>Rido Amaludin Toyib, S.T</p>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Wakasek Kurikulum</h4>
                            <img src="assets/images/background2.png" class="img-man d-block">
                            <div class="nama">
                                <p>Rido Amaludin Toyib, S.T</p>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Wakasek Hubin</h4>
                            <img src="assets/images/background2.png" class="img-man d-block">
                            <div class="nama">
                                <p>Rido Amaludin Toyib, S.T</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item mb-5">
                    <div class="row">
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Pembina Yayasan</h4>
                            <img src="assets/images/background3.png" class="img-man d-block">
                            <div class="nama">
                                <p>Rido Amaludin Toyib, S.T</p>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Kepala Sekolah</h4>
                            <img src="assets/images/background3.png" class="img-man d-block">
                            <div class="nama">
                                <p>Rido Amaludin Toyib, S.T</p>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Wakasek Kurikulum</h4>
                            <img src="assets/images/background3.png" class="img-man d-block">
                            <div class="nama">
                                <p>Rido Amaludin Toyib, S.T</p>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Wakasek Hubin</h4>
                            <img src="assets/images/background3.png" class="img-man d-block">
                            <div class="nama">
                                <p>Rido Amaludin Toyib, S.T</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="back carousel-control-prev btn-dark" type="button" data-bs-target="#carouselExample"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="next carousel-control-next btn-dark" type="button" data-bs-target="#carouselExample"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Footer -->
    <div class="foot-1 card">
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <div class="kontak row">
                    <div class="col-4 card-body">
                        <h5 class="card-title"><i class="bi bi-envelope"></i>informasi@smktignc.sch.id</h5>
                    </div>
                    <div class="col-4 card-body">
                        <h5 class="card-title"><i class="bi bi-telephone"></i>0821 1900 6081 / 0877 2315 7313</h5>
                    </div>
                    <div class="col-4 card-body">
                        <h5 class="card-title"><i class="bi bi-geo-alt"></i>Jl. Sangkuriang No. 34-36 Cimahi</h5>
                    </div>
                </div>
                <div class="icon-1 col">
                    <a href="https://www.instagram.com/" class="bi bi-instagram"></a>
                    <a href="https://www.facebook.com/" class="bi bi-facebook"></a>
                    <a href="https://www.google.com/" class="bi bi-google"></a>
                </div>
            </blockquote>
        </div>
        <footer class="foot-2 blockquote-footer">© 2020 Copyright:</footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <script>
    // Ambil elemen-elemen yang diperlukan
    var modal = document.getElementById("myModal");
    var closeModalBtn = document.getElementById("closeModalBtn");

    // Fungsi untuk menutup modal
    closeModalBtn.onclick = function() {
        modal.style.display = "none";
    }

    // Fungsi untuk menutup modal jika area di luar modal diklik
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Cek apakah elemen modal memiliki atribut "data-auto-open"
    if (modal.getAttribute("data-auto-open") === "true") {
        modal.style.display = "block"; // Munculkan modal secara otomatis
    }
    </script>
</body>

</html>