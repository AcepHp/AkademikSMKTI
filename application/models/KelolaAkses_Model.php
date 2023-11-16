<?php

class KelolaAkses_Model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getalldatasiswa(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role', 'Siswa');
        $query = $this->db->get();

        return $query->result();
    }

    public function getalldataguru(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role', 'Guru');
        $query = $this->db->get();

        return $query->result();
    }

    public function detaildatasiswa($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_users', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function detaildataguru($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_users', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function aktifkan($id){
        $data = array('aktif' => 1);
        $this->db->where('id_users', $id);
        $this->db->update('users', $data);
    }

    public function nonaktifkan($id){
        $data = array('aktif' => '2');
        $this->db->where('id_users', $id);
        $this->db->update('users', $data);
    }

    public function resetpasswordsiswa($id_users) {
        // Reset password ke "siswatignc" dengan MD5
        $password = md5('siswatignc');
        // Update password berdasarkan ID pengguna
        $data = array('password' => $password, 'aktif'=>'0');
        $this->db->where('id_users', $id_users);
        $this->db->update('users', $data);
    }

    public function resetpasswordguru($id_users) {
        // Reset password ke "siswatignc" dengan MD5
        $password = md5('gurusmkti');

        // Update password berdasarkan ID pengguna
        $data = array('password' => $password, 'aktif'=>'0');
        $this->db->where('id_users', $id_users);
        $this->db->update('users', $data);
    }

    public function passwordadmin($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users'); // Ganti 'users' dengan nama tabel user Anda
        return $query->row();
    }

}