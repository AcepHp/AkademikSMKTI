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

            <!-- Topbar Admin -->
            <?php $this->load->view('Bar/Navbar_admin'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Nilai Siswa</h1>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Filter Data</h3>
                                </div>
                                <div class="box-body">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <form action="<?php echo site_url('admin/filter_data'); ?>" method="post">
                                                <table class="table table-bordered">
                                                    <div class="form-group">
                                                        <label for="kode_jurusan">Jurusan</label>
                                                        <select class="form-control" name="kode_jurusan" required>
                                                            <option value="">Pilih Jurusan</option>
                                                            <?php foreach ($jurusan as $jurusan_item): ?>
                                                            <option value="<?php echo $jurusan_item->kode_jurusan; ?>">
                                                                <?php echo $jurusan_item->nama_jurusan; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="id_kelas">Kelas</label>
                                                        <select class="form-control" name="id_kelas" required>
                                                            <option value="">Pilih Kelas</option>

                                                            <?php foreach ($kelas as $kelas_item): ?>
                                                            <option value="<?php echo $kelas_item->id_kelas; ?>">
                                                                <?php echo $kelas_item->nama_kelas; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <tr>
                                                        <td colspan="2">
                                                            <button type="submit" name="export_jadwal"
                                                                class="btn btn-success btn-sm">
                                                                <i class="fa fa-print" aria-hidden="true"></i>
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
                                <div class="box-header with-border">
                                    <h3 class="box-title">Data Table Siswa</h3>
                                </div>
                                <div class="box-body">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <?php if (!empty($siswa)) : ?>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>NISN</th>
                                                        <th>Nama</th>
                                                        <th>Aksi</th>
                                                        <!-- Tambahkan kolom lain sesuai dengan kebutuhan -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($siswa as $s) : ?>
                                                    <tr>
                                                        <td><?php echo $s->nisn; ?></td>
                                                        <td><?php echo $s->nama; ?></td>
                                                        <td>
                                                            <!-- Aksi -->
                                                        </td>
                                                        <!-- Isi kolom lain sesuai dengan data siswa -->
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
                <!-- /.col -->
            </div>
            <!-- /.row -->
            </section>
            <!-- Content Row -->
        </div>

        <!-- End of Main Content -->
    </div>

    </div>
    
    <!-- Footer Admin -->
    <?php $this->load->view('Bar/Footer_admin'); ?>

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
    <script src="<?=base_url('assets/')?>js/demo/chart-pie-demo.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Mengisi dropdown jurusan saat halaman dimuat
        $.ajax({
            url: '<?php echo site_url("admin/get_all_jurusan"); ?>',
            dataType: 'json',
            success: function(data) {
                var options = '<option value="">Semua Jurusan</option>';
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].ID_Jurusan + '">' + data[i]
                        .Nama_Jurusan + '</option>';
                }
                $('#filter_jurusan').html(options);
            }
        });

        // Ketika dropdown jurusan berubah, panggil fungsi untuk mengisi dropdown kelas
        $('#filter_jurusan').on('change', function() {
            var selectedJurusan = $(this).val();
            if (selectedJurusan !== '') {
                $.ajax({
                    url: '<?php echo site_url("admin/get_kelas_by_jurusan"); ?>',
                    type: 'post',
                    data: {
                        jurusan: selectedJurusan
                    },
                    dataType: 'html', // Ganti ke html jika responsenya HTML
                    success: function(response) {
                        $('#filter_kelas').html(response);
                    }
                });
            } else {
                $('#filter_kelas').html('<option value="">Semua Kelas</option>');
            }
        });
    });
    </script>

</body>

</html>