<?php
class VMT extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('VMT_Model');
    }

    public function vmt() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['vmt']=$this->VMT_Model->getvmt();
        $this->load->view('admin/admin_konten/vmt',$data);
    }

    public function edit_vmt($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['vmt']= $this->VMT_Model->getvmtbyid($id)->row();
        $this->load->view('admin/admin_konten/edit_vmt', $data);
    }

    public function proseseditvmt($id){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->VMT_Model->editvmt($id)){
            redirect('Kelola_Dashboard/VMT/vmt','refresh');

        } else {
            redirect('Kelola_Dashboard/VMT/vmt','refresh');
            
        }
    }

    public function delete_vmt($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if ($this->VMT_Model->delete_vmt($id)) {
            redirect('Kelola_Dashboard/VMT/vmt','refresh');
        } else {
            // Handle error
        }
    } 
}