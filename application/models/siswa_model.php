<?php
class siswa_model extends CI_Model {

    public function get_siswa_data($nisn) {
        $this->db->where('nisn', $nisn);
        return $this->db->get('siswa')->row();
    }

    public function get_siswa_dataa($nisn) {
        $this->db->where('nisn', $nisn);
        return $this->db->get('users')->row();
    }
    
    public function get_siswa_by_nisn_password($nisn, $password) {
        $this->db->where('nisn', $nisn);
        $this->db->where('password', $password);
        return $this->db->get('users')->row();
    }

    public function update_password($nisn, $new_password) {
        $this->db->where('nisn', $nisn);
        $this->db->update('users', array('password' => $new_password));
    }

    public function update_file_photo($nisn, $file_foto) {
        $this->db->where('NISN', $nisn);
        $this->db->set('file_foto', $file_foto);
        $this->db->update('users');
    }

    public function update_siswa_by_nisn($nisn, $siswa_data) {
        // Panggil model untuk melakukan pembaruan data siswa
        $this->db->where('NISN', $nisn);
        $this->db->update('siswa', $siswa_data);
    }
    

}

?>