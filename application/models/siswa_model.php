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


    public function update_photo($nisn, $photoData) {
        $this->db->where('NISN', $nisn);
        $this->db->set('Foto', $photoData);
        if (!$this->db->update('users')) {
            // Pembaruan gagal, cetak pesan kesalahan
            echo $this->db->error(); 
        }
    }
    

}

?>