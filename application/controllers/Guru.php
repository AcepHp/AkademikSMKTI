<?php
class Guru extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Datasiswa_model');
        $this->load->model('Jurusan_model');
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');
    }

    public function index() {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }
        $this->load->view('dashboard/Guru_dashboard');
    }

    
}