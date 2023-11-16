<?php
class Jurusan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jurusan_model');
    }

    public function jurusan() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['jurusan_admin']=$this->Jurusan_model->getjurusan();
        $this->load->view('admin/admin_konten/jurusan', $data);
    }
    
    public function tambah_jurusan() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $this->load->view('admin/admin_konten/tambah_jurusan');
    }

    public function edit_jurusan($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['jurusan_admin']= $this->Jurusan_model->getjurusanbyid($id)->row();
        $this->load->view('admin/admin_konten/edit_jurusan', $data);
    }


    public function prosestambahjurusan(){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Jurusan_model->tambahjurusan()){
            redirect('Kelola_Dashboard/Jurusan/jurusan','refresh');

        } else {
            
            redirect('Kelola_Dashboard/Jurusan/tambah_jurusan','refresh');
            
        }
    }

    public function proseseditjurusan($id){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Jurusan_model->editjurusan($id)){
            redirect('Kelola_Dashboard/Jurusan/jurusan','refresh');

        } else {
            redirect('Kelola_Dashboard/Jurusan/jurusan','refresh');
            
        }
    }

    public function delete_jurusan($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if ($this->Jurusan_model->delete_jurusanbyadmin($id)) {
            redirect('Kelola_Dashboard/Jurusan/jurusan','refresh');
        } else {
            // Handle error
        }
    } 

    
}