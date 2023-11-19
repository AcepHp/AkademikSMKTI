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
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Tambah Data Wali Kelas</h1>
                        </div>
                    </div>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <div class="box box-info">
                                    <div class="box-body">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <?php echo form_open('Wali/tambah_wali'); ?>
                                                <h1 class="h6 text-gray-800" style="text-align: center;">Tambah Wali
                                                    Kelas
                                                </h1>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="kode_jurusan">Jurusan</label>
                                                    <select class="form-control" name="kode_jurusan" id="kode_jurusan"
                                                        required>
                                                        <option value="">Pilih Jurusan</option>
                                                        <?php foreach ($jurusan as $jurusan_item): ?>
                                                        <option value="<?php echo $jurusan_item->kode_jurusan; ?>">
                                                            <?php echo $jurusan_item->nama_jurusan; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="kode_tingkatan">Tingkatan</label>
                                                    <select class="form-control" name="kode_tingkatan"
                                                        id="kode_tingkatan" required>
                                                        <option value="">Pilih Tingkatan</option>
                                                        <?php foreach ($Tingkatan as $tingkatan_item): ?>
                                                        <option value="<?php echo $tingkatan_item->kode_tingkatan; ?>">
                                                            <?php echo $tingkatan_item->nama_tingkatan; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="id_kelas">Kelas:</label>
                                                    <select class="form-control" name="id_kelas" id="id_kelas" required>
                                                        <option value="">Pilih Kelas</option>
                                                        <?php foreach ($kelas as $kelas_item): ?>
                                                        <option value="<?php echo $kelas_item->id_kelas; ?>"
                                                            data-jurusan="<?php echo $kelas_item->kode_jurusan; ?>"
                                                            data-tingkatan="<?php echo $kelas_item->kode_tingkatan; ?>">
                                                            <?php echo $kelas_item->nama_kelas; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="wali_kelas">Wali Kelas:</label>
                                                    <select class="form-control" name="wali_kelas" required>
                                                        <option value="">Pilih Wali Kelas</option>
                                                        <?php foreach ($guru as $guru_item): ?>
                                                        <option value="<?php echo $guru_item->ID_Guru; ?>">
                                                            <?php echo $guru_item->Nama_Lengkap; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="text-center">
                                                    <input type="submit" name="Submit" value="Simpan"
                                                        class="btn btn-primary" style="width: 100%; max-width: 300px;">
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
            <!-- Footer Admin -->
            <?php $this->load->view('Bar/Footer_admin'); ?>
        </div>
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
    var jurusanDropdown = document.getElementById('kode_jurusan');
    var tingkatanDropdown = document.getElementById('kode_tingkatan');
    var kelasDropdown = document.getElementById('id_kelas');

    jurusanDropdown.addEventListener('change', updateKelasOptions);
    tingkatanDropdown.addEventListener('change', updateKelasOptions);

    function updateKelasOptions() {
        var selectedJurusan = jurusanDropdown.value;
        var selectedTingkatan = tingkatanDropdown.value;

        kelasDropdown.innerHTML = '<option value="">Pilih Kelas</option>';

        <?php foreach ($kelas as $kelas_item): ?>
        <?php // Check if the current Kelas item matches the selected Jurusan and Tingkatan ?>
        if (
            '<?php echo $kelas_item->kode_jurusan; ?>' === selectedJurusan &&
            '<?php echo $kelas_item->kode_tingkatan; ?>' === selectedTingkatan
        ) {
            var option = document.createElement('option');
            option.value = '<?php echo $kelas_item->id_kelas; ?>';
            option.textContent = '<?php echo $kelas_item->nama_kelas; ?>';
            kelasDropdown.appendChild(option);
        }
        <?php endforeach; ?>
    }
    </script>

</body>

</html>