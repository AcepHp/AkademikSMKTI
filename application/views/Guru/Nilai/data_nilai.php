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
                        <h1 class="h3 mb-0 text-gray-800 mx-4">Data Nilai</h1>
                        <div class="d-flex">
                            <a href="<?php echo site_url('nilai/cetak_nilai/' . $siswa->NISN); ?>"
                                class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">
                                <i class="fas fa-print fa-sm text-white-50"></i> Cetak Nilai
                            </a>

                            <a href="<?php echo site_url('nilai/tambah_nilai/' .$siswa->NISN.'/'.$siswa->kode_jurusan.'/'.$siswa->id_kelas); ?>"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Nilai
                            </a>
                        </div>
                    </div>
                    <div class="container-fluid mt-3">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Informasi Siswa</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nama Siswa</th>
                                                <td><?php echo $nama_lengkap; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama Jurusan</th>
                                                <td><?php echo $nama_jurusan; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Kelas</th>
                                                <td><?php echo $nama_kelas; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tahun Akademik</th>
                                                <td><?= $this->KelolaKelas_model->get_tahun_akademik_by_id($tahun_akademik_aktif_id); ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Semester</th>
                                                <td><?php echo $semester_aktif; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 mx-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Data Nilai
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php if (!empty($nilai)) : ?>
                                <table class="table table-bordered" id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style=" width:5%; text-align: center; vertical-align: middle;">No</th>
                                            <th style="text-align: center; vertical-align: middle;">NISN</th>
                                            <th style="text-align: center; vertical-align: middle;">Nama Mapel</th>
                                            <th style="text-align: center; vertical-align: middle;">Kehadiran</th>
                                            <th style="text-align: center; vertical-align: middle;">Tugas</th>
                                            <th style="text-align: center; vertical-align: middle;">UTS</th>
                                            <th style="text-align: center; vertical-align: middle;">UAS</th>
                                            <th style="text-align: center; vertical-align: middle;">Nilai Akhir</th>
                                            <th style="width:10%; text-align: center; vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($nilai as $n) { ?>
                                        <tr>
                                            <td style="width:5%; text-align: center; vertical-align: middle;">
                                                <?php echo $no++; ?></td>
                                            <td style="text-align: center; vertical-align: middle;"><?php echo htmlspecialchars($n->NISN); ?></td>
                                            <td><?php echo htmlspecialchars($n->nama_mapel); ?></td>
                                            <td style="width:10%; text-align: center; vertical-align: middle;"><?php echo htmlspecialchars($n->kehadiran); ?></td>
                                            <td style="width:10%; text-align: center; vertical-align: middle;"><?php echo htmlspecialchars($n->tugas); ?></td>
                                            <td style="width:10%; text-align: center; vertical-align: middle;"><?php echo htmlspecialchars($n->uts); ?></td>
                                            <td style="width:10%; text-align: center; vertical-align: middle;"><?php echo htmlspecialchars($n->uas); ?></td>
                                            <td style="width:10%; text-align: center; vertical-align: middle;"><?php echo htmlspecialchars($n->nilai_akhir); ?></td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <a href="<?php echo base_url('nilai/edit_nilai/' . $n->ID_Nilai); ?>"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus"
                                                    onclick="hapusNilai(<?php echo $n->ID_Nilai; ?>)">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                            </td>

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php else : ?>
                                <p>Tidak ada data nilai untuk NISN ini.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            function hapusNilai(idNilai) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data Nilai akan dihapus dan tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak, cancel',
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
                                    'Terhapus!',
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