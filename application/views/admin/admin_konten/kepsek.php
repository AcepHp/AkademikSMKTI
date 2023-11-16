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
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

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
                            <h1 class="h3 mb-0 text-gray-800">Data Sambutan</h1>
                            <div class="btn-group">
                                <a href="<?php echo site_url('K_Konten/tambah_kepsek'); ?>"
                                    class="btn btn btn-success shadow-sm mr-2"><i
                                        class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Sambutan Kepala Sekolah</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php $this->session->userdata('error');?>
                                    <?php $this->session->userdata('success');?>
                                    <table class="table table-bordered" id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Nama</th>
                                                <th>Gambar</th>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                                <th>Created</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($kepsek->result() as $row) : ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row->nama; ?></td>
                                                <td><img src="<?php echo $row->gambar ?>" alt="Gambar"
                                                        style="width: 80px; height: auto;"></td>
                                                <td><?php echo $row->judul; ?></td>
                                                <td><?php echo substr($row->deskripsi,0,40) ?>...</td>
                                                <td><?php echo $row->created ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-info" title="Detail"
                                                        data-toggle="modal"
                                                        data-target="#kepsekModal<?php echo $row->id_kepsek; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('K_Konten/edit_kepsek/'.$row->id_kepsek); ?>"
                                                        class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger" title="Hapus"
                                                        onclick="Delete_Kepsek('<?php echo $row->id_kepsek; ?>')">
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
            </div>
            <!-- Footer Admin -->
            <?php $this->load->view('Bar/Footer_admin'); ?>
        </div>
    </div>

    <!-- Modal -->
    <?php foreach ($kepsek->result() as $row): ?>
    <div class="modal fade" id="kepsekModal<?php echo $row->id_kepsek; ?>" tabindex="-1" role="dialog"
        aria-labelledby="kepsekModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 50%; width: 100%;" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="kepsekModalLabel" style="font-size: 1.25rem;">Detail
                        <?php echo $row->judul; ?> </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="font-size: 1rem;">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <td><?php echo $row->id_kepsek; ?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $row->nama; ?></td>
                            </tr>
                            <tr>
                                <th>Gambar</th>
                                <td><img src="<?php echo $row->gambar; ?>" height="150px" weight="150px"></td>
                            </tr>
                            <tr>
                                <th>Judul</th>
                                <td><?php echo $row->judul; ?></td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td><?php echo $row->deskripsi; ?></td>
                            </tr>
                            <tr>
                                <th>Created</th>
                                <td><?php echo $row->created; ?></td>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
    function Delete_Kepsek(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data slide akan dihapus dan tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Ganti URL di bawah ini dengan URL yang sesuai untuk menghapus guru
                window.location.href = '<?=site_url("K_Konten/delete_kepsek/") ?>' + id;
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