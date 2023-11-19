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
                    <div class="container-fluid mt-3">
                        <div class="row">
                            <div class="col-md-12 mx-auto mb-3">
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Wali</h6>
                                    </div>
                                    <div class="card-body col-10 mx-auto">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Jurusan</th>
                                                <td><?php echo $wali[0]->nama_jurusan; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tingkatan</th>
                                                <td><?php echo $wali[0]->kode_tingkatan;?></td>
                                            </tr>
                                            <tr>
                                                <th>Kelas</th>
                                                <td><?php echo $wali[0]->nama_kelas;?></td>
                                            </tr>
                                        </table>

                                        <div class="container mt-3">
                                            <?php echo form_open('Wali/edit_wali/' . $wali[0]->id_wali); ?>

                                            <div class="form-group">
                                                <label for="wali_kelas_saat_ini">Wali Kelas Saat Ini:</label>
                                                <input type="text" class="form-control" name="wali_kelas_saat_ini"
                                                    value="<?php echo $wali[0]->Nama_Lengkap; ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="wali_kelas">Guru :</label>
                                                <select class="form-control" name="wali_kelas" required>
                                                    <option value="">Pilih Wali Kelas</option>
                                                    <?php foreach ($guru as $guru_item): ?>
                                                    <option value="<?php echo $guru_item->ID_Guru; ?>">
                                                        <?php echo $guru_item->Nama_Lengkap; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="text-center">
                                                <input type="submit" name="submit" value="Simpan"
                                                    class="btn btn-primary" style="width: 100%; max-width: 300px;">
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                        <!-- Content Row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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