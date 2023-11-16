<?php
class Wali_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_wali() {
        $this->db->select('wali.id_wali, kelas.nama_kelas, jurusan.kode_jurusan, jurusan.nama_jurusan, wali.Nama_Lengkap, guru.Nama_Lengkap');
        $this->db->from('wali');
        $this->db->join('kelas', 'kelas.id_kelas = wali.id_kelas');
        $this->db->join('jurusan', 'jurusan.kode_jurusan = wali.kode_jurusan');
        $this->db->join('guru', 'guru.ID_Guru = wali.Nama_Lengkap');
    
        $query = $this->db->get();  
        return $query->result();
    }
    
    public function tambah_wali($data) {
        return $this->db->insert('wali', $data);
    }

    public function get_single_wali($id) {
        $this->db->select('wali.id_wali, kelas.nama_kelas, jurusan.kode_jurusan, jurusan.nama_jurusan, wali.Nama_Lengkap, guru.Nama_Lengkap');
        $this->db->from('wali');
        $this->db->join('kelas', 'kelas.id_kelas = wali.id_kelas');
        $this->db->join('jurusan', 'jurusan.kode_jurusan = wali.kode_jurusan');
        $this->db->join('guru', 'guru.ID_Guru = wali.Nama_Lengkap');
    
        $query = $this->db->get();
        return $query->result();
    }

    public function edit_wali($id, $data) {
        $this->db->where('id_wali', $id);
        return $this->db->update('wali', $data);
    }

    public function delete_wali($id) {
        $this->db->where('id_wali', $id);
        return $this->db->delete('wali');
    }
}
?>
