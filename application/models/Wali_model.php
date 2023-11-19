<?php
class Wali_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_wali() {
        $this->db->select('wali.id_wali, kelas.nama_kelas, jurusan.kode_jurusan, jurusan.nama_jurusan, wali.Nama_Lengkap, guru.Nama_Lengkap');
        $this->db->from('wali');
        $this->db->join('kelas', 'kelas.id_kelas = wali.id_kelas');
        $this->db->join('jurusan', 'jurusan.kode_jurusan = wali.kode_jurusan');
        $this->db->join('guru', 'guru.ID_Guru = wali.Nama_Lengkap');
    
        $query = $this->db->get();  
        return $query->result();
    }
    
    public function tambah_wali($data) {
        return $this->db->insert('wali', $data);
    }

    public function get_single_wali($id) {
        $this->db->select('wali.id_wali, kelas.nama_kelas, jurusan.kode_jurusan, jurusan.nama_jurusan, wali.Nama_Lengkap, guru.Nama_Lengkap, tingkatan.kode_tingkatan');
        $this->db->from('wali');
        $this->db->join('kelas', 'kelas.id_kelas = wali.id_kelas');
        $this->db->join('tingkatan', 'kelas.kode_tingkatan = tingkatan.kode_tingkatan');
        $this->db->join('jurusan', 'wali.kode_jurusan = jurusan.kode_jurusan');
        $this->db->join('guru', 'guru.ID_Guru = wali.Nama_Lengkap');
        $this->db->where('wali.id_wali', $id);
    
        $query = $this->db->get();
        return $query->result();
    }

    public function edit_wali($id, $namaLengkap) {
        $data = array(
            'Nama_Lengkap' => $namaLengkap,
        );
    
        $this->db->where('id_wali', $id);
        return $this->db->update('wali', $data);
    }

    public function delete_wali($id) {
        $this->db->where('id_wali', $id);
        return $this->db->delete('wali');
    }

    public function get_guru_not_in_kelas() {
        $this->db->select('guru.Nama_Lengkap, guru.ID_Guru, guru.NIP');
        $this->db->from('guru');
        $this->db->join('wali', 'guru.ID_Guru = wali.Nama_Lengkap', 'left');  // Use left join to include teachers without a match in wali
        $this->db->where('wali.Nama_Lengkap IS NULL');  // Filter teachers not in wali
    
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kelas_not_in_wali() {
        // Select the necessary fields
        $this->db->select('kelas.nama_kelas, kelas.id_kelas, kelas.kode_tingkatan, kelas.kode_jurusan');
        
        // Specify the main table
        $this->db->from('kelas');
        
        // Left join with the wali table on the id_kelas
        $this->db->join('wali', 'kelas.id_kelas = wali.id_kelas', 'left');
        
        // Use WHERE to filter out classes that have a wali (wali.id_kelas is not NULL)
        $this->db->where('wali.id_kelas IS NULL');
        
        // Execute the query
        $query = $this->db->get();
        
        // Return the result
        return $query->result();
    }    
}
?>
