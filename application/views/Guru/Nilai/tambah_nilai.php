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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

                    <div class="container-fluid mt-3">
                        <div class="row">
                            <div class="col-md-12 mx-auto mb-3">
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Tambah Nilai Siswa</h6>
                                    </div>
                                    <div class="card-body col-10 mx-auto">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nama Siswa</th>
                                                <td><?php echo $siswa->Nama_lengkap; ?></td>
                                            </tr>
                                            <tr>
                                                <th>NISN</th>
                                                <td><?php echo $siswa->NISN;?></td>
                                            </tr>
                                        </table>

                                        <div class="container mt-3">
                                            <?php echo form_open('nilai/simpan_tambah_nilai'); ?>
                                            <input type="hidden" name="nisn" value="<?php echo $siswa->NISN; ?>">
                                            <input type="hidden" name="id_tahun" value="<?php echo $tahun_akademik; ?>">
                                            <input type="hidden" name="id_semester"
                                                value="<?php echo $semester_aktif; ?>">


                                            <!-- Tambahkan input hidden untuk tahun akademik dan semester aktif -->
                                            <input type="hidden" name="id_tahun" value="<?php echo $tahun_akademik; ?>">
                                            <input type="hidden" name="id_semester"
                                                value="<?php echo $semester_aktif; ?>">
                                            <div class="form-group">
                                                <label for="id_mapel">Mata Pelajaran</label>
                                                <select class="form-control" id="id_mapel" name="id_mapel" required>
                                                    <option value="">Pilih Mata Pelajaran</option>
                                                    <?php foreach ($mata_pelajaran as $mapel) { ?>
                                                    <option value="<?php echo $mapel->id_mapel; ?>">
                                                        <?php echo $mapel->nama_mapel; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-10">
                                                    <label for="kehadiran">Nilai Kehadiran</label>
                                                    <input type="text" class="form-control" id="kehadiran"
                                                        name="kehadiran"
                                                        oninput="allowOnlyNumericInput(this, 'error_kehadiran')"
                                                        required>
                                                </div>
                                                <div class="col-2">
                                                    <label for="persentase_kehadirann">Persentase </label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            id="persentase_kehadiran" name="persentase_kehadiran"
                                                            oninput="allowOnlyNumericInput(this, 'error_persentase_kehadiran')"
                                                            required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="error_kehadiran" style="color: red; display: none;">Please
                                                    Masukan Hanya Angka Untuk Nilai </div>
                                                <div id="error_persentase_kehadiran" style="color: red; display: none;">
                                                Masukan Hanya Angka Untuk Persentase</div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-10">
                                                    <label for="tugas">Nilai Tugas</label>
                                                    <input type="text" class="form-control" id="tugas" name="tugas"
                                                    oninput="allowOnlyNumericInput(this, 'error_tugas')" required>
                                                </div>
                                                <div class="col-2">
                                                    <label for="persentase_tugass">Persentase</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="persentase_tugas"
                                                            name="persentase_tugas" oninput="allowOnlyNumericInput(this, 'error_persentase_tugas')" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="error_tugas" style="color: red; display: none;">Please
                                                    Masukan Hanya Angka Untuk Nilai </div>
                                                <div id="error_persentase_tugas" style="color: red; display: none;">
                                                Masukan Hanya Angka Untuk Persentase</div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-10">
                                                    <label for="uts">Nilai UTS</label>
                                                    <input type="text" class="form-control" id="uts" name="uts" oninput="allowOnlyNumericInput(this, 'error_uts')"
                                                        required>
                                                </div>
                                                <div class="col-2">
                                                    <label for="persentase_utss">Persentase</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="persentase_uts"
                                                            name="persentase_uts" oninput="allowOnlyNumericInput(this, 'error_persentase_uts')" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="error_uts" style="color: red; display: none;">Please
                                                    Masukan Hanya Angka Untuk Nilai </div>
                                                <div id="error_persentase_uts" style="color: red; display: none;">
                                                Masukan Hanya Angka Untuk Persentase</div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-10">
                                                    <label for="uas">Nilai UAS</label>
                                                    <input type="text" class="form-control" id="uas" name="uas" oninput="allowOnlyNumericInput(this, 'error_uas')"
                                                        required>
                                                </div>
                                                <div class="col-2">
                                                    <label for="persentase_uass">Persentase</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="persentase_uas"
                                                            name="persentase_uas" oninput="allowOnlyNumericInput(this, 'error_persentase_uas')" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="error_uas" style="color: red; display: none;">Please
                                                    Masukan Hanya Angka Untuk Nilai </div>
                                                <div id="error_persentase_uas" style="color: red; display: none;">
                                                 Masukan Hanya Angka Untuk Persentase</div>
                                            </div>


                                            <div class="form-group">
                                                <label for="nilai_akhir">Nilai Akhir</label>
                                                <input type="text" class="form-control" id="nilai_akhir"
                                                    name="nilai_akhir" required>
                                            </div>



                                            <input type="submit" name="submit" value="Simpan" class="btn btn-primary"
                                                style="margin-bottom: 20px;">

                                            <?php echo form_close(); ?>
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

                <?php $this->load->view('Bar/Logout_modal'); ?>



                <!-- Bootstrap core JavaScript-->
                <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
                <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js">
                </script>

                <!-- Core plugin JavaScript-->
                <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js">
                </script>

                <!-- Custom scripts for all pages-->
                <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="<?=base_url('assets/')?>js/demo/chart-area-demo.js"></script>
                <script src="<?=base_url('assets/')?>js/demo/chart-pie-demo.js"></script>

                <!-- Page level plugins -->
                <script src="<?php echo base_url()?>assets/datatables/jquery.dataTables.min.js">
                </script>
                <script src="<?php echo base_url()?>assets/datatables/dataTables.bootstrap4.min.js">
                </script>

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

                    var nilaiAkhirBaru = (kehadiran * (persentaseKehadiran / 100)) + (tugas * (persentaseTugas / 100)) +
                        (
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
                            document.getElementById('persentase_uts').value = Math.max(0, persentaseUTS -
                                sisaPersentase);
                        } else {
                            document.getElementById('persentase_uas').value = Math.max(0, persentaseUAS -
                                sisaPersentase);
                        }
                    }
                }

                document.getElementById('persentase_kehadiran').addEventListener('input', hitungTotalPersentase);
                document.getElementById('persentase_tugas').addEventListener('input', hitungTotalPersentase);
                document.getElementById('persentase_uts').addEventListener('input', hitungTotalPersentase);
                document.getElementById('persentase_uas').addEventListener('input', hitungTotalPersentase);
                </script>

                <script>
                function allowOnlyNumericInput(inputElement, errorElementId) {
                    var inputValue = inputElement.value.replace(/[^0-9]/g, '');
                    inputElement.value = inputValue;

                    // Display error message if non-numeric characters are entered
                    var errorElement = document.getElementById(errorElementId);
                    if (!/^[0-9]+$/.test(inputValue)) {
                        errorElement.style.display = 'block';
                    } else {
                        errorElement.style.display = 'none';
                    }
                }
                </script>
</body>

</html>