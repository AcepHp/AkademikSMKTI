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
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
                            <h1 class="h3 mb-0 text-gray-800">Data Guru</h1>
                            <div class="btn-group">
                                <a href="<?php echo site_url('admin/tambah_guru'); ?>"
                                    class="btn btn btn-success shadow-sm mr-2"><i
                                        class="fas fa-download fa-sm text-white-50"></i> Tambah Data Guru</a>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Guru Pengajar</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width:5%; text-align: center; vertical-align: middle;">No</th>
                                            <th style="text-align: center; vertical-align: middle;">NIP</th>
                                            <th style="text-align: center; vertical-align: middle;">Nama Lengkap</th>
                                            <th style="text-align: center; vertical-align: middle;">Tempat Lahir</th>
                                            <th style="text-align: center; vertical-align: middle;">Tanggal Lahir</th>
                                            <th style="text-align: center; vertical-align: middle;">Jenis Kelamin</th>
                                            <th style="text-align: center; vertical-align: middle;">Alamat</th>
                                            <th style="text-align: center; vertical-align: middle;">Pendidikan</th>
                                            <th style="text-align: center; vertical-align: middle;">Tanggal Mulai</th>
                                            <th style="width:10%; text-align: center; vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        <?php foreach ($guru as $row) : ?>

                                        <tr>
                                            <td style="text-align: center; vertical-align: middle;"><?php echo $no++; ?></td>
                                            <td><?php echo $row->NIP ?></td>
                                            <td><?php echo $row->Nama_Lengkap ?></td>
                                            <td><?php echo $row->Tempat_Lahir ?></td>
                                            <td><?php echo $row->Tanggal_Lahir ?></td>
                                            <td><?php echo $row->Jenis_Kelamin ?></td>
                                            <td><?php echo $row->Alamat ?></td>
                                            <td><?php echo $row->Pendidikan ?></td>
                                            <td><?php echo $row->Tanggal_Mulai ?></td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <a href="#" class="btn btn-sm btn-info" title="Detail"
                                                    data-toggle="modal"
                                                    data-target="#guruModal<?php echo $row->ID_Guru; ?>">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="<?php echo site_url('admin/edit_guru/'.$row->ID_Guru); ?>"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus"
                                                    onclick="Delete_Guru('<?php echo $row->ID_Guru; ?>')">
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
            </div>
            <?php $this->load->view('Bar/Footer_admin'); ?>
        </div>
    </div>

    <?php $this->load->view('Bar/Logout_modal'); ?>

    <!-- Modal -->
    <?php foreach ($guru as $row): ?>
    <div class="modal fade" id="guruModal<?php echo $row->ID_Guru; ?>" tabindex="-1" role="dialog"
        aria-labelledby="guruModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 50%; width: 100%;" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="guruModalLabel" style="font-size: 1.25rem;">Detail
                        Guru -
                        <?php echo $row->Nama_Lengkap; ?></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="font-size: 1rem;">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID Guru</th>
                                <td><?php echo $row->ID_Guru; ?></td>
                            </tr>
                            <tr>
                                <th>NIP</th>
                                <td><?php echo $row->NIP; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td><?php echo $row->Nama_Lengkap; ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><?php echo $row->Tempat_Lahir; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><?php echo $row->Tanggal_Lahir; ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?php echo $row->Jenis_Kelamin; ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?php echo $row->Alamat; ?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td><?php echo $row->Pendidikan; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Mulai</th>
                                <td><?php echo $row->Tanggal_Mulai; ?></td>
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
    <?php endforeach; ?>



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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
    function Delete_Guru(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data guru akan dihapus dan tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Ganti URL di bawah ini dengan URL yang sesuai untuk menghapus guru
                window.location.href = '<?=site_url("admin/delete_guru/") ?>' + id;
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