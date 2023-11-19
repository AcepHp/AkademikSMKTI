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

    public function tambahakun(){
        $NIP = $this->input->post('NIP');
        $nama = $this->input->post('nama_lengkap');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $data = [
            'NIP' => $NIP,
            'nama_lengkap' => $nama,
            'username' => $username,
            'password' => md5($password),
            'role' => $role
        ];
        $this->session->set_flashdata("success_tambah", "<div class='alert alert-success' role='alert'>Akun berhasil dihapus! !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        return $this->db->insert('users', $data);
    }

    public function delete_akun($id) {
        $this->db->where('id_users', $id);
        $this->session->set_flashdata("success_hapus", "<div class='alert alert-success' role='alert'>Akun berhasil dihapus! !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        return $this->db->delete('users');
    }

}