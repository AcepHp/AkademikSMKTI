<?php
class Mapel extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mapel_model');
        $this->load->model('Jurusan_model');
        $this->load->model('Kelas_model');
        $this->load->model('Tingkatan_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['mapel_list'] = $this->Mapel_model->get_mapel();
        $data['jurusan'] = $this->Mapel_model->get_all_jurusan();
        $data['tingkatan'] = $this->Mapel_model->get_tingkatan();

        // Load view untuk menampilkan data mata pelajaran
        $this->load->view('admin/data_master/mapel/data_mapel', $data);
    }
    public function tambah_mapel() {
        // Panggil model jurusan_model untuk mendapatkan daftar jurusan
        $data['jurusan_list'] = $this->Jurusan_model->get_all_jurusan();

        // Panggil model kelas_model untuk mendapatkan daftar kelas
        $data['tingkatan_list'] = $this->Tingkatan_model->get_all_tingkatan();

        $this->load->view('admin/data_master/Mapel/tambah_mapel', $data);
    }

    public function proses_tambah_mapel() {
        $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required');
        $this->form_validation->set_rules('capaian', 'Capaian Mata Pelajran', 'required');
        $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required');
        $this->form_validation->set_rules('kode_tingkatan', 'Kode Tingkatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_mapel();
        } else {
            $data = array(
                'nama_mapel' => $this->input->post('nama_mapel'),
                'capaian' => $this->input->post('capaian'),
                'kode_jurusan' => $this->input->post('kode_jurusan'),
                'kode_tingkatan' => $this->input->post('kode_tingkatan'),
                // Tambahkan field lainnya sesuai kebutuhan
            );

            $this->Mapel_model->tambah_mapel($data);
            $this->session->set_flashdata("success_tambah", "Data Mata Pelajaran berhasil ditambahkan!");
            redirect('Mapel');
        }
    }

    public function edit_mapel($id_mapel) {
        $data['mapel'] = $this->Mapel_model->get_mapel_by_id($id_mapel);
        $data['jurusan_list'] = $this->Jurusan_model->get_all_jurusan();
        $data['tingkatan_list'] = $this->Tingkatan_model->get_all_tingkatan();
        $this->load->view('admin/data_master/Mapel/edit_mapel', $data);
    }
    

    public function update_mapel($id_mapel) {
        $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required');
        $this->form_validation->set_rules('capaian', 'Capaian Mata Pelajaran', 'required');
        $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required');
        $this->form_validation->set_rules('kode_tingkatan', 'Kode Tingkatan', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->edit_mapel($id_mapel); // Tampilkan kembali form edit jika validasi gagal
        } else {
            $data = array(
                'nama_mapel' => $this->input->post('nama_mapel'),
                'capaian' => $this->input->post('capaian'),
                'kode_jurusan' => $this->input->post('kode_jurusan'),
                'kode_tingkatan' => $this->input->post('kode_tingkatan'),
                // Tambahkan field lainnya sesuai kebutuhan
            );
    
            $this->Mapel_model->update_mapel($id_mapel, $data);
            $this->session->set_flashdata("success_edit", "Data Mata Pelajaran berhasil diedit!");
            redirect('Mapel'); // Redirect ke halaman daftar mata pelajaran setelah pembaruan
        }
    }
    

    public function hapus_mapel($id_mapel) {
        $this->Mapel_model->hapus_mapel($id_mapel);
        $this->session->set_flashdata("success_hapus", "Data Mata Pelajaran berhasil ditambahkan!");
        redirect('Mapel');
    }

    public function get_tingkatan() {
    $tingkatan = $this->Mapel_model->get_tingkatan();

    $tingkatan_dropdown = array();
    foreach ($tingkatan as $row) {
        $tingkatan_dropdown[$row->kode_tingkatan] = $row->nama_tingkatan;
    }

    echo json_encode($tingkatan_dropdown);
}
    
    
}