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
        <div class="card-body h-100 overflow-auto" style="padding-left: 80px; padding-right: 80px">
            <table style="display: flex; justify-content: center">
                <tr>
                    <td rowspan="4"><img src="<?php echo base_url('assets/images/logo.png') ?>" class="img-fluid"
                            alt="logo smk" height="100" width="100" style="padding-right: 10px"></td>
                    <td style="font-size:25px; font-weight:bold;">SMK-TI GARUDA NUSANTARA</td>
                </tr>
                <tr>
                    <td>Jl. Sangkuriang No. 34-36 Cimahi</td>
                </tr>
                <tr>
                    <td>Telp : 0821 1900 6081 / 0877 2315 7313 ⋅ Fax : 022 6650810 ⋅ Kode Pos : 40511</td>
                </tr>
                <tr>
                    <td>Email : informasi@smktignc.sch.id ⋅ Website : smktignc.sch.id</td>
                </tr>
            </table><br>
            <div style="border-bottom: 2px solid black;"></div>
            <div class="row">
                <center style="margin-top:10px; font-size:18px; font-weight:bold;">Kartu Registrasi Penerimaan Peserta Didik Baru</center>
            </div>

            <?php foreach ($ppdb as $row) : ?>

            <div class="row text-center mt-5">
                <h4 class="fw-bold">Registrasi Peserta Didik</h4>
            </div>
            <div class="col">
                <table>
                    <tr style="font-size: 15px">
                        <td>NISN</td>
                        <td>: <?php echo $row->NISN; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td style="padding-right: 50px">Nomor Pendaftaran</td>
                        <td>: <?php echo $row->nomor_registrasi; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Tanggal Pendaftaran</td>
                        <td>: <?php echo $row->tanggal_registrasi; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Pilihan 1</td>
                        <td>: <?php echo $row->pilihan_satu; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Pilihan 2</td>
                        <td>: <?php echo $row->pilihan_dua; ?></td>
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
                        <td>: <?php echo $row->Nama_lengkap; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Jenis Kelamin</td>
                        <td>: <?php echo $row->Jenis_kelamin; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Sekolah Asal</td>
                        <td>: <?php echo $row->asal_sekolah; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Tempat Lahir</td>
                        <td>: <?php echo $row->Tempat_lahir; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Tanggal Lahir</td>
                        <td>: <?php echo $row->Tanggal_Lahir; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Agama</td>
                        <td>: <?php echo $row->agama; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>No. WA Aktif</td>
                        <td>: <?php echo $row->nomor_telp; ?></td>
                    </tr>
                    <tr style="font-size: 15px">
                        <td>Email</td>
                        <td>: <?php echo $row->email; ?></td>
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
            <table style="width:100%;">
                <tr>
                    <td style="width:25%;"></td>
                    <td style="width:25%;"></td>
                    <td style="width:50%; text-align:center;"><?php echo $row->kabupaten_kota; ?>,
                        <?php echo $row->tanggal_registrasi; ?></td>
                </tr>
                <tr style="margin-top:50px;">
                    <td style="margin-top:50px;"></td>
                    <td style="margin-top:50px;"></td>
                    <td style="margin-top:50px; text-align:center;"><br><br><br><br><br><br><span
                            class="fw-bold"><?php echo $row->Nama_lengkap; ?></span></td>
                </tr>
            </table>

            <?php endforeach; ?>
        </div>
    </div>
    </div>
</body>

</html>