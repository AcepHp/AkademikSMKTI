<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tambah Materi</title>
    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php $this->load->view('Bar/Sidebar_guru'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- TopBar -->
                <?php $this->load->view('Bar/Navbar_guru'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah Materi </h1>
                    <!-- Materi Form -->
                    <form action="<?php echo site_url('materi/tambah_materi/' . $id_kelas . '/' . $id_mapel); ?>"
                        method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nama_materi">Nama Materi</label>
                            <input type="text" class="form-control" id="nama_materi" name="nama_materi" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_jurusan">Jurusan</label>
                            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan"
                                value="<?= isset($juti[0]->nama_jurusan) ? $juti[0]->nama_jurusan : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_tingkatan">Tingkat</label>
                            <input type="text" class="form-control" id="nama_tingkatan" name="nama_tingkatan"
                                value="<?= isset($juti[0]->nama_tingkatan) ? $juti[0]->nama_tingkatan : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_kelas">Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas"
                                value="<?= isset($nama) ? $nama : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_mapel">Mata Pelajaran</label>
                            <input type="text" class="form-control" id="nama_mapel" name="nama_mapel"
                                value="<?= isset($juti[0]->nama_mapel) ? $juti[0]->nama_mapel : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="kode_jurusan" name="kode_jurusan"
                                value="<?= isset($juti[0]->kode_jurusan) ? $juti[0]->kode_jurusan : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="kode_tingkatan" name="kode_tingkatan"
                                value="<?= isset($juti[0]->kode_tingkatan) ? $juti[0]->kode_tingkatan : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_kelas" name="id_kelas"
                                value="<?= isset($id_kelas) ? $id_kelas : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_mapel" name="id_mapel"
                                value="<?= isset($id_mapel) ? $id_mapel : ''; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_tahun" name="id_tahun"
                                value="<?= isset($tahun_akademik) ? $tahun_akademik : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_semester" name="id_semester"
                                value="<?= isset($semester) ? $semester : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="file_materi">File Materi</label>
                            <input type="file" class="form-control" id="file_materi" name="file_materi" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Materi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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