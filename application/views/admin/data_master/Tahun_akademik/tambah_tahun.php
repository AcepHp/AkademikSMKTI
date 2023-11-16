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
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->

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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Tambah Tahun Akademik</h1>


                    </div>
                    <div class="container mt-5">
                        <?php echo form_open('Tahun_akademik/tambah_tahun'); ?>

                        <div class="form-group">
                            <label for="tahun_akademik">Tahun Akademik</label>
                            <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <?php if(isset($statuses)) : ?>
                                <?php foreach ($statuses as $key => $value): ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <!-- Opsi statis -->
                                
                            </select>
                        </div>


                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <?php echo form_close(); ?>
                    </div>


                </div>
            </div>
            <?php $this->load->view('Bar/Footer_admin'); ?>
        </div>
        
    </div>
    
    <!-- /.container-fluid -->
   
    </div>
    <!-- End of Main Content -->

    <!-- Footer Admin -->
   


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

    <!-- Page level plugins -->
    <script src="<?php echo base_url()?>assets/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <script>
    function hapusSiswa(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data siswa akan dihapus dan tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Ganti URL di bawah ini dengan URL yang sesuai untuk menghapus siswa
                window.location.href = '<?=site_url("Guru/hapus_siswa/") ?>' + id;
            }
        });
    }
    </script>

</body>

</html>