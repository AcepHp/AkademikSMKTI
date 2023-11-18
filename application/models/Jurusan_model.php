<?php
class Jurusan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_jurusan() {
        return $this->db->get('jurusan')->result();
    }
    public function get_jurusan() {
        return $this->db->get('jurusan');
    } 

    public function get_all(){
        return $this->db->count_all('jurusan');
    }

    public function getjurusan() {
        return $this->db->get('jurusan_admin')->result();
    }
    
    public function getkuotabynama($jurusan) {
        $this->db->where('nama_jurusan', $jurusan);
        return $this->db->get('kuota');
    }

    public function ambilkuota($jurusan, $kuota) {
        $this->db->where('nama_jurusan', $jurusan);
        return $this->db->update('kuota', $kuota);
    }

    public function insert_jurusan($data) {
        return $this->db->insert('jurusan', $data);
    }

    public function get_jurusan_by_kode($kode) {
        $this->db->where('kode_jurusan', $kode);
        return $this->db->get('jurusan')->row();
    }

    public function update_jurusan($kode, $data) {
        $this->db->where('kode_jurusan', $kode);
        return $this->db->update('jurusan', $data);
    }

    public function delete_jurusan($kode) {
        $this->db->where('kode_jurusan', $kode);
        return $this->db->delete('jurusan');
    }

    //Untuk Admin Mengatur di web

    public function getjurusanbyid($id) {
       return $this->db->get_where('jurusan_admin', array('id_jurusan'=>$id));
    }

    public function tambahjurusan(){
        $nama_jurusan = $this->input->post("nama_jurusan");
        $gambar = $this->input->post("gambar");
        $judul = $this->input->post("judul");
        $deskripsi = $this->input->post("deskripsi");          
        
        $jurusan_admin = array(
            "nama_jurusan" => $nama_jurusan,
            "gambar" => $gambar,
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
            $jurusan_admin['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
        }

        $this->db->where("id_jurusan");
        $this->session->set_flashdata("success_tambah", "<div class='alert alert-success' role='alert'>Data Halaman Jurusan berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        return $this->db->insert("jurusan_admin",$jurusan_admin);
    }
    
    public function editjurusan($id) {
        $nama_jurusan = $this->input->post("nama_jurusan");
        $gambar = $this->input->post("gambar");
        $judul = $this->input->post("judul");
        $deskripsi = $this->input->post("deskripsi");              
        
        $jurusan_admin = array(
            "nama_jurusan" => $nama_jurusan,
            "gambar" => $gambar,
            "judul" => $judul,
            "deskripsi" => $deskripsi,
            "created" => date('Y-m-d'),
        );
    
        $existing_gambar = $this->db->get_where("jurusan_admin", array("id_jurusan" => $id))->row();
        
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
                $jurusan_admin['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
    
                // Delete the old image if it exists
                if (!empty($existing_gambar->gambar)) {
                    unlink($existing_gambar->gambar); // Remove the old file
                }
            }
        } else {
            // No new image uploaded, retain the existing image
            $jurusan_admin['gambar'] = $existing_gambar->gambar;
        }
    
        $this->db->where("id_jurusan", $id);
        $this->session->set_flashdata("success_edit", "<div class='alert alert-success' role='alert'>Data Halaman Jurusan berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        return $this->db->update("jurusan_admin", $jurusan_admin);
    }

    public function delete_jurusanbyadmin($id) {
        $this->db->where('id_jurusan', $id);
        $this->session->set_flashdata("success_hapus", "<div class='alert alert-success' role='alert'>Data Halaman Jurusan berhasil dihapus !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        return $this->db->delete('jurusan_admin');
    }
}