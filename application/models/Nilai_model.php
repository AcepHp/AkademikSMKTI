<?php
class Nilai_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Mendapatkan daftar siswa berdasarkan filter
    public function filter_data($kode_jurusan, $id_kelas) {
        $this->db->select('siswa.NISN, siswa.Nama_Lengkap'); // Kolom yang ingin Anda tampilkan
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $this->db->where('kelas.kode_jurusan', $kode_jurusan);
        $this->db->where('kelas.id_kelas', $id_kelas);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_nilai_by_nisn($nisn) {
        $this->db->select('nilai.ID_Nilai, nilai.NISN, mata_pelajaran.nama_mapel, nilai.kehadiran, nilai.tugas, nilai.uts, nilai.uas, nilai.nilai_akhir');
        $this->db->from('nilai');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = nilai.id_mapel');
        $this->db->where('nilai.NISN', $nisn);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_nama_lengkap_by_nisn($nisn) {
        $this->db->select('Nama_Lengkap');
        $this->db->where('NISN', $nisn);
        $query = $this->db->get('siswa'); // Ganti 'siswa' dengan nama tabel yang sesuai
        $result = $query->row();
        return $result->Nama_Lengkap;
    }
    public function simpan_data_nilai($nisn, $id_tahun, $id_semester, $id_mapel, $kehadiran, $tugas, $uts, $uas, $nilai_akhir) {
        $data = array(
            'NISN' => $nisn,
            'id_tahun' => $id_tahun,
            'id_semester' => $id_semester,
            'id_mapel' => $id_mapel,
            'kehadiran' => $kehadiran,
            'tugas' => $tugas,
            'uts' => $uts,
            'uas' => $uas,
            'nilai_akhir' => $nilai_akhir
        );
    
        $this->db->insert('nilai', $data);
    }
    public function simpan_tambah_nilai($nisn, $id_tahun, $id_semester, $id_mapel, $kehadiran, $tugas, $uts, $uas, $nilai_akhir) {
        $data = array(
            'NISN' => $nisn,
            'id_tahun' => $id_tahun,
            'id_semester' => $id_semester,
            'id_mapel' => $id_mapel,
            'kehadiran' => $kehadiran,
            'tugas' => $tugas,
            'uts' => $uts,
            'uas' => $uas,
            'nilai_akhir' => $nilai_akhir
        );
    
        $this->db->insert('nilai', $data);
    }
    
    public function get_siswa_by_NISN($nisn) {
        $this->db->select('s.*, kk.kode_jurusan, ,kk.id_kelas,kk.NISN'); // Memilih semua kolom dari tabel siswa dan kolom kode_jurusan dan id_kelas dari tabel kelola_kelas
        $this->db->from('siswa s');
        $this->db->join('kelola_kelas kk', 's.NISN = kk.NISN'); // Sesuaikan dengan relasi antara tabel siswa dan kelola_kelas
        $this->db->where('s.NISN', $nisn);
        $query = $this->db->get();
        return $query->row(); // Menggunakan row() untuk mengambil satu baris data
    }
    
    public function get_nilai_by_id($id_nilai) {
        $this->db->select('nilai.ID_Nilai, nilai.NISN, nilai.id_mapel, mata_pelajaran.nama_mapel, nilai.kehadiran, nilai.tugas, nilai.uts, nilai.uas, nilai.nilai_akhir');
        $this->db->from('nilai');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = nilai.id_mapel');
        $this->db->where('nilai.ID_Nilai', $id_nilai);
        $query = $this->db->get();
        return $query->row();
    }
    
    
    public function get_mata_pelajaran_by_jurusan_kelas($kode_jurusan, $id_kelas) {
        $this->db->select('mata_pelajaran.id_mapel, mata_pelajaran.nama_mapel');
        $this->db->from('mata_pelajaran');
        $this->db->join('kelas', 'kelas.kode_jurusan = mata_pelajaran.kode_jurusan');
        $this->db->where('kelas.id_kelas', $id_kelas);
        $this->db->where('mata_pelajaran.kode_jurusan', $kode_jurusan);
        $query = $this->db->get();
        return $query->result();
    }
    public function update_data_nilai($id_nilai, $id_mapel, $kehadiran, $tugas, $uts, $uas, $nilai_akhir) {
        $data = array(
            'id_mapel' => $id_mapel,
            'kehadiran' => $kehadiran,
            'tugas' => $tugas,
            'uts' => $uts,
            'uas' => $uas,
            'nilai_akhir' => $nilai_akhir
        );

        $this->db->where('ID_Nilai', $id_nilai);
        $this->db->update('nilai', $data);
    }
    public function hapus_data_nilai($id_nilai) {
        $this->db->where('ID_Nilai', $id_nilai);
        $this->db->delete('nilai');
    }
    public function get_kode_jurusan_id_kelas_by_NISN($nisn) {
        $this->db->select('kode_jurusan, id_kelas');
        $this->db->from('kelola_kelas');
        $this->db->where('NISN', $nisn);
        $query = $this->db->get();
        return $query->row();
    }
    // Dalam model Nilai_model.php
// Dalam model Nilai_model.php
// Dalam model Nilai_model.php
public function get_kode_jurusan_tingkatan_by_NISN($nisn) {
    // Implementasi kode untuk mengambil kode jurusan dan tingkatan berdasarkan NISN
    // Misalnya, Anda dapat menggunakan query database untuk mengambil data tersebut.
    $this->db->select('kode_jurusan, kode_tingkatan'); // Perbaikan nama kolom di sini
    $this->db->from('kelola_kelas'); // Sesuaikan dengan nama tabel yang benar
    $this->db->where('nisn', $nisn);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row(); // Mengembalikan hasil dalam bentuk objek atau array, sesuai preferensi Anda
    } else {
        return false; // Mengembalikan false jika data tidak ditemukan
    }
}
public function get_nilai_by_nisn_tahun($nisn, $id_tahun) {
    $this->db->select('nilai.*, mata_pelajaran.nama_mapel');
    $this->db->from('nilai');
    $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = nilai.id_mapel');
    $this->db->where('nilai.NISN', $nisn);
    $this->db->where('nilai.id_tahun', $id_tahun);
    $query = $this->db->get();
    return $query->result();
}
public function get_nilai_by_nisn_tahun_semester($nisn, $id_tahun, $id_semester) {
    $this->db->select('nilai.*, mata_pelajaran.nama_mapel');
    $this->db->from('nilai');
    $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = nilai.id_mapel');
    $this->db->where('nilai.NISN', $nisn);
    $this->db->where('nilai.id_tahun', $id_tahun);
    $this->db->where('nilai.id_semester', $id_semester); // Menambahkan kondisi untuk semester
    $query = $this->db->get();
    return $query->result();
}


public function get_nama_kelas_by_NISN($nisn) {
    $this->db->select('kelas.nama_kelas');
    $this->db->from('kelola_kelas');
    $this->db->join('kelas', 'kelola_kelas.id_kelas = kelas.id_kelas');
    $this->db->where('kelola_kelas.NISN', $nisn);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $row = $query->row();
        return $row->nama_kelas;
    } else {
        return 'Tidak ditemukan'; // Anda bisa mengganti dengan pesan yang sesuai jika tidak ada nama kelas yang ditemukan
    }
}
// Model Nilai_model.php
public function get_nama_jurusan_by_NISN($nisn) {
    $this->db->select('jurusan.nama_jurusan');
    $this->db->from('kelola_kelas');
    $this->db->join('kelas', 'kelola_kelas.id_kelas = kelas.id_kelas');
    $this->db->join('jurusan', 'kelas.kode_jurusan = jurusan.kode_jurusan');
    $this->db->where('kelola_kelas.NISN', $nisn);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $row = $query->row();
        return $row->nama_jurusan;
    } else {
        return 'Tidak ditemukan'; // Anda bisa mengganti dengan pesan yang sesuai jika tidak ada nama jurusan yang ditemukan
    }
}
public function edit_nilai($id_nilai, $id_mapel, $id_tahun, $id_semester, $kehadiran, $tugas, $uts, $uas, $nilai_akhir) {
    $data = array(
        'id_mapel' => $id_mapel,
        'id_tahun' => $id_tahun,
        'id_semester' => $id_semester,
        'kehadiran' => $kehadiran,
        'tugas' => $tugas,
        'uts' => $uts,
        'uas' => $uas,
        'nilai_akhir' => $nilai_akhir
    );

    // Update data nilai berdasarkan ID nilai
    $this->db->where('ID_Nilai', $id_nilai);
    $this->db->update('nilai', $data);
}





