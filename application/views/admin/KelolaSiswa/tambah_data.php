<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Data Siswa</title>

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
        <?php $this->load->view('Bar/Sidebar_guru'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- TopBar Guru -->
                <?php $this->load->view('Bar/Navbar_guru'); ?>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data Siswa</h1>
                    </div>
                </div>


                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <?php echo form_open('datasiswa/proses_tambah_siswa'); ?>
                                            <h1 class="h6 text-gray-800" style="text-align: center;">Data Pribadi Siswa
                                            </h1>
                                            <hr>
                                            <div class="form-group">
                                                <label for="nis">NIS</label>
                                                <input type="text" class="form-control" name="nis" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="nisn">NISN</label>
                                                <input type="text" class="form-control" name="nisn" id="nisn" required
                                                    oninput="setUsernameFromNISN()">
                                            </div>

                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_lengkap" required>
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
                                            

                                            <div class="form-group">
                                                <!-- Menyembunyikan elemen select -->
                                                <select class="form-control" name="status" style="display: none;">
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                                </select>
                                                <!-- Menampilkan nilai yang dipilih -->
                                                <span style="display: none;" id="selected-status">Aktif</span>
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
                                                <input type="text" class="form-control" name="nama_ayah">
                                            </div>

                                            <div class="form-group">
                                                <label for="nama_ibu">Nama Ibu</label>
                                                <input type="text" class="form-control" name="nama_ibu">
                                            </div>

                                            <div class="form-group">
                                                <label for="nama_wali">Nama Wali</label>
                                                <input type="text" class="form-control" name="nama_wali">
                                            </div>

                                            <div class="form-group">
                                                <label for="no_telp_ortu">No. Telp Orang Tua</label>
                                                <input type="text" class="form-control" name="no_telp_ortu">
                                            </div>

                                            <div class="form-group">
                                                <label for="no_telp_wali">No. Telp Wali</label>
                                                <input type="text" class="form-control" name="no_telp_wali">
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="aktif" id="aktif" value="1"
                                                    required>
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
            // Mendapatkan elemen select dan elemen span
            var selectStatus = document.querySelector('select[name="status"]');
            var selectedStatus = document.getElementById('selected-status');

            // Menggunakan event change untuk memperbarui nilai span saat pemilihan berubah
            selectStatus.addEventListener('change', function() {
                selectedStatus.textContent = selectStatus.value;
            });
            </script>

</body>

</html>