<?php

    class VMT_Model extends CI_Model {
        public function __construct() {
            parent::__construct();
        }
    
        public function getvmt() {
            return $this->db->get('vmt');
        }

        public function getvmtbyid($id) {
            $this->db->where('id_vmt', $id);
            return $this->db->get('vmt');
        }

        public function tambahvmt(){
            $judul = $this->input->post("judul"); 
            $deskripsi = $this->input->post("deskripsi");           
                
            $vmt = array(
                "judul" => $judul,
                "deskripsi" => $deskripsi,
                "created" => date('Y-m-d'),              
            );

            $this->db->where("id_vmt");
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("vmt",$vmt);
        }

        public function editvmt($id) {
            $visi = $this->input->post("visi");
            $misi = $this->input->post("misi");
            $tujuan = $this->input->post("tujuan");            
            
            $vmt = array(
                "visi" => $visi,
                "misi" => $misi,                
                "tujuan" => $tujuan,
            );
        
            $existing_vmt = $this->db->get_where("vmt", array("id_vmt" => $id))->row();
        
            $this->db->where("id_vmt", $id);
            $this->session->set_flashdata("success_edit", "<div class='alert alert-success' role='alert'>Visi Misi Dan Tujuan berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("vmt", $vmt);
        }

        public function delete_vmt($id) {
            $this->db->where('id_vmt', $id);
            return $this->db->delete('vmt');
        }

    }

?>