<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <!-- Tambahkan link CSS dari Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

    .inner {
        position: relative;
        width: 100%;
        max-height: calc(50vh - 120px);
        /* Adjust this value to account for navbar and other elements */
    }

    .inner img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .Sambutan {
        width: 630px;
        left: -30px;
        top: 100px;
        text-align: justify;
        color: black;
        font-size: 16px;
        font-weight: 400;
    }

    .Foto img {
        height: 400px;
        width: 400px;
        margin-left: 200px;
    }


    .rectangle_fakta {
        width: 100%;
        height: 350px;
        background-color: #FDC800;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .fakta {
        font-size: 48px;
        font-family: Montserrat;
        text-align: center;
        margin: auto;
        position: absolute;
        top: 30%;
        transform: translateY(-50%);
    }

    .isifakta {
        font-size: 24px;
        font-family: Montserrat;
        text-align: center;
        margin: auto;
        position: absolute;
        top: 60%;
        transform: translateY(-50%);
    }

    /* Style for the rectangle container */
    .rectangle_an {
        width: 100%;
        height: 350px;
        /* You can adjust the height as needed */
        background-color: black;
        /* Example background color */
        display: flex;
        align-items: center;
        position: relative;
        align-self: flex-end;
    }

    .bungkusitem1 {
        justify-content: space-between;
        margin-left: 120px;
        display: flex;
        /* Mengatur item di dalam menjadi flexbox */
        align-items: center;
        /* Mengatur item di tengah secara vertikal */
        margin-right: 20px;
        /* Menambahkan jarak di samping item */
    }

    /* Style for the content inside the rectangle */
    .tahunberdiri {
        text-align: center;
        position: relative;
    }

    /* Style for the angka */
    .angka {
        font-size: 32px;
        font-family: Montserrat;
        color: #FDC800;
        margin-bottom: 5px;
        /* Add some space between angka and isiangka */
    }

    /* Style for the isiangka */
    .isiangka {
        font-size: 24px;
        font-family: Montserrat;
        color: #fff;
        /* Text color */
        margin-top: 5px;
        /* Add some space between isiangka and angka */
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

    <!-- Tambahkan script JavaScript dari Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div class="carousel-inner inner">
        <div class="jurusan carousel-caption">
            <h1><?php echo $info->judul ?></h1>
        </div>
        <div class="carousel-item active">
            <img src="<?php echo base_url ('assets/images/background.png') ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
    </div>

    <!-- Kepsek -->
    <main class="container-fluid" style="padding: 8rem;">
        <div class="row">
            <div class="col-md-6 py-3">
                <div class="row g-3">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="Sambutan">
                                Asalamualikum warahmatullahi wabarakatuh<br><br>
                                <?php echo $info->deskripsi ?><br><br>
                                Wassalamualaikum Wr. Wb.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 py-3">
                <div class="Foto">
                    <img src="<?php echo $info->gambar ?>" class="rounded float-end img-fluid" alt="...">
                </div>
            </div>
        </div>
    </main>



    <br><br>

    <div class="rectangle_fakta">
        <h1 class="fakta">Fakta SMK TI Garnus</h1>
        <p class="isifakta">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie nunc nec eros varius pharetra. <br>
            Vivamus pharetra efficitur orci, at suscipit mauris gravida dignissim.
        </p>
    </div>

    <div class="rectangle_an">
        <div class="bungkusitem1">
            <div class="tahunberdiri">
                <h5 class="angka">2009</h5>
                <p class="isiangka">Tahun Berdiri</p>
            </div>
        </div>
        <div class="bungkusitem1">
            <div class="tahunberdiri">
                <h5 class="angka">2009</h5>
                <p class="isiangka">Siswa</p>
            </div>
        </div>
        <div class="bungkusitem1">
            <div class="tahunberdiri">
                <h5 class="angka">2009</h5>
                <p class="isiangka">Guru & Staff TU</p>
            </div>
        </div>
        <div class="bungkusitem1">
            <div class="tahunberdiri">
                <h5 class="angka">2009</h5>
                <p class="isiangka">Ruangan</p>
            </div>
        </div>
        <div class="bungkusitem1">
            <div class="tahunberdiri">
                <h5 class="angka">2009</h5>
                <p class="isiangka">Kompetensi Keahlian</p>
            </div>
        </div>
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


</body>

</html>