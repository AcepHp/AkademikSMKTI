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
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
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
                        <h1 class="h3 mb-0 text-gray-800">Data Siswa Tahun Akademik <?= $this->KelolaKelas_model->get_tahun_akademik_by_id($tahun_akademik_aktif_id) ?></h1>

                        <div class="d-flex">
                            <a href="<?php echo site_url('kelolakelas/tambah_siswa_kelas/' . $id_kelas . '/' . $kode_jurusan); ?>" class="btn btn-primary" id="tambahDataSiswa">
                                <i class="fas fa-plus"></i> Tambah Data Siswa
                            </a>
                            <button type="button" class="btn btn-success ml-2" data-toggle="modal" data-target="#modalNaikKelas" id="btnNaikKelas">
                                <i class="fas fa-arrow-up"></i> Naik Kelas
                            </button>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <form action="<?php echo site_url('KelolaKelas/cari_data'); ?>" method="post">
                                                <table class="table table-bordered">
                                                    <div class="form-group">
                                                        <label for="kode_jurusan">Jurusan</label>
                                                        <select class="form-control" name="kode_jurusan" required>
                                                            <option value="">Pilih Jurusan</option>
                                                            <?php foreach ($jurusan as $jurusan_item) : ?>
                                                                <option value="<?php echo $jurusan_item->kode_jurusan; ?>" <?php echo isset($_POST['kode_jurusan']) && $_POST['kode_jurusan'] == $jurusan_item->kode_jurusan ? 'selected' : ''; ?>>
                                                                    <?php echo $jurusan_item->nama_jurusan; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kode_tingkatan">Tingkatan</label>
                                                        <select class="form-control" name="kode_tingkatan" required>
                                                            <option value="">Pilih Tingkatan</option>
                                                            <?php foreach ($tingkatan as $tingkatan_item) : ?>
                                                                <option value="<?php echo $tingkatan_item->kode_tingkatan; ?>" <?php echo isset($_POST['kode_tingkatan']) && $_POST['kode_tingkatan'] == $tingkatan_item->kode_tingkatan ? 'selected' : ''; ?>>
                                                                    <?php echo $tingkatan_item->nama_tingkatan; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_kelas">Kelas</label>
                                                        <select class="form-control" name="id_kelas" id="id_kelas" required>
                                                            <option value="">Pilih Kelas</option>
                                                            <?php foreach ($kelas as $kelas_item) : ?>
                                                                <option value="<?php echo $kelas_item->id_kelas; ?>" <?php echo isset($_POST['id_kelas']) && $_POST['id_kelas'] == $kelas_item->id_kelas ? 'selected' : ''; ?>>
                                                                    <?php echo $kelas_item->nama_kelas; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <tr>
                                                        <td colspan="2">
                                                            <button type="submit" name="cari" class="btn btn-success btn-sm">
                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                                Cari Data
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 mb-4">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <?php if (!empty($siswa)) : ?>
                                                <table class="table table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>

                                                            <th>NISN</th>
                                                            <th>Nama</th>
                                                            <th style="width: 20%; text-align: center;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($siswa as $s) : ?>
                                                            <tr>

                                                                <td><?php echo $s->NISN; ?></td>
                                                                <td><?php echo $s->Nama_lengkap; ?></td>
                                                                <td style="text-align: center; vertical-align: middle;">
                                                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#moveStudentModal<?php echo $s->NISN; ?>">
                                                                        <i class="fas fa-exchange-alt"></i> Pindah Kelas
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>

                                                </table>

                                            <?php else : ?>
                                                <p>Tidak ada data siswa yang cocok.</p>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>

            <!-- End of Main Content -->
            <!-- Footer Admin -->
            <?php $this->load->view('Bar/Footer_admin'); ?>

            <?php foreach ($siswa as $s) : ?>
                <!-- Modal -->
                <div class="modal fade" id="moveStudentModal<?php echo $s->NISN; ?>" tabindex="-1" role="dialog" aria-labelledby="moveStudentModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="moveStudentModalLabel">Pindah Kelas -
                                    <?php echo $s->Nama_lengkap; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo site_url('kelolakelas/pindah_kelas/' . $s->NISN); ?>" method="post">
                                <div class="modal-body">
                                    <!-- Display student data here -->
                                    <div class="form-group">
                                        <label for="nisn">NISN</label>
                                        <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $s->NISN; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $s->Nama_lengkap; ?>" readonly>
                                    </div>
                                    <!-- Display current class -->
                                    <div class="form-group">
                                        <label for="kelas_sekarang">Kelas Sekarang</label>
                                        <input type="text" class="form-control" id="kelas_sekarang" name="kelas_sekarang" value="<?php echo $nama_kelas; ?>" readonly>
                                    </div>
                                    <!-- Add dropdown for selecting target class -->
                                    <div class="form-group">
                                        <label for="id_kelas">Pindah Ke-Kelas</label>
                                        <select class="form-control" name="id_kelas" id="id_kelas" required>
                                            <option value="">Pilih Kelas</option>
                                            <?php foreach ($kelas as $kelas_item) : ?>
                                                <option value="<?php echo $kelas_item->id_kelas; ?>">
                                                    <?php echo $kelas_item->nama_kelas; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- Add form input field for additional data -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Pindah Kelas</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="modal fade" id="modalNaikKelas" tabindex="-1" role="dialog" aria-labelledby="modalNaikKelasLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="modalNaikKelasLabel">Naik Kelas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk memilih siswa yang akan dipindahkan ke kelas yang lebih tinggi -->
                            <form action="<?php echo base_url('kelolakelas/naik_kelas'); ?>" method="post" id="naikKelasForm">
                                <input type="hidden" name="current_kelas_id" value="<?php echo $id_kelas; ?>">
                                <!-- Tambahkan dropdown untuk memilih Tingkatan -->
                                <div class="form-group">
                                    <label for="tingkatan">Pindahkan ke Tingkatan</label>
                                    <select class="form-control" id="tingkatan" name="tingkatan">
                                        <option value="">Pilih Tingkatan</option>
                                        <?php foreach ($tingkatan as $tingkatan_item) : ?>
                                            <option value="<?php echo $tingkatan_item->kode_tingkatan; ?>">
                                                <?php echo $tingkatan_item->nama_tingkatan; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Tambahkan dropdown untuk memilih Kelas -->
                                <div class="form-group">
                                    <label for="next_kelas_id">Pindahkan ke Kelas</label>
                                    <select class="form-control" id="next_kelas_id" name="next_kelas_id">
                                        <option value="">Pilih Kelas</option>
                                        <!-- Tampilkan pilihan kelas yang lebih tinggi -->
                                    </select>
                                </div>
                                <!-- Tambahkan dropdown untuk memilih Tahun Akademik -->
                                <div class="form-group">
                                    <label for="tahun_akademik">Tahun Akademik</label>
                                    <select class="form-control" id="tahun_akademik" name="tahun_akademik">
                                        <option value="">Pilih Tahun Akademik</option>
                                        <?php foreach ($tahun as $tahun_item) : ?>
                                            <option value="<?php echo $tahun_item->id_tahun; ?>">
                                                <?php echo $tahun_item->tahun_akademik; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Siswa yang akan Naik Kelas / </label>
                                    <a href="#" id="selectAll" class="btn btn-sm btn-primary">Pilih Semua</a>
                                    <!-- Tampilkan daftar siswa dengan checkbox -->
                                    <?php foreach ($siswa as $siswa_item) : ?>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="siswa_<?php echo $siswa_item->NISN; ?>" name="selected_siswa[]" value="<?php echo $siswa_item->NISN; ?>">
                                            <label class="custom-control-label" for="siswa_<?php echo $siswa_item->NISN; ?>"><?php echo $siswa_item->Nama_lengkap; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- include modal -->
            <?php $this->load->view('Bar/Logout_modal'); ?>


            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
            <!-- Page level plugins -->
            <script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>
            <!-- Page level custom scripts -->
            <script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
            <script src="<?= base_url('assets/') ?>js/demo/chart-pie-demo.js"></script>
            <!-- Page level plugins -->
            <script src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    // Ketika halaman dimuat, periksa apakah ada data post sebelumnya untuk id_kelas
                    var selectedKelas =
                        '<?php echo isset($_POST['id_kelas']) ? $_POST['id_kelas'] : ''; ?>';

                    // Menyimpan referensi ke dropdown Kelas
                    var dropdownKelas = $('select[name="id_kelas"]');
                    var dropdownTingkatan = $('select[name="kode_tingkatan"]'); // Tambahkan ini

                    // Ketika pilihan jurusan berubah
                    $('select[name="kode_jurusan"]').on('change', function() {
                        var kode_jurusan = $(this).val();
                        var kode_tingkatan = dropdownTingkatan.val(); // Tambahkan ini

                        if (kode_jurusan) {
                            $.ajax({
                                url: '<?php echo site_url('KelolaKelas/get_kelas_by_jurusan'); ?>',
                                type: 'POST',
                                data: {
                                    kode_jurusan: kode_jurusan,
                                    kode_tingkatan: kode_tingkatan // Tambahkan ini
                                },
                                dataType: 'json',
                                success: function(data) {
                                    dropdownKelas.empty();
                                    dropdownKelas.append(
                                        '<option value="">Pilih Kelas</option>');
                                    $.each(data, function(key, value) {
                                        dropdownKelas.append('<option value="' +
                                            key +
                                            '">' + value + '</option>');
                                    });

                                    // Setel kembali nilai Kelas yang dipilih sebelumnya (jika ada)
                                    dropdownKelas.val(selectedKelas);
                                }
                            });
                        } else {
                            // Jika Jurusan tidak dipilih, kosongkan dan tampilkan opsi "Pilih Kelas"
                            dropdownKelas.empty();
                            dropdownKelas.append('<option value="">Pilih Kelas</option>');
                        }
                    });

                    // Ketika pilihan tingkatan berubah
                    dropdownTingkatan.on('change', function() {
                        var kode_jurusan = $('select[name="kode_jurusan"]').val();
                        var kode_tingkatan = $(this).val();

                        if (kode_jurusan) {
                            $.ajax({
                                url: '<?php echo site_url('KelolaKelas/get_kelas_by_jurusan'); ?>',
                                type: 'POST',
                                data: {
                                    kode_jurusan: kode_jurusan,
                                    kode_tingkatan: kode_tingkatan
                                },
                                dataType: 'json',
                                success: function(data) {
                                    dropdownKelas.empty();
                                    dropdownKelas.append(
                                        '<option value="">Pilih Kelas</option>');
                                    $.each(data, function(key, value) {
                                        dropdownKelas.append('<option value="' +
                                            key +
                                            '">' + value + '</option>');
                                    });

                                    // Setel kembali nilai Kelas yang dipilih sebelumnya (jika ada)
                                    dropdownKelas.val(selectedKelas);
                                }
                            });
                        } else {
                            // Jika Jurusan tidak dipilih, kosongkan dan tampilkan opsi "Pilih Kelas"
                            dropdownKelas.empty();
                            dropdownKelas.append('<option value="">Pilih Kelas</option>');
                        }
                    });

                    // Ketika halaman dimuat, periksa apakah Jurusan telah dipilih sebelumnya
                    var kode_jurusan_selected = $('select[name="kode_jurusan"]').val();
                    if (kode_jurusan_selected) {
                        // Jika Jurusan telah dipilih sebelumnya, secara otomatis memicu perubahan pada dropdown Kelas
                        $('select[name="kode_jurusan"]').change();
                    }
                });
            </script>
            <script>
                $(document).ready(function() {
                    // Fungsi untuk mengecek apakah kelas telah dipilih
                    function checkKelasSelected() {
                        var selectedKelas = $('select[name="id_kelas"]').val();
                        if (!selectedKelas) {
                            // Jika kelas belum dipilih, tampilkan pesan peringatan
                            Swal.fire({
                                icon: 'warning',
                                title: 'Pilih Kelas',
                                text: 'Silakan pilih kelas terlebih dahulu sebelum menambah data siswa.',
                            });
                            return false; // Mencegah navigasi jika kelas belum dipilih
                        }
                        return true; // Izinkan navigasi jika kelas telah dipilih
                    }

                    // Tambahkan event click pada tombol "Tambah Data Siswa"
                    $('#tambahDataSiswa').click(function(e) {
                        if (!checkKelasSelected()) {
                            e.preventDefault(); // Mencegah navigasi jika kelas belum dipilih
                        }
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    // Menggunakan event "change" pada semua checkbox siswa
                    $('input[name="selected_siswa[]"]').change(function() {
                        // Mengambil jumlah checkbox yang tercentang
                        var jumlahTercentang = $('input[name="selected_siswa[]"]:checked').length;

                        // Mengaktifkan atau menonaktifkan tombol "Naik Kelas" berdasarkan jumlah checkbox tercentang
                        if (jumlahTercentang > 0) {
                            $('button[name="naik_kelas"]').prop('disabled', false);
                        } else {
                            $('button[name="naik_kelas"]').prop('disabled', true);
                        }
                    });

                    // Menggunakan event "click" pada tombol "Naik Kelas" untuk memeriksa sebelum mengirimkan data
                    $('button[name="naik_kelas"]').click(function(e) {
                        var jumlahTercentang = $('input[name="selected_siswa[]"]:checked').length;

                        if (jumlahTercentang === 0) {
                            e
                                .preventDefault(); // Mencegah pengiriman form jika tidak ada siswa yang dipilih

                            // Menampilkan pesan kesalahan menggunakan SweetAlert2
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Pilih setidaknya satu siswa sebelum menaikkan kelas.'
                            });
                        }
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    // Tangkap klik tombol "Simpan" dalam modal
                    $("#naikKelasForm").submit(function(e) {
                        e.preventDefault(); // Mencegah form dikirim secara default

                        var selectedSiswa = []; // Array untuk menyimpan NISN siswa yang dipilih

                        // Loop melalui checkbox siswa yang dipilih
                        $("input[name='selected_siswa[]']:checked").each(function() {
                            selectedSiswa.push($(this).val());
                        });

                        // Data lain yang akan dikirimkan, termasuk tingkatan dan tahun akademik
                        var tingkatan = $("#tingkatan").val();
                        var tahun_akademik = $("#tahun_akademik").val();
                        var next_kelas_id = $("#next_kelas_id").val();

                        // Validasi minimal satu siswa yang dipilih
                        if (selectedSiswa.length === 0) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Pilih setidaknya satu siswa sebelum menaikkan kelas.'
                            });
                            return;
                        }

                        // Kirim data menggunakan AJAX
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('kelolakelas/naik_kelas'); ?>",
                            data: {
                                selected_siswa: selectedSiswa,
                                tingkatan: tingkatan,
                                tahun_akademik: tahun_akademik,
                                next_kelas_id: next_kelas_id
                            },
                            success: function(response) {
                                // Tindakan setelah berhasil
                                console.log("Sukses mengirim data ke server:", response);
                                // Tutup modal setelah berhasil
                                $("#modalNaikKelas").modal("hide");
                                // Refresh halaman atau tindakan lain sesuai kebutuhan Anda
                                location
                                    .reload(); // Ini akan mereload halaman saat modal ditutup
                            },
                            error: function(xhr, status, error) {
                                // Tindakan jika terjadi kesalahan
                                console.error("Terjadi kesalahan:", error);
                                // Tampilkan pesan kesalahan menggunakan SweetAlert2 atau cara lainnya
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Terjadi kesalahan saat mengirim data.'
                                });
                            }
                        });
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#tingkatan').change(function() {
                        var selectedTingkatan = $(this).val();
                        // Mengosongkan dropdown kelas
                        $('#next_kelas_id').empty();
                        // Menambahkan opsi "Pilih Kelas"
                        $('#next_kelas_id').append('<option value="">Pilih Kelas</option>');

                        // Lakukan permintaan AJAX untuk mendapatkan data kelas berdasarkan tingkatan
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('kelolakelas/get_kelas_by_jurusan_tingkatan'); ?>",
                            data: {
                                kode_jurusan: '<?php echo $kode_jurusan; ?>', // Ganti dengan nilai kode jurusan yang sesuai
                                kode_tingkatan: selectedTingkatan
                            },
                            dataType: "json",
                            success: function(response) {
                                // Isi dropdown kelas dengan data yang diterima dari server
                                $.each(response, function(key, value) {
                                    $('#next_kelas_id').append('<option value="' + value
                                        .id_kelas + '">' + value.nama_kelas +
                                        '</option>');
                                });
                            },
                            error: function() {
                                alert('Terjadi kesalahan saat mengambil data kelas.');
                            }
                        });
                    });
                });
            </script>
            <script>
                // Ambil elemen tombol "Pilih Semua" dan semua checkbox siswa
                const selectAllButton = document.getElementById('selectAll');
                const checkboxes = document.querySelectorAll('input[name="selected_siswa[]"]');

                // Tambahkan event listener untuk mengatur tindakan ketika tombol diklik
                selectAllButton.addEventListener('click', function() {
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = true;
                    });
                });
            </script>

        </div>
    </div>
    </div>
</body>

</html>