<?php
class Galeri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Galeri_Model');
    }

    public function galeri() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['galeri']=$this->Galeri_Model->getgaleri();
        $this->load->view('admin/admin_konten/galeri',$data);
    }

    public function tambah_galeri() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $this->load->view('admin/admin_konten/tambah_galeri');
    }

    public function edit_galeri($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['galeri']= $this->Galeri_Model->getgaleribyid($id)->row();
        $this->load->view('admin/admin_konten/edit_galeri', $data);
    }


    public function prosestambahgaleri(){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Galeri_Model->tambahgaleri()){
            redirect('Kelola_Dashboard/Galeri/galeri','refresh');

        } else {
            
            redirect('Kelola_Dashboard/Galeri/tambah_galeri','refresh');
            
        }
    }

    public function proseseditgaleri($id){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Galeri_Model->editgaleri($id)){
            redirect('Kelola_Dashboard/Galeri/galeri');

        } else {
            redirect('Kelola_Dashboard/Galeri/galeri');
            
        }
    }

    public function delete_galeri($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if ($this->Galeri_Model->delete_galeri($id)) {
            redirect('Kelola_Dashboard/Galeri/galeri','refresh');
        } else {
            // Handle error
        }
    }

    
}