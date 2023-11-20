<?php
class Guru_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load library database
    }

    public function get_NIP($nip) {
        // Assuming you have a 'guru' table in your database
        $this->db->select('NIP');
        $this->db->where('NIP', $nip);
        $query = $this->db->get('guru');

        // Check if a record is found
        if ($query->num_rows() > 0) {
            return $query->row()->NIP; // Return only the 'NIP' field
        } else {
            return null; // Return null if no record is found
        }
    }


    public function get_all_materi($get_idguru, $id_tahun, $id_semester) {
        $this->db->select('COUNT(*) as materi_count');
        $this->db->from('materi');
        $this->db->join('pengajar_mapel', 'materi.id_kelas = pengajar_mapel.id_kelas', 'left');
        $this->db->where('pengajar_mapel.ID_Guru', $get_idguru);
        $this->db->where('materi.id_tahun', $id_tahun);
        $this->db->where('materi.id_semester', $id_semester);
    
        $query = $this->db->get();
        $result = $query->row();
    
        return $result->materi_count;
    }
}