///Penilain Guru

// Penilaian Untuk Guru

public function get_mapel_data($ID_Guru,$id_tahun,$id_semester) {
    $this->db->select('pengajar_mapel.ID_PM, pengajar_mapel.ID_Guru, pengajar_mapel.id_mapel, pengajar_mapel.id_kelas, guru.Nama_Lengkap, mata_pelajaran.nama_mapel, mata_pelajaran.kode_jurusan, kelas.nama_kelas, jurusan.nama_jurusan,tingkatan.kode_tingkatan, tingkatan.nama_tingkatan, tahun_akademik.tahun_akademik, tahun_akademik.id_tahun, semester.id_semester, semester.nama_semester');
    $this->db->from('pengajar_mapel');
    $this->db->join('guru', 'pengajar_mapel.ID_Guru = guru.ID_Guru');
    $this->db->join('mata_pelajaran', 'pengajar_mapel.id_mapel = mata_pelajaran.id_mapel');
    $this->db->join('kelas', 'pengajar_mapel.id_kelas = kelas.id_kelas');
    $this->db->join('tingkatan', 'kelas.kode_tingkatan = tingkatan.kode_tingkatan');
    $this->db->join('jurusan', 'mata_pelajaran.kode_jurusan = jurusan.kode_jurusan');
    $this->db->join('tahun_akademik', 'pengajar_mapel.id_tahun = tahun_akademik.id_tahun');
    $this->db->join('semester', 'pengajar_mapel.id_semester = semester.id_semester');
    $this->db->where('pengajar_mapel.ID_Guru', $ID_Guru);
    $this->db->where('pengajar_mapel.id_tahun', $id_tahun);
    $this->db->where('pengajar_mapel.id_semester', $id_semester);
    $query = $this->db->get();
    return $query->result();
}

