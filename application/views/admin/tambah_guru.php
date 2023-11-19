<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMK TI GNC</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">
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

                <!-- TopBar Admin -->
                <?php $this->load->view('Bar/Navbar_admin'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Tambah Data Guru</h1>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <?php echo form_open('admin/tambah_guru'); ?>

                        <div class="form-group">
                            <label for="nip">NIP:</label>
                            <input type="text" class="form-control" name="nip" id="nip" oninput="setUsernameFromNIP()"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap:</label>
                            <input type="text" class="form-control" name="nama_lengkap" required>
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir:</label>
                            <input type="text" class="form-control" name="tempat_lahir" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" class="form-control" name="tanggal_lahir" required>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <div>
                                <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Laki-laki"
                                        required> Laki-laki</label>
                                <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Perempuan"
                                        required> Perempuan</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <textarea class="form-control" name="alamat" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="pendidikan">Pendidikan:</label>
                            <input type="text" class="form-control" name="pendidikan">
                        </div>

                        <div class="form-group">
                            <label for="Wali">Status Wali Kelas:</label>
                            <div>
                                <label class="radio-inline"><input type="radio" name="wali" value="ya" required>
                                    YA</label>
                                <label class="radio-inline"><input type="radio" name="wali" value="tidak" required>
                                    TIDAK</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_mulai">Tanggal Mulai:</label>
                            <input type="date" class="form-control" name="tanggal_mulai" required>
                        </div>

                        <div class="form-group" style="display: none;">
                            <input type="text" class="form-control" name="aktif" id="aktif" value="0" required>
                        </div>

                        <div class="form-group" style="display: none;">
                            <input type="text" class="form-control" name="username" id="username" required readonly>
                        </div>

                        <div class="form-group" style="display: none;">

                            <input type="text" class="form-control" name="password" value="gurusmktignc" readonly>
                        </div>

                        <input type="submit" name="Submit" value="Simpan" class="btn btn-primary">
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- Footer Admin -->
                <br>
            </div>
            <?php $this->load->view('Bar/Footer_admin'); ?>
        </div>

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

        <script>
        function setUsernameFromNIP() {
            var nipInput = document.getElementById('nip');
            var usernameInput = document.getElementById('username');

            // Menghapus spasi pada nilai nisn dan mengganti karakter non-alfanumerik dengan _
            var nipValue = nipInput.value.replace(/\s+/g, '').replace(/\W/g, '_');

            // Mengisi nilai username dengan nilai nisn yang telah diubah
            usernameInput.value = nipValue;
        }
        </script>

</body>

</html>