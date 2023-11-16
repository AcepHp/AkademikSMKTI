<?php
class Slide extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Slide_Model');
    }

    public function slideshow() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['slide']=$this->Slide_Model->getslide();
        $this->load->view('admin/admin_konten/slideshow',$data);
    }

    public function tambah_slide() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $this->load->view('admin/admin_konten/tambah_slide');
    }

    public function edit_slide($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $data['slide']= $this->Slide_Model->getslidebyid($id)->row();
        $this->load->view('admin/admin_konten/edit_slide', $data);
    }

    public function prosestambahslide(){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->Slide_Model->tambahslide()){
            $this->session->set_flashdata("error", "<div class='alert alert-danger' role='alert'>Gunakan format gambar yang sesuai (.gif/.jpg/.png) !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            $this->session->set_flashdata("success_tambah_silder", "<div class='alert alert-success' role='alert'>Gambar Slide berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            redirect('Kelola_Dashboard/Slide/slideshow','refresh');

        } else {
            redirect('Kelola_Dashboard/Slide/tambah_slide','refresh');  
        }
    }

    public function proseseditslide($id){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }

        if($this->Slide_Model->editslide($id)){
            $this->session->set_flashdata("success_edit_silder", "<div class='alert alert-success' role='alert'>Gambar Slide berhasil diedit !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            redirect('Kelola_Dashboard/Slide/slideshow','refresh');

        } else {
            redirect('Kelola_Dashboard/Slide/slideshow','refresh');
            
        }
    }

    public function delete_slide($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if ($this->Slide_Model->delete_slide($id)) {
            redirect('Kelola_Dashboard/Slide/slideshow','refresh');
        } else {
            
        }
    } 
}