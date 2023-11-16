<!DOCTYPE html>
<html>

<head>
    <title>Setting Profile Siswa</title>
    <!-- Tambahkan link CSS dari Bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/siswa_dashboard.css'); ?>">
    <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Topik</h1>
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
                                        <h1 class="h3 mb-0 text-gray-800">Tambah Topik</h1>
                                    </div>
                                    <?php } else {
        redirect('auth'); // Redirect jika role tidak dikenali
    } ?>



                                    <div class="container mt-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="fixed-card card"
                                                    style="width: 1100px;box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);border-radius: 10px;">
                                                    <div class="card"
                                                        style="margin: 30px auto; width: 1040px; border: none;">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <form method="POST"
                                                                    action="<?php echo site_url('diskusi/tambah_topik'); ?>">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Nama</label>
                                                                        <input type="text" name="nama"
                                                                            class="form-control"
                                                                            value="<?php echo $this->session->userdata('nama_lengkap'); ?>"
                                                                            required readonly />
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Judul</label>
                                                                        <input type="text" name="judul"
                                                                            class="form-control" required />
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Deskripsi</label>
                                                                        <textarea name="deskripsi" class="form-control"
                                                                            rows="10"></textarea>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Kirim</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- untuk foooter -->
                                    <?php if ($this->session->userdata('role') === 'Guru') { ?>


                                </div>
                                <?php $this->load->view('Bar/Footer_admin'); ?>
                            </div>
                        </div>
                    </div>
                    <!--include Footer Guru-->
                    <!-- include modal -->
                    <?php $this->load->view('Bar/Logout_modal'); ?>
                    <?php } ?>


</body>

</html>