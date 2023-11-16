<?php
class Berita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_Model');
    }

    public function berita() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['berita']=$this->Berita_Model->getberita();
        $this->load->view('admin/admin_konten/berita',$data);
    }
    
    public function tambah_berita() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $this->load->view('admin/admin_konten/tambah_berita');
    }

    public function edit_berita($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['berita']= $this->Berita_Model->getberitabyid($id)->row();
        $this->load->view('admin/admin_konten/edit_berita', $data);
    }


    public function prosestambahberita(){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Berita_Model->tambahberita()){
            redirect('Kelola_Dashboard/Berita/berita','refresh');

        } else {
            
            redirect('Kelola_Dashboard/Berita/tambah_berita','refresh');
            
        }
    }

    public function proseseditberita($id){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Berita_Model->editberita($id)){
            redirect('Kelola_Dashboard/Berita/berita','refresh');

        } else {
            redirect('Kelola_Dashboard/Berita/berita','refresh');
            
        }
    }

    public function delete_berita($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if ($this->Berita_Model->delete_berita($id)) {
            redirect('Kelola_Dashboard/Berita/berita','refresh');
        } else {
            // Handle error
        }
    }

    
}