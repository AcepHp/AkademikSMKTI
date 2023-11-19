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

    public function get_all_materi($NISN, $id_tahun, $id_semester) {
        $this->db->select('COUNT(*) as materi_count');
        $this->db->from('materi');
        $this->db->join('kelola_kelas', 'materi.id_kelas = kelola_kelas.id_kelas', 'left');
        $this->db->where('kelola_kelas.nisn', $NISN);
        $this->db->where('materi.id_tahun', $id_tahun);
        $this->db->where('materi.id_semester', $id_semester);
    
        $query = $this->db->get();
        $result = $query->row();
    
        return $result->materi_count;
    }

    public function get_all_mapel($NISN) {
        $this->db->select('COUNT(DISTINCT mata_pelajaran.id_mapel) as mapel_count');
        $this->db->from('kelola_kelas');
        $this->db->join('tingkatan', 'kelola_kelas.kode_tingkatan = tingkatan.kode_tingkatan', 'left');
        $this->db->join('mata_pelajaran', 'tingkatan.kode_tingkatan = mata_pelajaran.kode_tingkatan', 'left');
        $this->db->where('kelola_kelas.nisn', $NISN);
    
        $query = $this->db->get();
        $result = $query->row();
    
        return $result->mapel_count;
    }
    
    
    
    
    

}

?>