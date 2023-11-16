<?php
class Berita extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Jurusan_model');
        $this->load->model('Berita_Model');
        $this->load->model('Kepsek_Model');
        $this->load->model('Info_Model');
    }

    public function index() {
        $data['jurusan']=$this->Jurusan_model->getjurusan();
        $data['berita']=$this->Berita_Model->getberita();
        $data['kepsek']=$this->Kepsek_Model->getkepsek()->row();
        $data['info']=$this->Info_Model->getinfo();
        $this->load->view('dashboard/Berita/berita', $data);
    }

    public function isi($id) {
        $data['jurusan']=$this->Jurusan_model->getjurusan();
        $data['berita_isi']=$this->Berita_Model->getberitabyid($id)->row();
        $data['berita']=$this->Berita_Model->getberita();
        $data['kepsek']=$this->Kepsek_Model->getkepsek()->row();
        $data['info']=$this->Info_Model->getinfo();
        $this->load->view('dashboard/Berita/isi_berita', $data);
    }
}