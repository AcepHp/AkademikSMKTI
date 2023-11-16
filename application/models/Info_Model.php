<?php

    class Info_Model extends CI_Model {
        public function __construct() {
            parent::__construct();
        }
    
        public function getinfo() {
            return $this->db->get('info');
        }

        public function getinfobyid($id) {
            $this->db->where('id_info', $id);
            return $this->db->get('info');
        }

        public function tambahinfo(){
            $judul = $this->input->post("judul");
            $deskripsi = $this->input->post("deskripsi");           
            
            $info = array(
                "judul" => $judul,
                "deskripsi" => $deskripsi,
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
                $info['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
            }

            $this->db->where("id_slide");
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("info",$info);
        }
        
        public function editinfo($id) {
            $judul = $this->input->post("judul");
            $deskripsi = $this->input->post("deskripsi");            
            
            $info = array(
                "judul" => $judul,
                "deskripsi" => $deskripsi,                
                "created" => date('Y-m-d'),
            );
        
            $existing_gambar = $this->db->get_where("info", array("id_info" => $id))->row();
            
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
                    $info['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
        
                    // Delete the old image if it exists
                    if (!empty($existing_gambar->gambar)) {
                        unlink($existing_gambar->gambar); // Remove the old file
                    }
                }
            } else {
                // No new image uploaded, retain the existing image
                $info['gambar'] = $existing_gambar->gambar;
            }
        
            $this->db->where("id_info", $id);
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("info", $info);
        }

        public function delete_slide($id) {
            $this->db->where('id_slide', $id);
            return $this->db->delete('slideshow');
        }

    }
    


?>
