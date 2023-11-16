<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Registrasi</title>
    <script>
    window.addEventListener('load', function() {
        window.print();
    });
    </script>
</head>

<body>
    <div class="row p-0 m-0">
        <div class="card-body h-100 overflow-auto" style="padding-left: 150px; padding-right: 150px">
            <table style="display: flex; justify-content: center">
                <tr>
                    <td rowspan="4"><img src="<?php echo base_url('assets/images/logo.png') ?>" class="img-fluid"
                            alt="logo smk" height="100" width="100" style="padding-right: 10px"></td>
                    <td>
                        <h3 class="fw-bold">SMK-TI GARUDA NUSANTARA</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6 style="margin: 5px 0;">Jl. Sangkuriang No. 34-36 Cimahi</h6>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6 style="margin: 5px 0;">Telp : 0821 1900 6081 / 0877 2315 7313 ⋅ Fax : 022 6650810 ⋅ Kode Pos
                            : 40511</h6>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6 style="margin: 5px 0;">Email : informasi@smktignc.sch.id ⋅ Website : smktignc.sch.id</h6>
                    </td>
                </tr>
            </table><br>
            <div class="row">
                <h4 class="text-center fw-bold">Kartu Registrasi Penerimaan Peserta Didik Baru</h4>
            </div>
            <div class="row mb-3">
                <h4 class="text-center fw-bold">Tahun</h4>
            </div>
            <?php foreach ($ppdb as $row) : ?>
            <div style="border-bottom: 2px solid black;"></div>
            <div class="row text-center mt-5">
                <h4 class="fw-bold">Registrasi Peserta Didik</h4>
            </div>
            <div class="col">
                <table>
                    <tr style="font-size: 15px">
                        <td >NISN</td>
                        <td>:  <?php echo $row->NISN; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td style="padding-right: 50px">Nomor Pendaftaran</td>
                        <td>:  <?php echo $row->nomor_registrasi; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Tanggal Pendaftaran</td>
                        <td>:  <?php echo $row->tanggal_registrasi; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Pilihan 1</td>
                        <td>:  <?php echo $row->pilihan_satu; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Pilihan 2</td>
                        <td>:  <?php echo $row->pilihan_dua; ?></td>
                    </tr>
                </table>
            </div>
            <div style="border-bottom: 2px solid black;"></div>

            <div class="row text-center">
                <h4 class="fw-bold">Data Pribadi</h4>
            </div>
            <div class="col">
                <table>
                    <tr style="font-size: 15px">
                        <td style="padding-right: 95px">Nama Lengkap</td>
                        <td>:  <?php echo $row->Nama_lengkap; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Jenis Kelamin</td>
                        <td>:  <?php echo $row->Jenis_kelamin; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Sekolah Asal</td>
                        <td>:  <?php echo $row->asal_sekolah; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Tempat Lahir</td>
                        <td>:  <?php echo $row->Tempat_lahir; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Tanggal Lahir</td>
                        <td>:  <?php echo $row->Tanggal_Lahir; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Agama</td>
                        <td>:  <?php echo $row->agama; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>No. WA Aktif</td>
                        <td>:  <?php echo $row->nomor_telp; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Email</td>
                        <td>:  <?php echo $row->email; ?></td>
                    </tr>
                </table>
            </div>
            <div style="border-bottom: 2px solid black;"></div>
            <br>
            <div class="row text-center mt-5">
                <span class="fw-bold">Saya yang bertandatangan dibawah ini menyatakan bahwa data yang tertera diatas
                    adalah yang sebenarnya</span>
            </div>
            <br>
            <div class="row text-end mt-5">
                <span class="fw-bold"><?php echo $row->kabupaten_kota; ?>, <?php echo $row->tanggal_registrasi; ?></span>
            </div><br><br><br><br><br>
            <div class="row text-end">
                <span class="fw-bold"><?php echo $row->Nama_lengkap; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
</body>

</html>