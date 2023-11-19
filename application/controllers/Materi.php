<?php
class Materi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Materi_model');
        $this->load->library('form_validation');
    }


    public function index() {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }
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
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }
        // Panggil model dan method untuk mengambil id_tahun dan id_semester aktif
        $id_tahun = $this->Materi_model->get_active_id_tahun();
        $id_semester = $this->Materi_model->get_active_id_semester();
        
        if ($id_tahun && $id_semester) {
            $data['juti'] = $this->Materi_model->get_jurusan_tingkatan_byid($id_mapel);
            
            if (!empty($data['juti']) && isset($data['juti'][0]->kode_jurusan) && isset($data['juti'][0]->kode_tingkatan)) {
                $kode_jurusan = $data['juti'][0]->kode_jurusan;
                $kode_tingkatan = $data['juti'][0]->kode_tingkatan;
    
                // Panggil model untuk mendapatkan materi detail sesuai dengan filter
                $data['materi'] = $this->Materi_model->get_materi_detail($id_kelas, $id_mapel, $id_tahun, $id_semester, $kode_jurusan, $kode_tingkatan);
                
                // Pass the $id_kelas and $id_mapel variables to the view
                $data['id_kelas'] = $id_kelas;
                $data['id_mapel'] = $id_mapel;
            
                // Kirim data ke view yang menampilkan materi detail
                $this->load->view('Guru/Materi/daftar_materi', $data);
            } else {
                // Tampilkan pesan kesalahan jika data jurusan dan tingkatan tidak ditemukan
                echo "Data jurusan dan tingkatan tidak ditemukan";
            }
        } else {
            // Tampilkan pesan kesalahan jika tahun atau semester aktif tidak ditemukan
            echo "Tahun atau semester aktif tidak ditemukan";
        }
    }
    

    public function tambah_materi($id_kelas, $id_mapel) {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }
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
                'kode_jurusan' => $this->input->post('kode_jurusan'),
                'kode_tingkatan' => $this->input->post('kode_tingkatan'),
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
        $data['nama'] = $this->Materi_model->get_kelas_name_by_id($id_kelas);
        $data['id_mapel'] = $id_mapel;
        $data['juti'] = $this->Materi_model->get_jurusan_tingkatan_byid($id_mapel); // Juti adalah jurusan dan tingkatan

        // Memuat tampilan untuk menampilkan formulir "Tambah Materi"
        $this->load->view('Guru/Materi/Tambah_materi', $data);
    }
}

public function edit_materi_guru($id_materi) {
    if ($this->session->userdata('role') !== 'Guru') {
        redirect('auth');
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_kelas = $_POST['id_kelas'];
        $id_mapel = $_POST['id_mapel'];

        $config['upload_path'] = './assets/uploads/materi/';
        $config['allowed_types'] = 'pdf|doc|docx|pptx';
        $config['max_size'] = 20480;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_materi')) {
            $upload_data = $this->upload->data();
            $file_materi = $upload_data['file_name'];

            if ($file_materi !== null) {
                $data = array(
                    'nama_materi' => $this->input->post('nama_materi'),
                    'file_materi' => $file_materi
                );

                $old_file_info = $this->Materi_model->get_file_info($id_materi);
                $result = $this->Materi_model->editdb_tambahfolder__materi($id_materi, $data);

                if ($result && $old_file_info) {
                    $old_file_path = './assets/uploads/materi/' . $old_file_info->file_materi;
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                }
            } else {
                $error = $this->upload->display_errors();
                $data['error'] = $error;
                $this->load->view('Guru/Materi/edit_materi', $data);
            }

            if ($result) {
                redirect('Materi/lihat_materi/'. $id_kelas . '/' . $id_mapel);
            } else {
                $data['error'] = 'Gagal menyimpan data materi.';
                redirect('Materi/lihat_materi/'. $id_kelas . '/' . $id_mapel);
            }
        } elseif ($file_materi === null) {
            $data = array(
                'nama_materi' => $this->input->post('nama_materi')
            );
            $asss = $this->Materi_model->editdb_tambahfolder__materi($id_materi, $data);
            redirect('Materi/lihat_materi/'. $id_kelas . '/' . $id_mapel);
        }
    } else {
        $data['materi'] = $this->Materi_model->get_data_materi($id_materi);
        $this->load->view('Guru/Materi/edit_materi', $data);
    }
}

