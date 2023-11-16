<!DOCTYPE html>
<html>

<head>
    <title>Forum Diskusi</title>
    <!-- Tambahkan link CSS dari Bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/siswa_dashboard.css'); ?>">
    <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Impor CSS "forumdiskusi.css" -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/forumdiskusi.css'); ?>">
    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/diskusi.css')?>">
    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    .custom-textarea {
        border: 1px solid #ccc;
        /* Border yang lebih jelas */
        border-radius: 5px;
        /* Sudut yang lebih lembut */
        padding: 10px;
        /* Ruang di sekitar teks */
        resize: none;
        /* Menonaktifkan fitur resize */
    }

    .custom-textarea:focus {
        border-color: #007bff;
        /* Warna border saat fokus */
        box-shadow: 0 0 6px rgba(0, 123, 255, 0.5);
        /* Bayangan saat fokus */
    }
    </style>
</head>

<body id="page-top">
    <!-- Menampilkan navbar sesuai dengan role pengguna -->
    <?php if ($this->session->userdata('role') === 'Siswa') { ?>
    <div id="wrapper">
        <!-- Sidebar Guru -->
        <?php $this->load->view('Bar/Sidebar_siswa'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- TopBar Guru -->
                <?php $this->load->view('Bar/Navbar_siswa'); ?>
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Forum Diskusi</h1>
                    </div>

                    <?php } elseif ($this->session->userdata('role') === 'Guru') { ?>
                    <div id="wrapper">
                        <!-- Sidebar Guru -->
                        <?php $this->load->view('Bar/Sidebar_guru'); ?>
                        <!-- Content Wrapper -->
                        <div id="content-wrapper" class="d-flex flex-column">
                            <!-- Main Content -->
                            <div id="content">
                                <!-- TopBar Guru -->
                                <?php $this->load->view('Bar/Navbar_guru'); ?>
                                <div class="container-fluid">
                                    <!-- Page Heading -->
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <h1 class="h3 mb-0 text-gray-800">Forum Diskusi</h1>
                                    </div>
                                    <?php } else {
                                        redirect('auth');  // Redirect jika role tidak dikenali
                                    } ?>

                                    <div class="container mt-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Kotak untuk membuat postingan baru (pindahkan ke atas) -->
                                                <div class="card mb-3">
                                                    <div class="card-body mx-3">
                                                        <h5 class="card-title">Buat Postingan Baru</h5>
                                                        <form method="POST"
                                                            action="<?php echo site_url('diskusi/tambah_topik'); ?>">

                                                            <div class="form-group d-flex align-items-center">
                                                                <img src="<?php echo base_url('assets/images/logo.png') ?>"
                                                                    class="rounded-circle" width="48" height="48"
                                                                    alt="Profil">
                                                                <h4 class="card-title ml-2">
                                                                    <?php echo $this->session->userdata('nama_lengkap'); ?>
                                                                    <input type="text" name="nama" class="form-control"
                                                                        style="display: none;"
                                                                        value="<?php echo $this->session->userdata('nama_lengkap'); ?>"
                                                                        readonly />
                                                                </h4>

                                                            </div>
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <textarea class="form-control custom-textarea"
                                                                        rows="3" name="deskripsi"
                                                                        placeholder="Apa yang ingin Anda bagikan?"></textarea>
                                                                </div>

                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Kirim</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">

                                                <?php foreach ($query as $data) {
                                                if ($data['enum'] == 'Iya') { // Hanya tampilkan topik dengan enum 'Iya'
                                            ?>
                                                <!-- Daftar postingan -->
                                                <!-- Postingan pertama -->
                                                <div class="card mb-3">
                                                    <div class="card-body mx-3">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <img src="//www.gravatar.com/avatar/<?php echo md5($data['nama']);?>?s=40&d=monsterid"
                                                                    class="rounded-circle" width="40" height="40"
                                                                    alt="Profil">
                                                                <h4 class="card-title ml-2">
                                                                    <?php echo htmlentities($data['nama']);?></h4>
                                                            </div>
                                                            <p class="text-secondary">
                                                                <?php echo date('d M Y', strtotime($data['tanggal']));?>
                                                            </p>
                                                        </div>

                                                        <p class="card-text mt-1">
                                                            <?php echo htmlentities($data['deskripsi']);?></p>
                                                        <a href="<?php echo base_url('Diskusi/lihat_topik/') . $data['id_topik']; ?>"
                                                            class="btn btn-primary">Komentar</a>
                                                    </div>
                                                </div>
                                                <?php
                                      }
                                    }
                                    ?>
                                            </div>

                                            <?php if ($this->session->userdata('role') === 'Guru') { ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--include Footer Guru-->
                            <?php $this->load->view('Bar/Footer_admin'); ?>
                            <?php } ?>

                            <!-- include modal -->
                            <?php $this->load->view('Bar/Logout_modal'); ?>
</body>

</html>