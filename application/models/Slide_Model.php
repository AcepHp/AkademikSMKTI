<?php

    class Slide_Model extends CI_Model {
        public function __construct() {
            parent::__construct();
        }
    
        public function getslide() {
            return $this->db->get('slideshow');
        }

        public function getslidebyid($id) {
            $this->db->where('id_slide', $id);
            return $this->db->get('slideshow');
        }

        public function tambahslide(){
            $deskripsi = $this->input->post("deskripsi");           
            
            $slideshow = array(
                "deskripsi" => $deskripsi,
                "created" => date('Y-m-d'),
            );
            $config['upload_path'] = './assets/images';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata("error", "<div class='alert alert-danger' role='alert'>Format gambar tidak sesuai, Gunakan format sesuai (.gif/.jpg/.png) !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $upload_data = $this->upload->data();
                $slideshow['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
            }

            $this->db->where("id_slide");
            $this->session->set_flashdata("success_tambah_silder", "<div
             class='alert alert-success' role='alert'>Gambar Slide berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' 
             aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("slideshow", $slideshow);
        }
        
        public function editslide($id) {
            $deskripsi = $this->input->post("deskripsi");            
            
            $slideshow = array(
                "deskripsi" => $deskripsi,                
                "created" => date('Y-m-d'),
            );
        
            $existing_corousel = $this->db->get_where("slideshow", array("id_slide" => $id))->row();
            
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
                    $slideshow['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
        
                    // Delete the old image if it exists
                    if (!empty($existing_corousel->gambar)) {
                        unlink($existing_corousel->gambar); // Remove the old file
                    }
                }
            } else {
                // No new image uploaded, retain the existing image
                $slideshow['gambar'] = $existing_corousel->gambar;
            }
        
            $this->db->where("id_slide", $id);
            $this->session->set_flashdata("success_edit", "<div class='alert alert-success' role='alert'>Slide show berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("slideshow", $slideshow);
        }

        public function delete_slide($id) {
            $this->db->where('id_slide', $id);
            $slide = $this->db->get_where('slideshow', array('id_slide'=>$id))->row();

            if($slide){
                $foto = str_replace(base_url(), FCPATH, $slide->gambar);
                if(file_exists($foto)){
                    unlink($foto);
                }
                $this->db->where('id_slide', $id);
                return $this->db->delete('slideshow');
            }
        }

    }
    


?>
