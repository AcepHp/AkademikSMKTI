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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Report PPDB</h1>

                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Report Pertahun</h6>
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->userdata('success_tambah')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $this->session->userdata('success_tambah'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php $this->session->unset_userdata('success_tambah'); ?>
                            <?php endif; ?>

                            <?php if ($this->session->userdata('success_edit')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $this->session->userdata('success_edit'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php $this->session->unset_userdata('success_edit'); ?>
                            <?php endif; ?>

                            <?php if ($this->session->userdata('success_hapus')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $this->session->userdata('success_hapus'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php $this->session->unset_userdata('success_hapus'); ?>
                            <?php endif; ?>
                            <div style="display: flex; justify-content: space-between; width: 100%; margin: auto;">
                                <div class="card mx-auto" style="width: 30rem;">
                                    <div class="card-body d-flex flex-row-reverse align-items-center">
                                        <canvas id="pieChart" width="8" height="8"></canvas>
                                    </div>
                                </div>

                                <div style="width: 60rem;">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>


                            <br>

                            <div class="table-responsive">
                                <table class="table table-bordered display" id="example" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width:5%; text-align: center; vertical-align: middle;">No</th>
                                            <th style="text-align:center; vertical-align:center;">Periode</th>
                                            <th style="text-align: center; vertical-align: middle;">Jumlah siswa yang Diterima</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($tahun_akademik as $tahun) { ?>
                                        <tr>
                                            <td style="text-align: center; vertical-align: middle;"><?php echo $no++; ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($tahun->tahun_akademik); ?></td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <?php
                                                $jumlah_siswa = 0;
                                                foreach ($ppdb as $row) {
                                                    if ($row->Tahun_akademik == $tahun->tahun_akademik) {
                                                        $jumlah_siswa++;
                                                    }
                                                }
                                                echo $jumlah_siswa;
                                                ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>


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

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
            // Ambil data untuk grafik dari PHP dan format menjadi objek Chart.js
            var data = {
                labels: <?php echo json_encode(array_column($tahun_akademik, 'tahun_akademik')); ?>,
                datasets: [{
                    data: <?php echo json_encode(array_map(function ($tahun) use ($ppdb) {
                        $jumlah_siswa = 0;
                        foreach ($ppdb as $row) {
                            if ($row->Tahun_akademik == $tahun->tahun_akademik) {
                                $jumlah_siswa++;
                            }
                        }
                        return $jumlah_siswa;
                    }, $tahun_akademik)); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                }]
            };

            // Setup grafik
            var ctx = document.getElementById('pieChart').getContext('2d');
            var pieChart = new Chart(ctx, {
                type: 'pie',
                data: data
            });
            </script>
            <script>
            // Extract data from the table and prepare for the chart
            var labels = [];
            var data = [];

            // Iterate through table rows
            var tableRows = document.querySelectorAll("#example tbody tr");
            tableRows.forEach(function(row) {
                var columns = row.querySelectorAll("td");
                labels.push(columns[1].textContent
            .trim()); // Assuming the academic year is in the second column
                data.push(parseInt(columns[2].textContent
            .trim())); // Assuming the number of students is in the third column
            });

            // Create a bar chart
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Yang di terima ',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            </script>
</body>


</html>