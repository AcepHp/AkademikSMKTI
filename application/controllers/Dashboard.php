<?php
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Slide_Model');
        $this->load->model('Info_Model');
        $this->load->model('VMT_Model');
        $this->load->model('Kepsek_Model');
        $this->load->model('Berita_Model');
        $this->load->model('Acara_Model');  
        $this->load->model('Video_Model');
        $this->load->model('Jurusan_model');
        $this->load->model('Manajemen_Model');
        $this->load->model('PPDB_Model');        

    }

    public function index() {
        $data['slide']=$this->Slide_Model->getslide();
        $data['info']=$this->Info_Model->getinfo();
        $data['vmt']=$this->VMT_Model->getvmt()->row();
        $data['kepsek']=$this->Kepsek_Model->getkepsek()->row();
        $data['berita']=$this->Berita_Model->getberita();
        $data['acara']=$this->Acara_Model->getacara();
        $data['video']=$this->Video_Model->getvideo();
        $data['jurusan']=$this->Jurusan_model->getjurusan();
        $data['manajemen']=$this->Manajemen_Model->getmanajemen();
        $data['popup']=$this->PPDB_Model->getpopup();
        $this->load->view('dashboard/index2',$data);
    }

}