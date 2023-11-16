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
}