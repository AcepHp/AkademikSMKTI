<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Jurusan_model');
        $this->load->model('Kepsek_Model');
        $this->load->model('Info_Model');
        $this->load->model('Berita_Model');
    }

    public function index() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['jurusan_list'] = $this->Jurusan_model->get_all_jurusan();
        $this->load->view('admin/data_master/jurusan/data_jurusan', $data);
    }

    public function tambah_jurusan() {
        if ($this->input->post('submit')) {
            if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
                redirect('auth');
            }
            $data = array(
                'kode_jurusan' => $this->input->post('kode_jurusan'),
                'nama_jurusan' => $this->input->post('nama_jurusan')
            );

            if ($this->Jurusan_model->insert_jurusan($data)) {
                redirect('jurusan/index');
            } else {
                // Handle error
            }
        }

        $this->load->view('admin/data_master/jurusan/tambah_jurusan');
    }

    public function edit_jurusan($kode) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['jurusan'] = $this->Jurusan_model->get_jurusan_by_kode($kode);

        if ($this->input->post('submit')) {
            $updated_data = array(
                'nama_jurusan' => $this->input->post('nama_jurusan')
            );

            if ($this->Jurusan_model->update_jurusan($kode, $updated_data)) {
                redirect('jurusan/index');
            } else {
                // Handle error
            }
        }

        $this->load->view('admin/data_master/jurusan/edit_jurusan', $data);
    }

    public function delete_jurusan($kode) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        if ($this->Jurusan_model->delete_jurusan($kode)) {
            redirect('jurusan/index');
        } else {
            // Handle error
        }
    }
    
    // public function DKV() {
    //     $this->load->view('dashboard/Jurusan/DKV');
    // }

    public function Animasi($id) {
    $data['jurusan']=$this->Jurusan_model->getjurusan();
    $data['jurusan2'] = $this->Jurusan_model->getjurusanByid($id)->row();
    $data['berita']=$this->Berita_Model->getberita();
    $data['kepsek']=$this->Kepsek_Model->getkepsek()->row();
    $data['info']=$this->Info_Model->getinfo();
    $this->load->view('dashboard/Jurusan/Animasi', $data);
    }   

    // public function TKJT() {
    //     $this->load->view('dashboard/Jurusan/TKJT');
    // }

    // public function PPLG() {
    //     $this->load->view('dashboard/Jurusan/PPLG');
    // }

    // public function TJAT() {
    //     $this->load->view('dashboard/Jurusan/TJAT');
    // }

    // public function MPLB() {
    //     $this->load->view('dashboard/Jurusan/MPLB');
    // }
}