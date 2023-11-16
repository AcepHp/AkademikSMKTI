<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tingkatan_model');
    }

    public function index() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['tingkatan_list'] = $this->Tingkatan_model->get_all_tingkatan();
        $this->load->view('admin/data_master/Tingkatan/data_tingkatan', $data);
    }

    public function tambah_tingkatan() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        if ($this->input->post('submit')) {
            $data = array(
                'kode_tingkatan' => $this->input->post('kode_tingkatan'),
                'nama_tingkatan' => $this->input->post('nama_tingkatan')
            );

            if ($this->Tingkatan_model->insert_tingkatan($data)) {
                redirect('Tingkatan/index'); // Redirect ke halaman daftar tingkatan
            } else {
                // Handle error
            }
        }

        $this->load->view('admin/data_master/Tingkatan/tambah_tingkatan');
    }
    public function edit_tingkatan($kode_tingkatan) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['tingkatan'] = $this->Tingkatan_model->get_tingkatan_by_kode($kode_tingkatan);

        if ($this->input->post('submit')) {
            $updated_data = array(
                'nama_tingkatan' => $this->input->post('nama_tingkatan')
            );

            if ($this->Tingkatan_model->update_tingkatan($kode_tingkatan, $updated_data)) {
                redirect('Tingkatan/index'); // Redirect ke halaman daftar tingkatan
            } else {
                // Handle error
            }
        }

        $this->load->view('admin/data_master/Tingkatan/edit_tingkatan', $data);
    }
    public function delete_tingkatan($kode_tingkatan) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        if ($this->Tingkatan_model->delete_tingkatan($kode_tingkatan)) {
            redirect('tingkatan/index');
        } else {
            // Handle error
        }
    }
}