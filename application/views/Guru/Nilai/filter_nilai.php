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

        <!-- Sidebar Guru -->
        <?php $this->load->view('Bar/Sidebar_admin'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- TopBar Guru -->
                <?php $this->load->view('Bar/Navbar_admin'); ?>



                <!-- Content Row -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Nilai Siswa</h1>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <form action="<?php echo site_url('Nilai/filter_data'); ?>" method="post">
                                                <table class="table table-bordered">
                                                    <div class="form-group">
                                                        <label for="kode_jurusan">Jurusan</label>
                                                        <select class="form-control" name="kode_jurusan" required>
                                                            <option value="">Pilih Jurusan</option>
                                                            <?php foreach ($jurusan as $jurusan_item): ?>
                                                            <option value="<?php echo $jurusan_item->kode_jurusan; ?>"
                                                                <?php echo isset($_POST['kode_jurusan']) && $_POST['kode_jurusan'] == $jurusan_item->kode_jurusan ? 'selected' : ''; ?>>
                                                                <?php echo $jurusan_item->nama_jurusan; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kode_tingkatan">Tingkatan</label>
                                                        <select class="form-control" name="kode_tingkatan" required>
                                                            <option value="">Pilih Tingkatan</option>
                                                            <?php foreach ($tingkatan as $tingkatan_item): ?>
                                                            <option
                                                                value="<?php echo $tingkatan_item->kode_tingkatan; ?>"
                                                                <?php echo isset($_POST['kode_tingkatan']) && $_POST['kode_tingkatan'] == $tingkatan_item->kode_tingkatan ? 'selected' : ''; ?>>
                                                                <?php echo $tingkatan_item->nama_tingkatan; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_kelas">Kelas</label>
                                                        <select class="form-control" name="id_kelas" id="id_kelas"
                                                            required>
                                                            <option value="">Pilih Kelas</option>
                                                            <?php foreach ($kelas as $kelas_item) : ?>
                                                            <option value="<?php echo $kelas_item->id_kelas; ?>"
                                                                <?php echo isset($_POST['id_kelas']) && $_POST['id_kelas'] == $kelas_item->id_kelas ? 'selected' : ''; ?>>
                                                                <?php echo $kelas_item->nama_kelas; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <tr>
                                                        <td colspan="2">
                                                            <button type="submit" name="cari"
                                                                class="btn btn-success btn-sm">
                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                                Cari Data
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 mb-4">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <?php if (!empty($siswa)) : ?>
                                            <table class="table table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>

                                                        <th>NISN</th>
                                                        <th>Nama</th>
                                                        <th style="width: 20%; text-align: center;">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($siswa as $s) : ?>
                                                    <tr>

                                                        <td><?php echo $s->NISN; ?></td>
                                                        <td><?php echo $s->Nama_lengkap; ?></td>
                                                        <td style="text-align: center; vertical-align: middle;">
                                                            <a href="<?php echo site_url('nilai/tampil_nilai/'.$s->NISN); ?>"
                                                                class="btn btn-primary btn-sm">
                                                                <i class="fas fa-plus"></i> Lihat Nilai
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>

                                            </table>

                                            <?php else : ?>
                                            <p>Tidak ada data siswa yang cocok.</p>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
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

    <!-- Page level plugins -->
    <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=base_url('assets/')?>js/demo/chart-area-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // Ketika halaman dimuat, periksa apakah ada data post sebelumnya untuk id_kelas
        var selectedKelas =
            '<?php echo isset($_POST['id_kelas']) ? $_POST['id_kelas'] : ''; ?>';

        // Menyimpan referensi ke dropdown Kelas
        var dropdownKelas = $('select[name="id_kelas"]');
        var dropdownTingkatan = $('select[name="kode_tingkatan"]'); // Tambahkan ini

        // Ketika pilihan jurusan berubah
        $('select[name="kode_jurusan"]').on('change', function() {
            var kode_jurusan = $(this).val();
            var kode_tingkatan = dropdownTingkatan.val(); // Tambahkan ini

            if (kode_jurusan) {
                $.ajax({
                    url: '<?php echo site_url('KelolaKelas/get_kelas_by_jurusan'); ?>',
                    type: 'POST',
                    data: {
                        kode_jurusan: kode_jurusan,
                        kode_tingkatan: kode_tingkatan // Tambahkan ini
                    },
                    dataType: 'json',
                    success: function(data) {
                        dropdownKelas.empty();
                        dropdownKelas.append(
                            '<option value="">Pilih Kelas</option>');
                        $.each(data, function(key, value) {
                            dropdownKelas.append('<option value="' +
                                key +
                                '">' + value + '</option>');
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

        // Ketika pilihan tingkatan berubah
        dropdownTingkatan.on('change', function() {
            var kode_jurusan = $('select[name="kode_jurusan"]').val();
            var kode_tingkatan = $(this).val();

            if (kode_jurusan) {
                $.ajax({
                    url: '<?php echo site_url('KelolaKelas/get_kelas_by_jurusan'); ?>',
                    type: 'POST',
                    data: {
                        kode_jurusan: kode_jurusan,
                        kode_tingkatan: kode_tingkatan
                    },
                    dataType: 'json',
                    success: function(data) {
                        dropdownKelas.empty();
                        dropdownKelas.append(
                            '<option value="">Pilih Kelas</option>');
                        $.each(data, function(key, value) {
                            dropdownKelas.append('<option value="' +
                                key +
                                '">' + value + '</option>');
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