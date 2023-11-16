<?php
class Mapel_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_mapel() {
        // Ambil semua data mata pelajaran dengan informasi jurusan dan kelas
        $this->db->select('mp.id_mapel, mp.nama_mapel, mp.kode_jurusan, mp.kode_tingkatan, j.nama_jurusan, t.nama_tingkatan');
        $this->db->from('mata_pelajaran mp');
        $this->db->join('jurusan j', 'mp.kode_jurusan = j.kode_jurusan');
        $this->db->join('tingkatan t', 'mp.kode_tingkatan = t.kode_tingkatan');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_mapel_jurusan_tingkatan($kode_jurusan, $kode_tingkatan) {
        // Ambil data mata pelajaran dengan informasi jurusan dan tingkatan sesuai kode jurusan dan tingkatan yang diberikan
        $this->db->select('mp.id_mapel, mp.nama_mapel, mp.kode_jurusan, mp.kode_tingkatan, j.nama_jurusan');
        $this->db->from('mata_pelajaran mp');
        $this->db->join('jurusan j', 'mp.kode_jurusan = j.kode_jurusan');
        $this->db->where('mp.kode_jurusan', $kode_jurusan);
        $this->db->where('mp.kode_tingkatan', $kode_tingkatan);
        $query = $this->db->get();
        return $query->result();
    }
    

    public function tambah_mapel($data) {
        $this->db->insert('mata_pelajaran', $data);
    }

    public function get_all_jurusan() {
        // Ambil data kode_jurusan dari tabel jurusan
        $query = $this->db->get('jurusan');
        return $query->result();
    }

    public function get_tingkatan() {
        // Ambil data kode_tingkatan dari tabel tingkatan
        $query = $this->db->get('tingkatan');
        return $query->result();
    }
    public function get_mapel_by_id($id_mapel) {
        $this->db->where('id_mapel', $id_mapel);
        $query = $this->db->get('mata_pelajaran');
        return $query->row();
    }
    public function update_mapel($id_mapel, $data) {
        $this->db->where('id_mapel', $id_mapel);
        $this->db->update('mata_pelajaran', $data);
    }
    
    public function hapus_mapel($id_mapel) {
        // Hapus mata pelajaran berdasarkan ID
        $this->db->where('id_mapel', $id_mapel);
        return $this->db->delete('mata_pelajaran');
    }
    public function get_mapel_by_jurusan_kelas($kode_jurusan, $id_kelas) {
        // Query database untuk mengambil data mata pelajaran berdasarkan jurusan dan kelas
        $this->db->where('kode_jurusan', $kode_jurusan);
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get('mata_pelajaran'); // Gantilah 'nama_tabel_mapel' dengan nama tabel yang sesuai
    
        return $query->result();
    }
    
    
    
    
}
