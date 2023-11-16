<?php
class Wali extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kelas_model'); // Memanggil model Kelas_model
        $this->load->model('Jurusan_model'); // Memanggil model Jurusan_model
        $this->load->model('Wali_model'); // Memanggil model Datasiswa_model
    }

    public function index() {
        $data['jurusan'] = $this->Jurusan_model->get_all_jurusan();
        $data['kelas'] = $this->Kelas_model->get_kelas();
        $data['wali'] = $this->Wali_model->wali();

        // Mengambil data siswa berdasarkan filter jika ada
        $kode_jurusan = $this->input->post('kode_jurusan');
        $id_kelas = $this->input->post('id_kelas');
        if (!empty($kode_jurusan) && !empty($id_kelas)) {
            $data['siswa'] = $this->Nilai_model->filter_data($kode_jurusan, $id_kelas);
        } else {
            $data['siswa'] = array(); // Jika tidak ada filter, set array kosong
        }

        $this->load->view('admin/tambah_wali', $data);
    }

    public function filter_data() {
        $kode_jurusan = $this->input->post('kode_jurusan');
        $id_kelas = $this->input->post('id_kelas');

        $data['siswa'] = $this->Nilai_model->filter_data($kode_jurusan, $id_kelas);

        // Mengembalikan data filter jurusan dan kelas ke view
        $data['jurusan'] = $this->Jurusan_model->get_all_jurusan();
        $data['kelas'] = $this->Kelas_model->get_kelas();

        $this->load->view('admin/filter_kelola_nilai', $data);
    }
}