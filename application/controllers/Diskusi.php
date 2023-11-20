<?php
class Diskusi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('diskusi_model'); // Memanggil model 'diskusi_model'
    }

    public function index() {
        if ($this->session->userdata('role') === 'Siswa') {
            $data['siswa'] = $this->diskusi_model->get_siswa_data($this->session->userdata('nisn'));
            $data['query'] = $this->diskusi_model->get_daftar_topik_biasa();
            $this->load->view('diskusi/forum_diskusi', $data);
        } elseif ($this->session->userdata('role') === 'Guru') {
            $data['guru'] = $this->diskusi_model->get_guru_data($this->session->userdata('NIP'));
            $data['query'] = $this->diskusi_model->get_daftar_topik_biasa();
            $this->load->view('diskusi/forum_diskusi', $data);
        } elseif ($this->session->userdata('role') === 'SuperAdmin') {
            $data['SuperAdmin'] = $this->diskusi_model->get_guru_data($this->session->userdata('NIP'));
            $data['query'] = $this->diskusi_model->get_daftar_topik_biasa();
            $this->load->view('diskusi/forum_diskusi', $data);
        } else {
            redirect('auth'); // Redirect jika role tidak dikenali
        }
    }

    public function view_tambah() {
        $this->load->view('diskusi/tambah_topik'); // Memuat halaman tambah_topik.php
    }

    public function kelola_diskusi() {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $enum_values = array('Iya', 'Tidak');
        $data['topik'] = $this->diskusi_model->get_daftar_topik($enum_values);
        $jumlahBaris = $this->diskusi_model->countRowsWithEnumTunggu();
        $data['jumlahBaris'] = $jumlahBaris;
        $this->load->view('diskusi/Kelola_diskusi', $data); // Memuat halaman Kelola_diskusi.php
    }

    public function kelola_komentar() {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $data['komentar'] = $this->diskusi_model->get_daftar_komentar();
        $this->load->view('diskusi/Kelola_komentar', $data); // Memuat halaman Kelola_diskusi.php
    }

    public function tambah_topik() {
        if ($this->input->post()) {
            // Data topik yang akan disimpan
            $data = array(
                'nama' => $this->session->userdata('nama_lengkap'), // Mengambil nama dari session
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal' => date('Y-m-d'), // Mengambil tanggal sekarang
                'enum' => 'tunggu',
            );

            $insert_id = $this->diskusi_model->tambah_topik($data);

            if ($insert_id) {
                // Jika berhasil disimpan, lakukan sesuatu (misalnya: tampilkan pesan sukses)
                redirect('diskusi'); // Ganti dengan URL yang sesuai
            }
        }

        $this->load->view('diskusi/tambah_topik'); // Memuat halaman tambah_topik.php
    }
    public function tambah_topik_admin() {
        if ($this->input->post()) {
            // Data topik yang akan disimpan
            $data = array(
                'nama' => $this->session->userdata('nama_lengkap'), // Mengambil nama dari session
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal' => date('Y-m-d'), // Mengambil tanggal sekarang
                'enum' => 'Iya',
            );

            $insert_id = $this->diskusi_model->tambah_topik($data);

            if ($insert_id) {
                // Jika berhasil disimpan, lakukan sesuatu (misalnya: tampilkan pesan sukses)
                redirect('diskusi'); // Ganti dengan URL yang sesuai
            }
        }

        $this->load->view('diskusi/tambah_topik'); // Memuat halaman tambah_topik.php
    }

    public function lihat_topik($id_topik) {
        $data['topik'] = $this->diskusi_model->get_topik_by_id($id_topik);
        $data['komentars'] = $this->diskusi_model->get_komentars_by_topik_id($id_topik);
    
        $this->load->view('diskusi/lihat_topik', $data);
    }
    
    public function tambah() {
        if ($this->input->post()) {
            $data = array(
                'komentar' => $this->input->post('komentar'),
                'tanggal' => date('Y-m-d'), // Menggunakan format tanggal saja
                'id_topik' => $this->input->post('id_topik'),
                'nama' => $this->session->userdata('nama_lengkap'),
                'status' => 'Iya'
            );

            $this->diskusi_model->tambah_komentar($data);
            redirect('diskusi/lihat_topik/' . $this->input->post('id_topik'));
        }
    }

    public function setujui_topik($id_topik) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $this->load->model('diskusi_model');

        // Panggil fungsi model untuk mengubah status topik menjadi "Iya"
        $result = $this->diskusi_model->update_status_topik($id_topik, 'Iya');

        if ($result) {
            $this->session->set_flashdata('success', 'Topik berhasil Disetujui.');
            redirect('diskusi/kelola_diskusi'); // Ganti dengan URL yang sesuai
        } else {
            // Handle error jika perubahan status gagal
        }
    }

    public function hapus_topik($id_topik) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $this->load->model('diskusi_model');

        // Panggil fungsi model untuk menghapus topik & komentar
        $this->diskusi_model->hapus_topik($id_topik);
        $this->diskusi_model->hapus_komentar_by_topik($id_topik);

        redirect('diskusi/kelola_diskusi'); // Ganti dengan URL yang sesuai
    }

    public function nonaktifkan_topik($id_topik) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $this->load->model('diskusi_model');

        // Panggil fungsi model untuk mengubah status topik menjadi "Iya"
        $result = $this->diskusi_model->update_status_topik($id_topik, 'Tidak');

        if ($result) {
            $this->session->set_flashdata('success_nonaktif', 'Topik berhasil Dinonaktifkan!.');
            redirect('diskusi/kelola_diskusi'); // Ganti dengan URL yang sesuai
        } else {
            // Handle error jika perubahan status gagal
        }
    
    }

    public function setujui_komentar($id_komentar) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $this->load->model('diskusi_model');

        // Panggil fungsi model untuk mengubah status topik menjadi "Iya"
        $result = $this->diskusi_model->update_status_komentar($id_komentar, 'Iya');

        if ($result) {
            redirect('diskusi/kelola_komentar'); // Ganti dengan URL yang sesuai
        } else {
            // Handle error jika perubahan status gagal
        }
    }

    public function hapus_komentar($id_komentar) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $this->load->model('diskusi_model');

        $this->diskusi_model->hapus_komentar($id_komentar);
        $this->session->set_flashdata('success_hapus', 'Topik berhasil Disetujui.');
        
        redirect('diskusi/kelola_komentar'); 
    
    }

    public function nonaktifkan_komentar($id_komentar) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $this->load->model('diskusi_model');

        // Panggil fungsi model untuk mengubah status topik menjadi "Iya"
        $result = $this->diskusi_model->update_status_komentar($id_komentar, 'Tidak');

        if ($result) {
            redirect('diskusi/kelola_komentar'); // Ganti dengan URL yang sesuai
        } else {
            // Handle error jika perubahan status gagal
        }
    
    }

    // Untuk Pengajuan 
    public function pengajuan() {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $jumlahBaris = $this->diskusi_model->countRowsWithEnumTunggu();
        $data['jumlahBaris'] = $jumlahBaris;
        $enum = array('tunggu');
        $data['topik'] = $this->diskusi_model->get_daftar_pengajuan($enum);
    
        $this->load->view('diskusi/Kelola_diskusi_pengajuan', $data);
    
    }

    public function setujui_pengajuan($id_topik) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $this->load->model('diskusi_model');

        // Panggil fungsi model untuk mengubah status topik menjadi "Iya"
        $result = $this->diskusi_model->update_status_topik($id_topik, 'Iya');

        if ($result) {
            $this->session->set_flashdata('success', 'Topik berhasil Disetujui.');
            redirect('diskusi/kelola_diskusi'); // Ganti dengan URL yang sesuai
        } else {
            // Handle error jika perubahan status gagal
        }
    }

    public function hapus_pengajuan($id_topik) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $this->load->model('diskusi_model');

        // Panggil fungsi model untuk menghapus topik
        $result = $this->diskusi_model->hapus_topik($id_topik);

        if ($result) {
            redirect('diskusi/kelola_diskusi'); // Ganti dengan URL yang sesuai
        } else {
            // Handle error jika penghapusan gagal
        }
    }
}
?>