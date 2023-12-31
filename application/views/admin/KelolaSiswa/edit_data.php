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
    <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?php echo base_url()?>assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Di bagian <head> dari file edit_datasiswa.php -->
    <link href="<?= base_url('assets/css/edit_datasiswa.css') ?>" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Data Siswa</h1>
                    </div>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <div class="box box-info">
                                    <div class="box-body">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <?php echo form_open('datasiswa/update_data_siswa/'.$siswa_data->ID_Siswa); ?>
                                                <h1 class="h6 text-gray-800" style="text-align: center;">Data Pribadi
                                                    Siswa
                                                </h1>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="nisn">NISN</label>
                                                    <input type="text" class="form-control" name="nisn" id="nisn"
                                                        value="<?php echo $siswa_data->NISN; ?>"
                                                        oninput="validateNISNLength(this, 'errorNISN'); allowOnlyNumericInput(this, 'errorNISN');"
                                                        required pattern="[0-9]{10}" maxlength="10">
                                                    <small id="errorNISN" class="text-danger"
                                                        style="display:none;">Harus
                                                        terdiri dari 10 digit angka.</small>
                                                    <?php echo form_error('nisn', '<small class="text-danger">', '</small>'); ?>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nis">NIS</label>
                                                    <input type="text" class="form-control" name="nis"
                                                        value="<?php echo $siswa_data->NIS; ?>"
                                                        oninput="allowOnlyNumericInput(this, 'errorNIS')" required
                                                        maxlength="10">
                                                    <small id="errorNIS" class="text-danger" style="display:none;">Hanya
                                                        bisa diisi oleh angka.</small>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="nama_lengkap"
                                                        value="<?php echo $siswa_data->Nama_lengkap; ?>"
                                                        oninput="allowOnlyAlphabeticInput(this, 'errorNamaLengkap')"
                                                        required>
                                                    <small id="errorNamaLengkap" class="text-danger"
                                                        style="display:none;">Hanya bisa diisi oleh huruf saja.</small>
                                                </div>


                                                <div class="form-group">
                                                    <label for="tempat_lahir">Tempat Lahir</label>
                                                    <input type="text" class="form-control" name="tempat_lahir"
                                                        value="<?php echo $siswa_data->Tempat_lahir; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" name="tanggal_lahir"
                                                        value="<?php echo $siswa_data->Tanggal_Lahir; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                    <input type="text" class="form-control" name="jenis_kelamin"
                                                        value="<?php echo $siswa_data->Jenis_kelamin; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <textarea class="form-control" name="alamat"
                                                        required><?php echo $siswa_data->Alamat; ?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tinggal_dengan">Tinggal Dengan</label>
                                                    <input type="text" class="form-control" name="tinggal_dengan"
                                                        value="<?php echo $siswa_data->Tinggal_dengan; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" name="email"
                                                        value="<?php echo $siswa_data->email; ?>">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <div class="box box-info">
                                            <div class="box-body">
                                                <div class="card mb-4">
                                                    <div class="card-body">

                                                        <h1 class="h6 text-gray-800" style="text-align: center;">Data
                                                            Lanjutan
                                                            Siswa
                                                        </h1>
                                                        <hr>

                                                        <div class="form-group">
                                                            <label for="nama_ayah">Nama Ayah</label>
                                                            <input type="text" class="form-control" name="nama_ayah"
                                                                value="<?php echo $siswa_data->Nama_ayah; ?>"
                                                                oninput="allowOnlyAlphabeticInput(this, 'errorNamaAyah')">
                                                            <small id="errorNamaAyah" class="text-danger"
                                                                style="display:none;">Hanya bisa diisi oleh huruf
                                                                saja.</small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="nama_ibu">Nama Ibu</label>
                                                            <input type="text" class="form-control" name="nama_ibu"
                                                                value="<?php echo $siswa_data->Nama_ibu; ?>"
                                                                oninput="allowOnlyAlphabeticInput(this, 'errorNamaIbu')">
                                                            <small id="errorNamaIbu" class="text-danger"
                                                                style="display:none;">Hanya bisa diisi oleh huruf
                                                                saja.</small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="nama_wali">Nama Wali</label>
                                                            <input type="text" class="form-control" name="nama_wali"
                                                                value="<?php echo $siswa_data->Nama_wali; ?>"
                                                                oninput="allowOnlyAlphabeticInput(this, 'errorNamaWali')">
                                                            <small id="errorNamaWali" class="text-danger"
                                                                style="display:none;">Hanya bisa diisi oleh huruf
                                                                saja.</small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="no_telp_ortu">No Telp Orang Tua</label>
                                                            <input type="text" class="form-control" name="no_telp_ortu"
                                                                value="<?php echo $siswa_data->No_telp_ortu; ?>"
                                                                oninput="allowOnlyNumericInput(this, 'errorNoTelpOrtu')">
                                                            <small id="errorNoTelpOrtu" class="text-danger"
                                                                style="display:none;">Hanya bisa diisi oleh
                                                                angka.</small>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="no_telp_wali">No Telp Wali</label>
                                                            <input type="text" class="form-control" name="no_telp_wali"
                                                                value="<?php echo $siswa_data->No_telp_wali; ?>"
                                                                oninput="allowOnlyNumericInput(this, 'errorNoTelpWali')">
                                                            <small id="errorNoTelpWali" class="text-danger"
                                                                style="display:none;">Hanya bisa diisi oleh
                                                                angka.</small>
                                                        </div>


                                                        <div class="form-group">

                                                            <input type="hidden" class="form-control"
                                                                name="new_password"
                                                                placeholder="Masukkan password baru">
                                                        </div>

                                                        <div class="text-center">
                                                            <input type="submit" name="submit" value="Simpan Perubahan"
                                                                class="btn btn-primary"
                                                                style="width: 100%; max-width: 300px;">
                                                        </div>
                                                        <?php echo form_close(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Footer Admin -->
                <?php $this->load->view('Bar/Footer_admin'); ?>

                <!-- include modal -->
                <?php $this->load->view('Bar/Logout_modal'); ?>


                <!-- Bootstrap core JavaScript-->
                <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
                <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js">
                </script>

                <!-- Core plugin JavaScript-->
                <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js">
                </script>

                <!-- Custom scripts for all pages-->
                <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="<?=base_url('assets/')?>js/demo/chart-area-demo.js"></script>
                <script src="<?=base_url('assets/')?>js/demo/chart-pie-demo.js"></script>

                <!-- Page level plugins -->
                <script src="<?php echo base_url()?>assets/datatables/jquery.dataTables.min.js">
                </script>
                <script src="<?php echo base_url()?>assets/datatables/dataTables.bootstrap4.min.js">
                </script>

                <!-- Page level custom scripts -->
                <script src="<?php echo base_url()?>assets/js/demo/datatables-demo.js"></script>

                <script>
                function validateNISNLength(inputElement, errorElementId) {
                    var inputValue = inputElement.value.trim();

                    // Display error message if NISN length is not equal to 10
                    var errorElement = document.getElementById(errorElementId);
                    if (inputValue.length !== 10) {
                        errorElement.style.display = 'block';
                        document.getElementById('submitButton').disabled = true; // Menonaktifkan tombol "Simpan"
                    } else {
                        errorElement.style.display = 'none';
                        document.getElementById('submitButton').disabled = false; // Mengaktifkan tombol "Simpan"
                    }
                }

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