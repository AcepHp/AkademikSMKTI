<?php

    class Kepsek_Model extends CI_Model {
        public function __construct() {
            parent::__construct();
        }
    
        public function getkepsek() {
            return $this->db->get('kepsek');
        }

        public function getkepsekbyid($id) {
            $this->db->where('id_kepsek', $id);
            return $this->db->get('kepsek');
        }

        public function tambahkepsek(){
            $nama = $this->input->post("nama");
            $judul = $this->input->post("judul"); 
            $deskripsi = $this->input->post("deskripsi");           
                
            $kepsek = array(
                "nama" => $nama,
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
                $kepsek['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
            }

            $this->db->where("id_kepsek");
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("kepsek",$kepsek);
        }

        public function editkepsek($id) {
            $nama = $this->input->post("nama");
            $judul = $this->input->post("judul");
            $deskripsi = $this->input->post("deskripsi");            
            
            $kepsek = array(
                "nama" => $nama,
                "judul" => $judul,
                "deskripsi" => $deskripsi,                
                "created" => date('Y-m-d'),
            );
        
            $existing_gambarkepsek = $this->db->get_where("kepsek", array("id_kepsek" => $id))->row();
            
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
                    $kepsek['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
        
                    // Delete the old image if it exists
                    if (!empty($existing_gambarkepsek->gambar)) {
                        unlink($existing_gambarkepsek->gambar); // Remove the old file
                    }
                }
            } else {
                // No new image uploaded, retain the existing image
                $kepsek['gambar'] = $existing_gambarkepsek->gambar;
            }
        
            $this->db->where("id_kepsek", $id);
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("kepsek", $kepsek);
        }

        public function delete_kepsek($id) {
            $this->db->where('id_kepsek', $id);
            return $this->db->delete('kepsek');
        }

    }
    


?>