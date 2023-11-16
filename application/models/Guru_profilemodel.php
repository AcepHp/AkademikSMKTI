<?php
class Guru_profilemodel extends CI_Model {

    public function get_guru_data($NIP) {
        $this->db->where('NIP', $NIP);
        return $this->db->get('guru')->row();
    }

    public function get_guru_data_NIP($NIP) {
        $this->db->where('NIP', $NIP);
        return $this->db->get('users')->row();
    }

    public function update_photo($NIP, $photoData) {
        $this->db->where('NIP', $NIP);
        $this->db->set('Foto', $photoData);
        if (!$this->db->update('users')) {
            // Pembaruan gagal, cetak pesan kesalahan
            echo $this->db->error(); 
        }
    }
    
    

}

?>