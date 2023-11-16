<?php
class Info extends CI_Controller {
    public function kenapaTI() {
        $this->load->view('dashboard/Info/kenapaTI');
    }

    public function kompetensi() {
        $this->load->view('dashboard/Info/kompetensi');
    }

    public function ekstrakulikuler() {
        $this->load->view('dashboard/Info/ekstrakulikuler');
    }
}