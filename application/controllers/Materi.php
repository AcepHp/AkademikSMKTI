<?php
class Materi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Materi_model');
        $this->load->library('form_validation');
    }


    public function index() {
        $tahun = $this->Materi_model->get_tahun();
        $semester = $this->Materi_model->get_semester();
    
        // Ambil nilai id_tahun dari hasil query tahun yang didapat
        $id_tahun = $tahun[0]->id_tahun; 
    
        // Ambil nilai id_semester dari hasil query semester yang didapat
        $id_semester = $semester[0]->id_semester; 
        
        $data['tahun'] = $tahun;
        $data['semester'] = $semester;
        $data['guru'] = $this->Materi_model->get_mapel_data($this->session->userdata('ID_Guru'),$id_tahun,$id_semester);
        $data['tingkatan'] = $this->Materi_model->get_tingkatan();
        
        $this->load->view('Guru/Materi/Materi', $data);
    }
    
    public function lihat_materi($id_kelas, $id_mapel) {
        // Panggil model dan method untuk mengambil id_tahun dan id_semester aktif
        $id_tahun = $this->Materi_model->get_active_id_tahun();
        $id_semester = $this->Materi_model->get_active_id_semester();
        
        if ($id_tahun && $id_semester) {
            // Panggil model untuk mendapatkan materi detail sesuai dengan filter
            $data['materi'] = $this->Materi_model->get_materi_detail($id_kelas, $id_mapel, $id_tahun, $id_semester);
            
            // Pass the $id_kelas and $id_mapel variables to the view
            $data['id_kelas'] = $id_kelas;
            $data['id_mapel'] = $id_mapel;
        
            // Kirim data ke view yang menampilkan materi detail
            $this->load->view('Guru/Materi/daftar_materi', $data);
        } else {
            // Tampilkan pesan kesalahan jika tahun atau semester aktif tidak ditemukan
            echo "Tahun atau semester aktif tidak ditemukan";
        }
    }

    public function tambah_materi($id_kelas, $id_mapel) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Menangani permintaan POST untuk menyimpan data
        $id_kelas = $this->input->post('id_kelas');
        $id_mapel = $this->input->post('id_mapel');
        
        // Konfigurasi untuk mengunggah file
        $config['upload_path'] = './assets/uploads/materi/';
        $config['allowed_types'] = 'pdf|doc|docx|pptx'; // Jenis file yang diizinkan
        $config['max_size'] = 20480; // Ukuran maksimum file (dalam KB)
        $config['file_name'] = uniqid(); // Nama unik untuk file yang diunggah

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_materi')) {
            // Jika gagal mengunggah file, tampilkan pesan kesalahan
            $error = $this->upload->display_errors();
            $data['error'] = $error;
            
            // Memuat tampilan untuk menampilkan pesan kesalahan
            $this->load->view('Guru/Materi/Tambah_materi', $data);
        } else {
            // Jika sukses mengunggah file
            $upload_data = $this->upload->data();
            $file_materi = $upload_data['file_name'];

            // Data untuk disimpan ke dalam database
            $data = array(
                'id_kelas' => $id_kelas,
                'id_mapel' => $id_mapel,
                'id_tahun' => $this->input->post('id_tahun'),
                'id_semester' => $this->input->post('id_semester'),
                'nama_materi' => $this->input->post('nama_materi'),
                'file_materi' => $file_materi
            );

            // Panggil model untuk menyimpan data materi ke dalam database
            $result = $this->Materi_model->tambah_materi($data);

            if ($result) {
                // Redirect ke halaman "lihat materi" setelah berhasil menyimpan data
                redirect('Materi/lihat_materi/' . $id_kelas . '/' . $id_mapel);
            } else {
                $data['error'] = 'Gagal menyimpan data materi.';
                
                // Memuat tampilan untuk menampilkan pesan kesalahan
                redirect('Materi/lihat_materi/' . $id_kelas . '/' . $id_mapel);
            }
        }
    } else {
        // Ini adalah permintaan GET untuk menampilkan formulir "Tambah Materi"

        // Mengambil data tahun akademik aktif dari model
        $data['tahun_akademik'] = $this->Materi_model->get_active_id_tahun();
            
        // Mengambil data semester aktif dari model
        $data['semester'] = $this->Materi_model->get_active_id_semester();
            
        $data['id_kelas'] = $id_kelas;
        $data['id_mapel'] = $id_mapel;

        // Memuat tampilan untuk menampilkan formulir "Tambah Materi"
        $this->load->view('Guru/Materi/Tambah_materi', $data);
    }
}

    
    
    
    
    
    
        
    


}

    
    
    