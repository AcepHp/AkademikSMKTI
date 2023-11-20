<?php
class Guru extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Datasiswa_model');
        $this->load->model('Jurusan_model');
        $this->load->model('Kelas_model');
        $this->load->model('Guru_model');
        $this->load->model('Nilai_model');
        $this->load->model('VMT_Model');
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
        $get_idguru = $this->Guru_model->get_ID_Guru($this->session->userdata('NIP'));
        $data['muridcount'] = $this->Guru_model->get_total_murid($get_idguru, $id_tahun);
        $data['kelascount'] = $this->Guru_model->get_all_kelas($get_idguru, $id_tahun, $id_semester);
        $data['materiCount'] = $this->Guru_model->get_all_materi($get_idguru, $id_tahun, $id_semester);
        $data['vmt'] = $this->VMT_Model->get_all()->row();
        $this->load->view('dashboard/Guru_dashboard',$data);
    }

    
}