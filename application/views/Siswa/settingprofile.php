<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SMK-TI GNC</title>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/csssiswa.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar Guru -->
        <?php $this->load->view('Bar/Sidebar_siswa'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- TopBar Guru -->
                <?php $this->load->view('Bar/Navbar_siswa'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Setting profile</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Card kiri  -->
                        <div class="container mt-4">
                            <?php
                            $showError = false;
                            $errorMessage = '';

                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                if (empty($_POST['pwdsekarang']) || empty($_POST['pwdbaru'])) {
                                    $showError = true;
                                    $errorMessage = 'Kolom input tidak boleh kosong.';
                                } else {
                                    $showError = form_error('pwdsekarang') || form_error('pwdbaru');
                                    if ($showError) {
                                        $errorMessage = '';
                                        if (form_error('pwdsekarang')) {
                                            $errorMessage .= 'Kolom password sekarang harus di isi<br>';
                                        }
                                        if (form_error('pwdbaru')) {
                                            $errorMessage .= 'Kolom password baru harus di isi<br>';
                                        }
                                    }
                                }
                            }
                            ?>
                            <?php if ($showError): ?>
                            <div class="alert alert-danger fade show mt-3" role="alert">
                                <?= $errorMessage; ?>
                            </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="fixed-card card"
                                        style="width: 280px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                                        <div class="card" style="margin: 30px auto; width: 220px; border: none;">
                                            <div class="rounded-circle border"
                                                style="width: 156px; height: 156px; padding: 3px; background-color: white; display: flex; justify-content: center; align-items: center; margin: 0 auto;">
                                                <?php if (isset($siswaa->file_foto) && !empty($siswaa->file_foto)) : ?>
                                                <img class="card-img-top rounded-circle"
                                                    src="<?= base_url('assets/uploads/foto/') . $siswaa->file_foto ?>"
                                                    alt="Card image" style="width: 100%; height: 100%;">
                                                <?php else : ?>
                                                <img class="card-img-top rounded-circle"
                                                    src="<?= base_url('assets/images/avatar2.png') ?>" alt="Card image"
                                                    style="width: 100%; height: 100%;">
                                                <?php endif; ?>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text"
                                                    style="font-family: Poppins,sans-serif; font-size: 12px; color: #617182;">
                                                    Max Upload Photo 10 MB :</p>
                                                <h4 class="card-title"
                                                    style="font-family: Poppins,sans-serif; font-size: 15px; margin-bottom: 0px;">
                                                    <?= isset($siswa->Nama_lengkap) ? $siswa->Nama_lengkap : 'Siswa'; ?>
                                                </h4>
                                                <span class="card-title"
                                                    style="font-family: Poppins,sans-serif; font-size: 12px; color: #617182;"><?= $siswa->email ?? 'Siswa'; ?></span>
                                                <br><br>
                                                <!-- Input for image preview -->
                                                <form id="uploadPhotoForm"
                                                    action="<?= base_url('siswa/tambah_dan_rubah_foto'); ?>"
                                                    method="post" enctype="multipart/form-data">
                                                    <input type="file" id="uploadPhotoInput" name="file_foto"
                                                        accept="image/*" style="display: none;">
                                                    <button type="button" id="choosePhotoButton"
                                                        class="btn btn-primary">Pilih Foto</button>
                                                    <div id="photoPreview" style="display: none;">
                                                        <img id="previewImage" src="" alt="Pratinjau Foto">
                                                    </div>
                                                    <button class="btn btn-primary" id="updatePhotoBtn"
                                                        style="display: none; width: 150px; text-align: center; margin: 10px auto 0;">Perbarui
                                                        Foto</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Card kedua yaitu Data akun -->

                                <div class="col-md-6">
                                    <div class="card"
                                        style="width: 680px; margin-left: -200px; box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                                        <h4 class="card-title"
                                            style="font-family: Poppins,sans-serif;font-size: 14px; margin-left: 30px; margin-top: 30px; position: relative;">
                                            Data Akun Anda
                                            <div
                                                style="position: absolute;top:35px; bottom: -5px; left: 0; width: 99%; height: 2px; background-color: #002147;">
                                            </div>
                                        </h4>
                                        <div class="card"
                                            style="margin: 30px;padding-left: 30px; width: 640px; border: none;">
                                            <form class="form-horizontal" style="padding-left: 40px;" method="post"
                                                action="<?= base_url('siswa/change_password'); ?>"
                                                id="changePasswordForm">
                                                <!-- Menampilkan pesan kesalahan jika ada -->
                                                <div class="form-group">
                                                    <label for="pwdsekarang" style="font-size: 13px;">Masukkan Password
                                                        Anda:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" type="password"
                                                            id="pwdsekarang" name="pwdsekarang">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pwdbaru" style="font-size: 13px;">Password Baru:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" type="password"
                                                            id="pwdbaru" name="pwdbaru">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Ubah Password</button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Card ketiga yaitu Data siswa -->

                                    <div class="card"
                                        style="width: 680px; margin-top: 10px; margin-left: -200px; box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                                        <h4 class="card-title"
                                            style="font-family: Poppins,sans-serif; font-size: 14px; margin-left: 30px; margin-top: 30px; position: relative;">
                                            Data Siswa
                                            <div
                                                style="position: absolute; top: 35px; bottom: -5px; left: 0; width: 99%; height: 2px; background-color: #002147;">
                                            </div>
                                        </h4>
                                        <div class="card"
                                            style="margin: 30px; padding-left: 30px; width: 640px; border: none;">
                                            <?php echo validation_errors(); ?>
                                            <form class="form-horizontal" style="padding-left: 40px;" method="post"
                                                action="<?= base_url('siswa/update_data'); ?>" id="ubahdata">

                                                <div class="form-group">
                                                    <label for="NIS" style="font-size: 13px;">NIS:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="NIS" type="text"
                                                            name="NIS" value="<?= $siswa->NIS; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="NISN" style="font-size: 13px;">NISN:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="NISN" type="text"
                                                            name="NISN" value="<?= $siswa->NISN; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Nama_lengkap" style="font-size: 13px;">Nama
                                                        Lengkap:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="Nama_lengkap"
                                                            type="text" name="Nama_lengkap"
                                                            value="<?= $siswa->Nama_lengkap; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Tempat_lahir" style="font-size: 13px;">Tempat
                                                        Lahir:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="Tempat_lahir"
                                                            type="text" name="Tempat_lahir"
                                                            value="<?= $siswa->Tempat_lahir; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Tanggal_Lahir" style="font-size: 13px;">Tanggal
                                                        Lahir:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="Tanggal_Lahir"
                                                            type="date" name="Tanggal_Lahir"
                                                            value="<?= $siswa->Tanggal_Lahir; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Jenis_kelamin" style="font-size: 13px;">Jenis
                                                        Kelamin:</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control no-border" id="Jenis_kelamin"
                                                            name="Jenis_kelamin" required>
                                                            <option value="Laki-laki"
                                                                <?= ($siswa->Jenis_kelamin === 'Laki-laki') ? 'selected' : ''; ?>>
                                                                Laki-laki</option>
                                                            <option value="Perempuan"
                                                                <?= ($siswa->Jenis_kelamin === 'Perempuan') ? 'selected' : ''; ?>>
                                                                Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Alamat" style="font-size: 13px;">Alamat:</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control no-border" id="Alamat"
                                                            name="Alamat" rows="3"><?= $siswa->Alamat; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Tinggal_dengan" style="font-size: 13px;">Tinggal
                                                        dengan:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="Tinggal_dengan"
                                                            type="text" name="Tinggal_dengan"
                                                            value="<?= $siswa->Tinggal_dengan; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Nama_ayah" style="font-size: 13px;">Nama Ayah:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="Nama_ayah" type="text"
                                                            name="Nama_ayah" value="<?= $siswa->Nama_ayah; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Nama_ibu" style="font-size: 13px;">Nama Ibu:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="Nama_ibu" type="text"
                                                            name="Nama_ibu" value="<?= $siswa->Nama_ibu; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Nama_wali" style="font-size: 13px;">Nama Wali:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="Nama_wali" type="text"
                                                            name="Nama_wali" value="<?= $siswa->Nama_wali; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="No_telp_ortu" style="font-size: 13px;">No. Telp Orang
                                                        Tua:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="No_telp_ortu"
                                                            type="text" name="No_telp_ortu"
                                                            value="<?= $siswa->No_telp_ortu; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="No_telp_wali" style="font-size: 13px;">No. Telp
                                                        Wali:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="No_telp_wali"
                                                            type="text" name="No_telp_wali"
                                                            value="<?= $siswa->No_telp_wali; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" style="font-size: 13px;">Email:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="email" type="email"
                                                            name="email" value="<?= $siswa->email; ?>">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Data</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Content Row -->
                                </div>
                            </div>
                            <!-- End of Main Content -->
                            <!-- Footer -->
                            <footer class="sticky-footer bg-white">
                                <div class="container my-auto">
                                    <div class="copyright text-center my-auto">
                                        <span>Copyright &copy; Your Website 2021</span>
                                    </div>
                                </div>
                            </footer>
                            <!-- End of Footer -->
                        </div>
                        <!-- End of Content Wrapper -->
                    </div>
                    <!-- End of Page Wrapper -->
                    <!-- Scroll to Top Button-->
                    <a class="scroll-to-top rounded" href="#page-top">
                        <i class="fas fa-angle-up"></i>
                    </a>
                    <?php $this->load->view('Bar/Logout_modal'); ?>
                    <!-- Bootstrap core JavaScript-->
                    <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
                    <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <!-- Core plugin JavaScript-->
                    <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
                    <!-- Custom scripts for all pages-->
                    <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                    <script>
                    // JavaScript untuk menampilkan pratinjau foto sebelum diunggah
                    $(document).ready(function() {
                        $('#choosePhotoButton').click(function() {
                            $('#uploadPhotoInput').click();
                        });

                        $('#uploadPhotoInput').change(function() {
                            var file = $(this)[0].files[0];
                            if (file) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#photoPreview').show();
                                    $('#previewImage').attr('src', e.target.result);
                                    $('#updatePhotoBtn').show();
                                }
                                reader.readAsDataURL(file);
                            }
                        });
                    });
                    </script>
                    <script>
                    // JavaScript for SweetAlert confirmation
                    $(document).ready(function() {
                        $('#changePasswordForm').submit(function(e) {
                            e.preventDefault(); // Mencegah pengiriman formulir otomatis

                            Swal.fire({
                                title: 'Apakah Anda Yakin?',
                                text: "Anda tidak akan dapat mengembalikan ini!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, Ganti!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Jika pengguna mengonfirmasi, kirim formulir
                                    this.submit();
                                } else {
                                    Swal.fire(
                                        'Dibatalkan',
                                        'Password tidak jadi diganti',
                                        'info'
                                    );
                                }
                            });
                        });

                        // Check for success or error flashdata and display SweetAlert accordingly
                        <?php if ($this->session->flashdata('alert') && $this->session->flashdata('msg')): ?>
                        var alertType = '<?= $this->session->flashdata("alert") ?>';
                        var message = '<?= $this->session->flashdata("msg") ?>';

                        Swal.fire({
                            title: alertType === 'success' ? 'Berhasil' : 'Gagal',
                            text: message,
                            icon: alertType,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            <?php unset($_SESSION['alert']); ?>
                            <?php unset($_SESSION['msg']); ?>
                        });
                        <?php endif; ?>
                    });
                    </script>
                    <!-- Tambahkan blok skrip berikut di bagian akhir body HTML Anda -->
                    <!-- Tambahkan blok skrip berikut di bagian akhir body HTML Anda -->
                    <script>
                    // JavaScript for SweetAlert confirmation
                    $(document).ready(function() {
                        $('#ubahdata').submit(function(e) {
                            e.preventDefault(); // Mencegah pengiriman formulir otomatis

                            Swal.fire({
                                title: 'Apakah Anda Yakin?',
                                text: "Anda tidak akan dapat mengembalikan ini!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, Update!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Jika pengguna mengonfirmasi, kirim formulir
                                    this.submit();
                                } else {
                                    Swal.fire(
                                        'Dibatalkan',
                                        'Perubahan data dibatalkan',
                                        'info'
                                    );
                                }
                            });
                        });
                    });
                    </script>



</body>

</html>