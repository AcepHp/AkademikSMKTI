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

    public function update_file_photo($NIP, $file_foto) {
        $this->db->where('NIP', $NIP);
        $this->db->set('file_foto', $file_foto);
        $this->db->update('users');
    }

    public function update_guru($NIP, $data)
    {
        $this->db->where('NIP', $NIP);
        $this->db->update('guru', $data);
    }
    
    public function get_guru_by_nip_password($NIP, $password) {
        $this->db->where('NIP', $NIP);
        $this->db->where('password', $password);
        return $this->db->get('users')->row();
    }

    public function update_password($NIP, $new_password) {
        $this->db->where('NIP', $NIP);
        $this->db->update('users', array('password' => $new_password));
    }
    

}

?>