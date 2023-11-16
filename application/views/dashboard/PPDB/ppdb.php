<!DOCTYPE html>
<html>

<head>
    <title>PPDB</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/ppdb.css') ?>">
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
                            <a class="nav-link" aria-current="page" href="<?php echo site_url('#'); ?>">HOME</a>
                        </li>
                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                JURUSAN
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($jurusan as $item): ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo site_url('Jurusan/Animasi/').$item->id_jurusan; ?>"><?php echo $item->nama_jurusan; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="<?php echo site_url('Berita/index'); ?>">BERITA</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="<?php echo site_url('Galeri/FotoVideo'); ?>">GALERI</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link active" href="<?php echo site_url('PPDB/index'); ?>">PPDB</a>
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
    <div class="carousel-inner inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url('assets/images/background.png') ?>" class="d-block w-100" alt="..."
                style="height: 30vh">
            <h1 class="jdl-utama carousel-caption d-none d-md-block mb-5">PPDB</h1>
        </div>
    </div>



    <!-- Tambahkan script JavaScript dari Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <br>
    <!-- Judul -->
    <div class="judul mb-5 mt-5">
        <span>PENERIMAAN PESERTA DIDIK BARU</span><br>
        <span>SMK TI GARUDA NUSANTARA CIMAHI</span>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row mb-5">
                        <img src="<?php echo base_url('assets/images/ppdb.jpg') ?>" alt=""
                            style="max-width: 100%; height: auto;">
                        <div class="col">
                            <a href="<?php echo site_url('PPDB/form'); ?>"
                                class="btn btn-warning d-flex justify-content-center align-items-center">DAFTAR
                                DISINI</a>
                        </div>
                    </div>
                    <div class="row">
                        <h3>Informasi Penerimaan Peserta Didik Baru Tahun Pelajaran 2023 - 2024</h3>
                    </div>
                    <div class="row mb-2">
                        <span>Peraturan Menteri Pendidikan dan Kebudayaan Nomor 1 Tahun 2021 tentang PPDB Pada
                            Taman Kanak-kanak, Sekolah Dasar, Sekolah Menengah Pertama, Sekolah Menengah Atas, dan Sekolah Menengah Kejuruan.
                        </span>
                        <span>SE Mendikbud No. 1 Thn. 2020 tentang Kebijakan Merdeka Belajar Dalam Penentuan
                                Kelulusan Peserta
                                Didik & Pelaksanaan PPDB Thn.Ajaran 2020-2021 :
                                <ul>
                                <li>Juknis PPDB, penetapan zona, tidak menggunakan nilai UN/nilai ujian lainnya
                                    pada jalur afirmasi
                                    dan
                                    zonasi;</li>
                                <li>Kewajiban melakukan sosialisasi, melaporkan, dan koordinasi PPDB</li>
                            </ul>
                        </span>
                    </div>
                    <div class="row">
                        <h3>MATERI YANG DIAJARKAN</h3>
                    </div>
                    <div class="row mb-5">
                        <span>1. Komputer dan Desain</span>
                    </div>
                </div>
                <div class="col-md-3 d-flex flex-column align-items-end">
                    <div class="kepsek card text-white mb-3">
                        <h5 class="jabatan">Kepala Sekolah</h5>
                        <div class="isi card-body">
                            <img src="<?php echo base_url('assets/images/background.png') ?>" alt="Foto Kepala Sekolah">
                        </div>
                        <p class="isi-text card-text">RidoAmaludinToyibST</p>
                    </div>
                    <div class="info card mb-3">
                        <ul class="list-group list-group-flush">
                            <div class="info-title card-header">Info</div>
                            <a href="<?php echo site_url('Info/kenapaTI'); ?>">
                                <li class="list-group-item">Kenapa TI?</li>
                            </a>
                            <a href="<?php echo site_url('Info/kompetensi'); ?>">
                                <li class="list-group-item">Kompetensi Keahlian</li>
                            </a>
                            <a href="<?php echo site_url('Info/Ekstrakulikuler'); ?>">
                                <li class="list-group-item">Ekstrakulikuler</li>
                            </a>
                        </ul>
                    </div>
                    <div class="populer card mb-5">
                        <div class="populer-judul card-header">Berita</div>
                        <img src="<?php echo base_url('assets/images/background.png') ?>" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <p><a href="<?php echo site_url('Berita/isi'); ?>" class="isi-berita">Some quick example
                                    text to build on
                                    the card title and make up
                                    the bulk of the card's content.</a></p>
                            <hr>
                        </div>
                        <img src="<?php echo base_url('assets/images/background.png') ?>" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <p><a href="<?php echo site_url('Berita/isi'); ?>" class="isi-berita">Some quick example
                                    text to build on
                                    the card title and make up
                                    the bulk of the card's content.</a></p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
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
</body>

</html>