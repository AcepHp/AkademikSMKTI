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
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
                        <div class="d-flex">
                            <a href="<?php echo site_url('datasiswa/tambah_siswa'); ?>"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Siswa
                            </a>
                            <a href="<?php echo base_url('Datasiswa/import'); ?>"
                                class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <i class="fas fa-upload fa-sm text-white-50"></i> Import Data Siswa
                            </a>
                        </div>
                    </div>



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Data Siswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width:5%; text-align: center; vertical-align: middle;">No</th>
                                            <th style="text-align: center; vertical-align: middle;">NISN</th>
                                            <th style="text-align: center; vertical-align: middle;">Nama Lengkap</th>
                                            <th style="text-align: center; vertical-align: middle;">Jenis Kelamin</th>
                                            <th style="width:10%; text-align: center; vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        <?php foreach ($siswa as $row): ?>
                                        <tr>
                                            <td style="width:5%; text-align: center; vertical-align: middle;"><?php echo $no++;?></td>
                                            <td><?php echo isset($row->NISN) ? htmlspecialchars($row->NISN) : ''; ?></td>
                                            <td><?php echo isset($row->Nama_lengkap) ? htmlspecialchars($row->Nama_lengkap) : ''; ?></td>
                                            <td><?php echo isset($row->Jenis_kelamin) ? htmlspecialchars($row->Jenis_kelamin) : ''; ?></td>
                                            <td style="width:10%; text-align: center; vertical-align: middle;">
                                                <a href="#" class="btn btn-sm btn-info" title="Detail"
                                                    data-toggle="modal"
                                                    data-target="#detailModal<?php echo $row->ID_siswa; ?>">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="<?php echo site_url('Datasiswa/edit_siswa/'.$row->ID_siswa); ?>"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus"
                                                    onclick="hapusSiswa('<?php echo $row->ID_siswa; ?>')">
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



                    <!-- Modal -->
                    <?php foreach ($siswa as $row): ?>
                    <div class="modal fade" id="detailModal<?php echo $row->ID_siswa; ?>" tabindex="-1" role="dialog"
                        aria-labelledby="detailModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 50%; width: 100%;"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="detailModalLabel" style="font-size: 1.25rem;">Detail
                                        Siswa -
                                        <?php echo $row->Nama_lengkap; ?></h5>
                                    <button type="button" class="close text-white" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="font-size: 1rem;">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>ID Siswa</th>
                                                <td><?php echo $row->ID_siswa; ?></td>
                                            </tr>
                                            <tr>
                                                <th>NIS</th>
                                                <td><?php echo $row->NIS; ?></td>
                                            </tr>
                                            <tr>
                                                <th>NISN</th>
                                                <td><?php echo $row->NISN; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <td><?php echo $row->Nama_lengkap; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tempat Lahir</th>
                                                <td><?php echo $row->Tempat_lahir; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td><?php echo $row->Tanggal_lahir; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td><?php echo $row->Jenis_kelamin; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td><?php echo $row->Alamat; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tinggal Dengan</th>
                                                <td><?php echo $row->Tinggal_dengan; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama Ayah</th>
                                                <td><?php echo $row->Nama_ayah; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama Ibu</th>
                                                <td><?php echo $row->Nama_ibu; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama Wali</th>
                                                <td><?php echo $row->Nama_wali; ?></td>
                                            </tr>
                                            <tr>
                                                <th>No Telp Ortu</th>
                                                <td><?php echo $row->No_telp_ortu; ?></td>
                                            </tr>
                                            <tr>
                                                <th>No Telp Wali</th>
                                                <td><?php echo $row->No_telp_wali; ?></td>
                                            </tr>
                                            <!-- ... (other fields) ... -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>

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
                        window.location.href = '<?=site_url("DataSiswa/hapus_siswa/") ?>' + id;
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