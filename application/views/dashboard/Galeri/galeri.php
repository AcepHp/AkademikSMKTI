<!DOCTYPE html>
<html>

<head>
    <title>Galeri</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/galeri.css') ?>">
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
                            <a class="nav-link active" href="<?php echo site_url('Galeri/FotoVideo'); ?>">GALERI</a>
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
    <div class="carousel-inner inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url('assets/images/background.png') ?>" class="d-block w-100" alt="...">
            <div class="jdl-utama carousel-caption d-none d-md-block">
                <h1>GALERI FOTO DAN VIDEO</h1>
            </div>
        </div>
    </div>
    <!-- Prestasi -->
    <div class="container-fluid" style="padding: 20px 0 0 0">
        <h1 class="jdl-kepsek text-center mb-5">Prestasi Sekolah</h1>
        <div id="carouselPrestasi" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active mb-5">
                    <div class="row">
                        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Juara 1 Lomba</h4>
                            <img src="<?php echo base_url('assets/images/background.png') ?>" class="img-man d-block">
                        </div>
                    </div>
                </div>
                <div class="carousel-item mb-5">
                    <div class="row">
                        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Juara 1 Lomba</h4>
                            <img src="<?php echo base_url('assets/images/background2.png') ?>" class="img-man d-block">
                        </div>
                    </div>
                </div>
                <div class="carousel-item mb-5">
                    <div class="row">
                        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Juara 1 Lomba</h4>
                            <img src="<?php echo base_url('assets/images/background3.png') ?>" class="img-man d-block">
                        </div>
                    </div>
                </div>
            </div>
            <button class="back carousel-control-prev btn-dark" type="button" data-bs-target="#carouselPrestasi"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="next carousel-control-next btn-dark" type="button" data-bs-target="#carouselPrestasi"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Event Sekolah -->
    <div class="container-fluid">
        <hr class="mb-5">
        <h1 class="jdl-kepsek text-center mb-5">Event Sekolah</h1>
        <div id="carouselEvent" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active mb-5">
                    <div class="row">
                        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">17 Agustus</h4>
                            <img src="<?php echo base_url('assets/images/background.png') ?>" class="img-man d-block">
                        </div>
                    </div>
                </div>
                <div class="carousel-item mb-5">
                    <div class="row">
                        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">17 Agustus</h4>
                            <img src="<?php echo base_url('assets/images/background2.png') ?>" class="img-man d-block">
                        </div>
                    </div>
                </div>
                <div class="carousel-item mb-5">
                    <div class="row">
                        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">17 Agustus</h4>
                            <img src="<?php echo base_url('assets/images/background3.png') ?>" class="img-man d-block">
                        </div>
                    </div>
                </div>
            </div>
            <button class="back carousel-control-prev btn-dark" type="button" data-bs-target="#carouselEvent"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="next carousel-control-next btn-dark" type="button" data-bs-target="#carouselEvent"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Wisuda -->
    <div class="container-fluid">
        <hr class="mb-5">
        <h1 class="jdl-kepsek text-center mb-5">Wisuda Sekolah</h1>
        <div id="carouselWisuda" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active mb-5">
                    <div class="row">
                        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Wisuda Angkatan 2023</h4>
                            <img src="<?php echo base_url('assets/images/background.png') ?>" class="img-man d-block">
                        </div>
                    </div>
                </div>
                <div class="carousel-item mb-5">
                    <div class="row">
                        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Wisuda Angkatan 2023</h4>
                            <img src="<?php echo base_url('assets/images/background2.png') ?>" class="img-man d-block">
                        </div>
                    </div>
                </div>
                <div class="carousel-item mb-5">
                    <div class="row">
                        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
                            <h4 class="jabatan">Wisuda Angkatan 2023</h4>
                            <img src="<?php echo base_url('assets/images/background3.png') ?>" class="img-man d-block">
                        </div>
                    </div>
                </div>
            </div>
            <button class="back carousel-control-prev btn-dark" type="button" data-bs-target="#carouselWisuda"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="next carousel-control-next btn-dark" type="button" data-bs-target="#carouselWisuda"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- GALERI VIDEO -->
    <div class="container-fluid">
        <hr class="mb-5">
        <h1 class="jdl-kepsek text-center mb-5">Video Sekolah</h1>
        <div id="carouselVideo" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active mb-5">
                    <div class="row">
                        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center embed-responsive embed-responsive-16by9">
                            <iframe class="vid embed-responsive-item"
                                src="https://www.youtube.com/embed/u8lwQdnVBB8?si=hq1ScqIBN6bJeVgJ"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="carousel-item mb-5">
                    <div class="row">
                    <div class="col-md-12 d-flex flex-column justify-content-center align-items-center embed-responsive embed-responsive-16by9">
                            <iframe class="vid embed-responsive-item"
                                src="https://www.youtube.com/embed/u8lwQdnVBB8?si=hq1ScqIBN6bJeVgJ"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="carousel-item mb-5">
                    <div class="row">
                    <div class="col-md-12 d-flex flex-column justify-content-center align-items-center embed-responsive embed-responsive-16by9">
                            <iframe class="vid embed-responsive-item"
                                src="https://www.youtube.com/embed/u8lwQdnVBB8?si=hq1ScqIBN6bJeVgJ"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <button class="back carousel-control-prev btn-dark" type="button" data-bs-target="#carouselVideo"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="next carousel-control-next btn-dark" type="button" data-bs-target="#carouselVideo"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <br><br><br>

    <!-- Tambahkan script JavaScript dari Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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