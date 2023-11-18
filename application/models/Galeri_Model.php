<?php

    class Galeri_Model extends CI_Model {
        public function __construct() {
            parent::__construct();
        }
    
        public function getgaleri() {
            return $this->db->get('galeri');
        }

        public function getgaleribyid($id) {
            $this->db->where('id_galeri', $id);
            return $this->db->get('galeri');
        }

        public function get_all(){
            return $this->db->count_all('galeri');
        }

        public function tambahgaleri(){
            $caption = $this->input->post("caption");

            $galeri = array(
                "caption" => $caption,
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
                $galeri['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
            }

            $this->db->where("id_galeri");
            $this->session->set_flashdata("success_tambah", "<div class='alert alert-success' role='alert'>Data Foto berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("galeri",$galeri);
        }
        
        public function editgaleri($id) {
            $caption = $this->input->post("caption");

            $galeri = array(
                "caption" => $caption,
                "created" => date('Y-m-d'),
            );
        
            $existing_gambar = $this->db->get_where("galeri", array("id_galeri" => $id))->row();
            
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
                    $galeri['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
        
                    // Delete the old image if it exists
                    if (!empty($existing_gambar->gambar)) {
                        unlink($existing_gambar->gambar); // Remove the old file
                    }
                }
            } else {
                // No new image uploaded, retain the existing image
                $galeri['gambar'] = $existing_gambar->gambar;
            }
        
            $this->db->where("id_galeri", $id);
            $this->session->set_flashdata("success_edit", "<div class='alert alert-success' role='alert'>Data Foto berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("galeri", $galeri);
        }

        public function delete_galeri($id) {
            $this->db->where('id_galeri', $id);
            $this->session->set_flashdata("success_hapus", "<div class='alert alert-success' role='alert'>Data Foto berhasil dihapus !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->delete('galeri');
        }

    }
    
?>
