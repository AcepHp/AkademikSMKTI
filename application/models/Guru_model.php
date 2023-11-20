<?php
class Guru_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load library database
    }

    public function get_ID_Guru($nip) {
        $this->db->select('ID_Guru');
        $this->db->where('NIP', $nip);
        $query = $this->db->get('guru');
    
        // Check if a record is found
        if ($query->num_rows() > 0) {
            return $query->row()->ID_Guru; // Return only the 'ID_Guru' field
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
        return $query->row()->materi_count;
    }

    public function get_total_murid($get_idguru, $id_tahun) {
        $this->db->select('COUNT(DISTINCT kelola_kelas.NISN) as murid_count');
        $this->db->from('kelola_kelas');
        $this->db->join('pengajar_mapel', 'kelola_kelas.id_kelas = pengajar_mapel.id_kelas', 'left');
        $this->db->where('pengajar_mapel.ID_Guru', $get_idguru);
        $this->db->where('kelola_kelas.id_tahun', $id_tahun);
    
        $query = $this->db->get();
        return $query->row()->murid_count;
    }

    public function get_all_kelas($get_idguru, $id_tahun, $id_semester) {
        $this->db->select('COUNT(DISTINCT id_kelas) as kelas_count');
        $this->db->from('pengajar_mapel');
        $this->db->where('ID_Guru', $get_idguru);
        $this->db->where('id_tahun', $id_tahun);
        $this->db->where('id_semester', $id_semester);
    
        $query = $this->db->get();
        return $query->row()->kelas_count;
    }
    
    
}