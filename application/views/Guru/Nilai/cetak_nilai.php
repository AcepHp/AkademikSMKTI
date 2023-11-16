<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Nilai</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-left: 0;
        /* Menghilangkan margin kiri */
        height: 200px;
        /* Menambahkan tinggi tabel (sesuaikan sesuai kebutuhan) */
        font-size: 12px;
        /* Mengatur ukuran huruf ke 12px */
        padding: 3px;
        /* Menambahkan padding ke elemen tabel */
        font-family: 'Times New Roman', Times, serif;
    }

    table.border {
        border: 1px solid #000;
    }



    .table-sikap table td {
        text-align: justify;
    }

    .table-akademik table td {
        text-align: justify;
    }
    </style>
</head>

<body>

    <table>
        <tr>
            <td style="width:22%">Nama Peserta Didik</td>
            <td style="width:3%">:</td>
            <td style="width:40%"><?php echo $nama_peserta_didik; ?></td>
            <td style="width:18%">Kelas</td>
            <td style="width:3%">:</td>
            <td style="width:14%"><?php echo $kelas_info; ?></td>
        </tr>
        <tr>
            <td style="width:22%">NISN</td>
            <td style="width:3%">:</td>
            <td style="width:40%"><?php echo $nisn; ?></td>
            <td style="width:18%">Semester</td>
            <td style="width:3%">:</td>
            <td style="width:14%"><?php echo $semester_aktif->nama_semester; ?></td>
        </tr>
        <tr>
            <td style="width:22%">Sekolah</td>
            <td style="width:3%">:</td>
            <td style="width:40%">SMK-TI GARUDA NUSANTARA</td>
            <td style="width:18%">Tahun Pelajaran</td>
            <td style="width:3%">:</td>
            <td style="width:14%"><?php echo $tahun_akademik->tahun_akademik; ?></td>
        </tr>
        <tr>
            <td style="width:22%">Alamat</td>
            <td style="width:3%">:</td>
            <td style="width:40%">JL. SANGKURIANG NO. 30 Kota Cimahi </td>
            <td style="width:18%"></td>
            <td style="width:3%"></td>
            <td style="width:14%"></td>
        </tr>
    </table>

    <table>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>A. Sikap</td>
        </tr>
    </table>
    <div class="table-sikap">
        <table border="1">
            <!-- Menambahkan border ke tabel -->
            <tr>
                <th style="height: 25px; background-color: #EEEDED;">Dimensi</th>
                <th style="height: 25px; background-color: #EEEDED;">Penjelasan</th>
            </tr>
            <tr>
                <td>Beriman, bertakwa kepada Tuhan Yang Maha Esa, dan Berakhlak Mulia
                </td>
                <td>Melaksanakan ibadah secara rutin dan mandiri sesuai dengan tuntunan
                    agama/kepercayaan, serta berpartisipasi pada perayaan hari-hari besar</td>
            </tr>
            <tr>
                <td>Bernalar Kritis </td>
                <td>Berani Mengajukan pertanyaan untuk menjawab keingintahuannya dan
                    untuk mengidentiﬁkasi suatu permasalahan mengenai dirinya dan lingkungan sekitarnya.</td>
            </tr>
            <tr>
                <td>Mandiri</td>
                <td>Mampu Mengidentiﬁkasi perbedaan emosi yang dirasakannya dan
                    situasi-situasi yang menyebabkan- nya: serta mengekspresi-kan secara wajar</td>
            </tr>
            <tr>
                <td>Berkebinekaan Global</td>
                <td>Menghargai perbedaan pendapat teman-temannya saat berdiskusi di
                    kelas</td>
            </tr>
            <tr>
                <td>Perkembangan Dimensi Kreatif</td>
                <td>Mampu Menggabungkan beberapa gagasan menjadi ide atau gagasan
                    imajinatif yang bermakna untuk mengekspresikan pikiran dan/atau perasaannya</td>
            </tr>
            <tr>
                <td>Bergotong royong</td>
                <td>Terbiasa bekerja bersama dalam melakukah kegiatan dengan kelompok
                </td>
            </tr>
        </table>
    </div>
    <table>
        <tr>
            <td> B. Nilai Akademik</td>
        </tr>
    </table>
    <div class="table-akademik">
        <table border="1">
            <tr>
                <th style="width: 8%; text-align: center; vertical-align: middle; background-color: #EEEDED; ">No</th>
                <th style="width: 35%; text-align: center; vertical-align: middle; background-color: #EEEDED;">Mata
                    Pelajaran</th>
                <th
                    style="width: 12%; text-align: center; vertical-align: middle; line-height: 120%; background-color: #EEEDED;">
                    Nilai Akhir</th>
                <th style="width: 45%; text-align: center; vertical-align: middle; background-color: #EEEDED;">Capaian
                    Kompetensi</th>
            </tr>
            <?php
        $no = 1; // Variabel untuk nomor urut
        foreach ($nilai_siswa as $nilai) {
            echo '<tr>';
            echo '<td style="width: 8%; text-align: center;">' . $no . '</td>'; // Menampilkan nomor urut
            echo '<td style="width: 35%;">' . $nilai->nama_mapel . '</td>'; // Menampilkan nama mata pelajaran
            echo '<td style="width: 12%; text-align: center;">' . $nilai->nilai_akhir . '</td>'; // Menampilkan nilai akhir
            echo '<td style="width: 45%;">' . $nilai->capaian . '</td>'; // Gantilah dengan data capaian kompetensi yang sesuai
            echo '</tr>';
            $no++; // Increment nomor urut
        }
        ?>
        </table>
    </div>
    <table>
        <tr>
            <td> C. Praktik Kerja Lapangan</td>
        </tr>
    </table>
    <div class="kerja-lapangan">
        <table border="1" style="line-height: 250%;">
            <tr>
                <th style="text-align: center; background-color: #EEEDED; width:8%;">No</th>
                <th style="text-align: center; background-color: #EEEDED; width:32%;">Mitra DU/DI</th>
                <th style="text-align: center; background-color: #EEEDED; width:20%;">Lokasi</th>
                <th style="text-align: center; background-color: #EEEDED; width:20%;">Lamanya (Bulan)</th>
                <th style="text-align: center; background-color: #EEEDED; width:20%;">Keterangan</th>
            </tr>
            <tr>
                <td colspan="5"></td>
                <td></td> <!-- Menggabungkan 2 sel -->
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </table>
    </div>
    <table>
        <tr>
            <td> D. Ekstrakurikuler</td>
        </tr>
    </table>
    <div class="eskul">
        <table border="1" style="line-height: 250%;">
            <tr>
                <th style="text-align: center; background-color: #EEEDED; width:8%;">No</th>
                <th style="text-align: center; background-color: #EEEDED; width:42%;">Kegiatan Ekstrakurikuler</th>
                <th style="text-align: center; background-color: #EEEDED; width:50%;">Keterangan</th>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <table>
        <tr>
            <td> E. Absensi</td>
        </tr>
    </table>
    <div class="absensi">
        <table border="1" style="line-height: 150%; ">
            <tr>
                <td style="width: 30%;">Sakit</td>
                <td style="width: 30%;">: ...... Hari</td>
            </tr>
            <tr>
                <td>Izin</td>
                <td>: ...... Hari</td>
            </tr>
            <tr>
                <td>Tanpa Keterangan</td>
                <td>: ...... Hari</td>
            </tr>
        </table>
    </div>
    <div class="tanda-tangan">
        <table style="text-align: center;">
            <tr>
                <td></td>
                <td>Cimahi, <?php echo date('d F Y'); ?></td>

            </tr>
            <tr>
                <td>Orang Tua/Wali</td>
                <td>Wali Kelas</td>
            </tr>
            <tr>
                <td><br><br><br><br><br></td>
                <td><br><br><br><br><br></td>
            </tr>
            <tr>
                <td>....................................</td>
                <td><u style="border-bottom: 3px solid black; padding-bottom: 10px;">Acep Hand</u></td>
            </tr>

            <tr>
                <td style="width: 60%;"></td>
                <td style="text-align: left; width: 40%;">NIP.</td>
            </tr>

        </table>
        <table style="text-align: center;">
            <tr>
                <td>Mengetahui,</td>
            </tr>
            <tr>
                <td>Kepala Sekolah</td>

            </tr>
            <tr>
                <td><br><br><br><br><br><u>RIDO AMALUDIN TOYIB, S.T.</u></td>

            </tr>
            <tr>
                <td>NUPTK. 544075465611003</td>
            </tr>
        </table>

    </div>



</body>

</html>