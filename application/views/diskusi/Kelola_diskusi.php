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
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">


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
                            <h1 class="h3 mb-0 text-gray-800">Kelola Diskusi</h1>
                            <a href="<?php echo site_url('Diskusi/pengajuan'); ?>"
                                class="btn btn-primary mt-2">Pengajuan Topik (<?php echo $jumlahBaris; ?>)</a>
                        </div>

                        <!-- ... (content lainnya) ... -->

                    </div>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Topik</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <?php if ($this->session->userdata('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->userdata('success'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php $this->session->unset_userdata('success'); ?>
                                <?php endif; ?>

                                <?php if ($this->session->userdata('success_nonaktif')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->userdata('success_nonaktif'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php $this->session->unset_userdata('success_nonaktif'); ?>
                                <?php endif; ?>

                                <?php if ($this->session->userdata('success_hapus')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->userdata('success_hapus'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php $this->session->unset_userdata('success_hapus'); ?>
                                <?php endif; ?>
                                    <table class="table table-bordered" id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:5%; text-align:center; vertical-align:middle;">No</th>
                                                <th style="text-align:center; vertical-align:middle;">Tanggal</th>
                                                <th style="text-align:center; vertical-align:middle;">Nama</th>
                                                <th style="text-align:center; vertical-align:middle;">Status</th>
                                                <th style="width:10%; text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;?>
                                            <?php foreach ($topik as $row) : ?>
                                            <tr>
                                                <td style="width:5%; text-align:center; vertical-align:middle;">
                                                    <?php echo $no++;?></td>
                                                <td style="text-align:center; vertical-align:middle;">
                                                    <?php echo $row['tanggal']; ?></td>
                                                <td style="text-align:center; vertical-align:middle;">
                                                    <?php echo $row['nama']; ?></td>
                                                <td style="text-align:center; vertical-align:middle;">
                                                    <?php echo ($row['enum'] == 'Iya') ? 'Disetujui' : 'Di-Nonaktifkan'; ?>
                                                </td>
                                                <td style="width:10%; text-align:center; vertical-align:middle;">
                                                    <a href="#" class="btn btn-sm btn-info" title="Detail"
                                                        data-toggle="modal"
                                                        data-target="#topikModal<?php echo $row['id_topik']; ?>">
                                                        <i class="fas fa-eye"></i>
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

                    <!-- Footer Admin -->
                </div>
                <!-- End of Content Wrapper -->

            </div>
            <?php $this->load->view('Bar/Footer_admin'); ?>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- include modal -->
            <?php $this->load->view('Bar/Logout_modal'); ?>

            <!-- Modal -->
            <?php foreach ($topik as $row): ?>
            <div class="modal fade" id="topikModal<?php echo $row['id_topik']; ?>" tabindex="-1" role="dialog"
                aria-labelledby="topikModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 50%; width: 100%;"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="topikModalLabel" style="font-size: 1.25rem;">Detail Topik
                            </h5>
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
                                        <td><?php echo ($row['enum'] == 'Iya') ? 'Disetujui' : 'Di-Nonaktifkan'; ?></td>
                                    </tr>
                                    <!-- ... (other fields) ... -->
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <div class="ml-auto">
                                <?php if ($row['enum'] !== 'Iya'): ?>
                                <a href="<?php echo site_url('Diskusi/setujui_topik/' . $row['id_topik']); ?>"
                                    class="btn btn-success">Setujui</a>
                                <a href="<?php echo site_url('Diskusi/hapus_topik/' . $row['id_topik']); ?>"
                                    class="btn btn-danger">Hapus</a>
                                <?php else: ?>
                                <a href="<?php echo site_url('Diskusi/nonaktifkan_topik/' . $row['id_topik']); ?>"
                                    class="btn btn-success">Non-Aktifkan</a>
                                <a href="<?php echo site_url('Diskusi/hapus_topik/' . $row['id_topik']); ?>"
                                    class="btn btn-danger">Hapus</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>




            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>
            <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>
            <script src="<?=base_url('assets/')?>js/demo/chart-area-demo.js"></script>
            <script src="<?=base_url('assets/')?>js/demo/chart-pie-demo.js"></script>
            <script src="<?php echo base_url()?>assets/datatables/jquery.dataTables.min.js"></script>
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