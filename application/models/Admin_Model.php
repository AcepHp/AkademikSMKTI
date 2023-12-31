<?php
final class Admin_Model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_nilai() {
        $this->db->select('ID_Nilai, NISN, Nama_Siswa, Nama_Mapel, Kehadiran, Tugas, UTS, UAS, Attitude, Nilai_Akhir');
        $query = $this->db->get('nilai');
        return $query->result();
    }

    public function get_guru() {
        $this->db->select('ID_Guru, NIP, Nama_Lengkap, Tempat_Lahir, Tanggal_Lahir, Jenis_Kelamin, Alamat, Pendidikan, Tanggal_Mulai');
        $query = $this->db->get('guru');
        return $query->result(); 
    }

    public function get_all(){
        return $this->db->count_all('guru');
    }

    public function tambah_guru($data) {
        // Masukkan data guru ke dalam tabel database
        $this->db->insert('guru', $data);
    }

    public function create_user_account($user_data) {
        $this->db->insert('users', $user_data);
    }

    public function edit_guru($id) {
        $this->db->where('ID_Guru', $id);
        $query = $this->db->get('guru');
        return $query->row();
    }

    public function get_single_guru($id) {
        $this->db->where('ID_Guru', $id);
        $query = $this->db->get('guru');
        return $query->row();
    }

    public function update_guru($id, $data) {
        $this->db->where('ID_Guru', $id);
        $this->db->update('guru', $data);
    }

    public function delete_guru($id) {
        $this->db->where('ID_Guru', $id);
        return $this->db->delete('guru');
    }
    
}