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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">

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
                        <h1 class="h3 mb-0 text-gray-800">Data Semester</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Data Semester</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php if ($this->session->userdata('success_edit')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->userdata('success_edit'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php $this->session->unset_userdata('success_edit'); ?>
                                <?php endif; ?>
                                <table id="example" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width:5%; text-align: center; vertical-align: middle; width:5%">
                                                No</th>
                                            <th style="text-align: center; vertical-align: middle;">Semester</th>
                                            <th style="text-align: center; vertical-align: middle;">Status</th>
                                            <th style="text-align: center; vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>

                                        <?php foreach ($semesters as $semester): ?>
                                        <tr>
                                            <td style="text-align: center; vertical-align: middle;"><?php echo $no++;?>
                                            </td>
                                            <td><?php echo htmlspecialchars($semester->nama_semester); ?></td>
                                            <td><?php echo htmlspecialchars($semester->status); ?></td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <a href="<?php echo site_url('semester/edit_semester/'.$semester->id_semester); ?>"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!-- Anda bisa menambahkan tombol Hapus di sini jika diperlukan -->
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer Admin -->
            <?php $this->load->view('Bar/Footer_admin'); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
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
    <script src="assets/js/demo/datatables-demo.js"></script>
</body>

</html>