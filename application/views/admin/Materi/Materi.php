<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMK TI-GNC</title>

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
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>




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
                        <h1 class="h3 mb-0 text-gray-800">Data Materi</h1>
                        <div class="d-flex">
                            <a href="<?php echo site_url('Materi/tambah_materi_admin'); ?>"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Materi
                            </a>
                        </div>
                    </div>



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Data Materi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width:5%; text-align: center; vertical-align: middle;">No</th>
                                            <th style="text-align: center; vertical-align: middle;">Mata Pelajaran</th>
                                            <th style="text-align: center; vertical-align: middle;">Materi</th>
                                            <th style="text-align: center; vertical-align: middle;">Jurusan</th>
                                            <th style="align: center; vertical-align: middle;">Kelas</th>
                                            <th style="text-align: center; vertical-align: middle;">Tahun</th>
                                            <th style="text-align: center; vertical-align: middle;">Semester</th>
                                            <th style="width:10%; text-align: center; vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        <?php foreach ($materi as $row): ?>
                                        <tr>
                                            <td style="text-align: center; vertical-align: middle;"><?php echo $no++;?></td>
                                            <td ><?php echo isset($row->nama_mapel) ? htmlspecialchars($row->nama_mapel) : ''; ?>
                                            </td>
                                            <td><?php echo isset($row->nama_materi) ? htmlspecialchars($row->nama_materi) : ''; ?>
                                            </td>
                                            <td><?php echo isset($row->nama_kelas) ? htmlspecialchars($row->nama_jurusan) : ''; ?>
                                            </td>
                                            <td><?php echo isset($row->nama_kelas) ? htmlspecialchars($row->nama_kelas) : ''; ?>
                                            </td>
                                            <td><?php echo isset($row->tahun_akademik) ? htmlspecialchars($row->tahun_akademik) : ''; ?>
                                            </td>
                                            <td><?php echo isset($row->nama_semester) ? htmlspecialchars($row->nama_semester) : ''; ?>
                                            </td>
                                            <td style="width:10%; text-align: center; vertical-align: middle;">
                                                <a href="<?= base_url('assets/uploads/materi/' . $row->file_materi); ?>"
                                                    class="btn btn-sm btn-info" title="Detail" target="_blank"
                                                    data-target="#detailModal<?php echo $row->id_materi; ?>">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="<?php echo site_url('Materi/edit_materi_admin/'.$row->id_materi); ?>"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus"
                                                    onclick="hapusMateri('<?php echo $row->id_materi; ?>')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
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

            <!-- include modal -->
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
            function hapusMateri(id) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data Materi akan dihapus dan tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Ganti URL di bawah ini dengan URL yang sesuai untuk menghapus materi
                        window.location.href = '<?=site_url("Materi/hapus_materi/") ?>' + id;
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
                        targets: [7],
                        orderData: [7, 0]
                    }
                ]
            });
            </script>


</body>

</html>