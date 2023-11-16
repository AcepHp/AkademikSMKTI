<?php
class Datasiswa_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_siswa_data() {
        $this->db->select('siswa.ID_siswa, NIS, siswa.NISN, siswa.Nama_lengkap, Status, Tempat_lahir, Tanggal_lahir, Jenis_kelamin, Alamat, email, Tinggal_dengan, Nama_ayah, Nama_ibu, Nama_wali, No_telp_ortu, No_telp_wali, users.username, users.password');
        $this->db->from('siswa');
        $this->db->join('users', 'siswa.NISN = users.NISN', 'left');
        $query = $this->db->get();
        return $query->result();
    }


    public function tambah_siswa($data) {
        $this->db->insert('siswa', $data);
    }

    public function create_user_account($user_data) {
        $this->db->insert('users', $user_data);
    }

    public function get_siswa_by_id($id) {
        $this->db->where('ID_siswa', $id);
        $query = $this->db->get('siswa');
        return $query->row();
    }

    public function update_siswa($id, $data) {
        $this->db->where('ID_siswa', $id);
        $this->db->update('siswa', $data);
    }

    public function hapus_siswa($id) {
        $this->db->where('ID_siswa', $id);
        $this->db->delete('siswa');
    }

    public function update_user_account($nisn, $user_data) {
        $this->db->where('NISN', $nisn);
        $this->db->update('users', $user_data);
    }

    public function hapus_user_account($nisn) {
        $this->db->where('NISN', $nisn);
        $this->db->delete('users');
    }
    
}