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
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <linkhm
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body id="page-top">
    <!-- TopBar Guru -->
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

                    <!-- Page Heading -->
                    <div class="container mt-5">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Tambah Mata Pelajaran</h1>
                        </div>

                        <?php echo validation_errors(); ?>
                        <?php echo form_open('mapel/proses_tambah_mapel'); ?>

                        <div class="form-group">
                            <label for="nama_mapel">Nama Mata Pelajaran:</label>
                            <input type="text" class="form-control" id="nama_mapel" name="nama_mapel"
                                placeholder="Masukkan Nama Mapel" required>
                        </div>

                        <div class="form-group">
                            <label for="kode_jurusan">Jurusan</label>
                            <select class="form-control" name="kode_jurusan" id="kode_jurusan" required>
                                <option value="">Pilih Jurusan</option>
                                <?php foreach ($jurusan_list as $jurusan_item): ?>
                                <option value="<?php echo $jurusan_item->kode_jurusan; ?>">
                                    <?php echo $jurusan_item->nama_jurusan; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kode_tingkatan">Tingkatan</label>
                            <select class="form-control" name="kode_tingkatan" id="kode_tingkatan" required>
                                <option value="">Pilih Tingkatan</option>
                                <?php foreach ($tingkatan_list as $tingkatan_item) : ?>
                                <option value="<?php echo $tingkatan_item->kode_tingkatan; ?>">
                                    <?php echo $tingkatan_item->nama_tingkatan; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <?php $this->load->view('Bar/Footer_admin'); ?>
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- End of Main Content -->

    <!-- Footer Admin -->
    <?php $this->load->view('Bar/Logout_modal'); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets/') ?>js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <!-- <script type="text/javascript">
    $(document).ready(function() {
        // Ketika pilihan jurusan berubah
        $('#kode_jurusan').on('change', function() {
            var kode_jurusan = $(this).val();
            var dropdownTingkatan = $('#kode_tingkatan');

            if (kode_jurusan) {
                // Filter tingkatan berdasarkan jurusan (sesuai dengan data yang sudah dimuat)
                var filteredTingkatan = <?php echo json_encode($filteredTingkatan); ?>;

                // Hapus opsi lama dan tambahkan opsi yang sesuai
                dropdownTingkatan.empty();
                dropdownTingkatan.append('<option value="">Pilih Tingkatan</option>');
                $.each(filteredTingkatan, function(key, value) {
                    dropdownTingkatan.append('<option value="' + key + '">' + value +
                        '</option>');
                });
            } else {
                // Jika Jurusan tidak dipilih, kosongkan dan tampilkan opsi "Pilih Tingkatan"
                dropdownTingkatan.empty();
                dropdownTingkatan.append('<option value="">Pilih Tingkatan</option>');
            }
        });

        // Ketika halaman dimuat, periksa apakah Jurusan telah dipilih sebelumnya
        var kode_jurusan_selected = $('#kode_jurusan').val();
        if (kode_jurusan_selected) {
            // Jika Jurusan telah dipilih sebelumnya, secara otomatis memicu perubahan pada dropdown Tingkatan
            $('#kode_jurusan').change();
        }
    });
    </script> -->

</body>

</html>