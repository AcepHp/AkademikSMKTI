<?php
class Acara extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Acara_Model');
    }

    public function acara() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['acara']=$this->Acara_Model->getacara();
        $this->load->view('admin/admin_konten/acara',$data);
    }
    
    public function tambah_acara() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $this->load->view('admin/admin_konten/tambah_acara');
    }

    public function edit_acara($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['acara']= $this->Acara_Model->getacarabyid($id)->row();
        $this->load->view('admin/admin_konten/edit_acara', $data);
    }


    public function prosestambahacara(){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Acara_Model->tambahacara()){
            redirect('Kelola_Dashboard/Acara/acara','refresh');

        } else {
            
            redirect('Kelola_Dashboard/Acara/tambah_acara','refresh');
            
        }
    }

    public function proseseditacara($id){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Acara_Model->editacara($id)){
            redirect('Kelola_Dashboard/Acara/acara','refresh');

        } else {
            redirect('Kelola_Dashboard/Acara/acara','refresh');
            
        }
    }

    public function delete_acara($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if ($this->Acara_Model->delete_acara($id)) {
            redirect('Kelola_Dashboard/Acara/acara','refresh');
        } else {
            // Handle error
        }
    }

}