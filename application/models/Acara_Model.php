<?php

    class Acara_Model extends CI_Model {
        public function __construct() {
            parent::__construct();
        }
    
        public function getacara() {
            return $this->db->get('acara');
        }

        public function getacarabyid($id) {
            $this->db->where('id_acara', $id);
            return $this->db->get('acara');
        }

        public function get_all(){
            return $this->db->count_all('acara');
        }

        public function tambahacara(){
            $judul = $this->input->post("judul");
            $deskripsi = $this->input->post("deskripsi");
            $tanggal = $this->input->post("tanggal");
            $waktu_mulai = $this->input->post("waktu_mulai");
            $waktu_selesai = $this->input->post("waktu_selesai");          
            
            $acara = array(
                "judul" => $judul,
                "deskripsi" => $deskripsi,
                "tanggal" => $tanggal,
                "waktu_mulai" => $waktu_mulai,
                "waktu_selesai" => $waktu_selesai,
                "created" => date('Y-m-d'),
            );

            $this->db->where("id_acara");
            $this->session->set_flashdata("success_tambah", "<div class='alert alert-success' role='alert'>Acara berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("acara",$acara);
        }
        
        public function editacara($id) {
            $judul = $this->input->post("judul");
            $deskripsi = $this->input->post("deskripsi");
            $tanggal = $this->input->post("tanggal");
            $waktu_mulai = $this->input->post("waktu_mulai");
            $waktu_selesai = $this->input->post("waktu_selesai");    

            $acara = array(
                "judul" => $judul,
                "deskripsi" => $deskripsi,
                "tanggal" => $tanggal,
                "waktu_mulai" => $waktu_mulai,
                "waktu_selesai" => $waktu_selesai,
                "created" => date('Y-m-d'),
            );
        
            $this->db->where("id_acara", $id);
            $this->session->set_flashdata("success_edit", "<div class='alert alert-success' role='alert'>Acara berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("acara", $acara);
        }

        public function delete_acara($id) {
            $this->db->where('id_acara', $id);
            $this->session->set_flashdata("success_hapus", "<div class='alert alert-success' role='alert'>Acara berhasil dihapus! !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->delete('acara');
        }

    }
?>
