<?php
class Kepsek extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kepsek_Model');
    }

    public function kepsek() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['kepsek']=$this->Kepsek_Model->getkepsek();
        $this->load->view('admin/admin_konten/kepsek',$data);
    }
    
    public function tambah_kepsek() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $this->load->view('admin/admin_konten/tambah_kepsek');
    }

    public function edit_kepsek($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['kepsek']= $this->Kepsek_Model->getkepsekbyid($id)->row();
        $this->load->view('admin/admin_konten/edit_kepsek', $data);
    }


    public function prosestambahkepsek(){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Kepsek_Model->tambahkepsek()){
            redirect('Kelola_Dashboard/Kepsek/kepsek','refresh');

        } else {
            
            redirect('Kelola_Dashboard/Kepsek/tambah_kepsek','refresh');
            
        }
    }

    public function proseseditkepsek($id){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Kepsek_Model->editkepsek($id)){
            redirect('Kelola_Dashboard/Kepsek/kepsek','refresh');

        } else {
            redirect('Kelola_Dashboard/Kepsek/edit_kepsek','refresh');
            
        }
    }

    public function delete_kepsek($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if ($this->Kepsek_Model->delete_kepsek($id)) {
            redirect('Kelola_Dashboard/Kepsek/kepsek','refresh');
        } else {
            // Handle error
        }
    }
    
}