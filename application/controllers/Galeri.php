<?php
class Galeri extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Jurusan_model');
        $this->load->model('Galeri_Model');
        $this->load->model('Video_Model');
    }
    public function FotoVideo() {
        $data['jurusan']=$this->Jurusan_model->getjurusan();
        $data['galeri']=$this->Galeri_Model->getgaleri();
        $data['video']=$this->Video_Model->getvideo();
        $this->load->view('dashboard/Galeri/galeri', $data);
    }
}