public function get_tingkatan() {
    $this->db->select('kode_tingkatan, nama_tingkatan');
    $query = $this->db->get('tingkatan');
    return $query->result();
}    

public function get_tahun() {
    $this->db->select('*');
    $this->db->where('status', "aktif");
    $query = $this->db->get('tahun_akademik');
    return $query->result();
}    

public function get_semester() {
    $this->db->select('*');
    $this->db->where('status', "aktif");
    $query = $this->db->get('semester');
    return $query->result();
}    

public function get_all_siswa_by_kelas($id_kelas, $id_tahun,$id_mapel,$id_semester) {
    $this->db->select('siswa.NISN, siswa.Nama_lengkap, IFNULL(nilai.kehadiran, 0) AS kehadiran, IFNULL(nilai.tugas, 0) AS tugas, IFNULL(nilai.uts, 0) AS uts, IFNULL(nilai.uas, 0) AS uas, IFNULL(nilai.nilai_akhir, 0) AS nilai_akhir, mata_pelajaran.nama_mapel');
$this->db->from('kelola_kelas');
$this->db->join('siswa', 'kelola_kelas.NISN = siswa.NISN', 'LEFT');
$this->db->join('nilai', 'siswa.NISN = nilai.NISN AND nilai.id_mapel = ' . $id_mapel . ' AND nilai.id_semester = ' . $id_semester, 'LEFT');
$this->db->join('mata_pelajaran', 'nilai.id_mapel = mata_pelajaran.id_mapel', 'LEFT');
$this->db->where('kelola_kelas.id_kelas', $id_kelas);
$this->db->where('kelola_kelas.id_tahun', $id_tahun);

$query = $this->db->get();
return $query->result();
}

public function get_detail_kelas($id_kelas) {
    $this->db->select('kelas.*,jurusan.*,tingkatan.*');
    $this->db->from('kelas');
    $this->db->join('jurusan', 'kelas.kode_jurusan = jurusan.kode_jurusan');
    $this->db->join('tingkatan', 'kelas.kode_tingkatan = tingkatan.kode_tingkatan');
    $this->db->where('kelas.id_kelas', $id_kelas);
    $query = $this->db->get();
    return $query->result();
}

public function get_detail_kelas_mapel($id_kelas) {
    $this->db->select('kelas.*,pengajar_mapel.*,mata_pelajaran.*');
    $this->db->from('kelas');
    $this->db->join('pengajar_mapel', 'kelas.id_kelas = pengajar_mapel.id_kelas');
    $this->db->join('mata_pelajaran', 'pengajar_mapel.id_mapel = mata_pelajaran.id_mapel');
    $this->db->where('kelas.id_kelas', $id_kelas);
    $query = $this->db->get();
    return $query->result();
}

