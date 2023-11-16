<?php
class Manajemen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Manajemen_Model');
    }

    public function manajemen() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['manajemen']=$this->Manajemen_Model->getmanajemen();
        $this->load->view('admin/admin_konten/manajemen',$data);
    }

    public function tambah_manajemen() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $this->load->view('admin/admin_konten/tambah_manajemen');
    }

    public function prosestambahmanajemen(){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Manajemen_Model->tambahmanajemen()){
            redirect('Kelola_Dashboard/Manajemen/manajemen','refresh');

        } else {
            
            redirect('Kelola_Dashboard/Manajemen/tambah_manajemen','refresh');
            
        }
    }

    public function edit_manajemen($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['manajemen']= $this->Manajemen_Model->getmanajemenbyid($id)->row();
        $this->load->view('admin/admin_konten/edit_manajemen', $data);
    }

    public function proseseditmanajemen($id){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Manajemen_Model->editmanajemen($id)){
            redirect('Kelola_Dashboard/Manajemen/manajemen','refresh');

        } else {
            redirect('Kelola_Dashboard/Manajemen/manajemen','refresh');
            
        }
    }

    public function delete_manajemen($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if ($this->Manajemen_Model->delete_manajemen($id)) {
            redirect('Kelola_Dashboard/Manajemen/manajemen','refresh');
        } else {
            // Handle error
        }
    }

    
}