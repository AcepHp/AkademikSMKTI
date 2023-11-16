<?php
class SuperAdmin extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        
        $this->load->view('superadmin/dashboard');
    }

}
    