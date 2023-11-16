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
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</head>

<body id="page-top">
    <!-- TopBar Guru -->
    <div id="wrapper">

        <!-- Sidebar Guru -->
        <?php $this->load->view('Bar/Sidebar_admin'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- TopBar Guru -->
                <?php $this->load->view('Bar/Navbar_admin'); ?>

                <!-- Display additional information -->
                <div class="container-fluid mt-3">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Informasi Kelas</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Nama Kelas</th>
                                            <td><?php echo $nama_kelas; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Jurusan</th>
                                            <td><?php echo $nama_jurusan; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card shadow">
                                <div class="card-header py-3 ">
                                    <h6 class="m-0 font-weight-bold text-primary">Informasi Tahun Akademik</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Tahun Akademik</th>
                                            <td><?php echo $tahun_akademik; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tingkatan</th>
                                            <td><?php echo $nama_tingkatan; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="card shadow mb-4 mx-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Table Data Siswa</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="<?php echo site_url('kelolakelas/tambah_data_siswa_ke_kelas'); ?>"
                                method="post">
                                <input type="hidden" name="id_kelola_kelas" value="<?php echo $id_kelola_kelas; ?>">
                                <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
                                <input type="hidden" name="kode_jurusan" value="<?php echo $kode_jurusan; ?>">
                                <input type="hidden" name="id_tahun" value="<?php echo $id_tahun; ?>">
                                <input type="hidden" name="kode_tingkatan" value="<?php echo $kode_tingkatan; ?>">

                                <table class="table table-bordered" id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%; text-align: center;">Pilih</th>
                                            <th>NISN</th>
                                            <th>Nama Lengkap</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($siswa as $row): ?>
                                        <tr>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <input type="checkbox" name="selected_siswa[]"
                                                    value="<?php echo $row->NISN; ?>">
                                            </td>
                                            <td><?php echo htmlspecialchars($row->NISN); ?></td>
                                            <td><?php echo htmlspecialchars($row->Nama_lengkap); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-success">Tambahkan Ke Kelas</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <?php $this->load->view('Bar/Footer_admin'); ?>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    <!-- Footer Admin -->

    <!-- include modal -->
    <?php $this->load->view('Bar/Logout_modal'); ?>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets/') ?>js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <script>
    new DataTable('#example', {
        columnDefs: [{
                targets: [0],
                orderData: [0, 1]
            },
            {
                targets: [1],
                orderData: [1, 0]
            },
            {
                targets: [2],
                orderData: [2, 0]
            }
        ]
    });
    </script>
</body>

</html>