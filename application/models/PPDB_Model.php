<?php

    class PPDB_Model extends CI_Model {
        public function __construct() {
            parent::__construct();
        }

        public function get_all_jurusan() {
            return $this->db->get('jurusan')->result();
        }

        public function get_semua_ppdb() {
            return $this->db->get('ppdb')->result();
        }
        
        public function simpan_data($data) {
            // Gantilah 'nama_tabel' dengan nama tabel Anda
            $this->db->insert('ppdb', $data);
        }

        public function getppdb() {
            return $this->db->get('ppdb_admin');
        }

        public function getppdbbyid($id) {
            $this->db->where('id_ppdb', $id);
            return $this->db->get('ppdb_admin');
        }

        public function tambahppdb(){
            $nama = $this->input->post("nama");
            $judul = $this->input->post("judul");
            $deskripsi = $this->input->post("deskripsi");           
            
            $ppdb_admin = array(
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
                $ppdb_admin['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
            }

            $this->db->where("id_slide");
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("ppdb_admin",$ppdb_admin);
        }
        
        public function editppdb($id) {
            $nama = $this->input->post("nama");
            $judul = $this->input->post("judul");
            $deskripsi = $this->input->post("deskripsi");            
            
            $ppdb_admin = array(
                "nama" => $nama,
                "judul" => $judul,
                "deskripsi" => $deskripsi,                
                "created" => date('Y-m-d'),
            );
        
            $existing_gambar = $this->db->get_where("ppdb_admin", array("id_ppdb" => $id))->row();
            
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
                    $ppdb['gambar'] = base_url("assets/images/") . $upload_data['file_name'];
        
                    // Delete the old image if it exists
                    if (!empty($existing_gambar->gambar)) {
                        unlink($existing_gambar->gambar); // Remove the old file
                    }
                }
            } else {
                // No new image uploaded, retain the existing image
                $ppdb_admin['gambar'] = $existing_gambar->gambar;
            }
        
            $this->db->where("id_ppdb", $id);
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("ppdb_admin", $ppdb_admin);
        }

        public function delete_ppdb($id) {
            $this->db->where('id_ppdb', $id);
            return $this->db->delete('ppdb_admin');
        }

        //FORM PPDB
        // Fungsi untuk menyimpan data pendaftaran ke dalam database
        public function simpan_pendaftaran($data) {
            return $this->db->insert('ppdb', $data);
        }

        //Pop Up
        public function getpopup() {
            return $this->db->get('popup')->result();;
        }

        public function getpopupbyid($id) {
            $this->db->where('id_popup', $id);
            return $this->db->get('popup');
        }

        public function tambahpopup(){
            $judul = $this->input->post("judul"); 
            $isi = $this->input->post("isi");
            $aktif = $this->input->post("aktif");       
                
            $data = array(
                "judul" => $judul,
                "isi" => $isi,
                "aktif" => $aktif,             
            );

            $this->db->insert("popup",$data);

            $this->db->where("id_popup");
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("popup",$data);
        }

        public function editpopup($id) {
            $judul = $this->input->post("judul"); 
            $isi = $this->input->post("isi");
            $aktif = $this->input->post("aktif");         
            
            $data = array(
                "judul" => $judul,
                "isi" => $isi,
                "aktif" => $aktif,           
            );
        
            $existing_popup = $this->db->get_where("popup", array("id_popup" => $id))->row();
        
            $this->db->where("id_popup", $id);
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("popup", $data);
        }

        public function delete_popup($id) {
            $this->db->where('id_popup', $id);
            return $this->db->delete('popup');
        }

        //Kuota Pendaftaran
        public function getkuota() {
            return $this->db->get('kuota')->result();;
        }

        public function getkuotabyid($id) {
            $this->db->where('id_kuota', $id);
            return $this->db->get('kuota');
        }

        public function tambahkuota(){
            $tahun = $this->input->post("tahun"); 
            $Jurusan = $this->input->post("nama_jurusan");
            $kuota = $this->input->post("kuota");        
                
            $data = array(
                "tahun" => $tahun,
                "nama_jurusan" => $Jurusan,
                "kuota" => $kuota,             
            );

            $this->db->where("id_kuota");
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("kuota",$data);
        }

        public function editkuota($id) {
            $tahun = $this->input->post("tahun"); 
            $Jurusan = $this->input->post("kode_jurusan");
            $kuota = $this->input->post("kuota");            
            
            $data = array(
                "tahun" => $tahun,
                "kode_jurusan" => $kode_jurusan,
                "kuota" => $kuota,                        
            );
        
            $existing_kuota = $this->db->get_where("kuota", array("id_kuota" => $id))->row();
        
            $this->db->where("id_kuota", $id);
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("kuota", $data);
        }

        public function delete_kuota($id) {
            $this->db->where('id_kuota', $id);
            return $this->db->delete('kuota');
        }

        // Semua Pendaftar
        public function getpendaftar() {
            return $this->db->get('ppdb')->result();;
        }

        public function getpendaftarbyid($id) {
            $this->db->where('id_ppdb', $id);
            return $this->db->get('ppdb');
        }

        public function tambahpendaftar(){
            $tahun = $this->input->post("tahun"); 
            $Jurusan = $this->input->post("kode_jurusan");
            $kuota = $this->input->post("kuota");        
                
            $data = array(
                "tahun" => $tahun,
                "kode_jurusan" => $kode_jurusan,
                "kuota" => $kuota,             
            );

            $this->db->where("id_kuota");
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("kuota",$data);
        }

        public function editpendaftar($id) {
            $status = $this->input->post("status");
            $nama_lengkap = $this->input->post("username");
            $NISN = $this->input->post("NISN");
            $email = $this->input->post("email");
            $akun = $this->PPDB_Model->email()->row();
            

            $data = array(
                "status" => $status,
            );
        
            $account = array(
                "NISN" => $NISN,
                "nama_lengkap" => $nama_lengkap,
                "username" => str_replace(" ", "", $nama_lengkap),
                "password" => md5('siswa'),
                "role" => 'siswa',
                "NIP" => $NISN,
            );
        
            $config = array(
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_user' => $akun->email,
                'smtp_pass' => $akun->pass_app, // Ganti dengan kata sandi SMTP Gmail Anda
                'smtp_crypto' => 'tls',
                'smtp_port' => 587,
                'crlf' => "\r\n",
                'newline' => "\r\n"
            );
        
            $this->load->library('email');
            $this->email->initialize($config);
        
            $this->email->from($akun->email, 'PPDB SMK TI GARUDA NUSANTARA CIMAHI');
            $this->email->to($email);
        
            if ($status == 0) {
                // Status tidak diterima
                $this->email->subject('Maaf, Anda Tidak Diterima');
                $this->email->message('Maaf, Anda tidak diterima dalam proses pendaftaran.');
                $this->PPDB_Model->delete_account($NISN);
            } else {
                // Status diterima
                $this->email->subject('Selamat! Anda Telah Diterima');
                $this->email->message("Assalamualaikum wr. wb, ini akun Anda. Silahkan login menggunakan username = " . str_replace(" ", "", $nama_lengkap) . " dan password = siswa");
                // Jika pengguna (users) belum ada, lakukan insert
                $this->PPDB_Model->insert_account($account);
            }
        
            if (!$this->email->send()) {
                show_error($this->email->print_debugger());
            }
        
            $this->db->where("id_ppdb", $id);
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("ppdb", $data);
        }

        public function delete_account($NISN) {
            $this->db->where('NISN', $NISN);
            return $this->db->delete('users');
        }

        public function insert_account($id) {
            return $this->db->insert('users', $id);
        }

        public function delete_pendaftar($id) {
            $this->db->where('id_ppdb', $id);
            return $this->db->delete('ppdb');
        }

        //Email Pendaftaran
        public function email() {
            return $this->db->get('email');
        }

        public function email_id($id) {
            $this->db->where('id_email', $id);
            return $this->db->get('email');
        }

        public function edit_email($id) {

            $email = $this->input->post('email');
            $pass_app = $this->input->post('pass_app');

            $data = array(
                "email" => $email,
                "pass_app" => $pass_app,            
            );

            $this->db->where('id_email', $id);
            return $this->db->update('email', $data);
        }


    
    }
?>