<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SMK-TI GNC</title>
    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php $this->load->view('Bar/Sidebar_admin'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- TopBar -->
                <?php $this->load->view('Bar/Navbar_admin'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="container-fluid mt-3">
                        <div class="row">
                            <div class="col-md-12 mx-auto mb-3">
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Edit Materi</h6>
                                    </div>
                                    <div class="card-body col-10 mx-auto">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Jurusan</th>
                                                <td><?php echo $materi[0]->nama_jurusan; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tingkatan</th>
                                                <td><?php echo $materi[0]->nama_tingkatan;?></td>
                                            </tr>
                                            <tr>
                                                <th>Kelas</th>
                                                <td><?php echo $materi[0]->nama_kelas;?></td>
                                            </tr>
                                            <tr>
                                                <th>Mata Pelajaran</th>
                                                <td><?php echo $materi[0]->nama_mapel;?></td>
                                            </tr>
                                        </table>
                                        <form
                                            action="<?php echo site_url('materi/edit_materi_admin/'.$materi[0]->id_materi); ?>"
                                            method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="nama_materi">Nama Materi</label>
                                                <input type="text" class="form-control" id="nama_materi"
                                                    name="nama_materi" value="<?= $materi[0]->nama_materi ?>" required>
                                            </div>

                                            <label for="file_materi">Materi saat ini</label>
                                            <div class="form-group row">
                                                <div class="col-12 d-flex align-items-center">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="file_materi"
                                                            name="file_materi" value="<?= $materi[0]->file_materi ?>"
                                                            readonly>
                                                        <div class="input-group-append">
                                                            <a href="<?= base_url('assets/uploads/materi/' . $materi[0]->file_materi); ?>"
                                                                class="btn btn-sm btn-info" title="Detail"
                                                                target="_blank"
                                                                data-target="#detailModal<?php echo $materi[0]->id_materi; ?>">
                                                                Lihat File Materi
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="id_tahun" name="id_tahun"
                                                    value="<?= $materi[0]->id_tahun ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="id_semester"
                                                    name="id_semester" value="<?= $materi[0]->id_semester ?>" readonly>
                                            </div>

                                            <!-- Bagian yang akan ditampilkan saat memilih "Edit Materi" -->
                                            <div class="form-group">
                                                <label for="file_materi">Ganti File Materi</label>
                                                <input type="file" class="form-control" id="file_materi"
                                                    name="file_materi">
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary"
                                                    style="width: 100%; max-width: 300px;">Edit Materi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Admin -->
            <?php $this->load->view('Bar/Footer_admin'); ?>
            <?php $this->load->view('Bar/Logout_modal'); ?>
            <!-- Bootstrap core JavaScript -->
            <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Core plugin JavaScript -->
            <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
            <!-- Custom scripts for all pages -->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>