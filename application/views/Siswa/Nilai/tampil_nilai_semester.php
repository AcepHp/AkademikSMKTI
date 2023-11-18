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
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">



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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <?php if (isset($siswa)) { ?>
                        <h1 class="h3 mb-0 text-gray-800">Nilai Semester</h1>
                        <a href="<?php echo site_url('nilai/cetak_nilai/' . $siswa->NISN); ?>"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Cetak Nilai</a>
                        <?php } else { ?>
                        <p>Tidak Bisa Cetak Nilai(Anda Belum Di Kelas)</p>
                        <?php } ?>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Informasi Akademik</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Tahun Akademik</th>
                                        <td><?php echo isset($tahun[0]->tahun_akademik) ? $tahun[0]->tahun_akademik : 'Tahun tidak tersedia'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Semester</th>
                                        <td><?php echo isset($semester[0]->nama_semester) ? $semester[0]->nama_semester : 'Semester tidak tersedia'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jurusan</th>
                                        <td><?php echo isset($jurusan->nama_jurusan) ? $jurusan->nama_jurusan : 'Jurusan tidak tersedia'; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Informasi Siswa</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td><?php echo isset($siswa->Nama_lengkap) ? $siswa->Nama_lengkap : 'Nama tidak tersedia'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>NISN</th>
                                        <td><?php echo isset($siswa->NISN) ? $siswa->NISN : 'NISN tidak tersedia'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Kelas</th>
                                        <td><?php echo isset($kelas->nama_kelas) ? $kelas->nama_kelas : 'Kelas tidak tersedia'; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <br>

            <!-- DataTales Example -->
            <div class="card shadow mb-4 mr-4 ml-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Informasi Nilai
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if (!empty($siswa)) : ?>
                        <table class="table table-bordered" id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>Kehadiran</th>
                                    <th>Tugas</th>
                                    <th>UTS</th>
                                    <th>UAS</th>
                                    <th>Nilai Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($nilai as $data) {
                                        ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($data->nama_mapel); ?></td>
                                    <td><?php echo htmlspecialchars($data->kehadiran); ?></td>
                                    <td><?php echo htmlspecialchars($data->tugas); ?></td>
                                    <td><?php echo htmlspecialchars($data->uts); ?></td>
                                    <td><?php echo htmlspecialchars($data->uas); ?></td>
                                    <td><?php echo htmlspecialchars($data->nilai_akhir); ?></td>
                                    <?php } ?>
                                </tr>
                                <?php else : ?>
                                <p>Tidak ada data nilai.</p>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php $this->load->view('Bar/Footer_admin'); ?>
        </div>
        
    </div>

    </div>
    <!-- Footer Admin -->


    <!-- include modal logout -->
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url()?>assets/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/datatables/dataTables.bootstrap4.min.js"></script>

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
            }

        ]
    });
    </script>



</body>

</html>