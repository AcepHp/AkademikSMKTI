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
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php $this->load->view('Bar/Sidebar_admin'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- TopBar -->
                <?php $this->load->view('Bar/Navbar_admin'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah Materi</h1>
                    <!-- Materi Form -->
                    <form action="<?php echo site_url('materi/tambah_materi_admin/'); ?>" method="post"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nama_materi">Nama Materi</label>
                            <input type="text" class="form-control" id="nama_materi" name="nama_materi" required>
                        </div>

                        <div class="form-group">
                            <label for="kode_jurusan">Jurusan</label>
                            <select class="form-control" id="kode_jurusan" name="kode_jurusan" required>
                                <option value="" disabled selected>Pilih Jurusan</option>
                                <?php foreach ($jurusan as $j) : ?>
                                <option value="<?= $j->kode_jurusan ?>"><?= $j->nama_jurusan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kode_tingkatan">Tingkatan</label>
                            <select class="form-control" id="kode_tingkatan" name="kode_tingkatan" required>
                                <option value="" disabled selected>Pilih tingkatan</option>
                                <?php foreach ($tingkatan as $t) : ?>
                                <option value="<?= $t->kode_tingkatan ?>"><?= $t->nama_tingkatan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_kelas">Kelas</label>
                            <select class="form-control" id="id_kelas" name="id_kelas" required>
                                <option value="" disabled selected>Pilih kelas</option>
                                <?php foreach ($kelas as $k) : ?>
                                <option value="<?= $k->id_kelas ?>"><?= $k->nama_kelas ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_mapel">Mata Pelajaran</label>
                            <select class="form-control" id="id_mapel" name="id_mapel" required>
                                <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                <?php foreach ($mapel as $m) : ?>
                                <option value="<?= $m->id_mapel ?>"><?= $m->nama_mapel ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            
                            <input type="hidden" class="form-control" id="id_tahun" name="id_tahun"
                                value="<?= isset($tahun_akademik) ? $tahun_akademik : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            
                            <input type="hidden" class="form-control" id="id_semester" name="id_semester"
                                value="<?= isset($semester) ? $semester : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="file_materi">File Materi</label>
                            <input type="file" class="form-control" id="file_materi" name="file_materi" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Materi</button>
                    </form>
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

    <script>
    // Mendapatkan elemen dropdown untuk jurusan, tingkatan, kelas, dan mapel
    var jurusanDropdown = document.getElementById('kode_jurusan');
    var tingkatanDropdown = document.getElementById('kode_tingkatan');
    var kelasDropdown = document.getElementById('id_kelas');
    var mapelDropdown = document.getElementById('id_mapel');

    // Data kelas yang akan digunakan (gantilah ini dengan data yang sesuai)
    var dataKelas = <?php echo json_encode($kelas); ?>;

    // Data mapel yang akan digunakan (gantilah ini dengan data yang sesuai)
    var dataMapel = <?php echo json_encode($mapel); ?>;

    // Fungsi untuk mengisi pilihan kelas berdasarkan jurusan dan tingkatan yang dipilih
    function updateKelasOptions() {
        // Ambil nilai kode_jurusan dan kode_tingkatan yang dipilih
        var selectedJurusan = jurusanDropdown.value;
        var selectedTingkatan = tingkatanDropdown.value;

        // Kosongkan pilihan kelas terlebih dahulu
        kelasDropdown.innerHTML = '';

        // Tambahkan opsi "Pilih Kelas" sebagai opsi default
        var defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.text = 'Pilih Kelas';
        kelasDropdown.appendChild(defaultOption);

        // Filter dan tambahkan pilihan kelas yang sesuai
        for (var i = 0; i < dataKelas.length; i++) {
            if (dataKelas[i].kode_jurusan == selectedJurusan && dataKelas[i].kode_tingkatan == selectedTingkatan) {
                var option = document.createElement('option');
                option.value = dataKelas[i].id_kelas;
                option.text = dataKelas[i].nama_kelas;
                kelasDropdown.appendChild(option);
            }
        }

        // Kosongkan pilihan Mata Pelajaran terlebih dahulu
        mapelDropdown.innerHTML = '';

        // Tambahkan opsi "Pilih Mata Pelajaran" sebagai opsi default
        var defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.text = 'Pilih Mata Pelajaran';
        mapelDropdown.appendChild(defaultOption);

        // Filter dan tambahkan pilihan Mata Pelajaran yang sesuai
        for (var i = 0; i < dataMapel.length; i++) {
            if (dataMapel[i].kode_jurusan == selectedJurusan && dataMapel[i].kode_tingkatan == selectedTingkatan) {
                var option = document.createElement('option');
                option.value = dataMapel[i].id_mapel;
                option.text = dataMapel[i].nama_mapel;
                mapelDropdown.appendChild(option);
            }
        }
    }

    

    // Panggil fungsi update saat jurusan atau tingkatan berubah
    jurusanDropdown.addEventListener('change', updateKelasOptions);
    tingkatanDropdown.addEventListener('change', updateKelasOptions);

    // Panggil fungsi update saat halaman dimuat (untuk menampilkan "Pilih Kelas" sebagai default)
    updateKelasOptions();
    </script>




</body>

</html>