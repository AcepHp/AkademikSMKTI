<?php
class Materi_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_tahun() {
        $this->db->select('*');
        $this->db->where('status', "Aktif");
        $query = $this->db->get('tahun_akademik');
        return $query->result();
    }    
    
    public function get_semester() {
        $this->db->select('*');
        $this->db->where('status', "Aktif");
        $query = $this->db->get('semester');
        return $query->result();
    } 

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

    public function get_materi_detail($id_kelas, $id_mapel, $id_tahun, $id_semester,$kode_jurusan,$kode_tingkatan) {
        $this->db->select('materi.*, mata_pelajaran.nama_mapel, tahun_akademik.tahun_akademik, semester.nama_semester, kelas.nama_kelas');
        $this->db->from('materi');
        $this->db->join('mata_pelajaran', 'materi.id_mapel = mata_pelajaran.id_mapel');
        $this->db->join('tahun_akademik', 'materi.id_tahun = tahun_akademik.id_tahun');
        $this->db->join('semester', 'materi.id_semester = semester.id_semester');
        $this->db->join('kelas', 'materi.id_kelas = kelas.id_kelas');
        $this->db->join('jurusan', 'materi.kode_jurusan = jurusan.kode_jurusan');
        $this->db->join('tingkatan', 'materi.kode_tingkatan = tingkatan.kode_tingkatan');
        $this->db->where('materi.id_kelas', $id_kelas);
        $this->db->where('materi.id_mapel', $id_mapel);
        $this->db->where('materi.id_tahun', $id_tahun);
        $this->db->where('materi.id_semester', $id_semester);
        $this->db->where('materi.kode_jurusan', $kode_jurusan);
        $this->db->where('materi.kode_tingkatan', $kode_tingkatan);
    
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data.
        }
    }
    
    

    public function get_active_id_tahun() {
        $this->db->select('id_tahun');
        $this->db->where('status', "Aktif"); // Sesuaikan dengan kolom status yang sesuai
    
        // Sesuaikan nama tabel dan kolom sesuai dengan struktur basis data Anda
        $query = $this->db->get('tahun_akademik');
    
        if ($query->num_rows() > 0) {
            return $query->row()->id_tahun;
        } else {
            return null;
        }
    }
    
    public function get_active_id_semester() {
        $this->db->select('id_semester');
        $this->db->where('status', "Aktif"); // Sesuaikan dengan kolom status yang sesuai
    
        // Sesuaikan nama tabel dan kolom sesuai dengan struktur basis data Anda
        $query = $this->db->get('semester');
    
        if ($query->num_rows() > 0) {
            return $query->row()->id_semester;
        } else {
            return null;
        }
    }
    public function get_kelas_name_by_id($id_kelas) {
        $this->db->select('nama_kelas');
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get('kelas');
    
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->nama_kelas;
        } else {
            return 'Kelas Tidak Tersedia';
        }
    }
    
    public function tambah_materi($data) {
        // Masukkan data materi ke dalam tabel materi di database
        $this->db->insert('materi', $data);
    
        
    }
    public function get_id_kelas_by_nama($nama_kelas) {
        $this->db->select('id_kelas');
        $this->db->where('nama_kelas', $nama_kelas);
        $query = $this->db->get('kelas');
        
        if ($query->num_rows() > 0) {
            return $query->row()->id_kelas;
        } else {
            return null;
        }
    }
    
    public function get_id_mapel_by_nama($nama_mapel) {
        $this->db->select('id_mapel');
        $this->db->where('nama_mapel', $nama_mapel);
        $query = $this->db->get('mata_pelajaran');
        
        if ($query->num_rows() > 0) {
            return $query->row()->id_mapel;
        } else {
            return null;
        }
    }

    public function get_jurusan_tingkatan_byid($id_mapel) {
        $this->db->select('mata_pelajaran.kode_jurusan, mata_pelajaran.nama_mapel, mata_pelajaran.kode_tingkatan, jurusan.nama_jurusan, tingkatan.nama_tingkatan');
        $this->db->from('mata_pelajaran');
        $this->db->join('Jurusan', 'mata_pelajaran.kode_jurusan = Jurusan.kode_jurusan');
        $this->db->join('Tingkatan', 'mata_pelajaran.kode_tingkatan = Tingkatan.kode_tingkatan');
        $this->db->where('mata_pelajaran.id_mapel', $id_mapel);
        $query = $this->db->get();
        return $query->result();
    }
    
    /// Model Materi untuk Siswa

    public function get_mapel_data_siswa($kode_jurusan, $kode_tingkatan) {
        $this->db->select('mata_pelajaran.nama_mapel, mata_pelajaran.id_mapel');
        $this->db->from('mata_pelajaran');
        $this->db->join('Jurusan', 'mata_pelajaran.kode_jurusan = Jurusan.kode_jurusan');
        $this->db->join('Tingkatan', 'mata_pelajaran.kode_tingkatan = Tingkatan.kode_tingkatan');
        $this->db->where('Jurusan.kode_jurusan', $kode_jurusan);
        $this->db->where('Tingkatan.kode_tingkatan', $kode_tingkatan);
    
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kode_jurusan($nisn) {
        $this->db->select('Jurusan.*,Tingkatan.*');
        $this->db->from('Jurusan');
        $this->db->join('kelola_kelas','Jurusan.kode_jurusan = kelola_kelas.kode_jurusan');
        $this->db->join('Tingkatan','kelola_kelas.kode_tingkatan = Tingkatan.kode_tingkatan');
        $this->db->where('kelola_kelas.NISN', $nisn);
    
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kelas_by_nisn($nisn) {
        $this->db->select('*');
        $this->db->from('kelola_kelas');
        $this->db->where('NISN', $nisn);
    
        $query = $this->db->get();
        return $query->result();
    }

    /// Model Materi untuk Admin
    public function get_all_materi_detail_admin($id_tahun, $id_semester) {
        $this->db->select('materi.*, mata_pelajaran.nama_mapel, tahun_akademik.tahun_akademik,jurusan.nama_jurusan,tingkatan.nama_tingkatan, semester.nama_semester, kelas.nama_kelas');
        $this->db->from('materi');
        $this->db->join('mata_pelajaran', 'materi.id_mapel = mata_pelajaran.id_mapel');
        $this->db->join('tahun_akademik', 'materi.id_tahun = tahun_akademik.id_tahun');
        $this->db->join('semester', 'materi.id_semester = semester.id_semester');
        $this->db->join('jurusan', 'materi.kode_jurusan = jurusan.kode_jurusan');
        $this->db->join('tingkatan', 'materi.kode_tingkatan = tingkatan.kode_tingkatan');
        $this->db->join('kelas', 'materi.id_kelas = kelas.id_kelas');
        $this->db->where('materi.id_tahun', $id_tahun);
        $this->db->where('materi.id_semester', $id_semester);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data.
        }
    }

    public function get_jurusan(){
        $this->db->select('kode_jurusan, nama_jurusan');
        $query = $this->db->get('jurusan');
        return $query->result();
    }

    public function get_kelas(){
        $this->db->select('*');
        $query = $this->db->get('kelas');
        return $query->result();
    }

    public function get_mapel(){
        $this->db->select('*');
        $query = $this->db->get('mata_pelajaran');
        return $query->result();
    }

    public function get_materi_info($id_materi) {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->where('id_materi', $id_materi);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan satu baris hasil query
        } else {
            return false; // Mengembalikan false jika materi tidak ditemukan
        }
    }
    
    // Fungsi untuk menghapus materi berdasarkan ID
    public function hapus_materi($id_materi) {
        $this->db->where('id_materi', $id_materi);
        $this->db->delete('materi');

        if ($this->db->affected_rows() > 0) {
            return true; // Mengembalikan true jika berhasil menghapus materi
        } else {
            return false; // Mengembalikan false jika gagal menghapus materi
        }
    }

    public function get_data_materi($id_materi) {
        $this->db->select('materi.*, kelas.*, jurusan.*, tingkatan.*, mata_pelajaran.*, tahun_akademik.*, semester.id_semester');
        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas');
        $this->db->join('jurusan', 'jurusan.kode_jurusan = materi.kode_jurusan');
        $this->db->join('tingkatan', 'tingkatan.kode_tingkatan = materi.kode_tingkatan');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = materi.id_mapel');
        $this->db->join('tahun_akademik', 'tahun_akademik.id_tahun = materi.id_tahun');
        $this->db->join('semester', 'semester.id_semester = materi.id_semester');
        $this->db->where('materi.id_materi', $id_materi);
        
        $query = $this->db->get('materi');
        return $query->result();
    }

    public function editdb_tambahfolder__materi($id_materi, $data) {
        $this->db->where('id_materi', $id_materi);
        $this->db->update('materi', $data);
    
        if ($this->db->affected_rows() > 0) {
            return true; // Mengembalikan true jika berhasil memperbarui data materi
        } else {
            return false; // Mengembalikan false jika gagal memperbarui data materi
        }
    }
    
    public function editdb_tambahfolder__materi_hanya_nama($id_materi, $data) {
        $this->db->where('id_materi', $id_materi);
        $this->db->update('materi', $data);
    
        if ($this->db->affected_rows() > 0) {
            return true; // Mengembalikan true jika berhasil memperbarui nama materi
        } else {
            return false; // Mengembalikan false jika gagal memperbarui nama materi
        }
    }

    public function get_file_info($id_materi) {
        $this->db->select('file_materi');
        $this->db->from('materi');
        $this->db->where('id_materi', $id_materi);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan informasi file lama
        }
        return null; // Jika tidak ada file yang ditemukan
    }
    
    
}