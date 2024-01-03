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
                            <a class="nav-link" aria-current="page" href="<?php echo site_url('#'); ?>">HOME</a>
                        </li>

                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                JURUSAN
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($jurusan2 as $item): ?>
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


    <!-- Tambahkan script JavaScript dari Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <br>
    <!-- Judul -->
    <div class="jppdb container">
        <div class="judul">FORM PPDB TAHUN 2023-2024</div>
        <div class="judul mb-5">SMK TI GARUDA NUSANTARA CIMAHI</div>
    </div>

    <div class="container d-flex flex-column align-items-center mb-5">
        <?php if ($this->session->userdata('success_message')): ?>
        <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
            <div class="d-flex justify-content-between align-items-center">
                <span class="mr-3"><?php echo $this->session->userdata('success_message'); ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <?php $this->session->unset_userdata('success_message'); ?>
        <?php endif; ?>

        <?php if ($this->session->userdata('error_message')): ?>
        <div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
            <div class="d-flex justify-content-between align-items-center">
                <span class="mr-3"><?php echo $this->session->userdata('error_message'); ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <?php $this->session->unset_userdata('error_message'); ?>
        <?php endif; ?>
        <div class="card" style="width: 60%; background-color: #F5F5F5; border: none;">
            <div class="header card-header">Form Pendaftaran</div>

            <!-- form -->
            <form class="form-register" id="mainForm" action="<?php echo base_url('PPDB/simpan_pendaftaran'); ?>"
                method="post" style="padding: 20px;">
                <div class="form-page" id="form1">
                    <div class="container" style="text-align: center;">
                        <div class="col-12">
                            <h2 style="text-align: center;">Data Siswa Pendaftar</h2>
                            <p style="text-align: center;">Isilah data-data berikut:</p>
                        </div>
                    </div>
                    <div class="inner">
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="NISN">NISN</label>
                                <input type="text" class="form-control col-sm-10" id="NISN" name="NISN" required
                                    style="width: 100%" placeholder="Masukkan NISN" maxlength="10"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10);" />
                            </div>
                        </div>
                        <div class="form-row" style="display: flex;">
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1; margin-right: 10px;">
                                <label for="pilihan_satu">Pilihan 1</label>
                                <select class="form-control col-sm-10" id="pilihan_satu" name="pilihan_satu">
                                    <option value="" disabled selected>Pilih jurusan</option>
                                    <?php foreach ($jurusan->result() as $jurusan_item): ?>
                                    <option value="<?php echo $jurusan_item->nama_jurusan; ?>">
                                        <?php echo $jurusan_item->nama_jurusan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1;">
                                <label for="pilihan_dua">Pilihan 2</label>
                                <select class="form-control col-sm-10" id="pilihan_dua" name="pilihan_dua">
                                    <option value="" disabled selected>Pilih jurusan</option>
                                    <?php foreach ($jurusan->result() as $jurusan_item): ?>
                                    <option value="<?php echo $jurusan_item->nama_jurusan; ?>">
                                        <?php echo $jurusan_item->nama_jurusan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="Nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control col-sm-10" id="Nama_lengkap" name="Nama_lengkap"
                                    style="width: 100%;" placeholder="Masukkan Nama Lengkap" required
                                    oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').substring(0, 255);" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="Jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control col-sm-10" id="Jenis_kelamin" name="Jenis_kelamin"
                                    style="width: 100%;">
                                    <option value="" disabled selected>Pilih jenis kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="asal_sekolah">Asal Sekolah</label>
                                <input type="text" class="form-control col-sm-10" id="asal_sekolah" name="asal_sekolah"
                                    style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-row" style="display: flex;">
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1; margin-right: 10px;">
                                <label for="Tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control col-sm-10" id="Tempat_lahir" name="Tempat_lahir"
                                    style="width: 100%;">
                            </div>
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1;">
                                <label for="Tanggal_Lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control col-sm-10" id="Tanggal_Lahir"
                                    name="Tanggal_Lahir" style="width: 100%;">
                                <div id="tanggal-error" style="color: red; display: none;">Tanggal lahir tidak boleh
                                    melebihi hari ini.</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="agama">Agama</label>
                                <select class="form-control col-sm-10" id="agama" name="agama">
                                    <option value="" disabled selected>Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="Alamat">Alamat</label>
                                <input type="text" class="form-control col-sm-10" id="Alamat" name="Alamat"
                                    style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="provinsi">Provinsi :</label>
                                <select name="provinsi" class="form-control" id="provinsi">
                                    <option disabled selected> Pilih Provinsi </option>
                                    <?php foreach($provinsi as $prov) {
                                        echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="kabupaten">Kabupaten :</label>
                                <select name="kabupaten_kota" class="form-control" id="kabupaten">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="kecamatan">Kecamatan :</label>
                                <select name="kecamatan" class="form-control" id="kecamatan">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="desa">Desa :</label>
                                <select name="kelurahan_desa" class="form-control" id="desa">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row" style="display: flex;">
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1; margin-right: 10px;">
                                <label for="rt">RT</label>
                                <input type="text" class="form-control col-sm-10" id="rt" name="rt" style="width: 100%;"
                                    maxlength="2" pattern="[0-9]{2}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1; margin-right: 10px;">
                                <label for="rw">RW</label>
                                <input type="text" class="form-control col-sm-10" id="rw" name="rw" style="width: 100%;"
                                    maxlength="2" pattern="[0-9]{2}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1;">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" class="form-control col-sm-10" id="kode_pos" name="kode_pos"
                                    style="width: 100%;" maxlength="5" pattern="[0-9]{5}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>
                        </div>
                        <div class="form-row" style="display: flex;">
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1; margin-right: 10px;">
                                <label for="nomor_telp">Nomor Telepon</label>
                                <input type="text" class="form-control col-sm-10" id="nomor_telp" name="nomor_telp"
                                    style="width: 100%;" maxlength="13"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                            </div>
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1;">
                                <label for="email">Email</label>
                                <input type="email" class="form-control col-sm-10" id="email" name="email"
                                    style="width: 100%;">
                                <div id="email-error" class="text-danger"
                                    style="display: none; font-size: 14px; margin-top: 5px;"></div>
                            </div>
                        </div>
                        <div class="col-12 mb-4 text-end" style="padding: 0px 30px 0px 0px">
                            <button id="nextButton1" class="btn btn-primary btn-lg"
                                onclick="validateEmail()">Selanjutnya</button>
                        </div>
                    </div>
                </div>

                <div class="form-page" id="form4">
                    <div class="container" style="text-align: center;">
                        <div class="col-12">
                            <h2 style="text-align: center;">Data Orang Tua</h2>
                            <p style="text-align: center;">Isi Data-data dibawah ini jika tinggal bersama Oranga Tua</p>
                        </div>
                    </div>
                    <div class="inner">
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="Nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control col-sm-10" id="Nama_ayah" name="Nama_ayah"
                                    style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-row" style="display: flex;">
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1; margin-right: 10px;">
                                <label for="pendidikan_ayah">Pendidikan Ayah</label>
                                <select class="form-control col-sm-10" id="pendidikan_ayah" name="pendidikan_ayah"
                                    style="width: 100%;">
                                    <option value="" disabled selected>Pilih Pendidikan</option>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Putus SD">Putus SD</option>
                                    <option value="SD Sederajat">SD Sederajat</option>
                                    <option value="SMP Sederajat">SMP Sederajat</option>
                                    <option value="SMA Sederajat">SMA Sederajat</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1;">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <select class="form-control col-sm-10" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                    style="width: 100%;" placeholder>
                                    <option value="" disabled selected>Pilih Pekerjaan</option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Peternak">Peternak</option>
                                    <option value="PNS/TNI/Polri">PNS/TNI/Polri</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="penghasilan_ayah">Penghasilan Bulanan Ayah</label>
                                <select class="form-control col-sm-10" id="penghasilan_ayah" name="penghasilan_ayah"
                                    style="width: 100%;">
                                    <option value="" disabled selected>Pilih Gajih</option>
                                    <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                                    <option value="500.000 - 1 Juta">500.000 - 1 Juta</option>
                                    <option value="1 Juta - 2 Juta">1 Juta - 2 Juta</option>
                                    <option value="2 Juta - 5 Juta">2 Juta - 5 Juta</option>
                                    <option value="5 Juta - 20 Juta">5 Juta - 20 Juta</option>
                                    <option value="Lebih dari 20 Juta">Lebih dari 20 Juta</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="Nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control col-sm-10" id="Nama_ibu" name="Nama_ibu"
                                    style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-row" style="display: flex;">
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1; margin-right: 10px;">
                                <label for="pendidikan_ibu">Pendidikan Ibu</label>
                                <select class="form-control col-sm-10" id="pendidikan_ibu" name="pendidikan_ibu"
                                    style="width: 100%;">
                                    <option value="" disabled selected>Pilih Pendidikan</option>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Putus SD">Putus SD</option>
                                    <option value="SD Sederajat">SD Sederajat</option>
                                    <option value="SMP Sederajat">SMP Sederajat</option>
                                    <option value="SMA Sederajat">SMA Sederajat</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1;">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                <select class="form-control col-sm-10" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                    style="width: 100%;">
                                    <option value="" disabled selected>Pilih Pekerjaan</option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Peternak">Peternak</option>
                                    <option value="PNS/TNI/Polri">PNS/TNI/Polri</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="penghasilan_ibu">Penghasilan Bulanan Ibu</label>
                                <select class="form-control col-sm-10" id="penghasilan_ibu" name="penghasilan_ibu"
                                    style="width: 100%;">
                                    <option value="" disabled selected>Pilih Gajih</option>
                                    <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                                    <option value="500.000 - 1 Juta">500.000 - 1 Juta</option>
                                    <option value="1 Juta - 2 Juta">1 Juta - 2 Juta</option>
                                    <option value="2 Juta - 5 Juta">2 Juta - 5 Juta</option>
                                    <option value="5 Juta - 20 Juta">5 Juta - 20 Juta</option>
                                    <option value="Lebih dari 20 Juta">Lebih dari 20 Juta</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="No_telp_ortu">Nomor Telepon Orang Tua</label>
                                <input type="text" class="form-control col-sm-10" id="No_telp_ortu" name="No_telp_ortu"
                                    style="width: 100%;" maxlength="13" pattern="[0-9]{13}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 mb-4 text-end">
                        <button id="backButton2" class="btn btn-primary btn-lg">Kembali</button>
                        <button id="nextButton2" class="btn btn-primary btn-lg">Selanjutnya</button>
                    </div>
                </div>

                <div class="form-page" id="form3">
                    <div class="container" style="text-align: center;">
                        <div class="col-12">
                            <h2 style="text-align: center;">Data Wali</h2>
                            <p style="text-align: center;">Halaman ini bisa dilewati jika tadi sudah mengisi data orang
                                tua.</p>
                        </div>
                    </div>
                    <div class="inner">
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="Nama_wali">Nama Wali</label>
                                <input type="text" class="form-control col-sm-10" id="Nama_wali" name="Nama_wali"
                                    style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-row" style="display: flex;">
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1; margin-right: 10px;">
                                <label for="pendidikan_wali">Pendidikan Wali</label>
                                <select class="form-control col-sm-10" id="pendidikan_wali" name="pendidikan_wali"
                                    style="width: 100%;">
                                    <option value="" disabled selected>Pilih Pendidikan</option>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Putus SD">Putus SD</option>
                                    <option value="SD Sederajat">SD Sederajat</option>
                                    <option value="SMP Sederajat">SMP Sederajat</option>
                                    <option value="SMA Sederajat">SMA Sederajat</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1;">
                                <label for="pekerjaan Wali">Pekerjaan Wali</label>
                                <select class="form-control col-sm-10" id="pekerjaan Wali" name="pekerjaan Wali"
                                    style="width: 100%;">
                                    <option value="" disabled selected>Pilih Pekerjaan</option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Peternak">Peternak</option>
                                    <option value="PNS/TNI/Polri">PNS/TNI/Polri</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="penghasilan_wali">Penghasilan Bulanan Wali</label>
                                <select class="form-control col-sm-10" id="penghasilan_wali" name="penghasilan_wali"
                                    style="width: 100%;">
                                    <option value="" disabled selected>Pilih Gajih</option>
                                    <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                                    <option value="500.000 - 1 Juta">500.000 - 1 Juta</option>
                                    <option value="1 Juta - 2 Juta">1 Juta - 2 Juta</option>
                                    <option value="2 Juta - 5 Juta">2 Juta - 5 Juta</option>
                                    <option value="5 Juta - 20 Juta">5 Juta - 20 Juta</option>
                                    <option value="Lebih dari 20 Juta">Lebih dari 20 Juta</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="No_telp_wali">Nomor Telepon Wali</label>
                                <input type="text" class="form-control col-sm-10" id="No_telp_wali" name="No_telp_wali"
                                    style="width: 100%;" maxlength="13" pattern="[0-9]{13}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4 text-end">
                        <button id="backButton3" class="btn btn-primary btn-lg">Kembali</button>
                        <button id="nextButton3" class="btn btn-primary btn-lg">Selanjutnya</button>
                    </div>
                </div>
                <div class="form-page" id="form4">
                    <div class="inner">
                        <div class="container" style="text-align: center;">
                            <div class="col-12">
                                <h2 style="text-align: center;">Data Rinci</h2>
                                <p style="text-align: center;">Isilah data-data berikut:</p>
                            </div>
                        </div>
                        <div class="form-row" style="display: flex;">
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1; margin-right: 10px;">
                                <label for="jarak_tempuh">Jarak Rumah Ke Sekolah *km</label>
                                <input type="text" class="form-control col-sm-10" id="jarak_tempuh" name="jarak_tempuh"
                                    style="width: 100%;">
                            </div>
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1;">
                                <label for="waktu_tempuh">Waktu Tempuh *Menit</label>
                                <input type="text" class="form-control col-sm-10" id="waktu_tempuh" name="waktu_tempuh"
                                    style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-row" style="display: flex;">
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1; margin-right: 10px;">
                                <label for="tb">Tinggi Badan</label>
                                <input type="text" class="form-control col-sm-10" id="tb" name="tb"
                                    style="width: 100%;">
                            </div>
                            <div class="form-holder form-holder-2 col-12 mb-3" style="flex: 1;">
                                <label for="bb">Berat Badan</label>
                                <input type="text" class="form-control col-sm-10" id="bb" name="bb"
                                    style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="jumlah_saudara">Jumlah Saudara Kandung</label>
                                <input type="text" class="form-control col-sm-10" id="jumlah_saudara"
                                    name="jumlah_saudara" style="width: 100%;">
                            </div>
                        </div>
                        <!-- <div class="form-row">
                            <div class="form-holder form-holder-2 col-12 mb-3">
                                <label for="Tahun_akademik">Tahun Akademik</label>
                                <input type="text" class="form-control col-sm-10" id="Tahun_akademik"
                                    name="Tahun_akademik" style="width: 100%;">
                            </div>
                        </div> -->
                    </div>
                    <div class="col-12 mb-4 text-end">
                        <button id="backButton4" class="btn btn-primary btn-lg">Kembali</button>
                        <button id="submitButton" type="submit" class="btn btn-primary btn-lg"
                            value="Submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?=base_url('assets/')?>js/demo/chart-area-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const tanggalLahirInput = document.getElementById("Tanggal_Lahir");
        const tanggalError = document.getElementById("tanggal-error");

        function validateDate() {
            // Parse the selected date and today's date
            const selectedDate = new Date(tanggalLahirInput.value);
            const today = new Date();

            // Check if the selected date is greater than today
            if (selectedDate > today) {
                tanggalError.style.display = "block";
            } else {
                // Hide the error message if the date is valid
                tanggalError.style.display = "none";
            }
        }

        function showErrorMessage() {
            const today = new Date();
            const selectedDate = new Date(tanggalLahirInput.value);

            // Check if the selected date is today
            if (
                selectedDate.getDate() === today.getDate() &&
                selectedDate.getMonth() === today.getMonth() &&
                selectedDate.getFullYear() === today.getFullYear()
            ) {
                tanggalError.style.display = "block";
            }
        }

        tanggalLahirInput.addEventListener("input", function() {
            validateDate();
            showErrorMessage();
        });
    });
    </script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const emailInput = document.getElementById("email");
        const emailError = document.getElementById("email-error");

        emailInput.addEventListener("input", function() {
            if (!isValidEmail(emailInput.value)) {
                emailError.style.display = "block";
                emailError.textContent = "Email tidak valid.";
            } else {
                emailError.style.display = "none";
                emailError.textContent = "";
            }
        });

        function isValidEmail(email) {
            // Implementasi validasi email sesuai kebutuhan Anda.
            // Berikut adalah contoh validasi sederhana:
            const emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
            return emailRegex.test(email);
        }
    });
    </script>


    <script>
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var url = "<?php echo site_url('PPDB/add_ajax_kab');?>/" + $(this).val();
            $('#kabupaten').load(url);
            return false;
        });

        $("#kabupaten").change(function() {
            var url = "<?php echo site_url('PPDB/add_ajax_kec');?>/" + $(this).val();
            $('#kecamatan').load(url);
            return false;
        });

        $("#kecamatan").change(function() {
            var url = "<?php echo site_url('PPDB/add_ajax_des');?>/" + $(this).val();
            $('#desa').load(url);
            return false;
        });
    });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('.form-page');
        const nextButtons = document.querySelectorAll('[id^=nextButton]');
        const backButtons = document.querySelectorAll('[id^=backButton]');
        let currentForm = 0;

        // Sembunyikan semua formulir selain yang pertama
        for (let i = 1; i < forms.length; i++) {
            forms[i].style.display = 'none';
        }

        // Tombol Selanjutnya
        nextButtons.forEach((nextButton, index) => {
            nextButton.addEventListener('click', function(event) {
                event.preventDefault();
                if (currentForm < forms.length - 1) {
                    forms[currentForm].style.display = 'none';
                    currentForm++;
                    forms[currentForm].style.display = 'block';

                    // Gulir halaman ke atas
                    window.scrollTo({
                        top: 220,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Tombol Kembali
        backButtons.forEach((backButton, index) => {
            backButton.addEventListener('click', function(event) {
                event.preventDefault();
                if (currentForm > 0) {
                    forms[currentForm].style.display = 'none';
                    currentForm--;
                    forms[currentForm].style.display = 'block';

                    // Gulir halaman ke atas
                    window.scrollTo({
                        top: 220,
                        behavior: 'smooth'
                    });
                }
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
                <div class="icon-1 col text-end">
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