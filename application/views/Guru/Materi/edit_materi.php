<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit Materi</title>
    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Materi</h1>
                    <form action="<?php echo site_url('materi/edit_materi_guru/'.$materi[0]->id_materi); ?>"
                        method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_kelas" value="<?= $materi[0]->id_kelas ?>">
                        <input type="hidden" name="id_mapel" value="<?= $materi[0]->id_mapel ?>">

                        <div class="form-group">
                            <label for="nama_materi">Nama Materi</label>
                            <input type="text" class="form-control" id="nama_materi" name="nama_materi"
                                value="<?= $materi[0]->nama_materi ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="kode_jurusan">Jurusan</label>
                            <select class="form-control" id="kode_jurusan" name="kode_jurusan" readonly>
                                <option value="" disabled>Pilih Jurusan</option>
                                <?php foreach ($materi as $j) : ?>
                                <option value="<?= $j->kode_jurusan ?>"
                                    <?= ($j->kode_jurusan === $materi[0]->kode_jurusan) ? 'selected' : '' ?>>
                                    <?= $j->nama_jurusan ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kode_tingkatan">Tingkatan</label>
                            <select class="form-control" id="kode_tingkatan" name="kode_tingkatan" readonly>
                                <option value="" disabled>Pilih tingkatan</option>
                                <?php foreach ($materi as $t) : ?>
                                <option value="<?= $t->kode_tingkatan ?>"
                                    <?= ($t->kode_tingkatan === $materi[0]->kode_tingkatan) ? 'selected' : '' ?>>
                                    <?= $t->nama_tingkatan ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_kelas">Kelas</label>
                            <select class="form-control" id="id_kelas" name="id_kelas" readonly>
                                <option value="" disabled>Pilih kelas</option>
                                <?php foreach ($materi as $k) : ?>
                                <option value="<?= $k->id_kelas ?>"
                                    <?= ($k->id_kelas === $materi[0]->id_kelas) ? 'selected' : '' ?>>
                                    <?= $k->nama_kelas ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_mapel">Mata Pelajaran</label>
                            <select class="form-control" id="id_mapel" name="id_mapel" readonly>
                                <option value="" disabled>Pilih Mata Pelajaran</option>
                                <?php foreach ($materi as $m) : ?>
                                <option value="<?= $m->id_mapel ?>"
                                    <?= ($m->id_mapel === $materi[0]->id_mapel) ? 'selected' : '' ?>>
                                    <?= $m->nama_mapel ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label for="file_materi">Materi saat ini</label>
                        <div class="form-group row">
                            <div class="col-12 d-flex align-items-center">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="file_materi" name="file_materi"
                                        value="<?= $materi[0]->file_materi ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url('assets/uploads/materi/' . $materi[0]->file_materi); ?>"
                                            class="btn btn-sm btn-info" title="Detail" target="_blank"
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
                            <input type="hidden" class="form-control" id="id_semester" name="id_semester"
                                value="<?= $materi[0]->id_semester ?>" readonly>
                        </div>

                        <!-- Bagian yang akan ditampilkan saat memilih "Edit Materi" -->
                        <div class="form-group">
                            <label for="file_materi">Ganti File Materi</label>
                            <input type="file" class="form-control" id="file_materi" name="file_materi">
                        </div>


                        <button type="submit" class="btn btn-primary">Edit Materi</button>
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