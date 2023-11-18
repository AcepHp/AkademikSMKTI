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
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Pop Up Dashboard</h1>
                            <div class="btn-group">
                                <a href="<?php echo site_url('PPDB/tambah_popup'); ?>"
                                    class="btn btn btn-success shadow-sm mr-2"><i
                                        class="fas fa-download fa-sm text-white-50"></i> Tambah Pop UP</a>
                            </div>
                        </div>
                    </div>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Kelola Pop Up</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!-- Flash Data Berhasil tambah data -->
                                    <?php echo $this->session->userdata('success_tambah');?>
                                    <?php $this->session->unset_userdata('success_tambah');?>

                                    <!-- Flash Data Berhasil edit data -->
                                    <?php echo $this->session->userdata('success_edit');?>
                                    <?php $this->session->unset_userdata('success_edit');?>

                                    <!-- Flash Data Berhasil Hapus data -->
                                    <?php echo $this->session->userdata('success_hapus');?>
                                    <?php $this->session->unset_userdata('success_hapus');?>
                                    <table class="table table-bordered" id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:5%; text-align: center; vertical-align: middle;">NO
                                                </th>
                                                <th style="text-align: center; vertical-align: middle;">Judul</th>
                                                <th style="text-align: center; vertical-align: middle;">Isi</th>
                                                <th style="text-align: center; vertical-align: middle;">Status</th>
                                                <th style="width:10%; text-align: center; vertical-align: middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;?>
                                            <?php foreach ($popup as $row) : ?>
                                            <tr>
                                                <td style="width:5%; text-align: center; vertical-align: middle;">
                                                    <?php echo $no++; ?></td>
                                                <td><?php echo $row->judul ?></td>
                                                <td><?php echo $row->isi ?></td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <?php if ($row->aktif == 1) : ?>
                                                    <button class="btn btn-sm btn-success"
                                                        onclick="changeStatus(<?php echo $row->id_popup; ?>, 0)">Aktif</button>
                                                    <?php else : ?>
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="changeStatus(<?php echo $row->id_popup; ?>, 1)">Tidak
                                                        Aktif</button>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="width:10%; text-align: center; vertical-align: middle;">
                                                    <a href="#" class="btn btn-sm btn-info" title="Detail"
                                                        data-toggle="modal"
                                                        data-target="#popupModal<?php echo $row->id_popup; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('PPDB/edit_popup/'.$row->id_popup); ?>"
                                                        class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger" title="Hapus"
                                                        onclick="Delete_popup('<?php echo $row->id_popup; ?>')">
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
    <?php $this->load->view('Bar/Logout_modal'); ?>
    <!-- Modal -->
    <?php foreach ($popup as $row): ?>
    <div class="modal fade" id="popupModal<?php echo $row->id_popup; ?>" tabindex="-1" role="dialog"
        aria-labelledby="popupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 50%; width: 100%;" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="popupModalLabel" style="font-size: 1.25rem;">Detail Pop Up -
                        <?php echo $row->id_popup; ?></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="font-size: 1rem;">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID Pop Up</th>
                                <td><?php echo $row->id_popup; ?></td>
                            </tr>
                            <tr>
                                <th>Judul</th>
                                <td><?php echo $row->judul; ?></td>
                            </tr>
                            <tr>
                                <th>Isi</th>
                                <td><?php echo $row->isi; ?></td>
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

    <script>
    const radioInputs = document.querySelectorAll('input[type="radio"]');
    radioInputs.forEach((radioInput) => {
        radioInput.addEventListener('change', function() {
            this.closest('form').submit(); // Kirim formulir saat radio button berubah
        });
    });
    </script>

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
    function Delete_popup(id) {
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
                window.location.href = '<?=site_url("PPDB/delete_popup/") ?>' + id;
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