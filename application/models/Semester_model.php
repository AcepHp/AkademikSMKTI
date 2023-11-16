<?php
class Semester_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk mengambil semua data semester
    public function get_all_semester()
    {
        $query = $this->db->get('semester');
        return $query->result();
    }

    // Fungsi untuk menambah data semester
    public function tambah_semester($data)
    {
        return $this->db->insert('semester', $data);
    }

    // Fungsi untuk mengambil data semester berdasarkan ID
    public function get_semester_by_id($id)
    {
        $query = $this->db->get_where('semester', array('id_semester' => $id));
        return $query->row();
    }

    // Fungsi untuk mengupdate data semester
    public function update_semester($id, $data)
{
    $this->db->where('id_semester', $id);
    return $this->db->update('semester', $data);
}
public function nonaktifkan_semua_semester()
{
    $this->db->set('status', 'Tidak Aktif');
    $this->db->update('semester');
}
public function get_active_semester() {
    // Mengambil semester dengan status aktif
    $this->db->where('status', 'Aktif');
    $query = $this->db->get('semester');

    if ($query->num_rows() > 0) {
        return $query->row();
    } else {
        return null;
    }
}



}