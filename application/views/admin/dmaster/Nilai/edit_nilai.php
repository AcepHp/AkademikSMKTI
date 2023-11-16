<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Guru</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?php echo base_url()?>assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar Guru -->
        <?php $this->load->view('Bar/Sidebar_admin'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- TopBar Guru -->
                <?php $this->load->view('Bar/Navbar_admin'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            Edit Nilai - <?php echo $nilai->nama_mapel; ?> - <?php echo $siswa->Nama_lengkap; ?>
                        </h1>
                    </div>

                    <div class="container mt-5">
                        <form action="<?php echo site_url('nilai/simpan_data_nilai'); ?>" method="post">
                            <input type="hidden" name="id_nilai" value="<?php echo $nilai->ID_Nilai; ?>">
                            <input type="hidden" name="nisn" value="<?php echo $nisn; ?>">
                            <!-- Tambahkan elemen input tersembunyi ini -->
                            <input type="hidden" id="id_mapel" name="id_mapel" value="<?php echo $nilai->id_mapel; ?>">



                            <div class="form-group">
                                <label for="kehadiran">Kehadiran</label>
                                <input type="text" class="form-control" id="kehadiran" name="kehadiran"
                                    value="<?php echo $nilai->kehadiran; ?>">
                            </div>

                            <div class="form-group">
                                <label for="tugas">Tugas</label>
                                <input type="text" class="form-control" id="tugas" name="tugas"
                                    value="<?php echo $nilai->tugas; ?>">
                            </div>

                            <div class="form-group">
                                <label for="uts">UTS</label>
                                <input type="text" class="form-control" id="uts" name="uts"
                                    value="<?php echo $nilai->uts; ?>">
                            </div>

                            <div class="form-group">
                                <label for="uas">UAS</label>
                                <input type="text" class="form-control" id="uas" name="uas"
                                    value="<?php echo $nilai->uas; ?>">
                            </div>

                            <div class="form-group">
                                <label for="nilai_akhir">Nilai Akhir</label>
                                <input type="number" class="form-control" id="nilai_akhir" name="nilai_akhir"
                                    value="<?php echo $nilai->nilai_akhir; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>

                <!-- Footer Admin -->
                <?php $this->load->view('Bar/Footer_admin'); ?>

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

                <!-- Page level plugins -->
                <script src="<?php echo base_url()?>assets/datatables/jquery.dataTables.min.js"></script>
                <script src="<?php echo base_url()?>assets/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="<?php echo base_url()?>assets/js/demo/datatables-demo.js"></script>




</body>

</html>