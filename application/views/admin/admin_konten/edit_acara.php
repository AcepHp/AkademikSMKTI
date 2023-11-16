<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar Admin -->
        <?php $this->load->view('Bar/Sidebar_admin'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- TopBar Admin -->
                <?php $this->load->view('Bar/Navbar_admin'); ?>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Edit Acara</h1>
                        </div>
                    </div>
                    <div class="container mt-5">
                        <?php echo form_open_multipart('Kelola_Dashboard/Acara/proseseditacara/' . $acara->id_acara); ?>
                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" class="form-control" name="judul"
                                value="<?php echo $acara->judul; ?>">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea type="text" class="form-control" name="deskripsi"
                                value="<?php echo $acara->deskripsi; ?>"><?php echo $acara->deskripsi; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal Acara:</label>   
                            <input type="date" class="form-control" name="tanggal"
                                value="<?php echo $acara->tanggal; ?>">
                        </div>
                        <div class="form-group">
                            <label for="waktu_mulai">Waktu Mulai:</label>
                            <input type="time" class="form-control" name="waktu_mulai"
                                value="<?php echo $acara->waktu_mulai; ?>">
                        </div>
                        <div class="form-group">
                            <label for="waktu_selesai">Waktu_Selesai:</label>
                            <input type="time" class="form-control" name="waktu_selesai"
                                value="<?php echo $acara->waktu_selesai; ?>">
                        </div>
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <?php echo form_close(); ?>
                    </div>
            </div>
            <!-- Footer Admin -->
            <?php $this->load->view('Bar/Footer_admin'); ?>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sudah Beres Pekerjaan Anda?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Jika sudah, Pilih "Logout" untuk keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('Bar/Logout_modal'); ?>

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
    <script src="<?=base_url('assets/')?>js/demo/chart-pie-demo.js"></script>

</body>

</html>