public function get_siswa_by_NISN_guru($NISN,$id_mapel) {
    $this->db->select('siswa.NISN, siswa.Nama_lengkap, kelola_kelas.id_tahun, nilai.id_semester,nilai.ID_Nilai, nilai.kehadiran, nilai.tugas, nilai.uts, nilai.uas, nilai.nilai_akhir');
    $this->db->from('siswa');
    $this->db->join('nilai', 'siswa.NISN = nilai.NISN', 'LEFT');
    $this->db->join('kelola_kelas', 'siswa.NISN = kelola_kelas.NISN', 'LEFT');
    $this->db->join('mata_pelajaran', 'nilai.id_mapel = mata_pelajaran.id_mapel', 'LEFT');
    $this->db->where('siswa.NISN', $NISN);
    $this->db->where('mata_pelajaran.id_mapel', $id_mapel);
    
    $query = $this->db->get();
    return $query->result();
}

public function get_siswa_by_NISN_guruu($NISN) {
    $this->db->select('siswa.NISN, siswa.Nama_lengkap, kelola_kelas.id_tahun ,nilai.ID_Nilai, nilai.kehadiran, nilai.tugas, nilai.uts, nilai.uas, nilai.nilai_akhir');
    $this->db->from('siswa');
    $this->db->join('nilai', 'siswa.NISN = nilai.NISN', 'LEFT');
    $this->db->join('kelola_kelas', 'siswa.NISN = kelola_kelas.NISN', 'LEFT');
    $this->db->where('siswa.NISN', $NISN);
    $query = $this->db->get();
    return $query->result();
}
    
///// siswa tampil nilai

public function get_nilai_datasiswa($nisn,) {
    $this->db->select('nilai.id_semester,nilai.ID_Nilai, nilai.kehadiran, nilai.tugas, nilai.uts, nilai.uas, nilai.nilai_akhir, kelola_kelas.kode_tingkatan, mata_pelajaran.nama_mapel,semester.nama_semester');
    $this->db->from('nilai');
    $this->db->join('kelola_kelas', 'nilai.NISN = kelola_kelas.NISN');
    $this->db->join('mata_pelajaran', 'nilai.id_mapel = mata_pelajaran.id_mapel');
    $this->db->join('semester', 'nilai.id_semester = semester.id_semester');
    $this->db->where('nilai.NISN', $nisn);
    $query = $this->db->get();
    return $query->result();
}

public function get_tingkat_by_nisn($nisn) {
    $this->db->select('kelola_kelas.kode_tingkatan');
    $this->db->from('kelola_kelas');
    $this->db->join('tingkatan', 'kelola_kelas.kode_tingkatan = tingkatan.kode_tingkatan');
    $this->db->where('kelola_kelas.NISN', $nisn);
    $query = $this->db->get();
    $result = $query->row(); // Menggunakan row() untuk mendapatkan satu baris data
    return $result;
}

public function get_siswa_kelas_by_nisn($nisn){
    $this->db->select('kelas.nama_kelas');
    $this->db->from('kelas');
    $this->db->join('kelola_kelas', 'kelas.id_kelas = kelola_kelas.id_kelas');
    $this->db->where('kelola_kelas.NISN', $nisn);
    $query = $this->db->get();
    return $query->row();
}
    
public function get_siswa_jurusan_by_nisn($nisn){
    $this->db->select('jurusan.nama_jurusan');
    $this->db->from('jurusan');
    $this->db->join('kelola_kelas', 'jurusan.kode_jurusan = kelola_kelas.kode_jurusan');
    $this->db->where('kelola_kelas.NISN', $nisn);
    $query = $this->db->get();
    return $query->row();
}  

public function get_nilai_datasiswa_by_status($id_semester,$id_tahun,$kode_tingkatan,$nisn) {
    $this->db->select('nilai.kehadiran, nilai.tugas, nilai.uts, nilai.uas, nilai.nilai_akhir, mata_pelajaran.nama_mapel');
    $this->db->from('nilai');
    $this->db->join('kelola_kelas', 'nilai.NISN = kelola_kelas.NISN');
    $this->db->join('mata_pelajaran', 'nilai.id_mapel = mata_pelajaran.id_mapel');
    $this->db->join('tingkatan', 'mata_pelajaran.kode_tingkatan = tingkatan.kode_tingkatan');
    $this->db->where('nilai.NISN', $nisn);
    $this->db->where('nilai.id_tahun', $id_tahun); // Tambahkan kriteria pencarian untuk ID Tahun
    $this->db->where('nilai.id_semester', $id_semester); // Tambahkan kriteria pencarian untuk ID Semester
    $this->db->where('tingkatan.kode_tingkatan', $kode_tingkatan);
    $query = $this->db->get();
    return $query->result();
}
    

}