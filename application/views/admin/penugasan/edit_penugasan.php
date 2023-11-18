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

                    <!-- Page Heading -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Edit Data Penugasan Guru</h1>
                        </div>

                        <!-- ... (content lainnya) ... -->

                    </div>


                    <div class="container mt-5">
                        <?php echo form_open('Penugasan/update_penugasan/' . $penugasan->ID_PM); ?>
                        <input type="hidden" name="id_tahun" value="<?php echo $penugasan->id_tahun; ?>">
                        <input type="hidden" name="id_semester" value="<?php echo $penugasan->id_semester; ?>">

                        <div class="form-group">
                            <label for="nama_mapel">Mata Pelajaran :</label>
                            <input type="text" class="form-control" name="nama_mapel"
                                value="<?php echo $penugasan->nama_mapel; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="id_mapel"
                                value="<?php echo $penugasan->id_mapel; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_kelas">Kelas :</label>
                            <input type="text" class="form-control" name="nama_kelas"
                                value="<?php echo $penugasan->nama_kelas; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="ID_Guru">Nama Guru :</label>
                            <select class="form-control" name="ID_Guru">
                                <?php foreach ($guru as $row) : ?>
                                <option value="<?= $row->ID_Guru; ?>"
                                    <?php if ($row->ID_Guru == $penugasan->ID_Guru) echo 'selected'; ?>>
                                    <?= $row->Nama_Lengkap; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <?php echo form_close(); ?>
                    </div>

                    <!-- DataTales Example -->

                    <!-- Begin Page Content -->

                    <div class="container mt-5">

                        <!-- Content Row -->
                    </div>
                    <!-- End of Main Content -->


                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->
                <!-- Footer -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Footer Admin -->
            <?php $this->load->view('Bar/Footer_admin'); ?>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- include modal logout -->
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

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
            // Menampilkan ID Kelas saat memilih kelas
            document.getElementById('kelas').addEventListener('change', function() {
                var selectedKelas = this.value;
                document.getElementById('id_kelas_container').style.display = 'block';
                document.getElementById('id_kelas').value = selectedKelas;
            });

            // Menampilkan ID Guru saat memilih guru
            document.getElementById('guru').addEventListener('change', function() {
                var selectedGuru = this.value;
                document.getElementById('ID_Guru_container').style.display = 'block';
                document.getElementById('ID_Guru').value = selectedGuru;
            });
            </script>

</body>

</html>