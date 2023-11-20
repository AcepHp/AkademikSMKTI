<?php
class Guru extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Datasiswa_model');
        $this->load->model('Jurusan_model');
        $this->load->model('Kelas_model');
        $this->load->model('Guru_model');
        $this->load->model('Nilai_model');
        $this->load->library('form_validation');
    }

    public function index() {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }
        $tahun = $this->Nilai_model->get_tahun();
        $semester = $this->Nilai_model->get_semester();
    
        // Ambil nilai id_tahun dari hasil query tahun yang didapat
        $id_tahun = $tahun[0]->id_tahun; 
    
        // Ambil nilai id_semester dari hasil query semester yang didapat
        $id_semester = $semester[0]->id_semester; 

        $get_idguru = $this->Guru_model->get_NIP($this->session->userdata('NIP'));
        $materi_count = $this->Guru_model->get_all_materi($get_idguru,$id_tahun,$id_semester);
        $data['materi'] =  $materi_count;
        $this->load->view('dashboard/Guru_dashboard',$data);
    }

    
}