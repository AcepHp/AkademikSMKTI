<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Guru</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
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
                            <select class="form-control" name="kode_jurusan" required>
                                <option value="">Pilih Jurusan</option>
                                <?php foreach ($jurusan_list as $jurusan_item): ?>
                                <option value="<?php echo $jurusan_item->kode_jurusan; ?>">
                                    <?php echo $jurusan_item->nama_jurusan; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_kelas">Kelas</label>
                            <select class="form-control" name="id_kelas" id="id_kelas" required>
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($kelas as $kelas_item) : ?>
                                <option value="<?php echo $kelas_item->id_kelas; ?>"
                                    <?php echo isset($_POST['id_kelas']) && $_POST['id_kelas'] == $kelas_item->id_kelas ? 'selected' : ''; ?>>
                                    <?php echo $kelas_item->nama_kelas; ?></option>
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
    <script type="text/javascript">
    $(document).ready(function() {
        // Ketika halaman dimuat, periksa apakah ada data post sebelumnya untuk id_kelas
        var selectedKelas = '<?php echo isset($_POST['id_kelas']) ? $_POST['id_kelas'] : ''; ?>';

        // Menyimpan referensi ke dropdown Kelas
        var dropdownKelas = $('select[name="id_kelas"]');

        // Ketika pilihan jurusan berubah
        $('select[name="kode_jurusan"]').on('change', function() {
            var kode_jurusan = $(this).val();
            if (kode_jurusan) {
                $.ajax({
                    url: '<?php echo site_url('Mapel/get_kelas_by_jurusan'); ?>',
                    type: 'POST',
                    data: {
                        kode_jurusan: kode_jurusan
                    },
                    dataType: 'json',
                    success: function(data) {
                        dropdownKelas.empty();
                        dropdownKelas.append('<option value="">Pilih Kelas</option>');
                        $.each(data, function(key, value) {
                            dropdownKelas.append('<option value="' + key + '">' +
                                value + '</option>');
                        });

                        // Setel kembali nilai Kelas yang dipilih sebelumnya (jika ada)
                        dropdownKelas.val(selectedKelas);
                    }
                });
            } else {
                // Jika Jurusan tidak dipilih, kosongkan dan tampilkan opsi "Pilih Kelas"
                dropdownKelas.empty();
                dropdownKelas.append('<option value="">Pilih Kelas</option>');
            }
        });

        // Ketika halaman dimuat, periksa apakah Jurusan telah dipilih sebelumnya
        var kode_jurusan_selected = $('select[name="kode_jurusan"]').val();
        if (kode_jurusan_selected) {
            // Jika Jurusan telah dipilih sebelumnya, secara otomatis memicu perubahan pada dropdown Kelas
            $('select[name="kode_jurusan"]').change();
        }
    });
    </script>




</body>

</html>