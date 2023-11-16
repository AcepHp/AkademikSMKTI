<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Penilaian Guru</title>
    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar Guru -->
        <?php $this->load->view('Bar/Sidebar_siswa'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- TopBar Guru -->
                <?php $this->load->view('Bar/Navbar_siswa'); ?>
                <!-- Content Row -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Nilai</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Loop through the tingkatan and create a card for each -->
                        <?php foreach ($tingkatan as $tingkat) { ?>
                        <div class="col-12">
                            <div class="card shadow mb-4 mr-4 ml-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Informasi Nilai - <?= $tingkat->nama_tingkatan; ?>
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php $dataFound = false; ?>
                                        <?php if (!empty($nilai)) { ?>
                                        <table class="table table-bordered bg-white" id="example" class="display"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Semester</th>
                                                    <th>Kehadiran</th>
                                                    <th>Tugas</th>
                                                    <th>UTS</th>
                                                    <th>UAS</th>
                                                    <th>Nilai Akhir</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($nilai as $data) {
                                                            if ($data->kode_tingkatan == $tingkat->kode_tingkatan) {
                                                                $dataFound = true;
                                                                ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($data->nama_mapel); ?></td>
                                                    <td><?php echo htmlspecialchars($data->nama_semester); ?></td>
                                                    <td><?php echo htmlspecialchars($data->kehadiran); ?></td>
                                                    <td><?php echo htmlspecialchars($data->tugas); ?></td>
                                                    <td><?php echo htmlspecialchars($data->uts); ?></td>
                                                    <td><?php echo htmlspecialchars($data->uas); ?></td>
                                                    <td><?php echo htmlspecialchars($data->nilai_akhir); ?></td>
                                                </tr>
                                                <?php }
                                                        } ?>
                                                <?php if (!$dataFound) { ?>
                                                <tr>
                                                    <td colspan="7">
                                                        Tidak ada data nilai.
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php } else { ?>
                                        <p>Tidak ada data nilai.</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
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
                <script src="<?=basease_url('assets/')?>vendor/chart.js/Chart.min.js"></script>
                <!-- Page level custom scripts -->
                <script src="<?=base_url('assets/')?>js/demo/chart-area-demo.js"></script>
                <script src="<?=base_url('assets/')?>js/demo/chart-pie-demo.js"></script>
                <!-- Page level plugins -->
                <script src="<?php echo base_url()?>assets/datatables/jquery.dataTables.min.js"></script>
                <script src="<?php echo base_url()?>assets/datatables/dataTables.bootstrap4.min.js"></script>
                <!-- Page level custom scripts -->
                <script src="assets/js/demo/datatables-demo.js"></script>
            </div>
        </div>
    </div>
    </div>
</body>

</html>