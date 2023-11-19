<?php
class penugasan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_mata_pelajaran() {
        // Mendapatkan daftar siswa berdasarkan filter
        $this->db->select('mata_pelajaran.id_mapel, nama_mapel, mata_pelajaran.kode_jurusan, mata_pelajaran.kode_tingkatan, jurusan.kode_jurusan, jurusan.nama_jurusan, tingkatan.nama_tingkatan');
        $this->db->from('mata_pelajaran');
        $this->db->join('jurusan', 'mata_pelajaran.kode_jurusan = jurusan.kode_jurusan');
        $this->db->join('tingkatan', 'mata_pelajaran.kode_tingkatan = tingkatan.kode_tingkatan');
        $query = $this->db->get();
        return $query->result(); // Tambahkan ini untuk mengembalikan hasil query
    }

    public function get_pengajar_by_mapel($id_mapel,$id_tahun,$id_semester) {
        // Mendapatkan daftar pengajar mapel berdasarkan id_mapel tahun akademik dan semester yang dipilih
        $this->db->select('pengajar_mapel.ID_PM, pengajar_mapel.ID_Guru, pengajar_mapel.id_mapel, pengajar_mapel.id_kelas, guru.Nama_Lengkap, mata_pelajaran.nama_mapel, mata_pelajaran.kode_jurusan, kelas.nama_kelas, jurusan.nama_jurusan, tahun_akademik.tahun_akademik, tahun_akademik.id_tahun, semester.id_semester, semester.nama_semester');
        $this->db->from('pengajar_mapel');
        $this->db->join('guru', 'pengajar_mapel.ID_Guru = guru.ID_Guru');
        $this->db->join('mata_pelajaran', 'pengajar_mapel.id_mapel = mata_pelajaran.id_mapel');
        $this->db->join('kelas', 'pengajar_mapel.id_kelas = kelas.id_kelas');
        $this->db->join('jurusan', 'mata_pelajaran.kode_jurusan = jurusan.kode_jurusan');
        $this->db->join('tahun_akademik', 'pengajar_mapel.id_tahun = tahun_akademik.id_tahun');
        $this->db->join('semester', 'pengajar_mapel.id_semester = semester.id_semester');
        $this->db->where('pengajar_mapel.id_mapel', $id_mapel);
        $this->db->where('pengajar_mapel.id_tahun', $id_tahun);
        $this->db->where('pengajar_mapel.id_semester', $id_semester);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_mapel_by_id($id_mapel) {
        // Mendapatkan daftar mapel berdasarkan ID Mapel yang dipilih
        $this->db->select('mata_pelajaran.id_mapel, nama_mapel, mata_pelajaran.kode_tingkatan, jurusan.kode_jurusan, jurusan.nama_jurusan, tingkatan.nama_tingkatan'); // Tambahkan kelas.nama_kelas
        $this->db->from('mata_pelajaran');
        $this->db->join('jurusan', 'mata_pelajaran.kode_jurusan = jurusan.kode_jurusan');
        $this->db->join('tingkatan', 'mata_pelajaran.kode_tingkatan = tingkatan.kode_tingkatan');
        $this->db->where('mata_pelajaran.id_mapel', $id_mapel);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kelas_by_jurusan($kode_jurusan) {
        // Mendapatkan daftar kelas berdasarkan kode jurusan yang dipilih
        $this->db->select('id_kelas, nama_kelas, kode_tingkatan, kode_jurusan');
        $this->db->from('kelas');
        $this->db->where('kode_jurusan', $kode_jurusan);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kelas_tanpa_penugasan($kode_jurusan, $id_tahun, $id_semester, $id_mapel, $kode_tingkatan) {
        // Subquery untuk mendapatkan daftar kelas yang sudah mendapatkan penugasan pada mapel tertentu
        $subquery = $this->db->select('pengajar_mapel.id_kelas')
            ->from('pengajar_mapel')
            ->where('pengajar_mapel.id_mapel', $id_mapel)
            ->where('pengajar_mapel.id_tahun', $id_tahun)
            ->where('pengajar_mapel.id_semester', $id_semester)
            ->get_compiled_select();
    
        // Query untuk mengambil daftar kelas yang belum mendapatkan penugasan pada mapel tertentu
        $query = $this->db->select('kelas.id_kelas, kelas.nama_kelas')
            ->from('kelas')
            ->where('kelas.kode_jurusan', $kode_jurusan)
            ->where('kelas.kode_tingkatan', $kode_tingkatan)
            ->where_not_in('kelas.id_kelas', $subquery, false)
            ->group_by('kelas.id_kelas')
            ->get();
    
        return $query->result();
    }
    
    
    
    
    public function get_all_guru() {
        // Mendapatkan daftar semua guru
        $this->db->select('ID_Guru, Nama_Lengkap'); 
        $this->db->from('guru');
        $query = $this->db->get();
        return $query->result();
    }

    public function tambah_data($data) {
        // Simpan data ke dalam tabel pelajaran_mapel
        $this->db->insert('pengajar_mapel', $data);
    }

    public function delete_penugasan($id) {
        $this->db->where('ID_PM', $id);
        return $this->db->delete('pengajar_mapel');
    }

    public function get_penugasan_by_id($id) {
        // Mengambil data penugasan berdasarkan ID_PM
        $this->db->select('pengajar_mapel.ID_PM, pengajar_mapel.ID_Guru, pengajar_mapel.id_mapel, tahun_akademik.tahun_akademik, tahun_akademik.id_tahun, semester.id_semester, semester.nama_semester, pengajar_mapel.id_kelas, mata_pelajaran.nama_mapel, guru.Nama_Lengkap , kelas.nama_kelas');
        $this->db->from('pengajar_mapel');
        $this->db->join('mata_pelajaran', 'pengajar_mapel.id_mapel = mata_pelajaran.id_mapel');
        $this->db->join('kelas', 'pengajar_mapel.id_kelas = kelas.id_kelas');
        $this->db->join('guru','pengajar_mapel.ID_Guru = guru.ID_Guru');
        $this->db->join('semester','pengajar_mapel.id_semester = semester.id_semester');
        $this->db->join('tahun_akademik','pengajar_mapel.id_tahun = tahun_akademik.id_tahun');
        $this->db->where('pengajar_mapel.ID_PM', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function update_penugasan($id, $data) {
        // Update data penugasan berdasarkan ID_PM
        $this->db->where('ID_PM', $id);
        $this->db->update('pengajar_mapel', $data);
    }
    
    // ambil tahun
    public function get_tahun() {
        $this->db->select('*');
        $this->db->where('status', "aktif");
        $query = $this->db->get('tahun_akademik');
        return $query->result();
    }    

    // ambil semester
    public function get_semester() {
        $this->db->select('*');
        $this->db->where('status', "aktif");
        $query = $this->db->get('semester');
        return $query->result();
    }    

}