<?php
class Video extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Video_Model');
    }

    public function video() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['video']=$this->Video_Model->getvideo();
        $this->load->view('admin/admin_konten/video_sekolah', $data);
    }
    
    public function tambah_video() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $this->load->view('admin/admin_konten/tambah_video');
    }

    public function edit_video($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['video']= $this->Video_Model->getvideobyid($id)->row();
        $this->load->view('admin/admin_konten/edit_video', $data);
    }


    public function prosestambahvideo(){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Video_Model->tambahvideo()){
            redirect('Kelola_Dashboard/Video/video','refresh');

        } else {
            
            redirect('Kelola_Dashboard/Video/tambah_video','refresh');
            
        }
    }

    public function proseseditvideo($id){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Video_Model->editvideo($id)){
            redirect('Kelola_Dashboard/Video/video','refresh');

        } else {
            redirect('Kelola_Dashboard/Video/video','refresh');
            
        }
    }

    public function delete_video($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if ($this->Video_Model->delete_video($id)) {
            redirect('Kelola_Dashboard/Video/video','refresh');
        } else {
            // Handle error
        }
    }

    
}