public function hapus_materi_guru($id_materi, $id_kelas, $id_mapel) {
    if ($this->session->userdata('role') !== 'Guru') {
        redirect('auth');
    }
    // Panggil model untuk mendapatkan informasi materi
    $materi_info = $this->Materi_model->get_materi_info($id_materi);
    
    if ($materi_info) {
        // Hapus file materi dari folder
        $file_path = './assets/uploads/materi/' . $materi_info->file_materi;
        if (file_exists($file_path)) {
            unlink($file_path); // Hapus file dari server
        }
        
        // Panggil model untuk menghapus materi dari database
        $result = $this->Materi_model->hapus_materi($id_materi);
        
        if ($result) {
            // Redirect atau tampilkan pesan sukses setelah berhasil menghapus materi
            $this->session->set_flashdata('success', 'Materi berhasil dihapus.');
            redirect('Materi/lihat_materi/'. $id_kelas . '/' . $id_mapel);
        } else {
            // Redirect atau tampilkan pesan kesalahan jika gagal menghapus materi dari database
            $this->session->set_flashdata('error', 'Gagal menghapus materi.');
            redirect('Materi/lihat_materi/'. $id_kelas . '/' . $id_mapel);
        }
    } else {
        // Tampilkan pesan kesalahan jika materi tidak ditemukan
        $this->session->set_flashdata('error', 'Materi tidak ditemukan.');
        redirect('Materi/lihat_materi/'. $id_kelas . '/' . $id_mapel);
    }
}

public function index_siswa() {
    if ($this->session->userdata('role') !== 'Siswa') {
        redirect('auth');
    }
    $tahun = $this->Materi_model->get_tahun();
    $semester = $this->Materi_model->get_semester();
    $kode = $this->Materi_model->get_kode_jurusan($this->session->userdata('nisn'));

    // Initialize variables to avoid undefined variable errors
    $id_tahun = null;
    $id_semester = null;
    $kode_jurusan = null;
    $kode_tingkatan = null;

    // Check if $tahun is not empty and has an element at index 0
    if (!empty($tahun) && isset($tahun[0])) {
        $id_tahun = $tahun[0]->id_tahun;
    }

    // Check if $semester is not empty and has an element at index 0
    if (!empty($semester) && isset($semester[0])) {
        $id_semester = $semester[0]->id_semester;
    }

    // Check if $kode is not empty and has an element at index 0
    if (!empty($kode) && isset($kode[0])) {
        $kode_jurusan = $kode[0]->kode_jurusan;
        $kode_tingkatan = $kode[0]->kode_tingkatan;
    }

    $data['tahun'] = $tahun;
    $data['semester'] = $semester;
    $data['kode'] = $kode;
    $data['kelas'] = $this->Materi_model->get_kelas_by_nisn($this->session->userdata('nisn'));

    // Check if necessary data is set before proceeding
    if (isset($id_tahun, $id_semester, $kode_jurusan, $kode_tingkatan)) {
        $data['mapel'] = $this->Materi_model->get_mapel_data_siswa($kode_jurusan, $kode_tingkatan);
        $data['tingkatan'] = $this->Materi_model->get_tingkatan();
    }

    $this->load->view('Siswa/materi/materi', $data);
}

