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
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Edit Berita</h1>
                        </div>
                    </div>
                    <div class="container mt-5">
                        <?php echo $this->session->userdata('error');?>
                        <?php $this->session->unset_userdata('error');?>
                        <form id="myForm"
                            action="<?php echo site_url('Kelola_Dashboard/Berita/proseseditberita/'.$berita->id_berita); ?>"
                            method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="judul">Judul:</label>
                                <input type="text" class="form-control" name="judul"
                                    value="<?php echo $berita->judul; ?>">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <div id="deskripsieditor"></div>
                                <input class="form-control" name="deskripsi" type="hidden" id="deskripsiinput" required>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar Saat Ini:</label>
                                <img src="<?php echo $berita->gambar; ?>" alt="Gambar Saat Ini" width="150">
                            </div>
                            <div class="form-group">
                                <label for="new_gambar">Pilih Gambar Baru:</label>
                                <input type="file" class="form-control" name="gambar">
                            </div>
                            <div class="form-group">
                                <label for="author">Author:</label>
                                <input type="text" class="form-control" name="author"
                                    value="<?php echo $berita->author; ?>">
                            </div>
                            <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
            <!-- Footer Admin -->
            <?php $this->load->view('Bar/Footer_admin'); ?>
        </div>
    </div>
    <?php $this->load->view('Bar/Logout_modal'); ?>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
    var berita = `<?= $berita->deskripsi ?>`;
    var deskripsieditor = new Quill('#deskripsieditor', {
        theme: 'snow'
    });
    deskripsieditor.root.innerHTML = berita;

    var form = document.getElementById('myForm');
    var deskripsiinput = document.getElementById('deskripsiinput');

    form.addEventListener('submit', function(event) {
        deskripsiinput.value = deskripsieditor.root.innerHTML;
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

</body>

</html>