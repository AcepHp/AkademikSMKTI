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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <h1 class="h3 mb-0 text-gray-800">Data Nilai Tahun Akademik
                            <?= $this->KelolaKelas_model->get_tahun_akademik_by_id($tahun_akademik_aktif_id) ?></h1>


                    </div>
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <form action="<?php echo site_url('nilai/cari_data'); ?>" method="get">
                                                <table class="table table-bordered">
                                                    <div class="form-group">
                                                        <label for="kode_jurusan">Jurusan</label>
                                                        <select class="form-control" name="kode_jurusan" required>
                                                            <option value="">Pilih Jurusan</option>
                                                            <?php foreach ($jurusan as $jurusan_item) : ?>
                                                            <option value="<?php echo $jurusan_item->kode_jurusan; ?>"
                                                                <?php echo isset($_GET['kode_jurusan']) && $_GET['kode_jurusan'] == $jurusan_item->kode_jurusan ? 'selected' : ''; ?>>
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
                                                            <option
                                                                value="<?php echo $tingkatan_item->kode_tingkatan; ?>"
                                                                <?php echo isset($_GET['kode_tingkatan']) && $_GET['kode_tingkatan'] == $tingkatan_item->kode_tingkatan ? 'selected' : ''; ?>>
                                                                <?php echo $tingkatan_item->nama_tingkatan; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_kelas">Kelas</label>
                                                        <select class="form-control" id="id_kelas" name="id_kelas"
                                                            required>
                                                            <option value="">Pilih Kelas</option>
                                                            <?php foreach ($kelas as $kelas_item) : ?>
                                                            <option value="<?php echo $kelas_item->id_kelas; ?>"
                                                                <?php echo isset($_GET['id_kelas']) && $_GET['id_kelas'] == $kelas_item->id_kelas ? 'selected' : ''; ?>>
                                                                <?php echo $kelas_item->nama_kelas; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <tr>
                                                        <td colspan="2">
                                                            <button type="submit" name="cari"
                                                                class="btn btn-success btn-sm">
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
                                            <table class="table table-bordered" id="example" class="display"
                                                style="width:100%">
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
                                                            <a href="<?php echo site_url('nilai/tampil_nilai/'.$s->NISN); ?>"
                                                                class="btn btn-primary btn-sm">
                                                                <i class="fas fa-plus"></i> Lihat Nilai
                                                            </a>

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
            <script src="<?php echo base_url()?>assets/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url()?>assets/datatables/dataTables.bootstrap4.min.js"></script>
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
                        targets: [2],
                        orderData: [2, 0]
                    }
                ]
            });
            </script>
            <script type="text/javascript">
            $(document).ready(function() {
                // Ketika halaman dimuat, periksa apakah ada data post sebelumnya untuk id_kelas
                var selectedKelas =
                    '<?php echo isset($_GET['id_kelas']) ? $_GET['id_kelas'] : ''; ?>';

                // Menyimpan referensi ke dropdown Kelas
                var dropdownKelas = $('#id_kelas');
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
                    var selectedKelas = $('#id_kelas').val();
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
            <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            </script>

        </div>
    </div>
    </div>
</body>

</html>