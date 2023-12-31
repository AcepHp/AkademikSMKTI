<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SMK-TI GNC</title>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php $this->load->view('Bar/Sidebar_guru'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- TopBar -->
                <?php $this->load->view('Bar/Navbar_guru'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
                        <div class="d-flex">
                            <a href="<?php echo site_url('materi/tambah_materi/' . $id_kelas . '/' . $id_mapel); ?>"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Materi
                            </a>

                        </div>

                    </div>
                    <!-- Daftar Materi -->
                    <div class="row">
                        <?php $materiCount = 1; // Inisialisasi hitungan materi ?>
                        <?php foreach ($materi as $item) { ?>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-9">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Materi <?= $materiCount; // Menampilkan hitungan materi ?>
                                            </div>
                                            <div class="h5 mb-2 font-weight-bold text-gray-800">
                                                <?= $item->nama_materi; ?>
                                            </div>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col mb-3 mx-4">
                                        <a href="<?= base_url('assets/uploads/materi/' . $item->file_materi); ?>"
                                            target="_blank" class="btn btn-primary w-100 mb-1"
                                            style="width: 100%;">Lihat Materi</a>
                                        <a href="<?php echo site_url('Materi/edit_materi_guru/'.$item->id_materi); ?>"
                                            title="Edit" class="btn btn-warning w-100 mb-1" style="width: 100%;">Edit
                                            Materi</a>
                                        <a href="#" class="btn btn-danger w-100" style="width: 100%;"
                                            onclick="hapusMateri('<?php echo $item->id_materi ?>', '<?php echo $id_kelas ?>', '<?php echo $id_mapel ?>')">Hapus
                                            Materi</a>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php $materiCount++; // Increment hitungan materi ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('Bar/Logout_modal'); ?>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript -->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages -->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <script>
    function hapusMateri(id_materi, id_kelas, id_mapel) {
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Data Materi akan dihapus dan tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform the deletion
                Swal.fire(
                    'Terhapus!',
                    'Data Materi Berhasil dihapus',
                    'success'
                ).then(() => {
                    // Redirect to the specified URL
                    window.location.href = '<?= site_url("Materi/hapus_materi_guru/") ?>' + id_materi +
                        '/' +
                        id_kelas + '/' + id_mapel;
                });
            }
        });
    }
    </script>




</body>

</html>