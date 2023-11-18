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
        <?php $this->load->view('Bar/Sidebar_guru'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- TopBar Guru -->
                <?php $this->load->view('Bar/Navbar_guru'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Nilai Siswa</h1>

                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Data Nilai Siswa Pada Kelas : <?php echo $mapel[0]->nama_mapel; ?>
                                <?php echo $kelas[0]->nama_kelas; ?> (<?php echo $kelas[0]->nama_jurusan; ?>)
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php if (!empty($siswa)) : ?>
                                <table class="table table-bordered" id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>NISN</th>
                                            <th>Nama Lengkap</th>
                                            <th>Kehadiran</th>
                                            <th>Tugas</th>
                                            <th>UTS</th>
                                            <th>UAS</th>
                                            <th>Nilai Akhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($siswa as $n) { ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($n->NISN); ?></td>
                                            <td><?php echo htmlspecialchars($n->Nama_lengkap); ?></td>
                                            <td><?php echo htmlspecialchars(number_format($n->kehadiran, 2)); ?></td>
                                            <td><?php echo htmlspecialchars(number_format($n->tugas, 2)); ?></td>
                                            <td><?php echo htmlspecialchars(number_format($n->uts, 2)); ?></td>
                                            <td><?php echo htmlspecialchars(number_format($n->uas, 2)); ?></td>
                                            <td><?php echo htmlspecialchars(number_format($n->nilai_akhir, 2)); ?></td>

                                            <td>
                                                <?php if ($n->ID_Nilai === null ) : ?>
                                                <a href="<?php echo base_url('nilai/tambah_nilai_guru/'. $n->NISN . '/' . $kelas[0]->id_kelas); ?>"
                                                    class="d-none d-sm-inline-block btn btn-sm btn-primary">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                                <?php endif; ?>
                                                <?php if ($n->ID_Nilai !== null) : ?>
                                                <a href="<?php echo base_url('nilai/edit_nilai_guru/'. $n->NISN . '/' . $kelas[0]->id_kelas. '/' . $mapel[0]->id_mapel); ?>"
                                                    class="btn btn-sm btn-warning" title="Edit" id="tambahDataSiswa">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <?php endif; ?>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                        <?php else : ?>
                                        <p>Tidak ada data nilai untuk NISN ini.</p>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Admin -->
            <?php $this->load->view('Bar/Footer_admin'); ?>

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
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- Page level plugins -->
            <script src="<?php echo base_url()?>assets/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url()?>assets/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="assets/js/demo/datatables-demo.js"></script>
            <script>
            function hapusNilai(idNilai) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data Nilai akan dihapus dan tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna menekan tombol "Yes, delete it!"
                        // Lakukan pemanggilan AJAX untuk menghapus nilai
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url("nilai/hapus_nilai/"); ?>' + idNilai,
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
                                            '<?php echo site_url("nilai/tampil_nilai/" ); ?>' +
                                            <?php echo $n->NISN; ?>;
                                    }
                                });
                            },
                            error: function(data) {
                                // Tampilkan pesan error jika terjadi kesalahan
                                Swal.fire(
                                    'Error!',
                                    'Terjadi kesalahan saat menghapus data.',
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
                    }

                ]
            });
            </script>



</body>

</html>