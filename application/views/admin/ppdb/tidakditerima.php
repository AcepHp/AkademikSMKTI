<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

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

                    <!-- Page Heading -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Data Pendaftar Tidak Diterima</h1>
                        </div>
                    </div>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Pendaftar Tidak Diterima</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Pilihan 1</th>
                                                <th>Pilihan 2</th>
                                                <th>Nama Lengkap</th>
                                                <th>L/P</th>
                                                <th>No Telepon</th>
                                                <th>Email</th>
                                                <th>Aksi</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;?>
                                            <?php foreach ($ppdb as $row) : ?>
                                            <?php if (stripos($row->status, '0') !== false) : ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row->pilihan_satu ?></td>
                                                <td><?php echo $row->pilihan_dua ?></td>
                                                <td><?php echo $row->Nama_lengkap ?></td>
                                                <td><?php echo $row->Jenis_kelamin ?></td>
                                                <td><?php echo $row->nomor_telp ?></td>
                                                <td><?php echo $row->email ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-info" title="Detail"
                                                        data-toggle="modal"
                                                        data-target="#pendaftarModal<?php echo $row->id_ppdb; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php if ($row->status == 1) : ?>
                                                    <button class="btn btn-sm btn-success"
                                                        onclick="changeStatus(<?php echo $row->id_ppdb; ?>, 0)">Diterima</button>
                                                    <?php else : ?>
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="changeStatus(<?php echo $row->id_ppdb; ?>, 1)">Tidak
                                                        Diterima</button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Admin -->
            <?php $this->load->view('Bar/Footer_admin'); ?>
        </div>
    </div>

    <?php $this->load->view('Bar/Logout_modal'); ?>

    <!-- Modal -->
    <?php foreach ($ppdb as $row): ?>
    <div class="modal fade" id="pendaftarModal<?php echo $row->id_ppdb; ?>" tabindex="-1" role="dialog"
        aria-labelledby="pendaftarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 50%; width: 100%;" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="pendaftarModalLabel" style="font-size: 1.25rem;">Detail Semua Pendaftar
                        - <?php echo $row->Nama_lengkap; ?></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="font-size: 1rem;">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID PPDB</th>
                                <td><?php echo $row->id_ppdb; ?></td>
                            </tr>
                            <tr>
                                <th>NISN</th>
                                <td><?php echo $row->nisn; ?></td>
                            </tr>
                            <tr>
                                <th>Pilihan 1</th>
                                <td><?php echo $row->pilihan_satu; ?></td>
                            </tr>
                            <tr>
                                <th>Pilihan 2</th>
                                <td><?php echo $row->pilihan_dua; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td><?php echo $row->Nama_lengkap; ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?php echo $row->Jenis_kelamin; ?></td>
                            </tr>
                            <tr>
                                <th>Asal Sekolah</th>
                                <td><?php echo $row->asal_sekolah; ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><?php echo $row->Tempat_lahir; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><?php echo $row->Tanggal_Lahir; ?></td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td><?php echo $row->agama; ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?php echo $row->Alamat; ?></td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td><?php echo $row->provinsi; ?></td>
                            </tr>
                            <tr>
                                <th>Kabupaten/Kota</th>
                                <td><?php echo $row->kabupaten_kota; ?></td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td><?php echo $row->kecamatan; ?></td>
                            </tr>
                            <tr>
                                <th>Kelurahan/Desa</th>
                                <td><?php echo $row->kelurahan_desa; ?></td>
                            </tr>
                            <tr>
                                <th>Dusun/Kampung</th>
                                <td><?php echo $row->dusun_kampung; ?></td>
                            </tr>
                            <tr>
                                <th>RT</th>
                                <td><?php echo $row->rt; ?></td>
                            </tr>
                            <tr>
                                <th>RW</th>
                                <td><?php echo $row->rw; ?></td>
                            </tr>
                            <tr>
                                <th>Kode Pos</th>
                                <td><?php echo $row->kode_pos; ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Telp</th>
                                <td><?php echo $row->nomor_telp; ?></td>
                            </tr>
                            <tr>
                                <th>Nama ayah</th>
                                <td><?php echo $row->Nama_ayah; ?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan Ayah</th>
                                <td><?php echo $row->pendidikan_ayah; ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan Ayah</th>
                                <td><?php echo $row->pekerjaan_ayah; ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan Ayah</th>
                                <td><?php echo $row->penghasilan_ayah; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Ibu</th>
                                <td><?php echo $row->Nama_ibu; ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan Ibu</th>
                                <td><?php echo $row->pekerjaan_ibu; ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan Ibu</th>
                                <td><?php echo $row->penghasilan_ibu; ?></td>
                            </tr>
                            <tr>
                                <th>No Telp Ortu</th>
                                <td><?php echo $row->No_telp_ortu; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Wali</th>
                                <td><?php echo $row->Nama_wali; ?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan Wali</th>
                                <td><?php echo $row->pendidikan_wali; ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan Wali</th>
                                <td><?php echo $row->pekerjaan_wali; ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan Wali</th>
                                <td><?php echo $row->penghasilan_wali; ?></td>
                            </tr>
                            <tr>
                                <th>No Telp Wali</th>
                                <td><?php echo $row->No_telp_wali; ?></td>
                            </tr>
                            <tr>
                                <th>Jarak Tempuh</th>
                                <td><?php echo $row->jarak_tempuh; ?></td>
                            </tr>
                            <tr>
                                <th>Waktu Tempuh</th>
                                <td><?php echo $row->waktu_tempuh; ?></td>
                            </tr>
                            <tr>
                                <th>Tinggi Badan</th>
                                <td><?php echo $row->tb; ?></td>
                            </tr>
                            <tr>
                                <th>Berat Badan</th>
                                <td><?php echo $row->bb; ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Saudara</th>
                                <td><?php echo $row->jumlah_saudara; ?></td>
                            </tr>
                            <tr>
                                <th>Tahun Akademik</th>
                                <td><?php echo $row->Tahun_akademik; ?></td>
                            </tr>
                            <!-- ... (other fields) ... -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
    function Delete_Guru(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data guru akan dihapus dan tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Ganti URL di bawah ini dengan URL yang sesuai untuk menghapus guru
                window.location.href = '<?=site_url("admin/delete_guru/") ?>' + id;
            }
        });
    }
    </script>

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
                targets: [4],
                orderData: [4, 0]
            }
        ]
    });
    </script>


</body>

</html>