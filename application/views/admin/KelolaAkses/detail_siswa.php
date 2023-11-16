<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard Siswa</title>
    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/')?>css/csssiswa.css" rel="stylesheet">
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
                <?php $this->load->view('Bar/Navbar_guru'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row mb-3">
                        <div class="col">
                            <span class="h2" style="font-weight: bold; padding-right: 10px">Atur Siswa |</span><span class="h4">Detail Akses Siswa</span>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col">
                            <div class="card-body" style="box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                                <!-- <?php if ($this->session->flashdata('sukses')) { ?>
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">&times;</button>
                                    <h6>
                                        <i class="icon fa fa-check"></i>
                                        Data Berhasil
                                        <strong>
                                            <?= $this->session->flashdata('sukses');   ?>
                                        </strong>
                                    </h6>
                                </div>
                                <?php } ?>

                                <?php
                                    if ($this->session->flashdata('gagal')) { ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">&times;</button>
                                    <h6>
                                        <i class="icon fa fa-check"></i>
                                        Gagal
                                        <strong>
                                            <?= $this->session->flashdata('gagal');   ?>
                                        </strong>
                                    </h6>
                                </div>
                                <?php } ?> -->
                                <div class="row mb-4" style="display: flex; align-items: center; justify-content: center">
                                    <div class="col-2">
                                        <span>NISN</span>
                                    </div>
                                    <div class="col-auto">
                                        <span>:</span>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control " value="<?=$datasiswa['NISN'] ?>" disabled>
                                    </div>
                                    <div class="col-2">
                                        <span>Nama Lengkap</span>
                                    </div>
                                    <div class="col-auto">
                                        <span>:</span>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control " value="<?=$datasiswa['nama_lengkap'] ?>" disabled>
                                    </div>
                                </div>

                                <div class="row mb-5" style="display: flex; align-items: center; justify-content: center">
                                    <div class="col-2">
                                        <span>Username</span>
                                    </div>
                                    <div class="col-auto">
                                        <span>:</span>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control " value="<?=$datasiswa['username'] ?>" disabled>
                                    </div>
                                    <div class="col-2">
                                        <span>Status</span>
                                    </div>
                                    <div class="col-auto">
                                        <span>:</span>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control  <?php echo ($datasiswa['aktif'] == '2') ? 'text-danger' : ''; ?> "value="<?php echo ($datasiswa['aktif'] == '0')  || ($datasiswa['aktif'] == '1') ? 'Aktif': 'Tidak Aktif'; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="display: flex; justify-content: flex-end">
                                        <?php if ($datasiswa['aktif'] == '1' || $datasiswa['aktif'] == '0') { ?>
                                            <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#nonAktivasiModal">Non-Aktifkan</button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-success mr-2" data-toggle="modal" data-target="#aktivasiModal">Aktifkan</button>
                                        <?php } ?>
                                            <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#resetKonfirmPasswordModal">Reset Password</button>
                                            <a href="<?php echo site_url('Akses/siswa')?>" class="btn btn-secondary" style="margin-right: 95px">Kembali</a>
                                    </div>
                                </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <?php $this->load->view('Bar/Footer_admin'); ?>
            <!-- End of Footer -->
        </div>

        <!-- Modal Non-Aktivasi -->
        <div class="modal fade" id="nonAktivasiModal" tabindex="-1" role="dialog"
            aria-labelledby="nonAktivasiModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nonAktivasiModalLabel">Non-Aktivasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Isi modal Non-Aktivasi di sini -->
                        <!-- Contoh: "Apakah Anda yakin ingin non-aktivasi?" -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="<?php echo site_url('Akses/nonaktifkansiswa/' . $datasiswa['id_users']) ?>"
                            class="btn btn-danger">Non-Aktifkan</a>
                        <!-- Tambahkan aksi non-aktivasi di sini -->
                        <!-- Contoh: <button type="button" class="btn btn-danger">Non-Aktivasi</button> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Aktivasi -->
        <div class="modal fade" id="aktivasiModal" tabindex="-1" role="dialog" aria-labelledby="aktivasiModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="aktivasiModalLabel">Aktivasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Isi modal Aktivasi di sini -->
                        <!-- Contoh: "Apakah Anda yakin ingin aktivasi?" -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="<?php echo site_url('Akses/aktifkansiswa/' . $datasiswa['id_users']) ?>"
                            class="btn btn-success">Aktifkan</a>
                        <!-- Tambahkan aksi aktivasi di sini -->
                        <!-- Contoh: <button type="button" class="btn btn-success">Aktivasi</button> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Konfirmasi Reset Password -->
        <div class="modal fade" id="resetKonfirmPasswordModal" tabindex="-1" role="dialog"
            aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center" style="background-color: #4e73df;">
                        <h5 class="modal-title" id="resetPasswordModalLabel" style="font-weight: bold; color: black">KONFIRMASI RESET PASSWORD</h5>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin mereset password karyawan ini?<br>
                        Masukan Password Admin untuk Konfirmasi:
                        <form class="form-horizontal" method="POST"
                            action="<?php echo site_url('Akses/konfirmasiResetPasswordAdmin/' . $datasiswa['id_users']) ?>">
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <label class=" col-form-label">Password
                                        Admin:</label>
                                    <input class="form-control" type="text" name="username" hidden
                                        value="<?= $this->session->userdata('username')?>">
                                    <input class="form-control" type="password" name="password">
                                    <p id="error-message" style="color: red;"></p>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer" style="border-top: unset">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button class="btn btn-warning" type="submit">Ya, Reset
                            Password</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
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