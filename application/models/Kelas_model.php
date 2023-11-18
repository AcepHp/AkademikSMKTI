<?php
class Kelas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_kelas()
    {
        $this->db->select('kelas.id_kelas, kelas.nama_kelas, tingkatan.nama_tingkatan,jurusan.kode_jurusan,jurusan.nama_jurusan');
        $this->db->from('kelas');
        $this->db->join('tingkatan', 'kelas.kode_tingkatan = tingkatan.kode_tingkatan');
        $this->db->join('jurusan', 'kelas.kode_jurusan = jurusan.kode_jurusan');
        $query = $this->db->get();
        return $query->result();
    }


    public function create_kelas($data)
    {
        return $this->db->insert('kelas', $data);
    }

    public function get_tingkatan()
    {
        $query = $this->db->get('tingkatan');
        return $query->result();
    }

    public function get_jurusan()
    {
        $query = $this->db->get('jurusan');
        return $query->result();
    }

    public function get_kelas_by_id($id_kelas)
    {
        $this->db->select('kelas.id_kelas, kelas.nama_kelas, kelas.kode_tingkatan, kelas.kode_jurusan');
        $this->db->from('kelas');
        $this->db->where('kelas.id_kelas', $id_kelas);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_kelas($id_kelas, $data)
    {
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->update('kelas', $data);
    }
    public function delete_kelas($id_kelas){
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->delete('kelas');
    }
    public function get_kelas_by_jurusan($kode_jurusan) {
        $this->db->where('kode_jurusan', $kode_jurusan);
        return $this->db->get('kelas')->result();
    }
    public function get_kelas_by_jurusan_tingkatan($kode_jurusan, $kode_tingkatan) {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->where('kode_jurusan', $kode_jurusan);
        $this->db->where('kode_tingkatan', $kode_tingkatan);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    
}
?>