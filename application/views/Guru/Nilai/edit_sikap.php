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
                                        <h6 class="m-0 font-weight-bold text-primary">Edit Sikap Siswa</h6>
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
                                            <?php echo form_open('nilai/simpan_edit_sikap'); ?>
                                            <input type="hidden" name="nisn" value="<?php echo $siswa->NISN; ?>">
                                            <input type="hidden" name="id_tahun" value="<?php echo $tahun_akademik; ?>">
                                            <input type="hidden" name="id_semester"
                                                value="<?php echo $semester_aktif; ?>">
                                                <input type="hidden" name="id_sikap" value="<?php echo $siswaa->ID_Sikap; ?>">

                                            <!-- Tambahkan input hidden untuk tahun akademik dan semester aktif -->

                                            <div class="form-row">
                                                <div class="col-6">
                                                    <label for="sikap_satu">Sikap 1</label>
                                                    <textarea class="form-control" id="sikap_satu" name="sikap_satu"
                                                        required><?php echo $siswaa->Sikap_satu; ?></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <label for="penjelasan_sikap_satu">Penjelasan Sikap 1</label>
                                                    <textarea class="form-control" id="penjelasan_sikap_satu"
                                                        name="penjelasan_sikap_satu"
                                                        required><?php echo $siswaa->Penjelasan_sikap_satu; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-6">
                                                    <label for="sikap_dua">Sikap 2</label>
                                                    <textarea class="form-control" id="sikap_dua" name="sikap_dua"
                                                        required><?php echo $siswaa->Sikap_dua; ?></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <label for="penjelasan_sikap_dua">Penjelasan Sikap 2</label>
                                                    <textarea class="form-control" id="penjelasan_sikap_dua"
                                                        name="penjelasan_sikap_dua"
                                                        required><?php echo $siswaa->Penjelasan_sikap_dua; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-6">
                                                    <label for="sikap_tiga">Sikap 3</label>
                                                    <textarea class="form-control" id="sikap_tiga" name="sikap_tiga"
                                                        required><?php echo $siswaa->Sikap_tiga; ?></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <label for="penjelasan_sikap_tiga">Penjelasan Sikap 3</label>
                                                    <textarea class="form-control" id="penjelasan_sikap_tiga"
                                                        name="penjelasan_sikap_tiga"
                                                        required><?php echo $siswaa->Penjelasan_sikap_tiga; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-6">
                                                    <label for="sikap_empat">Sikap 4</label>
                                                    <textarea class="form-control" id="sikap_empat" name="sikap_empat"
                                                        required><?php echo $siswaa->Sikap_empat; ?></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <label for="penjelasan_sikap_empat">Penjelasan Sikap 4</label>
                                                    <textarea class="form-control" id="penjelasan_sikap_empat"
                                                        name="penjelasan_sikap_empat"
                                                        required><?php echo $siswaa->Penjelasan_sikap_empat; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-6">
                                                    <label for="sikap_lima">Sikap 5</label>
                                                    <textarea class="form-control" id="sikap_lima" name="sikap_lima"
                                                        required><?php echo $siswaa->Sikap_lima; ?></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <label for="penjelasan_sikap_lima">Penjelasan Sikap 5</label>
                                                    <textarea class="form-control" id="penjelasan_sikap_lima"
                                                        name="penjelasan_sikap_lima"
                                                        required><?php echo $siswaa->Penjelasan_sikap_lima; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-6">
                                                    <label for="sikap_enam">Sikap 6</label>
                                                    <textarea class="form-control" id="sikap_enam" name="sikap_enam"
                                                        required><?php echo $siswaa->Sikap_enam; ?></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <label for="penjelasan_sikap_enam">Penjelasan Sikap 6</label>
                                                    <textarea class="form-control" id="penjelasan_sikap_enam"
                                                        name="penjelasan_sikap_enam"
                                                        required><?php echo $siswaa->Penjelasan_sikap_enam; ?></textarea>
                                                </div>
                                            </div>


                                            <div class="text-center mt-4">
                                                <input type="submit" name="submit" value="Simpan"
                                                    class="btn btn-primary" style="margin-bottom: 20px; width: 150px;">
                                            </div>

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
                // Fungsi untuk mengatur tinggi textarea saat halaman dimuat
                function setInitialTextareaHeight() {
                    var textareas = document.querySelectorAll('textarea');
                    textareas.forEach(function(textarea) {
                        autoResizeTextarea(textarea);
                    });
                }

                // Fungsi untuk mengatur tinggi textarea secara otomatis
                function autoResizeTextarea(element) {
                    element.style.height = "auto";
                    element.style.height = (element.scrollHeight) + "px";
                }

                // Panggil fungsi setelah halaman dimuat
                document.addEventListener("DOMContentLoaded", function() {
                    setInitialTextareaHeight();
                });

                // Panggil fungsi ini setiap kali teks diubah dalam textarea
                document.addEventListener("input", function(e) {
                    if (e.target.tagName.toLowerCase() === "textarea") {
                        autoResizeTextarea(e.target);
                    }
                });
                </script>

</body>

</html>