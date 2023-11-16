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
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

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

                    <!-- Page Heading -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Data Penugasan</h1>
                        </div>

                        <!-- ... (content lainnya) ... -->

                    </div>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">


                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Mapel</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-inline mb-2">

                                </div>
                                <div class="table-responsive">
                                <table class="table table-bordered" id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:5%; text-align: center; vertical-align: middle;">No
                                                </th>
                                                <th style="display: none;">ID Mapel</th>
                                                <th style="text-align: center; vertical-align: middle;">Nama Pelajaran
                                                </th>
                                                <th style="text-align: center; vertical-align: middle;">Nama Jurusan
                                                </th>
                                                <th style="text-align: center; vertical-align: middle;">Nama Tingkatan
                                                </th>
                                                <th style="width:15%; text-align: center; vertical-align: middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php $no = 1; ?>
                                            <?php foreach ($data as $row) : ?>
                                            <tr>
                                                <td style="width:5%; text-align: center; vertical-align: middle;">
                                                    <?php echo $no++; ?></td>
                                                <td style="display: none;"><?php echo $row->id_mapel; ?></td>
                                                <td><?php echo $row->nama_mapel; ?></td>
                                                <td><?php echo $row->nama_jurusan; ?></td>
                                                <td><?php echo $row->nama_tingkatan; ?></td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <a href="<?php echo site_url('Penugasan/lihat/' . $row->id_mapel); ?>"
                                                        class="btn btn-sm btn-warning" title="masuk">
                                                        <i class="fas fa-eye"></i> Lihat Detail Penugasan
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- Content Row -->
                    </div>
                    <!-- End of Main Content -->


                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->
            <!-- Footer -->
            <?php $this->load->view('Bar/Footer_admin'); ?>
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

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="<?php echo base_url()?>assets/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url()?>assets/datatables/dataTables.bootstrap4.min.js"></script>
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
                        targets: [4],
                        orderData: [4, 0]
                    }
                ]
            });
            </script>



</body>

</html>