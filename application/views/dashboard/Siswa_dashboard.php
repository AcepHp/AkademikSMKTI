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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">

    <style>

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar Admin -->
        <?php $this->load->view('Bar/Sidebar_siswa'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- TopBar Admin -->
                <?php $this->load->view('Bar/Navbar_siswa'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Total Materi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $materi_count; ?></div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Total Mata Pelajaran</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $mapel_count; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <?php
    $labels = array(); // Labels for each tingkatan
    $data = array();   // Average nilai_akhir for each tingkatan

    foreach ($tingkatan as $tingkat) {
        $labels[] = $tingkat->nama_tingkatan;
        $average = 0;
        $count = 0;

        foreach ($nilai as $nilaiData) {
            if ($nilaiData->kode_tingkatan == $tingkat->kode_tingkatan) {
                $average += $nilaiData->nilai_akhir;
                $count++;
            }
        }

        $data[] = $count > 0 ? round($average / $count, 2) : 0;
    }
    ?>

                        <div class="col-xl-12 mb-4">
                            <div id="chart-card" class="card">
                                <div class="card-body">
                                    <canvas id="chart-line" height="85"></canvas>
                                </div>
                            </div>
                        </div>


                        <!-- Content Column -->

                    </div>
                </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view('Bar/Footer_admin'); ?>
            <!-- End of Footer -->
            <div class="modal fade" id="passwordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">PEMBERITAHUAN!</h5>
                        </div>
                        <div class="modal-body">
                            <p>Harap ganti password terlebih dahulu! karena password yang sekarang adalah
                                password
                                default dari akun siswa.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                id="closeModal">Nanti Saja</button>
                            <button onclick="gantiPassword()" class="btn btn-primary">Ganti Password
                                Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- include modal Logout -->
        <?php $this->load->view('Bar/Logout_modal'); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
        // Mengambil elemen modal
        var passwordModal = new bootstrap.Modal(document.getElementById('passwordModal'));
        var closeModalButton = document.getElementById('closeModal');

        // Simulasikan nilai aktif dari database
        var aktif =
            "<?php echo $this->session->userdata('aktif'); ?>"; // Ganti nilainya sesuai dengan data dari database

        // Tampilkan modal jika aktif = 0
        if (aktif === '0') {
            passwordModal.show();
        }

        // Menutup modal saat tombol close diklik
        closeModalButton.addEventListener('click', function() {
            passwordModal.hide();
        });

        // Menutup modal saat luar modal diklik
        window.addEventListener('click', function(event) {
            if (event.target == passwordModal._element) {
                passwordModal.hide();
            }
        });

        // Fungsi untuk mengganti password
        function gantiPassword() {
            window.location.href =
                '<?php echo site_url('Auth/ganti_password/' . $this->session->userdata('id_users')) ?>';
        }
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

        <!-- Include SweetAlert2 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <!-- Include SweetAlert2 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Bootstrap JavaScript (requires Popper.js) -->
        <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <script>
        // Replace any negative values with 0
        var sanitizedData = <?= json_encode($data); ?>;
        sanitizedData = sanitizedData.map(value => Math.max(0, value));

        var ctx = document.getElementById("chart-line").getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($labels); ?>,
                datasets: [{
                    label: 'Rata-Rata Nilai',
                    data: sanitizedData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false, // Set to false for a line chart without filling the area under the line
                    tension: 0.1 // Adjust the tension of the line (0.1 is the default)
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0
                    }
                }
            }
        });
        </script>


</body>

</html>