public function lihat_materi_siswa($id_kelas, $id_mapel) {
    if ($this->session->userdata('role') !== 'Siswa') {
        redirect('auth');
    }
     // Panggil model dan method untuk mengambil id_tahun dan id_semester aktif
    $id_tahun = $this->Materi_model->get_active_id_tahun();
    $id_semester = $this->Materi_model->get_active_id_semester();
    
    if ($id_tahun && $id_semester) {
        $data['juti'] = $this->Materi_model->get_jurusan_tingkatan_byid($id_mapel);
        
        if (!empty($data['juti']) && isset($data['juti'][0]->kode_jurusan) && isset($data['juti'][0]->kode_tingkatan)) {
            $kode_jurusan = $data['juti'][0]->kode_jurusan;
            $kode_tingkatan = $data['juti'][0]->kode_tingkatan;

             // Panggil model untuk mendapatkan materi detail sesuai dengan filter
            $data['materi'] = $this->Materi_model->get_materi_detail($id_kelas, $id_mapel, $id_tahun, $id_semester, $kode_jurusan, $kode_tingkatan);
            
             // Pass the $id_kelas and $id_mapel variables to the view
            $data['id_kelas'] = $id_kelas;
            $data['id_mapel'] = $id_mapel;
    
             // Kirim data ke view yang menampilkan materi detail
            $this->load->view('Siswa/materi/lihat_materi', $data);
        } else {
             // Tampilkan pesan kesalahan jika data jurusan dan tingkatan tidak ditemukan
            echo "Data jurusan dan tingkatan tidak ditemukan";
        }
    } else {
         // Tampilkan pesan kesalahan jika tahun atau semester aktif tidak ditemukan
        echo "Tahun atau semester aktif tidak ditemukan";
    }
}

// Materi untuk admin
public function index_admin() {
    if ($this->session->userdata('role') !== 'SuperAdmin') {
        redirect('auth');
    }
   // Mengambil data tahun dan semester akademik aktif dari model
    $id_tahun = $this->Materi_model->get_active_id_tahun();
    $id_semester = $this->Materi_model->get_active_id_semester();

    $data['materi'] = $this->Materi_model->get_all_materi_detail_admin($id_tahun, $id_semester);
    
    $this->load->view('admin/Materi/Materi', $data);
}
    

public function tambah_materi_admin() {
    if ($this->session->userdata('role') !== 'SuperAdmin') {
        redirect('auth');
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Menangani permintaan POST untuk menyimpan data
        $id_kelas = $this->input->post('id_kelas');
        $id_mapel = $this->input->post('id_mapel');
        $kode_jurusan = $this->input->post('kode_jurusan');
        $kode_tingkatan = $this->input->post('kode_tingkatan');
        
        // Konfigurasi untuk mengunggah file
        $config['upload_path'] = './assets/uploads/materi/';
        $config['allowed_types'] = 'pdf|doc|docx|pptx'; // Jenis file yang diizinkan
        $config['max_size'] = 20480; // Ukuran maksimum file (dalam KB)
       // $config['file_name'] = uniqid(); // Nama unik untuk file yang diunggah

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_materi')) {
            // Jika gagal mengunggah file, tampilkan pesan kesalahan
            $error = $this->upload->display_errors();
            $data['error'] = $error;
            
            // Memuat tampilan untuk menampilkan pesan kesalahan
            $this->load->view('admin/Materi/Tambah_materi', $data);
        } else {
            // Jika sukses mengunggah file
            $upload_data = $this->upload->data();
            $file_materi = $upload_data['file_name'];

            // Data untuk disimpan ke dalam database
            $data = array(
                'id_kelas' => $id_kelas,
                'id_mapel' => $id_mapel,
                'kode_jurusan' => $kode_jurusan,
                'kode_tingkatan' => $kode_tingkatan,
                'id_tahun' => $this->input->post('id_tahun'),
                'id_semester' => $this->input->post('id_semester'),
                'nama_materi' => $this->input->post('nama_materi'),
                'file_materi' => $file_materi
            );

            // Panggil model untuk menyimpan data materi ke dalam database
            $result = $this->Materi_model->tambah_materi($data);

            if ($result) {
                // Redirect ke halaman "lihat materi" setelah berhasil menyimpan data
                redirect('Materi/index_admin/');
            } else {
                $data['error'] = 'Gagal menyimpan data materi.';
                
                // Memuat tampilan untuk menampilkan pesan kesalahan
                redirect('Materi/index_admin/');
            }
        }
    } else {
        // Ini adalah permintaan GET untuk menampilkan formulir "Tambah Materi"

        // Mengambil data tahun akademik aktif dari model
        $data['tahun_akademik'] = $this->Materi_model->get_active_id_tahun();
            
        // Mengambil data semester aktif dari model
        $data['semester'] = $this->Materi_model->get_active_id_semester();
            
        $data['jurusan'] = $this->Materi_model->get_jurusan();
        $data['tingkatan'] = $this->Materi_model->get_tingkatan();
        $data['kelas'] = $this->Materi_model->get_kelas();
        $data['mapel'] = $this->Materi_model->get_mapel();

        

        // Memuat tampilan untuk menampilkan formulir "Tambah Materi"
        $this->load->view('admin/Materi/tambah_materi', $data);
    }
}

