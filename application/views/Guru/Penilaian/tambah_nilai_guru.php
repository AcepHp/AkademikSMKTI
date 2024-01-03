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
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">

    <style>
    .custom-input {
        height: 100px;
        /* Sesuaikan tinggi kolom sesuai kebutuhan */
    }
    </style>


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
                <div class="container-fluid mt-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Informasi Kelas</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Nama Mata Pelajaran</th>
                                            <td><?php echo $mapel[0]->nama_mapel; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kelas</th>
                                            <td><?php echo $kelas[0]->nama_kelas; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Informasi Siswa</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <td><?php echo $siswa[0]->Nama_lengkap; ?></td>
                                        </tr>
                                        <tr>
                                            <th>NISN</th>
                                            <td><?php echo $siswa[0]->NISN; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page Heading -->
                <div class="col-md-12">
                    <div class="card shadow mb-4 mt-3">
                        <div class="card-header py-3">
                            <?php echo form_open('nilai/simpan_tambah_nilai_guru'); ?>
                            <input type="hidden" name="id_tahun" value="<?php echo $siswa[0]->id_tahun; ?>">
                            <input type="hidden" name="id_mapel" value="<?php echo $mapel[0]->id_mapel; ?>">
                            <input type="hidden" name="NISN" value="<?php echo $siswa[0]->NISN; ?>">
                            <input type="hidden" name="id_kelas" value="<?php echo $kelas[0]->id_kelas; ?>">
                            <input type="hidden" name="id_semester" value="<?php echo $semester[0]->id_semester; ?>">
                            <!-- Tambahkan elemen input tersembunyi ini -->

                            <div class="form-row">
                                <div class="col-10">
                                    <label for="kehadiran">Nilai Kehadiran</label>
                                    <input type="text" class="form-control" id="kehadiran" name="kehadiran" required>
                                </div>
                                <div class="col-2">
                                    <label for="persentase_kehadiran">Persentase </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="persentase_kehadiran"
                                            name="persentase_kehadiran" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-10">
                                    <label for="tugas">Nilai Tugas</label>
                                    <input type="text" class="form-control" id="tugas" name="tugas" required>
                                </div>
                                <div class="col-2">
                                    <label for="persentase_tugas">Persentase</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="persentase_tugas"
                                            name="persentase_tugas" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-10">
                                    <label for="uts">Nilai UTS</label>
                                    <input type="text" class="form-control" id="uts" name="uts" required>
                                </div>
                                <div class="col-2">
                                    <label for="persentase_uts">Persentase</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="persentase_uts"
                                            name="persentase_uts" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-10">
                                    <label for="uas">Nilai UAS</label>
                                    <input type="text" class="form-control" id="uas" name="uas" required>
                                </div>
                                <div class="col-2">
                                    <label for="persentase_uas">Persentase</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="persentase_uas"
                                            name="persentase_uas" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="nilai_akhir">Nilai Akhir</label>
                                <input type="text" class="form-control" id="nilai_akhir" name="nilai_akhir" required>
                            </div>

                            <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                            <?php echo form_close(); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Footer Admin -->
            <?php $this->load->view('Bar/Footer_admin'); ?>
        </div>

    </div>
    <!-- End of Main Content -->



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
    // Function to calculate the final grade and send updated percentage
    function hitungNilaiAkhir() {
        var kehadiran = parseFloat(document.getElementById('kehadiran').value);
        var persentaseKehadiran = parseFloat(document.getElementById('persentase_kehadiran').value);
        var tugas = parseFloat(document.getElementById('tugas').value);
        var persentaseTugas = parseFloat(document.getElementById('persentase_tugas').value);
        var uts = parseFloat(document.getElementById('uts').value);
        var persentaseUTS = parseFloat(document.getElementById('persentase_uts').value);
        var uas = parseFloat(document.getElementById('uas').value);
        var persentaseUAS = parseFloat(document.getElementById('persentase_uas').value);

        var nilaiSebelumnya = parseFloat(document.getElementById('nilai_akhir')
            .value); // Get the previous value

        var nilaiAkhirBaru = (kehadiran * (persentaseKehadiran / 100)) + (tugas * (persentaseTugas / 100)) + (
            uts * (persentaseUTS / 100)) + (uas * (persentaseUAS / 100));

        if (nilaiSebelumnya !== nilaiAkhirBaru) { // Check if the new grade is different from the old one
            document.getElementById('nilai_akhir').value = nilaiAkhirBaru.toFixed(2);
            // Update the input value for the percentage to be sent to the server
            document.getElementById('persentase_kehadiran').value = persentaseKehadiran;
            document.getElementById('persentase_tugas').value = persentaseTugas;
            document.getElementById('persentase_uts').value = persentaseUTS;
            document.getElementById('persentase_uas').value = persentaseUAS;
        }
    }

    // Call the function when input changes
    document.getElementById('kehadiran').onchange = hitungNilaiAkhir;
    document.getElementById('persentase_kehadiran').onchange = hitungNilaiAkhir;
    document.getElementById('tugas').onchange = hitungNilaiAkhir;
    document.getElementById('persentase_tugas').onchange = hitungNilaiAkhir;
    document.getElementById('uts').onchange = hitungNilaiAkhir;
    document.getElementById('persentase_uts').onchange = hitungNilaiAkhir;
    document.getElementById('uas').onchange = hitungNilaiAkhir;
    document.getElementById('persentase_uas').onchange = hitungNilaiAkhir;

    function hitungTotalPersentase() {
        var persentaseKehadiran = parseFloat(document.getElementById('persentase_kehadiran').value) || 0;
        var persentaseTugas = parseFloat(document.getElementById('persentase_tugas').value) || 0;
        var persentaseUTS = parseFloat(document.getElementById('persentase_uts').value) || 0;
        var persentaseUAS = parseFloat(document.getElementById('persentase_uas').value) || 0;

        var totalPersentase = persentaseKehadiran + persentaseTugas + persentaseUTS + persentaseUAS;

        if (totalPersentase > 100) {
            var sisaPersentase = totalPersentase - 100;

            var arrPersentase = [persentaseKehadiran, persentaseTugas, persentaseUTS, persentaseUAS];
            var maxVal = Math.max(...arrPersentase);

            if (maxVal === persentaseKehadiran) {
                document.getElementById('persentase_kehadiran').value = Math.max(0, persentaseKehadiran -
                    sisaPersentase);
            } else if (maxVal === persentaseTugas) {
                document.getElementById('persentase_tugas').value = Math.max(0, persentaseTugas -
                    sisaPersentase);
            } else if (maxVal === persentaseUTS) {
                document.getElementById('persentase_uts').value = Math.max(0, persentaseUTS - sisaPersentase);
            } else {
                document.getElementById('persentase_uas').value = Math.max(0, persentaseUAS - sisaPersentase);
            }
        }
    }

    document.getElementById('persentase_kehadiran').addEventListener('input', hitungTotalPersentase);
    document.getElementById('persentase_tugas').addEventListener('input', hitungTotalPersentase);
    document.getElementById('persentase_uts').addEventListener('input', hitungTotalPersentase);
    document.getElementById('persentase_uas').addEventListener('input', hitungTotalPersentase);
    </script>
</body>

</html>