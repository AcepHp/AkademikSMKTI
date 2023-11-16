<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkatan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_tingkatan($data) {
        return $this->db->insert('tingkatan', $data);
    }

    public function get_all_tingkatan() {
        return $this->db->get('tingkatan')->result();
    }
    public function get_tingkatan_by_kode($kode_tingkatan) {
        return $this->db->get_where('tingkatan', array('kode_tingkatan' => $kode_tingkatan))->row();
    }

    public function update_tingkatan($kode_tingkatan, $data) {
        $this->db->where('kode_tingkatan', $kode_tingkatan);
        return $this->db->update('tingkatan', $data);
    }
    public function delete_tingkatan($kode_tingkatan) {
        $this->db->where('kode_tingkatan', $kode_tingkatan);
        return $this->db->delete('tingkatan');
    }
}