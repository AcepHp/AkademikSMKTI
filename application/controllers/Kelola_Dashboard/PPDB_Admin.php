<?php
class PPDB_Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('PPDB_Model');
    }

    public function ppdb() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['ppdb_admin']=$this->PPDB_Model->getppdb();
        $this->load->view('admin/admin_konten/ppdb',$data);
    }
    
    public function tambah_ppdb() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $this->load->view('admin/admin_konten/tambah_ppdb');
    }

    public function edit_ppdb($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['ppdb_admin']= $this->PPDB_Model->getppdbbyid($id)->row();
        $this->load->view('admin/admin_konten/edit_ppdb', $data);
    }


    public function prosestambahppdb(){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->PPDB_Model->tambahppdb()){
            redirect('Kelola_Dashboard/PPDB_Admin/ppdb','refresh');

        } else {
            
            redirect('Kelola_Dashboard/PPDB_Admin/tambah_ppdb','refresh');
            
        }
    }

    public function proseseditppdb($id){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->PPDB_Model->editppdb($id)){
            redirect('Kelola_Dashboard/PPDB_Admin/ppdb','refresh');

        } else {
            redirect('Kelola_Dashboard/PPDB_Admin/ppdb','refresh');
            
        }
    }

    public function delete_ppdb($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if ($this->PPDB_Model->delete_ppdb($id)) {
            redirect('Kelola_Dashboard/PPDB_Admin/ppdb','refresh');
        } else {
            // Handle error
        }
    }

    
}