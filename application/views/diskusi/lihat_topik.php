<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lihat Topik</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/siswa_dashboard.css'); ?>">
    <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Menampilkan navbar sesuai dengan role pengguna -->
    <?php if ($this->session->userdata('role') === 'Siswa') { ?>
    <div id="wrapper">
        <!-- Sidebar Guru -->
        <?php $this->load->view('Bar/Sidebar_siswa'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- TopBar Guru -->
                <?php $this->load->view('Bar/Navbar_siswa'); ?>
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Forum Diskusi</h1>
                    </div>

                    <?php } elseif ($this->session->userdata('role') === 'Guru') { ?>
                    <div id="wrapper">
                        <!-- Sidebar Guru -->
                        <?php $this->load->view('Bar/Sidebar_guru'); ?>
                        <!-- Content Wrapper -->
                        <div id="content-wrapper" class="d-flex flex-column">
                            <!-- Main Content -->
                            <div id="content">
                                <!-- TopBar Guru -->
                                <?php $this->load->view('Bar/Navbar_guru'); ?>
                                <div class="container-fluid">
                                    <!-- Page Heading -->
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <h1 class="h3 mb-0 text-gray-800">Forum Diskusi</h1>
                                    </div>
                                    <?php } else {
                                        redirect('auth');  // Redirect jika role tidak dikenali
                                    } ?>

                                    <div class="container mt-4">
                                        <?php if(isset($topik)) { ?>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <img src="//www.gravatar.com/avatar/<?php echo md5($topik['nama']);?>?s=48&d=monsterid"
                                                            class="rounded-circle" />
                                                    </div>
                                                    <div class="col">
                                                        <div class="fw-bold">
                                                            <?php echo htmlentities($topik['nama']);?>
                                                        </div>
                                                        <small class="text-muted">
                                                            <?php echo date('d M Y', strtotime($topik['tanggal']));?>
                                                        </small>
                                                        <div class="mt-3">
                                                            <p>
                                                                <?php echo nl2br(htmlentities($topik['deskripsi']));?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <?php } ?>

                                        <?php if (isset($komentars)) {
    foreach ($komentars as $komentar) {
        if ($komentar['status'] === 'Iya') {
            ?>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <img src="//www.gravatar.com/avatar/<?php echo md5($komentar['nama']);?>?s=48&d=monsterid"
                                                            class="rounded-circle" />
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <div class="fw-bold">
                                                                            <?php echo '<strong>' . htmlentities($komentar['nama']) . '</strong>';?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <small class="text-muted">
                                                                            <?php echo date('d M Y', strtotime($komentar['tanggal'])); ?>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                                <hr />
                                                                <div class="mt-2">
                                                                    <?php echo nl2br(htmlentities($komentar['komentar']));?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
        }
    }
}
?>
                                        <hr />
                                        <div class="container mt-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-start">
                                                                <img src="//www.gravatar.com/avatar/<?php echo md5($topik['nama']);?>?s=80&d=monsterid"
                                                                    class="rounded-circle"
                                                                    style="width: 80px; height: 80px; margin-right: 15px;" />
                                                                <div class="flex-grow-1">
                                                                    <form method="POST"
                                                                        action="<?php echo base_url('Diskusi/tambah'); ?>">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Nama</label>
                                                                            <input type="text" name="nama"
                                                                                class="form-control"
                                                                                value="<?php echo $this->session->userdata('nama_lengkap'); ?>"
                                                                                required readonly />
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Jawab
                                                                                Topik</label>
                                                                            <textarea class="form-control"
                                                                                name="komentar"
                                                                                placeholder="Jawab topik"
                                                                                required></textarea>
                                                                            <input type="hidden"
                                                                                value="<?php echo $topik['id_topik'];?>"
                                                                                name="id_topik" />
                                                                        </div>
                                                                        <div class="text-end">
                                                                            <input type="hidden"
                                                                                name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                                                                value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                                                            <button class="btn btn-primary"
                                                                                type="submit">Kirim</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>

                                    <?php if ($this->session->userdata('role') === 'Guru' || $this->session->userdata('role') === 'Siswa') { ?>
                                </div>
                                <?php $this->load->view('Bar/Footer_admin'); ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
</body>

</html>