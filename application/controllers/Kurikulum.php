<?php
class Kurikulum extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        // Pastikan hanya guru yang dapat mengakses dashboard ini
        if ($this->session->userdata('role') !== 'kurikulum') {
            redirect('auth');
        }

        $this->load->view('dashboard/Kurikulum_dashboard');
    }
}
