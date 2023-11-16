<?php
class Guru_profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation'); // Tambahkan ini
        $this->load->model('Guru_profilemodel');
    }

    public function index() {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }

        if ($this->input->method() === 'post') {
            // Jika ada pembaruan foto, panggil fungsi update_photo()
            $this->update_photo();
        }


        $data['guru'] = $this->Guru_profilemodel->get_guru_data($this->session->userdata('NIP'));
        $this->load->view('Guru/Setting_profile/Setting_profile', $data);
    }

    public function change_password() {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }

        
    }

    public function update_photo() {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }
    
        if (!empty($_FILES['uploadPhoto']['name'])) {
            $NIP = $this->session->userdata('NIP');
            $photoData = file_get_contents($_FILES['uploadPhoto']['tmp_name']);
            
            $this->Guru_profilemodel->update_photo($NIP, $photoData);
            $response['success'] = true;
    
            // Update session foto dengan data yang baru
            $updatedGuruData = $this->Guru_profilemodel->get_guru_data_NIP($NIP);
            $this->session->set_userdata('Foto', $updatedGuruData->Foto);
            redirect('Guru_profile/index');
        } else {
            $response['success'] = false;
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }


    
}
?>