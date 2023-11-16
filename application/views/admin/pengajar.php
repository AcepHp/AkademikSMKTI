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

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="../assets/images/logo.png" alt="SMK-TI GNC" width="50" height="50">
                </div>
                <div class="sidebar-brand-text mx-3">SMK-TI GNC</div>
            </a>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('Guru'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Melihat Berita -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Melihat Berita</span></a>
            </li>

            <!-- Kelola Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Kelola Dashboard</span></a>
            </li>

            <!-- Kelola Data Nilai -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kelola Data Nilai</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="Kurikulum/data_nilai">Nilai Sementara</a>
                        <a class="collapse-item" href="cards.html">Nilai Akhir</a>
                    </div>
                </div>
            </li>

            <!-- Data Siswa -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Siswa</span></a>
            </li>

            <!-- Data Akademik -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Data Akademik</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo site_url('Guru/data_siswa'); ?>">Upload Materi</a>
                        <a class="collapse-item" href="utilities-border.html">Download Materi</a>
                        <a class="collapse-item" href="<?php echo site_url('Guru/data_siswa'); ?>">Kelola Materi</a>
                    </div>
                </div>
            </li>


            <!-- Data Guru -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwocollapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Guru</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo site_url('Wali/index'); ?>">Wali Kelas</a>
                        <a class="collapse-item" href="pengajar">Pengajar</a>
                    </div>
                </div>
            </li>

            <!-- PPDB -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>PPDB</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo site_url('Guru/data_siswa'); ?>">Gelombang</a>
                        <a class="collapse-item" href="utilities-border.html">Kuota</a>
                        <a class="collapse-item" href="<?php echo site_url('Guru/data_siswa'); ?>">Diterima</a>
                        <a class="collapse-item" href="utilities-border.html">Tidak Diterima</a>
                        <a class="collapse-item" href="utilities-border.html">Seleksi</a>
                    </div>
                </div>
            </li>

            <!-- Forum Diskusi -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Forum Diskusi</span></a>
            </li>

            <!-- Setting Profile -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Setting Profile</span></a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Data Guru</h1>
                            <div class="btn-group">
                                <a href="<?php echo site_url('admin/tambah_guru'); ?>"
                                    class="btn btn btn-success shadow-sm mr-2"><i
                                        class="fas fa-download fa-sm text-white-50"></i> Tambah Data Guru</a>
                                <a href="#" class="btn btn-sm btn-primary shadow-sm"><i
                                        class="fas fa-download fa-sm text-white-50"></i> Import Data Guru</a>
                            </div>
                        </div>

                        <!-- ... (content lainnya) ... -->

                    </div>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> -->

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Guru Pengajar</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID Guru</th>
                                                <th>NIP</th>
                                                <th>Nama Lengkap</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>Pendidikan</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;?>
                                            <?php foreach ($guru as $row) : ?>

                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row->NIP ?></td>
                                                <td><?php echo $row->Nama_Lengkap ?></td>
                                                <td><?php echo $row->Tempat_Lahir ?></td>
                                                <td><?php echo $row->Tanggal_Lahir ?></td>
                                                <td><?php echo $row->Jenis_Kelamin ?></td>
                                                <td><?php echo $row->Alamat ?></td>
                                                <td><?php echo $row->Pendidikan ?></td>
                                                <td><?php echo $row->Tanggal_Mulai ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-info" title="Detail"
                                                        data-toggle="modal"
                                                        data-target="#guruModal<?php echo $row->ID_Guru; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('admin/edit_guru/'.$row->ID_Guru); ?>"
                                                        class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger" title="Hapus"
                                                        onclick="Delete_Guru('<?php echo $row->ID_Guru; ?>')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- Content Row -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <?php $this->load->view('Bar/Logout_modal'); ?>

        <!-- Modal -->
        <?php foreach ($guru as $row): ?>
                    <div class="modal fade" id="guruModal<?php echo $row->ID_Guru; ?>" tabindex="-1" role="dialog"
                        aria-labelledby="guruModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 50%; width: 100%;"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="guruModalLabel" style="font-size: 1.25rem;">Detail
                                        Guru -
                                        <?php echo $row->Nama_Lengkap; ?></h5>
                                    <button type="button" class="close text-white" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="font-size: 1rem;">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>ID Guru</th>
                                                <td><?php echo $row->ID_Guru; ?></td>
                                            </tr>
                                            <tr>
                                                <th>NIP</th>
                                                <td><?php echo $row->NIP; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <td><?php echo $row->Nama_Lengkap; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tempat Lahir</th>
                                                <td><?php echo $row->Tempat_Lahir; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td><?php echo $row->Tanggal_Lahir; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td><?php echo $row->Jenis_Kelamin; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td><?php echo $row->Alamat; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Pendidikan</th>
                                                <td><?php echo $row->Pendidikan; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Mulai</th>
                                                <td><?php echo $row->Tanggal_Mulai; ?></td>
                                            </tr>
                                            <!-- ... (other fields) ... -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>



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

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script>
        function Delete_Guru(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data guru akan dihapus dan tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ganti URL di bawah ini dengan URL yang sesuai untuk menghapus guru
                    window.location.href = '<?=site_url("admin/delete_guru/") ?>' + id;
                }
            });
        }
        </script>


</body>

</html>