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
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="<?php echo base_url()?>assets/images/logo.png" alt="SMK-TI GNC" width="50" height="50">
                </div>
                <div class="sidebar-brand-text mx-3">SMK-TI GNC</div>
            </a>


            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('Guru'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComponents"
                    aria-expanded="false" aria-controls="collapseComponents">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseComponents" class="collapse" aria-labelledby="headingComponents"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub-menu Data Master</h6>
                        <a class="collapse-item" href="<?php echo site_url('Tingkatan/index'); ?>">Tingkatan Kelas</a>
                        <a class="collapse-item" href="<?php echo site_url('Jurusan/index'); ?>">Data Jurusan</a>
                        <a class="collapse-item" href="<?php echo site_url('Kelas/index'); ?>">Data Kelas</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Nilai</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Akademik</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub-menu Data Akademik</h6>
                        <a class="collapse-item" href="buttons.html">Download Materi</a>
                        <a class="collapse-item" href="cards.html">Upload Materi</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Absensi Guru</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Data Peserta Didik</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub-menu Peserta Didik</h6>
                        <a class="collapse-item" href="<?php echo site_url('Guru/data_siswa'); ?>">Data Siswa</a>
                        <a class="collapse-item" href="utilities-border.html">Data Kelas</a>
                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>




                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data Siswa</h1>
                    </div>
                </div>

                <div class="container mt-5">
                    <?php echo form_open('datasiswa/proses_tambah_siswa'); ?>

                    <div class="form-group">
                        <label for="nis">NIS:</label>
                        <input type="text" class="form-control" name="nis" required>
                    </div>

                    <div class="form-group">
                        <label for="nisn">NISN:</label>
                        <input type="text" class="form-control" name="nisn" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap:</label>
                        <input type="text" class="form-control" name="nama_lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_jurusan">Jurusan</label>
                        <select class="form-control" name="kode_jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <?php foreach ($jurusan as $jurusan_item): ?>
                            <option value="<?php echo $jurusan_item->kode_jurusan; ?>">
                                <?php echo $jurusan_item->nama_jurusan; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_kelas">Kelas</label>
                        <select class="form-control" name="id_kelas" required>
                            <option value="">Pilih Kelas</option>

                            <?php foreach ($kelas as $kelas_item): ?>
                            <option value="<?php echo $kelas_item->id_kelas; ?>">
                                <?php echo $kelas_item->nama_kelas; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" name="status">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" name="tempat_lahir" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="date" class="form-control" name="tanggal_lahir" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <div>
                            <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Laki-laki"
                                    required> Laki-laki</label>
                            <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Perempuan"
                                    required> Perempuan</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" name="alamat" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tinggal_dengan">Tinggal Dengan:</label>
                        <input type="text" class="form-control" name="tinggal_dengan">
                    </div>

                    <div class="form-group">
                        <label for="nama_ayah">Nama Ayah:</label>
                        <input type="text" class="form-control" name="nama_ayah" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu:</label>
                        <input type="text" class="form-control" name="nama_ibu" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_wali">Nama Wali:</label>
                        <input type="text" class="form-control" name="nama_wali">
                    </div>

                    <div class="form-group">
                        <label for="no_telp_ortu">No. Telp Orang Tua:</label>
                        <input type="text" class="form-control" name="no_telp_ortu">
                    </div>

                    <div class="form-group">
                        <label for="no_telp_wali">No. Telp Wali:</label>
                        <input type="text" class="form-control" name="no_telp_wali">
                    </div>

                    <div class="form-group">

                        <input type="hidden" class="form-control" name="aktif" id="aktif" value="1" required>
                    </div>

                    <div class="form-group">
                        <label for="tahun_akademik">Tahun Akademik:</label>
                        <input type="text" class="form-control" name="tahun_akademik">
                    </div>

                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    <?php echo form_close(); ?>


                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Your Website 2021</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->


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
                    <script src="assets/datatables/jquery.dataTables.min.js"></script>
                    <script src="assets/datatables/dataTables.bootstrap4.min.js"></script>

                    <!-- Page level custom scripts -->
                    <script src="assets/js/demo/datatables-demo.js"></script>
</body>

</html>