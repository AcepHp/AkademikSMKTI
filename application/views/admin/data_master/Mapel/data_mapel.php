<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMK-TI GNC</title>

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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">



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
                        <h1 class="h3 mb-0 text-gray-800">Data Mata Pelajaran</h1>
                        <div class="d-flex">
                            <a href="<?php echo site_url('Mapel/tambah_mapel'); ?>"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Mata Pelajaran
                            </a>

                        </div>

                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Data Mata Pelajaran</h6>
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->userdata('success_tambah')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $this->session->userdata('success_tambah'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php $this->session->unset_userdata('success_tambah'); ?>
                            <?php endif; ?>

                            <?php if ($this->session->userdata('success_edit')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $this->session->userdata('success_edit'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php $this->session->unset_userdata('success_edit'); ?>
                            <?php endif; ?>

                            <?php if ($this->session->userdata('success_hapus')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $this->session->userdata('success_hapus'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php $this->session->unset_userdata('success_hapus'); ?>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width:5%; text-align: center; vertical-align: middle;">No</th>
                                            <th style="text-align: center; vertical-align: middle;">Kode Mapel
                                            </th>
                                            <th style="text-align: center; vertical-align: middle;">Nama Mapel</th>
                                            <th style="text-align: center; vertical-align: middle;">Nama Jurusan</th>
                                            <th style="text-align: center; vertical-align: middle;">Nama Tingkatan</th>
                                            <th style="width:10; text-align: center; vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($mapel_list as $mapel) { ?>
                                        <tr>
                                            <td style="text-align: center; vertical-align: middle;"><?php echo $no++; ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($mapel->id_mapel); ?></td>
                                            <td><?php echo htmlspecialchars($mapel->nama_mapel); ?></td>
                                            <td><?php echo htmlspecialchars($mapel->nama_jurusan); ?></td>
                                            <td><?php echo htmlspecialchars($mapel->nama_tingkatan); ?></td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <a href="<?php echo site_url('mapel/edit_mapel/'.$mapel->id_mapel); ?>"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus"
                                                    onclick="hapusMapel('<?php echo $mapel->id_mapel; ?>')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>



                            </div>
                        </div>
                    </div>




                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer Admin -->
            <?php $this->load->view('Bar/Footer_admin'); ?>

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
            function hapusMapel(id_mapel) {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data Mapel akan dihapus dan tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna menekan tombol "Yes, delete it!"
                        // Lakukan pemanggilan AJAX untuk menghapus mata pelajaran
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url("Mapel/hapus_mapel/"); ?>' + id_mapel,
                            success: function(data) {
                                // Tampilkan pesan sukses
                                Swal.fire(
                                    'Deleted!',
                                    'Data berhasil dihapus',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed || result.isDismissed) {
                                        // Redirect atau lakukan tindakan lain setelah penghapusan
                                        window.location.href =
                                            '<?php echo site_url("Mapel"); ?>';
                                    }
                                });
                            },
                            error: function(data) {
                                // Tampilkan pesan error jika terjadi kesalahan
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while deleting data.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            }
            </script>

            <script>
            new DataTable('#example', {
                columnDefs: [{
                        targets: [0],
                        orderData: [0, 1]
                    },
                    {
                        targets: [1],
                        orderData: [1, 0]
                    },
                    {
                        targets: [4],
                        orderData: [4, 0]
                    }
                ]
            });
            </script>


</body>

</html>