<?php
class diskusi_model extends CI_Model {

    public function get_all(){
        return $this->db->count_all('topik');
    }

    public function get_siswa_data($nisn) {
        $this->db->where('nisn', $nisn);
        return $this->db->get('siswa')->row();
    }

    public function get_guru_data($nip) {
        $this->db->where('NIP', $nip);
        return $this->db->get('guru')->row();
    }    

    public function get_siswa_by_nisn_password($nisn, $password) {
        $this->db->where('nisn', $nisn);
        $this->db->where('password', $password);
        return $this->db->get('users')->row();
    }
    
    public function tambah_topik($data) {
        $this->db->insert('topik', $data); // Menyimpan data ke tabel 'topik'
        return $this->db->insert_id(); // Mengembalikan ID yang baru saja dimasukkan
    }

    public function get_daftar_topik($enum_values) {
        $this->db->order_by('tanggal', 'desc');
        $this->db->where_in('enum', $enum_values);
        return $this->db->get('topik')->result_array();
    }

    public function get_daftar_topik_biasa() {
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get('topik')->result_array();
    }

    public function get_daftar_komentar() {
        $this->db->select('komentar.*, topik.deskripsi');
        $this->db->from('komentar');
        $this->db->join('topik', 'komentar.id_topik = topik.id_topik');
        $this->db->order_by('komentar.tanggal', 'desc');
        return $this->db->get()->result_array();
    }

    public function get_topik_by_id($id) {
        $this->db->where('id_topik', $id);
        return $this->db->get('topik')->row_array();
    }

    public function get_komentars_by_topik_id($id_topik) {
        $this->db->where('id_topik', $id_topik);
        return $this->db->get('komentar')->result_array();
    }

    public function tambah_komentar($data) {
        $this->db->insert('komentar', $data);
    }

    public function update_status_topik($id_topik, $status) {
        $data = array(
            'enum' => $status
        );

        $this->db->where('id_topik', $id_topik);
        return $this->db->update('topik', $data);
    }

    public function hapus_topik($id_topik) {
        $this->db->where('id_topik', $id_topik);
        return $this->db->delete('topik');
    }
    
    public function update_status_komentar($id_komentar, $status) {
        $data = array(
            'status' => $status
        );
    
        $this->db->where('id_komentar', $id_komentar);
        return $this->db->update('komentar', $data);
    }
    
    public function hapus_komentar($id_komentar) {
        $this->db->where('id_komentar', $id_komentar);
        return $this->db->delete('komentar');
    }

    public function hapus_komentar_by_topik($id_topik) {
        $this->db->where('id_topik', $id_topik);
        return $this->db->delete('komentar');
    }
    

    public function countRowsWithEnumTunggu() {
        $this->db->where('enum', 'tunggu');
        return $this->db->count_all_results('topik');
    }
    
    public function get_daftar_pengajuan($enum) {
        $this->db->order_by('tanggal', 'desc');
        $this->db->where_in('enum', $enum);
        return $this->db->get('topik')->result_array();
    }

    // ...

    
}
?>