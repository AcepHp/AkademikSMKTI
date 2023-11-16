<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kelola Diskusi</title>

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

        <!-- Sidebar Admin -->
        <?php $this->load->view('Bar/Sidebar_admin'); ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar Admin -->
                <?php $this->load->view('Bar/Navbar_admin'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Kelola Pengajuan</h1>
                        </div>

                        <!-- ... (content lainnya) ... -->

                    </div>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar pengajuan (<?php echo $jumlahBaris; ?>)</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID Topik</th>
                                                <th>Tanggal</th>
                                                <th>Nama</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                $statusFilter = isset($_GET['status']) ? $_GET['status'] : ''; // Ambil parameter status dari URL
                foreach ($topik as $row) :
                    if ($statusFilter === '' || $row['enum'] === $statusFilter) :
                ?>
                                            <?php foreach ($topik as $row)  ?>
                                            <tr>
                                                <td><?php echo $row['id_topik']; ?></td>
                                                <td><?php echo $row['tanggal']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['enum']; ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-info" title="Detail"
                                                        data-toggle="modal"
                                                        data-target="#topikModal<?php echo $row['id_topik']; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <!-- Content Row -->
                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer Admin -->
                  

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

             <!-- Footer Admin -->
    <?php $this->load->view('Bar/Footer_admin'); ?>


            <!-- Modal -->
            <?php foreach ($topik as $row): ?>
            <div class="modal fade" id="topikModal<?php echo $row['id_topik']; ?>" tabindex="-1" role="dialog"
                aria-labelledby="topikModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 50%; width: 100%;"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="topikModalLabel" style="font-size: 1.25rem;">Detail Topik</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="font-size: 1rem;">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID Topik</th>
                                        <td><?php echo $row['id_topik']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td><?php echo $row['tanggal']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td><?php echo $row['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi Topik</th>
                                        <td>
                                            <pre
                                                style="white-space: pre-line; font-size: 1rem; color: #858796;font-family: 'Poppins', sans-serif;"><?php echo $row['deskripsi']; ?></pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td><?php echo $row['enum']; ?></td>
                                    </tr>
                                    <!-- ... (other fields) ... -->
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <div class="ml-auto">
                                <a href="<?php echo site_url('Diskusi/setujui_pengajuan/' . $row['id_topik']); ?>"
                                    class="btn btn-success">Setujui</a>
                                <a href="<?php echo site_url('Diskusi/hapus_pengajuan/' . $row['id_topik']); ?>"
                                    class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- include modal -->
            <?php $this->load->view('Bar/Logout_modal'); ?>


            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- Bootstrap core JavaScript-->
            <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
            <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>
            <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>
            <script src="<?=base_url('assets/')?>js/demo/chart-area-demo.js"></script>
            <script src="<?=base_url('assets/')?>js/demo/chart-pie-demo.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>