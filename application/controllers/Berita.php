<?php
class Berita extends CI_Controller {
    public function index() {
        $this->load->view('dashboard/Berita/berita');
    }

    public function isi() {
        $this->load->view('dashboard/Berita/isi_berita');
    }
}