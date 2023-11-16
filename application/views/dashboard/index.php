<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <!-- Tambahkan link CSS dari Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="images/x-icon">

    <!-- Tambahkan CSS khusus untuk tata letak -->
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        /* Use Poppins as the default font for the entire page */
    }

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

    .container-fluid {
        padding: 0;
    }

    .inner {
        position: relative;
        width: 100%;
        max-height: calc(100vh - 120px);
        /* Adjust this value to account for navbar and other elements */
    }

    .inner img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .prev,
    .next {
        width: auto;
        cursor: pointer;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
    }

    .prev {

        left: 20px;
    }

    .next {
        right: 20px;
    }


    /*==================
        SERVICE SECTION 3 AREA
        ====================*/
    #mu-service {
        display: inline;
        float: left;
        margin-top: -80px;
        width: 100%;

        .mu-service-area {
            display: inline;
            float: left;
            width: 100%;

            .mu-service-single {
                background-color: #002147;
                color: #fff;
                display: inline;
                float: left;
                padding: 35px 25px;
                text-align: center;
                width: 33.33%;

                &:nth-child(2) {
                    background-color: #032E5F;
                }

                &:nth-child(3) {
                    background-color: #013876;
                }

                span {
                    font-size: 30px;
                }

                h3 {
                    font-size: 25px;
                    padding: 35px 25px;
                    width: 100%;
                }

                p {
                    font-weight: lighter;

                }
            }
        }
    }

    img {

        float: left;
    }

    .Visi,
    .Misi,
    .Tujuan {
        font-family: Montserrat;
        font-size: 40px;
        margin-top: center;
    }

    h1 {
        text-align: center;
    }

    .bg1 {
        background-color: #032E5F;
        border-radius: 0;
    }

    .bg {
        background-color: #002147;
        border-radius: 0;
    }

    .bg2 {
        background-color: #013876;
        border-radius: 0;
    }


    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .KepalaSekolah {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .KepalaSekolahText {
        left: 295px;
        top: 0px;
        position: absolute;
        color: black;
        font-size: 64px;
        font-family: Montserrat;
        font-weight: 400;
        word-wrap: break-word;
    }

    .Rectangle {
        position: relative;
        border-radius: 28px;
        width: 1100px;
        height: 550px;
        left: -20px;
        top: 98px;
        background: #FDC800;
    }

    .Rectangle1 {
        position: absolute;
        border-radius: 28px;
        width: 290px;
        height: 400px;
        left: 20px;
        top: 125px;
        background: #013876;
    }

    .Rectangle2 {
        position: absolute;
        border-radius: 28px;
        width: 670px;
        height: 500px;
        left: 380px;
        top: 123px;
        background: #013876;
    }

    .RidoAmaludinToyibST {
        left: 73px;
        top: 590px;
        position: absolute;
        color: black;
        font-size: 20px;
        font-family: Poppins;
        font-weight: 400;
        word-wrap: break-word;
    }

    .Sambutan {
        width: 630px;
        left: 401px;
        top: 160px;
        position: absolute;
        text-align: justify;
        color: white;
        font-size: 13px;
        font-family: Poppins;
        font-weight: 400;
        word-wrap: break-word;
    }

    .Foto {
        width: 290px;
        height: 400px;
        left: 50px;
        top: 160px;
        position: absolute;
        border-radius: 36px;
    }

    .item {
        margin: 0 -5.5px;
        left: 5px;
    }

    .item2 {
        margin: 0 -15px;
        left: -20px;
    }

    .bgberita {
        background: #F0F0F0;
        height: 1800px;
    }

    .full-screen-rectangle {
        width: 100%;
        /* Lebar 100% dari viewport */
        height: 90rem;
        /* Tinggi 100% dari viewport */
        background-color: #F0F0F0;
        /* Warna background */
    }

    .text-container {
        text-align: center;
        position: relative;
    }

    .text1 {
        font-size: 32px;
        position: relative;
        top: 100px;
        color: #000000;
        left: -400px;
    }

    .text2 {
        font-size: 32px;
        position: relative;
        top: 100px;
        color: #000000;
        left: 120px;
    }

    .line {
        width: 40%;
        height: 5px;
        background: #002147;
        position: relative;
        margin-top: 110px;
        margin-left: 103px;
    }

    .line1 {
        width: 40%;
        height: 5px;
        background: #002147;
        margin-top: -5px;
        margin-left: 825px;
    }

    .berita {
        margin-top: 50px;
        margin-left: 103px;
    }

    .acara {
        margin-top: -205px;
        margin-left: 825px;
    }

    .text-vid {
        width: 40%;
        height: 5px;
        color: #000000;
        font-size: 32px;
    }

    .line2 {
        width: 90%;
        height: 5px;
        background: #002147;
        margin-top: 10px;
        margin-left: 90px;
    }

    .vid {
        width: 1100px;
        height: 550px;
        margin-top: 30px;
        margin-left: 300px;
    }

    .Sekolah {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .Man-SekolahText {
        left: .Man 200px;
        top: 0px;
        position: relative;
        color: black;
        font-size: 64px;
        font-family: Montserrat;
        font-weight: 400;
        word-wrap: break-word;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        margin: 80px;
        align-items: center;
        grid-gap: 60px;
    }

    .grid>article {
        border-radius: 30px;
        text-align: center;
        transition: transform;
    }

    @media (max-width:1000px) {
        .grid {
            grid-template-columns: repeat(2.1fr);
        }
    }

    @media (max-width:800px) {
        .grid {
            grid-template-columns: repeat(1.1fr);
        }
    }

    .img-man {
        width: 254px;
        height: 381px;
        border-radius: 28px;
    }

    .prev-man,
    .next-man {
        width: 35px;
        height: 35px;
        background-size: 20px;
        background-color: black;
        border-radius: 50%;
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

    .fa-google {
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

    /* Style modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.7);
    }

    /* Style konten modal */
    .modal-content {
        background-color: #f4f4f4;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #ccc;
        width: 60%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        text-align: center;
        position: relative;
        /* Menambahkan properti ini */
    }

    /* Judul modal */
    .modal-content h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }

    /* Isi modal */
    .modal-content p {
        font-size: 16px;
        color: #555;
    }

    /* Tombol untuk menutup modal (diubah menjadi kanan) */
    .close {
        color: #aaa;
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #333;
        text-decoration: none;
    }

    /* Button modal */
    .modal-button {
        background-color: #008CBA;
        color: #fff;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 18px;
        margin-top: 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Hover state untuk tombol modal */
    .modal-button:hover {
        background-color: #007aa7;
    }
    </style>
</head>

<body>
    <!-- Navbar menggunakan Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
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
                        <a class="nav-link" href="<?php echo base_url('Berita/index'); ?>">BERITA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('Galeri/FotoVideo'); ?>">GALERI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('PPDB/index'); ?>">PPDB</a>
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

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner inner">
            <?php $first = true; foreach ($slide->result() as $row) :?>
            <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                <img src="<?php echo $row->gambar ?>" class="d-block w-100" alt="...">
            </div>
            <?php $first = false; endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- Tambahkan script JavaScript dari Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    // Function for the previous slide
    function prevSlide() {
        let slides = document.getElementsByClassName("slide");
        slideIndex--;
        if (slideIndex < 1) {
            slideIndex = slides.length;
        }
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }

    // Function for the next slide
    function nextSlide() {
        let slides = document.getElementsByClassName("slide");
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }
    </script>

    <!-- 3 section -->
    <section id="mu-service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="mu-service-area">
                        <?php $counter = 0; $infoterbaru=array_reverse($info->result());?>
                        <?php foreach ($infoterbaru as $row) : ?>
                        <?php if ($counter < 3) : ?>
                        <div class="mu-service-single">
                            <span class="fa fa-book"></span>
                            <h3><?php echo $row->judul ?></h3>
                        </div>
                        <?php endif; ?>
                        <?php $counter++; ?>
                        <?php endforeach; ?>
                        <div>
                            <div class="box row">
                                <?php $counter = 0; $infoterbaru=array_reverse($info->result());?>
                                <?php foreach ($infoterbaru as $row) : ?> 
                                <?php if ($counter < 3) : ?>
                                <div class="item col-md-4 mb-5">
                                    <div class="info card" style="width: 371px;">
                                        <img src="<?php echo $row->gambar ?>" alt="img"
                                            style="height: 200px; width: 100%;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row->judul ?></h5>
                                            <p class="card-text"><?php echo substr($row->deskripsi, 0,100) ?>...</p>
                                            <a href="<?php echo site_url('K_Konten/detailinfo/'.$row->id_info); ?>"
                                                class="btn btn-primary">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php $counter++; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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


    <!-- Visi Misi Tujuan -->
    <?php $index = 0; foreach ($vmt->result() as $row) : ?>
    <?php if ($index === 0) : ?>
    <div class="bg1 card text-white text-center float-right" style="width: 50%; height: 100px;">
        <?php elseif ($index === 1) : ?>
    <div class="bg card text-white text-center" style="width: 50%; height: 100px;">
        <?php elseif ($index === 2) : ?>
    <div class="bg2 card text-white text-center" style="width: 100%; height: 100px;">
        <?php endif; ?>
            <h3 class="Misi"><?php echo $row->judul; ?></h3>
            <p><?php echo $row->deskripsi; ?></p>
    </div>
            <?php $index++; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <br><br><br>
    <br><br><br>

    <!-- Kepsek -->
    <div class="container">
        <div class="KepalaSekolah">
            <div class="KepalaSekolahText">KEPALA SEKOLAH</div>
            <div class="Rectangle"></div>
            <div class="RidoAmaludinToyibST">Rido Amaludin Toyib, S.T.</div>
            <div class="Rectangle1"></div>
            <div class="Rectangle2"></div>
            <div class="Sambutan">
                Asalamualikum warahmatullahi wabarakatuh<br>

                <br> Pergeseran era revolusi industri 4.0 ke society 5.0 semakin memantapkan eksistensi
                teknologi
                digital bagi kemaslahatan umat manusia. Era society 5.0 menitikberatkan optimalisasi teknologi
                digital bagi kenyamanan hidup manusia Kebutuhan tenaga kerja dalam industri digital di era
                industri 4.0
                dan society 5.0 ini tentu akansemakin banyak, tidak hanya di bursa tenaga kerja domestik namun
                juga regional
                bahkan internasional.
                <br>
                SMK TI Garuda Nusantara Cimahi memiliki pilihan jurusan yang sangat relevan dengan kebutuhan
                tenaga kerja saat ini dan masa depan, dengan cakupan bidang profesi sebagai berikut: <br>
                1. Bidang Telekomunikasi, jurusan yang dapat dipilih, Teknik Jaringan Akses Telekomunikasi
                (TJAT) <br>
                2. Bidang Multimedia, jurusan yang dapat dipilih, Animasi atau Multimedia <br>
                3. Bidang Teknologi Informasi, jurusan yang dapat dipilih, Rekayasa Perangkat Lunak (RPL) atau
                Teknik Komputer Jaringan (TKJ) <br>
                4. Bidang Administrasi Perkantoran, jurusan yang dapat dipilih, Otomatisasi Tata Kelola
                Perkantoran(OTKP) <br>
                Para peserta didik pada jurusan-jurusan tersebut digembleng untuk beradaptasi dengan kemajuan
                teknologi,
                sehingga ketika lulus sekolah diharapkan mereka siap menghadapi dunia kerja di era society 5.0
                ini. <br>

                <br> Wassalamualaikum Wr. Wb.
            </div>
            <img class="Foto" src="https://via.placeholder.com/400x290" alt="Foto Kepala Sekolah">
        </div>
    </div>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>

    <!-- Postingan -->
    <div class="full-screen-rectangle">
        <div class="text-container">
            <span class="text1">Post Terbaru</span>
            <span class="text2">Acara Akan Datang</span>
        </div>
        <div class="line"></div>
        <div class="line1"></div>

        <div class="berita card mb-3" style="max-width: 605px;">
            <div class="row g-2">
                <div class="col-md-2">
                    <img src="" class="gberita1" alt="img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Upacara Pembukaan MPLS Peserta Didik Baru Tahun 2023 - 2024 SMK
                            TI GARUDA
                            NUSANTARA</h5>
                        <p class="card-text"><small class="text-muted">Rabu, 19 Jul 2023 | oleh SMK TI
                                DevTeam</small>
                        </p>
                        <p class="card-text">Kegiatan MPLS Tahun 2023 - 2024 SMK TI GARUDA NUSANTARA Kegiatan
                            diikuti
                            oleh siswa-siswi baru.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="acara card col-md-6 mb-3" style="max-width: 605px;">
            <div class="row g-2">
                <div class="col-md-2">
                    <img src="" class="gberita1" alt="img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural
                            lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="berita card mb-3" style="max-width: 605px;">
            <div class="row g-2">
                <div class="col-md-2">
                    <img src="" class="gberita1" alt="img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Upacara Pembukaan MPLS Peserta Didik Baru Tahun 2023 - 2024 SMK
                            TI GARUDA
                            NUSANTARA</h5>
                        <p class="card-text"><small class="text-muted">Rabu, 19 Jul 2023 | oleh SMK TI
                                DevTeam</small>
                        </p>
                        <p class="card-text">Kegiatan MPLS Tahun 2023 - 2024 SMK TI GARUDA NUSANTARA Kegiatan
                            diikuti
                            oleh siswa-siswi baru.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="acara card col-md-6 mb-5" style="max-width: 605px;">
            <div class="row g-2">
                <div class="col-md-2">
                    <img src="" class="gberita1" alt="img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural
                            lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-container">
            <span class="text-vid">Video Sekolah</span>
        </div>
        <div class="line2"></div>
        <!-- <img style="width: 1037px; height: 477px" src="https://via.placeholder.com/1037x477" /> -->
        <div class="vid embed-responsive embed-responsive-16by9">
            <iframe autoplay loop class="embed-responsive-item" src="assets/gif.mp4"></iframe>
        </div>
    </div>

    <!-- manajemen sekolah -->
    <div class="container">
        <div class="Man-Sekolah mb-5">
            <div class="Man-SekolahText">MANAJEMEN SEKOLAH</div>
        </div>
    </div>
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <main class="grid">
                        <article>
                            <h4>Pembina Yayasan</h4>
                            <img class="img-man" src="assets/images/background.png">
                            <div class="manajemen">
                                <p>RidoAmaludinToyibST</p>
                            </div>
                        </article>
                        <article>
                            <h4>Kepala Sekolah</h4>
                            <img class="img-man" src="assets/images/background.png">
                            <div class="manajemen">
                                <p>RidoAmaludinToyibST</p>
                            </div>
                        </article>
                        <article>
                            <h4>Wakasek Kurikulum</h4>
                            <img class="img-man" src="assets/images/background.png">
                            <div class="manajemen">
                                <p>RidoAmaludinToyibST</p>
                            </div>
                        </article>
                        <article>
                            <h4>Wakasek Hubin</h4>
                            <img class="img-man" src="assets/images/background.png">
                            <div class="manajemen">
                                <p>RidoAmaludinToyibST</p>
                            </div>
                        </article>
                    </main>
                </div>
            </div>
            <div class="carousel-item" data-interval="2000">
                <div class="container">
                    <main class="grid">
                        <article>
                            <h4>Pembina Yayasan</h4>
                            <img class="img-man" src="assets/images/background2.png">
                            <div class="manajemen">
                                <p>RidoAmaludinToyibST</p>
                            </div>
                        </article>
                        <article>
                            <h4>Kepala Sekolah</h4>
                            <img class="img-man" src="assets/images/background2.png">
                            <div class="manajemen">
                                <p>RidoAmaludinToyibST</p>
                            </div>
                        </article>
                        <article>
                            <h4>Wakasek Kurikulum</h4>
                            <img class="img-man" src="assets/images/background2.png">
                            <div class="manajemen">
                                <p>RidoAmaludinToyibST</p>
                            </div>
                        </article>
                        <article>
                            <h4>Wakasek Hubin</h4>
                            <img class="img-man" src="assets/images/background2.png">
                            <div class="manajemen">
                                <p>RidoAmaludinToyibST</p>
                            </div>
                        </article>
                    </main>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <main class="grid">
                        <article>
                            <h4>Pembina Yayasan</h4>
                            <img class="img-man" src="assets/images/background3.png">
                            <div class="manajemen">
                                <p>RidoAmaludinToyibST</p>
                            </div>
                        </article>
                        <article>
                            <h4>Kepala Sekolah</h4>
                            <img class="img-man" src="assets/images/background3.png">
                            <div class="manajemen">
                                <p>RidoAmaludinToyibST</p>
                            </div>
                        </article>
                        <article>
                            <h4>Wakasek Kurikulum</h4>
                            <img class="img-man" src="assets/images/background3.png">
                            <div class="manajemen">
                                <p>RidoAmaludinToyibST</p>
                            </div>
                        </article>
                        <article>
                            <h4>Wakasek Hubin</h4>
                            <img class="img-man" src="assets/images/background3.png">
                            <div class="manajemen">
                                <p>RidoAmaludinToyibST</p>
                            </div>
                        </article>
                    </main>
                </div>
            </div>
        </div>

        <!-- button -->
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <span class="prev-man carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <span class="next-man carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

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
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-instagram"></a>
        <a href="#" class="fa fa-google"></a>

        <!-- Copyright -->
        <div class="foot-2 text-center p-3">
            © 2020 Copyright:
        </div>
        <!-- Copyright -->
    </footer>
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