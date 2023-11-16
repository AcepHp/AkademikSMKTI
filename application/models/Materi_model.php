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

    public function get_materi_detail($id_kelas, $id_mapel, $id_tahun, $id_semester) {
        $this->db->select('materi.*, mata_pelajaran.nama_mapel, tahun_akademik.tahun_akademik, semester.nama_semester, kelas.nama_kelas');
        $this->db->from('materi');
        $this->db->join('mata_pelajaran', 'materi.id_mapel = mata_pelajaran.id_mapel');
        $this->db->join('tahun_akademik', 'materi.id_tahun = tahun_akademik.id_tahun');
        $this->db->join('semester', 'materi.id_semester = semester.id_semester');
        $this->db->join('kelas', 'materi.id_kelas = kelas.id_kelas');
        $this->db->where('materi.id_kelas', $id_kelas);
        $this->db->where('materi.id_mapel', $id_mapel);
        $this->db->where('materi.id_tahun', $id_tahun);
        $this->db->where('materi.id_semester', $id_semester);
    
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
    
}