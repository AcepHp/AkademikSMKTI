<?php
class Info extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Info_Model');
        $this->load->model('Jurusan_model');
    }

    public function info() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['info']=$this->Info_Model->getinfo();
        $this->load->view('admin/admin_konten/info',$data);
    }

    public function tambah_info() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $this->load->view('admin/admin_konten/tambah_info');
    }

    public function edit_info($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['info']= $this->Info_Model->getinfobyid($id)->row();
        $this->load->view('admin/admin_konten/edit_info', $data);
    }


    public function prosestambahinfo(){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Info_Model->tambahinfo()){
            redirect('Kelola_Dashboard/Info/info','refresh');

        } else {
            
            redirect('Kelola_Dashboard/Info/tambah_info','refresh');
            
        }
    }

    public function proseseditinfo($id){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Info_Model->editinfo($id)){
            redirect('Kelola_Dashboard/Info/info','refresh');

        } else {
            redirect('Kelola_Dashboard/Info/info','refresh');
            
        }
    }

    public function detailinfo($id){
        $data['jurusan']=$this->Jurusan_model->getjurusan();
        $data['info']=$this->Info_Model->getinfobyid($id)->row();
        $this->load->view('dashboard/Info/kenapaTI', $data);
    }

    public function delete_info($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if ($this->Info_Model->delete_info($id)) {
            redirect('Kelola_Dashboard/Info/info','refresh');
        } else {
            // Handle error
        }
    } 
    
}