public function hapus_materi($id_materi) {
    if ($this->session->userdata('role') !== 'SuperAdmin') {
        redirect('auth');
    }
    // Panggil model untuk mendapatkan informasi materi
    $materi_info = $this->Materi_model->get_materi_info($id_materi);
    
    if ($materi_info) {
        // Hapus file materi dari folder
        $file_path = './assets/uploads/materi/' . $materi_info->file_materi;
        if (file_exists($file_path)) {
            unlink($file_path); // Hapus file dari server
        }
        
        // Panggil model untuk menghapus materi dari database
        $result = $this->Materi_model->hapus_materi($id_materi);
        
        if ($result) {
            // Redirect atau tampilkan pesan sukses setelah berhasil menghapus materi
            $this->session->set_flashdata('success', 'Materi berhasil dihapus.');
            redirect('Materi/index_admin');
        } else {
            // Redirect atau tampilkan pesan kesalahan jika gagal menghapus materi dari database
            $this->session->set_flashdata('error', 'Gagal menghapus materi.');
            redirect('Materi/index_admin');
        }
    } else {
        // Tampilkan pesan kesalahan jika materi tidak ditemukan
        $this->session->set_flashdata('error', 'Materi tidak ditemukan.');
        redirect('Materi/index_admin');
    }
}

public function edit_materi_admin($id_materi) {
    if ($this->session->userdata('role') !== 'SuperAdmin') {
        redirect('auth');
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            $config['upload_path'] = './assets/uploads/materi/';
            $config['allowed_types'] = 'pdf|doc|docx|pptx'; // Jenis file yang diizinkan
            $config['max_size'] = 20480; // Ukuran maksimum file (dalam KB)
          //  $config['file_name'] = uniqid(); // Nama unik untuk file yang diunggah

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_materi')) {
                // Jika sukses mengunggah file
                $upload_data = $this->upload->data();
                $file_materi = $upload_data['file_name'];

                if ($file_materi !== null){
                    $data = array(
                        'nama_materi' => $this->input->post('nama_materi'),
                        'file_materi' => $file_materi
                    );

                      // Ambil informasi file sebelumnya
            $old_file_info = $this->Materi_model->get_file_info($id_materi);

            // Panggil model untuk menyimpan data materi ke dalam database
            $result = $this->Materi_model->editdb_tambahfolder__materi($id_materi, $data);
        // Hapus file lama jika pengunggahan file baru berhasil
        if ($result && $old_file_info) {
            $old_file_path = './assets/uploads/materi/' . $old_file_info->file_materi;
            if (file_exists($old_file_path)) {
                unlink($old_file_path);
            }
        }
        } else {
            // Jika gagal mengunggah file, tampilkan pesan kesalahan
            $error = $this->upload->display_errors();
            $data['error'] = $error;

            // Memuat tampilan untuk menampilkan pesan kesalahan
            $this->load->view('admin/Materi/edit_materi', $data);
        }

    if ($result) {
        // Redirect ke halaman "lihat materi" setelah berhasil menyimpan data
        redirect('Materi/index_admin/');
    } else {
        $data['error'] = 'Gagal menyimpan data materi.';
        // Memuat tampilan untuk menampilkan pesan kesalahan
        redirect('Materi/index_admin/');
    }
                    
                }elseif ($file_materi === null) {
                    $data = array(
                        'nama_materi' => $this->input->post('nama_materi')
                    );
                    $asss = $this->Materi_model->editdb_tambahfolder__materi($id_materi, $data);
                    redirect('Materi/index_admin/');
                }

                
  
    
    } else {
        $data['materi'] = $this->Materi_model->get_data_materi($id_materi);

        // Memuat tampilan untuk menampilkan formulir "Tambah Materi"
        $this->load->view('admin/Materi/edit_materi', $data);
    }
}


}
    
    
    