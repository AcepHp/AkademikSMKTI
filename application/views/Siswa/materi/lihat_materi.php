<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SMK TI GNC</title>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">
    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php $this->load->view('Bar/Sidebar_siswa'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- TopBar -->
                <?php $this->load->view('Bar/Navbar_siswa'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Materi</h1>
                    </div>
                    <!-- Daftar Materi -->
                    <div class="row">
                        <?php $materiCount = 1; // Inisialisasi hitungan materi ?>
                        <?php foreach ($materi as $item) { ?>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-9">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Materi <?= $materiCount; // Menampilkan hitungan materi ?>
                                            </div>
                                            <div class="h5 mb-2 font-weight-bold text-gray-800">
                                                <?= $item->nama_materi; ?>
                                            </div>
                                        </div>
                                        <div class="col-3 text-right">
                                            <?php
                                                $fileExtension = pathinfo($item->file_materi, PATHINFO_EXTENSION);
                                                $iconClass = 'fa-file';
                                                $buttonClass = 'btn-primary';
                                                if ($fileExtension === 'pdf') {
                                                    $iconClass = 'fa-file-pdf';
                                                } elseif ($fileExtension === 'doc' || $fileExtension === 'docx') {
                                                    $iconClass = 'fa-file-word';
                                                }
                                            ?>
                                            <i class="fas <?= $iconClass; ?> fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col mb-3 mx-4">
                                        <a href="<?= base_url('assets/uploads/materi/' . $item->file_materi); ?>"
                                            target="_blank" class="btn <?= $buttonClass; ?> w-100"
                                            style="width: 100%;">Lihat Materi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $materiCount++; // Increment hitungan materi ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('Bar/Logout_modal'); ?>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript -->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages -->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
</body>

</html>