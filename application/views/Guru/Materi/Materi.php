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
    <link href="<?=base_url('assets/')?>css/penilaian.css" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar Guru -->
        <?php $this->load->view('Bar/Sidebar_guru'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- TopBar Guru -->
                <?php $this->load->view('Bar/Navbar_guru'); ?>



                <!-- Content Row -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Nilai Siswa <?php echo $tahun[0]->tahun_akademik; ?></h1>
                    </div>


                    <!-- Content Row -->
                    <div class="row">
                        <?php foreach ($tingkatan as $tingkat) { ?>
                        <div class="col-12">
                            <div class="accordion" id="accordion<?= $tingkat->kode_tingkatan; ?>">
                                <div class="card">
                                    <div class="card-header" id="heading<?= $tingkat->kode_tingkatan; ?>">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" style="text-decoration: none;" type="button"
                                                data-toggle="collapse"
                                                data-target="#collapse<?= $tingkat->kode_tingkatan; ?>"
                                                aria-expanded="true"
                                                aria-controls="collapse<?= $tingkat->kode_tingkatan; ?>">
                                                <?= $tingkat->nama_tingkatan; ?>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse<?= $tingkat->kode_tingkatan; ?>" class="collapse"
                                        aria-labelledby="heading<?= $tingkat->kode_tingkatan; ?>"
                                        data-parent="#accordion<?= $tingkat->kode_tingkatan; ?>">
                                        <div class="card-body">
                                            <?php 
                                        $guruExists = false; 
                                        foreach ($guru as $data) {
                            if ($data->kode_tingkatan == $tingkat->kode_tingkatan) {
                                $guruExists = true;
                        ?>
                                            <!-- Example -->
                                            <div class="col-xl-4 col-md-6 mb-4">
                                                <div class="cardd border-left-info shadow h-100 py-2">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div
                                                                    class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                                    <?php echo $data->nama_mapel; ?>
                                                                    (<?php echo $data->nama_semester; ?>)
                                                                </div>
                                                                <div class="row no-gutters align-items-center">
                                                                    <div class="col-auto">
                                                                        <div
                                                                            class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                                            <?php echo $data->nama_kelas; ?>
                                                                            (<?php echo $data->nama_jurusan; ?>)</div>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div
                                                                            class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                                            <?php foreach ($tahun as $tahun_akademik) { ?>
                                                                            <a href="<?php echo site_url('Materi/lihat_materi/' . $data->id_kelas. '/'  . $data->id_mapel); ?>"
                                                                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                                                    class="fas fa-download fa-sm text-white-50"></i>
                                                                                Lihat
                                                                                Detail </a>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i
                                                                    class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
            }
        }
        if (!$guruExists) {
            ?>
                                            <p>Tidak Ada</p>
                                            <?php
       }
       ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
    }
    ?>
                    </div>
                    <!-- Content Row -->

                </div>

                <!-- End of Main Content -->



            </div>
            <!-- End of Content Wrapper -->
            <!-- Footer -->
            <?php $this->load->view('Bar/Footer_admin'); ?>

            <!-- include modal -->
            <?php $this->load->view('Bar/Logout_modal'); ?>

            <!-- End of Footer -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


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





</body>

</html>