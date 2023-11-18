<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMK-TI GNC</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">

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
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Edit Data Wali Kelas</h1>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <?php echo form_open('admin/edit_wali/' . $wali[0]->id_wali); ?>

                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas:</label>
                            <input type="text" class="form-control" name="nama_kelas"
                                value="<?php echo $wali[0]->nama_kelas; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="kode_tingkatan">Tingkatan:</label>
                            <select class="form-control" name="kode_tingkatan" required>
                                <option value="">Pilih Tingkatan</option>
                                <?php foreach ($Tingkatan as $tingkatan_item): ?>
                                <option value="<?php echo $tingkatan_item->kode_tingkatan; ?>"
                                    <?php if ($tingkatan_item->kode_tingkatan == $wali[0]->kode_tingkatan) echo 'selected'; ?>>
                                    <?php echo $tingkatan_item->nama_tingkatan; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kode_jurusan">Jurusan:</label>
                            <select class="form-control" name="kode_jurusan" required>
                                <option value="">Pilih Jurusan</option>
                                <?php foreach ($Jurusan as $jurusan_item): ?>
                                <option value="<?php echo $jurusan_item->kode_jurusan; ?>"
                                    <?php if ($jurusan_item->kode_jurusan == $wali[0]->kode_jurusan) echo 'selected'; ?>>
                                    <?php echo $jurusan_item->nama_jurusan; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="wali_kelas">Wali Kelas:</label>
                            <input type="text" class="form-control" name="wali_kelas"
                                value="<?php echo $wali[0]->Nama_Lengkap; ?>" required>
                        </div>

                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <?php echo form_close(); ?>
                    </div>
                    <!-- Content Row -->
                </div>
            </div>
            <!-- Footer Admin -->
            <?php $this->load->view('Bar/Footer_admin'); ?>
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