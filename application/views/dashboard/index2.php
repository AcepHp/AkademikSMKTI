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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/popup.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="z-index:1">
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
                    <h5 class="animate__animated animate__bounceInRight" style="animation-delay:0.5s">
                        <?php echo $row->deskripsi ?></h5>
                    <!-- <p class="animate__animated animate__bounceInLeft d-none d-md-block" style="animation-delay:0.5s">
                        Selamat Datang di SMK-TI Garuda Nusantara Cimahi.
                        SMK-TI Garuda Nusantara merupakan salah satu sekolah terbesar di Kota Cimahi</p> -->
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
    <div id="myModal" class="myModal" data-auto-open="true">
        <div class="modal-content">
            <div class="row">
                <span class="close text-center" id="closeModalBtn">
                    <h6 style="font-size: 30px">&times;</h6>
                </span>
            </div>
            <div class="row text-center" style="display: flex; align-items: center">
                <div class="col" style="width: max-content">
                    <div class="popupBox__img">
                        <img src="<?php echo base_url('assets/images/logo.png')?>" alt="Image">
                    </div>
                </div>
                <div class="col py-3">
                    <h2 class="judul"><?php echo $row->judul; ?></h2>
                    <p class="isi"><?php echo $row->isi; ?></p>
                    <a href="<?php echo site_url('PPDB/form'); ?>"><button class="modal-button">Daftar
                            Sekarang</button></a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>

    <?php if (!$dataFound) : ?>
    <?php endif; ?>


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
    <div class="container text-center mt-5">
        <div class="VMT row">
            <div class="col-6 p-0">
                <div class="Visi card">
                    <div class="card-body">
                        <h2 class="jdl-1 card-title">Visi</h2>
                        <p style="text-align: justify;" <?php echo $vmt->visi;?></p>
                    </div>
                </div>
            </div>
            <div class="col-6 p-0">
                <div class="Misi card">
                    <div class="card-body">
                        <h2 class="jdl-2 card-title">Misi</h2>
                        <p style="text-align: justify;" <?php echo $vmt->misi;?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 g-0">
                <div class="Tujuan card mb-5">
                    <div class="card-body">
                        <h2 class="jdl-3 card-title">Tujuan</h2>
                        <div style="text-align: justify;">
                            <?php echo $vmt->tujuan;?>
                        </div>
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
                    <img class="Foto" style="height:60%; width:60%" src="<?php echo $kepsek->gambar?>">
                    <h4 class="card-title"><?php echo $kepsek->nama?></h4>
                </div>
            </div>
            <div class="col-md-8 g-0">
                <div class="kanan card mb-5">
                    <div class="sambutan card-body">
                        <p class="card-text">Asalamualikum warahmatullahi wabarakatuh<br>
                            <?php echo $kepsek->deskripsi?>
                            <br> Wassalamualaikum Wr. Wb.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Post -->
    <div class="container">
        <div class="row berita">
            <div class="col-md-6 p-0 text-center">
                <h1 class="jdl-berita card-title mb-3">Post Terbaru</h1>
                <div class="post card align-items-center">
                    <hr>
                    <?php $counter = 0; $beritaterbaru=array_reverse($berita->result());?>
                    <?php foreach ($beritaterbaru as $row) : ?>
                    <?php if ($counter < 2) : ?>
                    <div class="card mb-5" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="gambar col-md-4">
                                <img src="assets/images/background.png" class="card-img" alt="...">
                            </div>
                            <div class="text col-md-8">
                                <div class="card-body">
                                    <a href="<?php echo site_url('Berita/isi'); ?>">
                                        <h5 class="card-title"><?php echo $row->judul ?></h5>
                                    </a>
                                    <p class="card-text"><?php echo substr($row->deskripsi, 0,100) ?>...</p>
                                    <p class="card-text"><small class="text-muted"><?php echo $row->created ?></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php $counter++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-6 g-0 text-center">
                <h1 class="jdl-berita card-title mb-3">Acara Akan Datang</h1>
                <div class="acara card mb-5 align-items-center">
                    <hr>
                    <?php $counter = 0; $acaraterbaru=array_reverse($acara->result());?>
                    <?php foreach ($acaraterbaru as $row) : ?>
                    <?php if ($counter < 3) : ?>
                    <div class="txt card mb-5" style="max-width: 540px;">
                        <div class="card-header bg-warning">
                            <h4><?php echo $row->judul ?></h4>
                        </div>
                        <ul class="judul list-group list-group-flush">
                            <li class="list-group-item">
                                <p class="card-text"><?php echo substr($row->deskripsi, 0,100) ?>...</p>
                                <div class="tgl">
                                    <p class="card-text"><small class="text-muted"><?php echo $row->tanggal ?></small>
                                    </p>
                                    <p class="card-text"><small class="text-muted">|</small></p>
                                    <p class="card-text"><small
                                            class="text-muted"><?php echo $row->waktu_mulai ?>-<?php echo $row->tanggal ?></small>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php $counter++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="video col-md-12 mb-5">
            <h1 class="jdl-berita">Video Sekolah</h1>
            <hr>
            <div class="embed-responsive embed-responsive-32by3">
                <?php $counter = 0; $videoterbaru=array_reverse($video->result());?>
                <?php foreach ($videoterbaru as $row) : ?>
                <?php if ($counter < 1) : ?>
                <?php
                         // Mendapatkan ID video YouTube dari URL yang disimpan dalam database
                         $video_id = $this->Video_Model->get_youtube_video_id($row->url);
                        // Menampilkan video YouTube menggunakan iframe jika video_id ditemukan
                         if (!empty($video_id)) {
                            echo '<div class="embed-responsive embed-responsive-16by9">';
                            echo '<iframe width="1100" height="620" class="embed-responsive-item" src="https://www.youtube.com/embed/' . $video_id . '" allowfullscreen></iframe>';
                            echo '</div>';
                        } else {
                            echo 'Video tidak valid';
                        }
                        ?>
                <?php endif; ?>
                <?php $counter++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="container">
        <h1 class="jdl-kepsek mb-4">MANAJEMEN SEKOLAH</h1>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <?php $manajementerbaru = array_reverse($manajemen->result()); ?>
                <?php $totalItems = count($manajementerbaru); ?>
                <?php $itemsPerPage = 4; ?>
                <?php for ($i = 0; $i < $totalItems; $i += $itemsPerPage) : ?>
                <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?> mb-5">
                    <div class="row">
                        <div class="col">
                            <button class="back carousel-control-prev btn-dark" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                        </div>

                        <?php for ($j = $i; $j < $i + $itemsPerPage; $j++) : ?>
                        <?php if ($j < $totalItems) : ?>
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center p-3"
                            style="width: max-content">
                            <div class="row">
                                <img src="<?php echo $manajementerbaru[$j]->gambar; ?>" class="img-man d-block p-3">
                            </div>
                            <div class="row">
                                <h4 class="jabatan"><?php echo $manajementerbaru[$j]->jabatan; ?></h4>
                            </div>
                            <div class="row nama">
                                <p><?php echo $manajementerbaru[$j]->nama; ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endfor; ?>

                        <div class="col">
                            <button class="next carousel-control-next btn-dark" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            <!-- <button class="back carousel-control-prev btn-dark" type="button" data-bs-target="#carouselExample"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button> -->
            <!-- <button class="next carousel-control-next btn-dark" type="button" data-bs-target="#carouselExample"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> -->
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
    document.addEventListener("DOMContentLoaded", function() {
        var modal = document.getElementById("myModal");
        var overlay = document.createElement("div");
        overlay.className = "overlay";

        var autoOpen = modal.getAttribute("data-auto-open");

        if (autoOpen === "true") {
            modal.style.display = "block";
            overlay.style.display = "block";
        }

        var closeModalBtn = document.getElementById("closeModalBtn");
        if (closeModalBtn) {
            closeModalBtn.addEventListener("click", function() {
                modal.style.display = "none";
                overlay.style.display = "none";
            });
        }

        // Menambahkan overlay ke dalam elemen body
        document.body.appendChild(overlay);
    });
    </script>


</body>

</html>