<?php
require_once APPPATH.'../vendor/autoload.php';

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
            $this->db->insert('ppdb', $data);
        }

        //Fungsi2 untuk mengatur Halaman PPDB (Kelola Dashboard)

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
            $this->session->set_flashdata("success_tambah", "<div class='alert alert-success' role='alert'>Halaman PPDB berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
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
            $this->session->set_flashdata("success_edit", "<div class='alert alert-success' role='alert'>Halaman PPDB berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("ppdb_admin", $ppdb_admin);
        }

        public function delete_ppdb($id) {
            $this->db->where('id_ppdb', $id);
            $this->session->set_flashdata("success_hapus", "<div class='alert alert-success' role='alert'>Halaman PPDB berhasil dihapus !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->delete('ppdb_admin');
        }

        //Bagian Admin
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
                
            $data = array(
                "judul" => $judul,
                "isi" => $isi,
                "aktif" => '0',             
            );

            $this->db->where("id_popup", $id);
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("popup",$data);
        }

        public function editpopup($id) {
            $judul = $this->input->post("judul");
            $isi = $this->input->post("isi");
            $aktif = $this->input->post("aktif");
        
            $previousAktif = $this->db->get_where("popup", array("id_popup" => $id))->row()->aktif;
        
            $data = array(
                "judul" => $judul,
                "isi" => $isi,
                "aktif" => $aktif,
            );
        
            $this->db->where("id_popup", $id);
            $this->db->update("popup", $data);
        
            // Jika "aktif" telah berubah, ubah juga "aktif" pada entri lainnya
            if ($aktif != $previousAktif) {
                $newAktif = $aktif == 1 ? 0 : 0;
                $this->db->where("id_popup !=", $id); // Selain id yang sedang diubah
                $this->db->update("popup", array("aktif" => $newAktif));
            }
        
            // Redirect dengan pesan sukses
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        
            return true; // Mengembalikan true sebagai tanda sukses
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
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Kuota berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("kuota",$data);
        }

        public function editkuota($id) {
            $tahun = $this->input->post("tahun"); 
            $Jurusan = $this->input->post("kode_jurusan");
            $kuota = $this->input->post("kuota");            
            
            $data = array(
                "tahun" => $tahun,
                "kuota" => $kuota,                        
            );
        
            $existing_kuota = $this->db->get_where("kuota", array("id_kuota" => $id))->row();
        
            $this->db->where("id_kuota", $id);
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Kuota berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("kuota", $data);
        }

        public function delete_kuota($id) {
            $this->db->where('id_kuota', $id);
            return $this->db->delete('kuota');
        }

        //FORM PPDB
        // Fungsi untuk menyimpan data pendaftaran ke dalam database
        public function simpan_pendaftaran($data) {
            // Tambahkan tanggal registrasi beserta jam, menit, dan detik
            $tanggal_registrasi = date("Y-m-d H:i:s");
            $data['tanggal_registrasi'] = $tanggal_registrasi;

            return $this->db->insert('ppdb', $data);
            // Periksa apakah penyimpanan berhasil
            return $this->db->affected_rows() > 0;
        }

        // Semua Pendaftar
        public function getpendaftar() {
            return $this->db->get('ppdb')->result();
        }

        public function getpendaftarbyid($id) {
            $this->db->where('id_ppdb', $id);
            return $this->db->get('ppdb')->result();
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

        //Kirim dan Cetak PDF
        public function generatePdf($file) {
            $html = $this->load->view('admin/ppdb/karturegistrasi', '', true);
            $mpdf = new \Mpdf\Mpdf([
                'format' => 'A4',
                'margin_top' => 0,
                'margin_right' => 0,
                'margin_left' => 0,
                'margin_bottom' => 0,
            ]);
            $mpdf->SetTitle($file);
            $mpdf->WriteHTML($html);
        
            // Mengembalikan data PDF sebagai string
            return $mpdf->Output('', 'S');
        }       

        public function getDataById($id_ppdb) {
            // Gantilah 'nama_tabel' dengan nama tabel database yang sesuai.
            $this->db->where('id_ppdb', $id_ppdb);
            $query = $this->db->get('ppdb');
        
            if ($query->num_rows() > 0) {
                return $query->row_array(); // Mengembalikan data sebagai array
            }
        
            return false;
        }

        public function sendPdfToEmail($id_ppdb,$email,$file) {
            $akun = $this->getDataById($id_ppdb); // Mengambil data pendaftar berdasarkan ID
            if (!$akun) {
                return false; // Handle jika data tidak ditemukan
            }
            // Menghasilkan PDF
            $akun = $this->PPDB_Model->email()->row();
            $pdfData = $this->generatePdf($file);
            $subjek = $this->input->post('subjek');
            $message = $this->input->post('message');
        
            if ($pdfData) {
                // Konfigurasi email
                $config = array(
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_user' => $akun->email, // Ganti dengan email SMTP Anda
                    'smtp_pass' => $akun->pass_app, // Ganti dengan kata sandi SMTP Anda
                    'smtp_crypto' => 'tls',
                    'smtp_port' => 587,
                    'crlf' => "\r\n",
                    'newline' => "\r\n",
                );
        
                $this->load->library('email');
                $this->email->initialize($config);

                $this->email->subject($subjek);
                $this->email->from($akun->email, 'Halo, ini adalah kartu registrasi PPDB anda');
                // $this->email->attach($pdfData, $file . '.pdf', 'application/pdf');
                $this->email->message($message. "<a href='" . site_url("Cetak/cetakpdf/".$id_ppdb) . "'><button style='padding: 10px; background-color: #007BFF; color: #fff; border: none; border-radius: 5px; cursor: pointer;'>Unduh Kartu</button></a>");
                $this->email->to($email);
        
                // Attach the PDF to the email
                
                if ($this->email->send()) {
                    return true; // Email terkirim dengan sukses
                } else {
                    return false; // Pengiriman email gagal
                }
            } else {
                return false; // Gagal menghasilkan PDF
            }
        }

        public function editpendaftar($id) {
            $this->load->model('Jurusan_model');
            $status = $this->input->post("status");
            $nama_lengkap = $this->input->post("username");
            $NISN = $this->input->post("NISN");
            $email = $this->input->post("email");
            $akun = $this->PPDB_Model->email()->row();
            $biodata = $this->db->get_where('ppdb', array('id_ppdb' => $id))->row();
            $nama_jurusan = $biodata->pilihan_satu;
            $nama_jurusan2 = $biodata->pilihan_dua;
            $jurusan = $this->Jurusan_model->getkuotabynama($nama_jurusan)->row();
            $jurusan2 = $this->Jurusan_model->getkuotabynama($nama_jurusan2)->row();

            $kuota = array(
                'kuota' => $jurusan->kuota - 1,
            );

            $kuota2 = array(
                'kuota' => $jurusan2->kuota - 1,
            );

            if($jurusan->kuota !== '0'){
                $this->Jurusan_model->ambilkuota($nama_jurusan, $kuota);
            }else if($jurusan2->kuota !== '0'){
                $this->Jurusan_model->ambilkuota($nama_jurusan2, $kuota2);
            }else{
                $this->session->set_flashdata("success", "<div class='alert alert-danger' role='alert'>Kuota Penuh !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                return redirect('PPDB/pendaftar','refresh');
            }

            $data = array(
                "status" => $status,
            );
        
            $account = array(
                "NISN" => $NISN,
                "nama_lengkap" => $nama_lengkap,
                "username" => str_replace(" ", "", $nama_lengkap),
                "password" => md5('siswatignc'),
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
                $this->email->message("Assalamualaikum wr. wb, ini akun Anda. Silahkan login menggunakan username = " . str_replace(" ", "", $nama_lengkap) . " dan password = siswatignc");
                
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

        //Nomor Registrasi
        public function get_last_nomor_registrasi() {
            $this->db->select('nomor_registrasi');
            $this->db->from('ppdb');
            $this->db->order_by('nomor_registrasi', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
                $row = $query->row();
                return $row->nomor_registrasi;
            }
    
            return 0; // Jika tidak ada data registrasi sebelumnya
        }
    
        public function generate_nomor_registrasi() {
            $current_date = date("Ymd"); // Mendapatkan tanggal saat ini (tahun, bulan, tanggal)
            $last_number = $this->get_last_nomor_registrasi();
        
            // Jika data registrasi pertama kali disimpan hari ini, maka nomor direset ke 1.
            if (substr($last_number, 0, 8) == $current_date) {
                $new_number = $last_number + 1;
            } else {
                $new_number = intval($current_date . '0001');
            }
        
            // Format nomor registrasi menjadi '202310300001'
            return $new_number;
        }

        //Tanggal Registrasi
        public function update_tanggal_registrasi($nisn, $tanggal_registrasi) {
            // Data yang akan diupdate
            $data = array('tanggal_registrasi' => $tanggal_registrasi);
        
            // Kondisi untuk mengidentifikasi data yang akan diupdate (misalnya, berdasarkan NISN)
            $this->db->where('NISN', $nisn);
        
            // Melakukan pembaruan tanggal registrasi dalam tabel 'ppdb'
            $this->db->update('ppdb', $data);
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