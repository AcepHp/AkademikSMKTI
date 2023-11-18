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
                            <h1 class="h3 mb-0 text-gray-800">Data Penugasan <?php echo $semester[0]->nama_semester;?>
                                (<?php echo $tahun[0]->tahun_akademik;?>) </h1>
                            <div class="btn-group">
                                <?php foreach ($mapel as $row) : ?>
                                <a href="<?= site_url('Penugasan/tambah_penugasan/' . $row->id_mapel . '/' . $row->kode_jurusan . '/'. $row->kode_tingkatan); ?>"
                                    class="btn btn btn-success shadow-sm mr-2">
                                    <i class="fas fa-download fa-sm text-white-50"></i> Tambah Penugasan Guru </a>
                                <?php endforeach; ?>
                                
                            </div>
                        </div>




                        <!-- ... (content lainnya) ... -->

                    </div>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->


                        <!-- DataTales Example -->

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Penugasan Guru berdasarkan :
                                    <?php echo $mapel[0]->nama_mapel; ?> (<?php echo $mapel[0]->nama_tingkatan;?>
                                    <?php echo $mapel[0]->nama_jurusan; ?>)</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-inline mb-2">
                                    <!-- Tambahkan class form-inline di sini -->
                                    <label for="myInput" class="mr-2">Cari:</label> <!-- Tambahkan label "Cari" -->
                                    <input class="form-control form-control-sm" id="myInput" type="text"
                                        placeholder="Search..">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID Guru</th>
                                                <th>Nama Guru</th>
                                                <th>Nama Kelas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php foreach ($pengajar_mapel as $row) : ?>
                                            <tr>
                                                <td style="display: none;"><?php echo $row->ID_PM; ?></td>
                                                <td><?php echo $row->ID_Guru; ?></td>
                                                <td><?php echo $row->Nama_Lengkap; ?></td>
                                                <td><?php echo $row->nama_kelas; ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-info" title="Detail"
                                                        data-toggle="modal"
                                                        data-target="#penugasanModal<?php echo $row->ID_PM; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('penugasan/edit_penugasan/'.$row->ID_PM); ?>"
                                                        class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger" title="Hapus"
                                                        onclick="Delete_penugasan('<?php echo $row->ID_PM; ?>', '<?php echo $row->id_mapel; ?>')">
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


                    <!-- Content Row -->
                </div>
                <!-- End of Main Content -->


                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->
            <?php $this->load->view('Bar/Footer_admin'); ?>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- include modal logout -->
            <?php $this->load->view('Bar/Logout_modal'); ?>



            <?php foreach ($pengajar_mapel as $row): ?>
            <div class="modal fade" id="penugasanModal<?php echo $row->ID_PM; ?>" tabindex="-1" role="dialog"
                aria-labelledby="penugasanModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 50%; width: 100%;"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="penugasanModalLabel" style="font-size: 1.25rem;">Detail
                                Penugasan -
                                <?php echo $row->nama_mapel; ?> (<?php echo $row->nama_kelas; ?>)</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="font-size: 1rem;">
                            <table class="table table-bordered" id="datatable">
                                <tbody>
                                    <tr>
                                        <th>Mata Pelajaran</thRU>
                                        <td><?php echo $row->nama_mapel; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kelas</thRU>
                                        <td><?php echo $row->nama_kelas; ?></td>
                                    </tr>
                                    <tr>
                                        <th>ID Guru</thRU>
                                        <td><?php echo $row->ID_Guru; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Guru</th>
                                        <td><?php echo $row->Nama_Lengkap; ?></td>
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

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });

            function Delete_penugasan(id, id_mapel) {
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
                        window.location.href = '<?=site_url("Penugasan/delete_penugasan/") ?>' + id + '/' +
                            id_mapel;
                    }
                });
            }
            </script>

</body>

</html>