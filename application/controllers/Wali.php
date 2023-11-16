<?php
class Wali extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Wali_model');
        
    }

    public function index() {
        if ($this->session->userdata('role') !== 'Admin') {
            redirect('auth');
        }

        $data['wali'] = $this->Wali_model->get_wali();
        $this->load->view('admin/walikelas', $data);
    }

    public function tambah_wali() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = array(
                'Nama_Walikelas' => $this->input->post('nama_walikelas'),
                'Jenis_Kelamin' => $this->input->post('jenis_kelamin'),
                'Kelas' => $this->input->post('kelas'),
            );

            $this->Wali_model->tambah_wali($data);
            redirect('admin/walikelas');
        }

        $this->load->view('admin/tambah_wali');
    }

    public function edit_wali($id) {
        $data['wali'] = $this->Wali_model->get_single_wali($id);
    
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data_to_update = array(
                'Nama_Walikelas' => $this->input->post('nama_walikelas'),
                'Jenis_Kelamin' => $this->input->post('jenis_kelamin'),
                'Kelas' => $this->input->post('kelas'),
            );
    
            $this->Wali_model->update_wali($id, $data_to_update);
    
            redirect('admin/walikelas');
        }
    
        $this->load->view('admin/edit_wali', $data);
    }

    public function delete_wali($id) {
        if ($this->Wali_model->delete_wali($id)) {
            redirect('admin/walikelas');
        } else {
            // Handle error
        }
    }
}
?>
