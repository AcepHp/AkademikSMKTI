<?php

    class Manajemen_Model extends CI_Model {
        public function __construct() {
            parent::__construct();
        }
    
        public function getmanajemen() {
            return $this->db->get('manajemen');
        }

        public function getmanajemenbyid($id) {
            $this->db->where('id_manajemen', $id);
            return $this->db->get('manajemen');
        }

        public function get_all(){
            return $this->db->count_all('manajemen');
        }

        public function tambahmanajemen(){
            $nama = $this->input->post("nama");
            $jabatan = $this->input->post("jabatan");        
            
            $manajemen = array(
                "nama" => $nama,
                "jabatan" => $jabatan,
                "created" => date('Y-m-d'),
            );
            $config['upload_path'] = './assets/images';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata("error", "<div class='alert alert-danger' role='alert'>Gunakan format gambar yang sesuai (.gif/.jpg/.png) !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $upload_data = $this->upload->data();
                $manajemen['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
            }

            $this->db->where("id_slide");
            $this->session->set_flashdata("success_tambah", "<div class='alert alert-success' role='alert'>Manajemen Sekolah berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("manajemen",$manajemen);
        }
        
        public function editmanajemen($id) {
            $nama = $this->input->post("nama");
            $jabatan = $this->input->post("jabatan");             
            
            $manajemen = array(
                "nama" => $nama,
                "jabatan" => $jabatan,
                "created" => date('Y-m-d'),
            );
        
            $existing_gambar = $this->db->get_where("manajemen", array("id_manajemen" => $id))->row();
            
            // Check if a new image is uploaded
            if ($_FILES['gambar']['error'] !== UPLOAD_ERR_NO_FILE) {
                $config['upload_path'] = './assets/images';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
        
                $this->load->library('upload', $config);
        
                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata("error", "<div class='alert alert-danger' role='alert'>Gunakan format gambar yang sesuai (.gif/.jpg/.png) !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $upload_data = $this->upload->data();
                    $manajemen['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
        
                    // Delete the old image if it exists
                    if (!empty($existing_gambar->gambar)) {
                        unlink($existing_gambar->gambar); // Remove the old file
                    }
                }
            } else {
                // No new image uploaded, retain the existing image
                $manajemen['gambar'] = $existing_gambar->gambar;
            }
        
            $this->db->where("id_manajemen", $id);
            $this->session->set_flashdata("success_edit", "<div class='alert alert-success' role='alert'>Manajemen Sekolah berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("manajemen", $manajemen);
        }

        public function delete_manajemen($id) {
            $this->db->where('id_manajemen', $id);
            $this->session->set_flashdata("success_hapus", "<div class='alert alert-success' role='alert'>Manajemen Sekolah berhasil dihapus !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->delete('manajemen');
        }

    }
    


?>
