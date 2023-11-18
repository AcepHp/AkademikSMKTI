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
    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data Siswa</h1>
                    </div>
                </div>


                <div class="container mt-5">
                    <!-- Periksa apakah NISN dan NIS sudah ada dan tampilkan pesan kesalahan -->
                    <?php if ((isset($nisn_exists) && $nisn_exists) && (isset($nis_exists) && $nis_exists)): ?>
                    <div class="alert alert-danger">
                        NISN dan NIS sudah digunakan. Silakan gunakan NISN dan NIS yang berbeda.
                    </div>
                    <?php elseif ((isset($nisn_exists) && $nisn_exists) && (!isset($nis_exists) || !$nis_exists)): ?>
                    <!-- Periksa apakah NISN sudah ada dan tampilkan pesan kesalahan -->
                    <div class="alert alert-danger">
                        NISN sudah digunakan. Silakan gunakan NISN yang berbeda.
                    </div>
                    <?php elseif ((!isset($nisn_exists) || !$nisn_exists) && (isset($nis_exists) && $nis_exists)): ?>
                    <!-- Periksa apakah NIS sudah ada dan tampilkan pesan kesalahan -->
                    <div class="alert alert-danger">
                        NIS sudah digunakan. Silakan gunakan NIS yang berbeda.
                    </div>
                    <?php endif; ?>


                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <?php echo form_open('DataSiswa/proses_tambah_siswa'); ?>
                                            <h1 class="h6 text-gray-800" style="text-align: center;">Data Pribadi Siswa
                                            </h1>
                                            <hr>
                                            <div class="form-group">
                                                <label for="nis">NIS</label>
                                                <input type="text" class="form-control" name="nis"
                                                    oninput="allowOnlyNumericInput(this, 'errorNIS')" required>
                                                <small id="errorNIS" class="text-danger" style="display:none;">Hanya
                                                    bisa diisi oleh angka.</small>
                                                <?php echo form_error('nis', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="nisn">NISN</label>
                                                <input type="text" class="form-control" name="nisn" id="nisn"
                                                    oninput="allowOnlyNumericInput(this, 'errorNISN'); setUsernameFromNISN()"
                                                    required>
                                                <small id="errorNISN" class="text-danger" style="display:none;">Hanya
                                                    bisa diisi oleh angka.</small>
                                                <?php echo form_error('nisn', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_lengkap"
                                                    oninput="allowOnlyAlphabeticInput(this, 'errorNamaLengkap')"
                                                    required>
                                                <small id="errorNamaLengkap" class="text-danger"
                                                    style="display:none;">Hanya bisa diisi oleh huruf saja.</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <div>
                                                    <label class="radio-inline"><input type="radio" name="jenis_kelamin"
                                                            value="Laki-laki" required> Laki-laki</label>
                                                    <label class="radio-inline"><input type="radio" name="jenis_kelamin"
                                                            value="Perempuan" required> Perempuan</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" name="alamat" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="tinggal_dengan">Tinggal Dengan</label>
                                                <input type="text" class="form-control" name="tinggal_dengan">
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!----- End Data Pribadi ----->


                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="card mb-4">
                                        <div class="card-body">

                                            <h1 class="h6 text-gray-800" style="text-align: center;">Data Lanjutan Siswa
                                            </h1>
                                            <hr>

                                            <div class="form-group">
                                                <label for="nama_ayah">Nama Ayah</label>
                                                <input type="text" class="form-control" name="nama_ayah"
                                                    oninput="allowOnlyAlphabeticInput(this, 'errorNamaAyah')">
                                                <small id="errorNamaAyah" class="text-danger"
                                                    style="display:none;">Hanya bisa diisi oleh huruf saja.</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="nama_ibu">Nama Ibu</label>
                                                <input type="text" class="form-control" name="nama_ibu"
                                                    oninput="allowOnlyAlphabeticInput(this, 'errorNamaIbu')">
                                                <small id="errorNamaIbu" class="text-danger" style="display:none;">Hanya
                                                    bisa diisi oleh huruf saja.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_wali">Nama Wali</label>
                                                <input type="text" class="form-control" name="nama_wali"
                                                    oninput="allowOnlyAlphabeticInput(this, 'errorNamaWali')">
                                                <small id="errorNamaWali" class="text-danger"
                                                    style="display:none;">Hanya bisa diisi oleh huruf saja.</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="no_telp_ortu">No. Telp Orang Tua</label>
                                                <input type="text" class="form-control" name="no_telp_ortu"
                                                    oninput="allowOnlyNumericInput(this, 'errorNoTelpOrtu')">
                                                <small id="errorNoTelpOrtu" class="text-danger"
                                                    style="display:none;">Hanya bisa diisi oleh angka.</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="no_telp_wali">No. Telp Wali</label>
                                                <input type="text" class="form-control" name="no_telp_wali"
                                                    oninput="allowOnlyNumericInput(this, 'errorNoTelpWali')">
                                                <small id="errorNoTelpWali" class="text-danger"
                                                    style="display:none;">Hanya bisa diisi oleh angka.</small>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="aktif" id="aktif"
                                                    value="1" required>
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="username" id="username"
                                                    required>
                                            </div>

                                            <div class="form-group">

                                                <input type="hidden" class="form-control" name="password"
                                                    value="siswasmktignc" readonly>
                                            </div>

                                            <?php
                    $query = $this->db->query("SELECT MAX(id_users) AS max_id FROM users");
                    $row = $query->row();
                    $max_id = $row->max_id;
                    $next_id = $max_id + 1;
                    ?>
                                            <input type="hidden" name="id_users" id="id_users"
                                                value="<?php echo $next_id; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary"
                            style="width: 100%; max-width: 300px;">
                    </div>
                    <?php echo form_close(); ?>
                </div>

                <br>
                <?php $this->load->view('Bar/Footer_admin'); ?>

                <!-- include modal -->
                <?php $this->load->view('Bar/Logout_modal'); ?>
            </div>
            <!-- Footer Admin -->

            <script>
            function setUsernameFromNISN() {
                var nisnInput = document.getElementById('nisn');
                var usernameInput = document.getElementById('username');

                // Menghapus spasi pada nilai nisn dan mengganti karakter non-alfanumerik dengan _
                var nisnValue = nisnInput.value.replace(/\s+/g, '').replace(/\W/g, '_');

                // Mengisi nilai username dengan nilai nisn yang telah diubah
                usernameInput.value = nisnValue;
            }
            </script>

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
            <script src="assets/datatables/jquery.dataTables.min.js"></script>
            <script src="assets/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="assets/js/demo/datatables-demo.js"></script>

            <script>
            function allowOnlyNumericInput(inputElement, errorElementId) {
                var inputValue = inputElement.value.replace(/[^0-9]/g, '');
                inputElement.value = inputValue;

                // Display error message if non-numeric characters are entered
                var errorElement = document.getElementById(errorElementId);
                if (!/^[0-9]+$/.test(inputValue)) {
                    errorElement.style.display = 'block';
                } else {
                    errorElement.style.display = 'none';
                }
            }

            function allowOnlyAlphabeticInput(inputElement, errorElementId) {
                var inputValue = inputElement.value.trim();

                // Replace non-alphabetic characters with an empty string
                var alphabeticValue = inputValue.replace(/[^a-zA-Z\s]/g, '');

                // Update the input value with the cleaned alphabetic value
                inputElement.value = alphabeticValue;

                // Display error message if non-alphabetic characters are entered
                var errorElement = document.getElementById(errorElementId);
                if (/[^a-zA-Z\s]/.test(inputValue)) {
                    errorElement.style.display = 'block';
                } else {
                    errorElement.style.display = 'none';
                }
            }
            </script>

</body>

</html>