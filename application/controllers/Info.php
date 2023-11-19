<?php
class Info extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Jurusan_model');
        $this->load->model('Info_Model');
    }

    public function index($id) {
        $data['jurusan']=$this->Jurusan_model->getjurusan();
        $data['info']=$this->Info_Model->getinfobyid($id)->row();
        $this->load->view('dashboard/Info/info', $data);
    }

    public function kompetensi() {
        $this->load->view('dashboard/Info/kompetensi');
    }

    public function ekstrakulikuler() {
        $this->load->view('dashboard/Info/ekstrakulikuler');
    }
}