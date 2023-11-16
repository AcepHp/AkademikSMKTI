<?php
class Tahun_akademik_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk menambahkan tahun akademik
    public function tambah_tahun_akademik($data)
    {
        return $this->db->insert('tahun_akademik', $data);
    }

    public function get_tahun_akademik() {
        return $this->db->get('tahun_akademik');
    }

    // Fungsi untuk mengambil semua tahun akademik
    public function get_all_tahun_akademik()
    {
        $query = $this->db->get('tahun_akademik');
        return $query->result();
    }

    // Fungsi untuk mengambil satu tahun akademik berdasarkan ID
    public function get_tahun_akademik_by_id($id)
    {
        $query = $this->db->get_where('tahun_akademik', array('id_tahun' => $id));
        return $query->row();
    }

    // Fungsi untuk mengupdate tahun akademik
    public function update_tahun_akademik($id, $data)
    {
        $this->db->where('id_tahun', $id);
        return $this->db->update('tahun_akademik', $data);
    }

    // Fungsi untuk menghapus tahun akademik berdasarkan ID
    public function delete_tahun_akademik($id)
    {
        return $this->db->delete('tahun_akademik', array('id_tahun' => $id));
    }


    // Fungsi untuk mengambil semua status
    public function get_all_status()
    {
        $this->db->distinct();
        $this->db->select('status');
        $query = $this->db->get('tahun_akademik');
        return $query->result();
    }
    public function nonaktifkan_tahun_akademik_aktif()
    {
        $this->db->set('status', 'Tidak Aktif');
        $this->db->update('tahun_akademik');
    }
    public function get_all_status_as_array()
{
    return array(
        'Aktif' => 'Aktif',
        'Tidak Aktif' => 'Tidak Aktif'
    );
}
public function get_tahun_akademik_aktif() {
    $this->db->where('status', 'Aktif');
    $query = $this->db->get('tahun_akademik'); // Sesuaikan dengan nama tabel tahun_akademik
    return $query->row();
}


}