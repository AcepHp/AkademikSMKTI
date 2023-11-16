<?php
class Wali_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_wali() {
        $this->db->select('ID_Kelas, Nama_Kelas, Tingkatan, Jurusan, Wali_Kelas');
        $query = $this->db->get('wali'); 
        return $query->result(); 
    }

    public function tambah_wali($data) {
        $this->db->insert('wali', $data);
    }

    public function get_single_wali($id) {
        $this->db->where('ID_Kelas', $id);
        $query = $this->db->get('wali');
        return $query->row();
    }

    public function update_wali($id, $data) {
        $this->db->where('ID_Kelas', $id);
        $this->db->update('wali', $data);
    }

    public function delete_wali($id) {
        $this->db->where('ID_Kelas', $id);
        return $this->db->delete('wali');
    }
}
?>
