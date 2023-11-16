<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelolaKelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KelolaKelas_model');
        $this->load->model('Kelas_model'); // Memanggil model Kelas_model
        $this->load->model('Jurusan_model'); // Memanggil model Jurusan_model
        $this->load->model('Tingkatan_model');
        $this->load->library('user_agent');
    }

    public function index()
    {
        // Mendapatkan data siswa berdasarkan filter jika ada
        $kode_jurusan = $this->input->post('kode_jurusan'); // Ganti 'kode_jurusan' sesuai dengan nama input pada form
        $kode_tingkatan = $this->input->post('kode_tingkatan'); // Ganti 'kode_tingkatan' sesuai dengan nama input pada form
        $id_kelas = $this->input->post('id_kelas');
        $id_tahun = $this->input->post('id_tahun'); // Tambahkan ini untuk mendapatkan tahun akademik
        $nama_kelas = $this->KelolaKelas_model->get_nama_kelas_by_id($id_kelas);

        $data['tahun'] = $this->KelolaKelas_model->get_all_tahun_akademik();
        $tahun_akademik_aktif_id = $this->KelolaKelas_model->get_tahun_akademik_aktif_id();

        if (!empty($kode_jurusan) && !empty($kode_tingkatan) && !empty($id_kelas) && !empty($id_tahun)) {
            $data['siswa'] = $this->KelolaKelas_model->get_siswa_by_jurusan_kelas_tahun($kode_jurusan, $kode_tingkatan, $id_kelas, $id_tahun);
        } else {
            $data['siswa'] = array(); // Jika tidak ada filter, set array kosong
        }

        $data['id_kelas'] = $id_kelas; // Menambahkan id_kelas ke dalam data
        $data['kode_jurusan'] = $kode_jurusan; // Pass kode_jurusan to the view
        $data['id_tahun'] = $id_tahun; // Tambahkan id_tahun ke dalam data
        $data['nama_kelas'] = $nama_kelas;
        $data['tahun_akademik_aktif_id'] = $tahun_akademik_aktif_id;

        // Anda mungkin masih perlu mendapatkan data jurusan dan tingkatan dari model jika diperlukan
        $data['jurusan'] = $this->Jurusan_model->get_all_jurusan();
        $data['tingkatan'] = $this->Tingkatan_model->get_all_tingkatan();

        $this->load->view('Admin/KelolaKelas/kelola_kelas', $data);
    }



    public function cari_data()
    {
        $kode_jurusan = $this->input->get('kode_jurusan');
        $kode_tingkatan = $this->input->get('kode_tingkatan');
        $id_kelas = $this->input->get('id_kelas');
        $id_tahun = $this->input->get('id_tahun');
        $nama_kelas = $this->KelolaKelas_model->get_nama_kelas_by_id($id_kelas);

        // Mendapatkan ID tahun akademik aktif
        $data['tahun'] = $this->KelolaKelas_model->get_all_tahun_akademik();
        $tahun_akademik_aktif_id = $this->KelolaKelas_model->get_tahun_akademik_aktif_id();

        if (!empty($tahun_akademik_aktif_id)) {
            // Menggunakan kode_jurusan, kode_tingkatan, dan id_kelas sebagai filter
            $data['siswa'] = $this->KelolaKelas_model->get_siswa_by_jurusan_kelas_tahun($kode_jurusan, $kode_tingkatan, $id_kelas, $tahun_akademik_aktif_id);
        } else {
            $data['siswa'] = array();
        }

        // Mengirim data filter jurusan, tingkatan, dan kelas ke view
        $data['jurusan'] = $this->Jurusan_model->get_all_jurusan();
        $data['tingkatan'] = $this->Tingkatan_model->get_all_tingkatan();
        $data['selected_jurusan'] = $kode_jurusan;
        $data['selected_tingkatan'] = $kode_tingkatan;
        $data['tahun_akademik_aktif_id'] = $tahun_akademik_aktif_id;


        // Menambahkan id_kelas, kode_jurusan, id_tahun, dan kode_tingkatan ke dalam data
        $data['id_kelas'] = $id_kelas;
        $data['kode_jurusan'] = $kode_jurusan;
        $data['id_tahun'] = $tahun_akademik_aktif_id;
        $data['kode_tingkatan'] = $kode_tingkatan;
        $data['nama_kelas'] = $nama_kelas;

        // Menyaring kelas berdasarkan jurusan dan tingkatan yang dipilih
        $data['kelas'] = $this->KelolaKelas_model->get_kelas_by_jurusan_tingkatan($kode_jurusan, $kode_tingkatan);

        $this->load->view('Admin/KelolaKelas/kelola_kelas', $data);
    }



    public function get_kelas_by_jurusan()
    {
        $kode_jurusan = $this->input->post('kode_jurusan');
        $kode_tingkatan = $this->input->post('kode_tingkatan'); // Tambahkan ini
        $kelas = $this->Kelas_model->get_kelas_by_jurusan_tingkatan($kode_jurusan, $kode_tingkatan); // Gantilah fungsi ini sesuai dengan model Anda

        $kelas_dropdown = array();
        foreach ($kelas as $row) {
            $kelas_dropdown[$row->id_kelas] = $row->nama_kelas;
        }

        echo json_encode($kelas_dropdown);
    }

    public function tambah_siswa_kelas($id_kelas, $kode_jurusan)
    {
        // Load the KelolaKelas_model
        $this->load->model('KelolaKelas_model');

        // Get the active academic year ID and level code for the class
        $id_tahun = $this->KelolaKelas_model->get_tahun_akademik_aktif_id();
        $kode_tingkatan = $this->KelolaKelas_model->get_kode_tingkatan_by_id_kelas($id_kelas);

        // Get the ID of kelola_kelas
        $id_kelola_kelas = $this->KelolaKelas_model->get_id_kelola_kelas($id_kelas, $kode_jurusan);

        // Get the class name, department name, academic year, and level name
        $nama_kelas = $this->KelolaKelas_model->get_nama_kelas_by_id($id_kelas);
        $nama_jurusan = $this->KelolaKelas_model->get_nama_jurusan_by_kode($kode_jurusan);
        $tahun_akademik = $this->KelolaKelas_model->get_tahun_akademik_by_id($id_tahun);
        $nama_tingkatan = $this->KelolaKelas_model->get_nama_tingkatan_by_kode($kode_tingkatan);

        // Get the list of students for the class
        $siswa = $this->KelolaKelas_model->get_siswa_tidak_di_kelas($id_kelas);

        // Pass the data to the view
        $data = array(
            'id_kelas' => $id_kelas,
            'kode_jurusan' => $kode_jurusan,
            'id_tahun' => $id_tahun,
            'kode_tingkatan' => $kode_tingkatan,
            'id_kelola_kelas' => $id_kelola_kelas,
            'siswa' => $siswa,
            'nama_kelas' => $nama_kelas,
            'nama_jurusan' => $nama_jurusan,
            'tahun_akademik' => $tahun_akademik, // Add this line
            'nama_tingkatan' => $nama_tingkatan, // Add this line
        );

        // Load the view
        $this->load->view('Admin/KelolaKelas/tambah_siswa_kelas', $data);
    }





    public function tambah_data_siswa_ke_kelas()
    {
        // Ambil data yang dikirimkan melalui form
        $selected_siswa = $this->input->post('selected_siswa');
        $id_kelas = $this->input->post('id_kelas');
        $kode_jurusan = $this->input->post('kode_jurusan');
        $id_tahun = $this->input->post('id_tahun');
        $kode_tingkatan = $this->input->post('kode_tingkatan');

        // Panggil model untuk menyimpan data siswa ke dalam kelas
        $this->load->model('KelolaKelas_model');

        // Memanggil fungsi tambah_siswa_ke_kelas dari model dengan memberikan argumen yang sesuai
        $this->KelolaKelas_model->tambah_siswa_ke_kelas($selected_siswa, $id_kelas, $kode_jurusan, $id_tahun, $kode_tingkatan);

        // Setelah berhasil menambahkan siswa ke kelas, Anda bisa mengarahkan pengguna kembali ke halaman sebelumnya atau halaman lainnya.
        // Contoh: redirect ke halaman daftar siswa dalam kelas
        redirect('kelolakelas/index');
    }
    public function pindah_kelas($nisn)
    {
        $id_kelas_baru = $this->input->post('id_kelas');

        // Mengambil data siswa berdasarkan NISN
        $siswa = $this->KelolaKelas_model->get_siswa_by_nisn($nisn);

        if ($siswa) {
            // Mengupdate kelas siswa dengan kelas baru
            $this->KelolaKelas_model->update_kelas_siswa($nisn, $id_kelas_baru);

            // Redirect ke halaman yang sesuai setelah pemindahan kelas
            redirect($this->agent->referrer()); // Ganti dengan URL yang sesuai
        } else {
            // Tampilkan pesan kesalahan jika NISN tidak valid
            echo "NISN tidak valid atau siswa tidak ditemukan.";
        }
    }
    public function get_kelas_by_tingkatan()
    {
        $kode_tingkatan = $this->input->post('tingkatan');
        $kelas = $this->KelolaKelas_model->get_kelas_by_tingkatan($kode_tingkatan);

        if ($kelas === FALSE) {
            // Tambahkan penanganan kesalahan
            die($this->db->error());
        }

        // Mengembalikan data dalam format JSON
        echo json_encode($kelas);
    }
    public function get_kelas_by_jurusan_tingkatan()
    {
        $kode_jurusan = $this->input->post('kode_jurusan');
        $kode_tingkatan = $this->input->post('kode_tingkatan');

        $kelas = $this->KelolaKelas_model->get_kelas_by_jurusan_tingkatan($kode_jurusan, $kode_tingkatan);

        // Mengembalikan data dalam format JSON
        echo json_encode($kelas);
    }
    public function naik_kelas()
    {
        // Ambil data yang dikirimkan melalui form
        $current_kelas_id = $this->input->post('current_kelas_id');
        $tingkatan = $this->input->post('tingkatan');
        $next_kelas_id = $this->input->post('next_kelas_id');
        $tahun_akademik = $this->input->post('tahun_akademik');
        $selected_siswa = $this->input->post('selected_siswa');

        // Panggil model untuk memproses peningkatan kelas
        $this->load->model('KelolaKelas_model');

        // Memanggil fungsi naik_kelas dari model dengan memberikan argumen yang sesuai
        $this->KelolaKelas_model->naik_kelas($current_kelas_id, $tingkatan, $next_kelas_id, $tahun_akademik, $selected_siswa);

        // Setelah berhasil memproses peningkatan kelas, Anda bisa mengarahkan pengguna ke halaman yang sesuai.
        // Contoh: redirect ke halaman yang menampilkan daftar siswa di kelas yang baru.
        redirect('kelolakelas/index');
    }
}
