<?php
class K_Konten extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Slide_Model');
        $this->load->model('Info_Model');
        $this->load->model('VMT_Model');
        $this->load->model('Kepsek_Model');
        $this->load->model('Berita_Model');
        $this->load->model('Acara_Model');
        $this->load->model('Video_Model');
        $this->load->model('Jurusan_Model');
        $this->load->model('Manajemen_Model');
        $this->load->model('PPDB_Model');
        $this->load->model('Galeri_Model');
        $this->load->library('session');
    }

    //slideshow
    public function slideshow() {
        if ($this->session->userdata('role') !== 'Admin') {
            redirect('auth');
        }
        $data['slide']=$this->Slide_Model->getslide();
        $this->load->view('admin/admin_konten/slideshow',$data);
    }

    public function tambah_slide() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin') {
            redirect('auth');
        }
        $this->load->view('admin/admin_konten/tambah_slide');
    }

    public function edit_slide($id) {
        if ($this->session->userdata('role') !== 'Admin') {
            redirect('auth');
        }
        $data['slide']= $this->Slide_Model->getslidebyid($id)->row();
        $this->load->view('admin/admin_konten/edit_slide', $data);
    }

    public function prosestambahslide(){
        if ($this->session->userdata('role') !== 'Admin') {
            redirect('auth');
        }
        if($this->Slide_Model->tambahslide()){
            $this->session->set_flashdata("error", "<div class='alert alert-danger' role='alert'>Gunakan format gambar yang sesuai (.gif/.jpg/.png) !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            $this->session->set_flashdata("success_tambah_silder", "<div class='alert alert-success' role='alert'>Gambar Slide berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            redirect('K_Konten/slideshow','refresh');

        } else {
            redirect('K_Konten/tambah_slide','refresh');
            
        }
    }

    public function proseseditslide($id){
        if ($this->session->userdata('role') !== 'Admin') {
            redirect('auth');
        }

        if($this->Slide_Model->editslide($id)){
            $this->session->set_flashdata("success_edit_silder", "<div class='alert alert-success' role='alert'>Gambar Slide berhasil diedit !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            redirect('K_Konten/slideshow','refresh');

        } else {
            redirect('K_Konten/slideshow','refresh');
            
        }
    }

    public function delete_slide($id) {
        if ($this->session->userdata('role') !== 'Admin') {
            redirect('auth');
        }
        if ($this->Slide_Model->delete_slide($id)) {
            redirect('K_Konten/slideshow','refresh');
        } else {
            
        }
    } 

    //INFO
    public function info() {
        $data['info']=$this->Info_Model->getinfo();
        $this->load->view('admin/admin_konten/info',$data);
    }

    public function tambah_info() {
        $this->load->view('admin/admin_konten/tambah_info');
    }

    public function edit_info($id) {
        $data['info']= $this->Info_Model->getinfobyid($id)->row();
        $this->load->view('admin/admin_konten/edit_info', $data);
    }


    public function prosestambahinfo(){
        if($this->Info_Model->tambahinfo()){
            redirect('K_Konten/info','refresh');

        } else {
            
            redirect('K_Konten/tambah_info','refresh');
            
        }
    }

    public function proseseditinfo($id){
        if($this->Info_Model->editinfo($id)){
            redirect('K_Konten/info','refresh');

        } else {
            redirect('K_Konten/info','refresh');
            
        }
    }

    public function detailinfo($id){
        $data['info']=$this->Info_Model->getinfobyid($id)->row();
        $this->load->view('dashboard/Info/kenapaTI',$data);
    }

    public function delete_info($id) {
        if ($this->Info_Model->delete_info($id)) {
            redirect('K_Konten/info','refresh');
        } else {
            // Handle error
        }
    } 

    //Visi, Misi & Tujuan
    public function vmt() {
        $data['vmt']=$this->VMT_Model->getvmt();
        $this->load->view('admin/admin_konten/vmt',$data);
    }
    
    // public function tambah_vmt() {
    //     $this->load->view('admin/admin_konten/tambah_vmt');
    // }

    // public function prosestambahvmt(){
    //     if($this->VMT_Model->tambahvmt()){
    //         redirect('K_Konten/vmt','refresh');

    //     } else {
            
    //         redirect('K_Konten/tambah_vmt','refresh');
            
    //     }
    // }

    public function edit_vmt($id) {
        $data['vmt']= $this->VMT_Model->getvmtbyid($id)->row();
        $this->load->view('admin/admin_konten/edit_vmt', $data);
    }

    public function proseseditvmt($id){
        if($this->VMT_Model->editvmt($id)){
            redirect('K_Konten/vmt','refresh');

        } else {
            redirect('K_Konten/vmt','refresh');
            
        }
    }

    public function delete_vmt($id) {
        if ($this->VMT_Model->delete_vmt($id)) {
            redirect('K_Konten/vmt','refresh');
        } else {
            // Handle error
        }
    } 

    //Kepala Sekolah
    public function kepsek() {
        $data['kepsek']=$this->Kepsek_Model->getkepsek();
        $this->load->view('admin/admin_konten/kepsek',$data);
    }
    
    public function tambah_kepsek() {
        $this->load->view('admin/admin_konten/tambah_kepsek');
    }

    public function edit_kepsek($id) {
        $data['kepsek']= $this->Kepsek_Model->getkepsekbyid($id)->row();
        $this->load->view('admin/admin_konten/edit_kepsek', $data);
    }


    public function prosestambahkepsek(){
        if($this->Kepsek_Model->tambahkepsek()){
            redirect('K_Konten/kepsek','refresh');

        } else {
            
            redirect('K_Konten/tambah_kepsek','refresh');
            
        }
    }

    public function proseseditkepsek($id){
        if($this->Kepsek_Model->editkepsek($id)){
            redirect('K_Konten/kepsek','refresh');

        } else {
            redirect('K_Konten/kepsek','refresh');
            
        }
    }

    public function delete_kepsek($id) {
        if ($this->Kepsek_Model->delete_kepsek($id)) {
            redirect('K_Konten/kepsek','refresh');
        } else {
            // Handle error
        }
    } 

    //Berita
    public function berita() {
        $data['berita']=$this->Berita_Model->getberita();
        $this->load->view('admin/admin_konten/berita',$data);
    }
    
    public function tambah_berita() {
        $this->load->view('admin/admin_konten/tambah_berita');
    }

    public function edit_berita($id) {
        $data['berita']= $this->Berita_Model->getberitabyid($id)->row();
        $this->load->view('admin/admin_konten/edit_berita', $data);
    }


    public function prosestambahberita(){
        if($this->Berita_Model->tambahberita()){
            redirect('K_Konten/berita','refresh');

        } else {
            
            redirect('K_Konten/tambah_berita','refresh');
            
        }
    }

    public function proseseditberita($id){
        if($this->Berita_Model->editberita($id)){
            redirect('K_Konten/berita','refresh');

        } else {
            redirect('K_Konten/berita','refresh');
            
        }
    }

    public function delete_berita($id) {
        if ($this->Berita_Model->delete_berita($id)) {
            redirect('K_Konten/berita','refresh');
        } else {
            // Handle error
        }
    } 

    //Acara
    public function acara() {
        $data['acara']=$this->Acara_Model->getacara();
        $this->load->view('admin/admin_konten/acara',$data);
    }
    
    public function tambah_acara() {
        $this->load->view('admin/admin_konten/tambah_acara');
    }

    public function edit_acara($id) {
        $data['acara']= $this->Acara_Model->getacarabyid($id)->row();
        $this->load->view('admin/admin_konten/edit_acara', $data);
    }


    public function prosestambahacara(){
        if($this->Acara_Model->tambahacara()){
            redirect('K_Konten/acara','refresh');

        } else {
            
            redirect('K_Konten/tambah_acara','refresh');
            
        }
    }

    public function proseseditacara($id){
        if($this->Acara_Model->editacara($id)){
            redirect('K_Konten/acara','refresh');

        } else {
            redirect('K_Konten/acara','refresh');
            
        }
    }

    public function delete_acara($id) {
        if ($this->Acara_Model->delete_acara($id)) {
            redirect('K_Konten/acara','refresh');
        } else {
            // Handle error
        }
    } 

    //Video Sekolah
    public function video() {
        $data['video']=$this->Video_Model->getvideo();
        $this->load->view('admin/admin_konten/video_sekolah',$data);
    }
    
    public function tambah_video() {
        $this->load->view('admin/admin_konten/tambah_video');
    }

    public function edit_video($id) {
        $data['video']= $this->Video_Model->getvideobyid($id)->row();
        $this->load->view('admin/admin_konten/edit_video', $data);
    }


    public function prosestambahvideo(){
        if($this->Video_Model->tambahvideo()){
            redirect('K_Konten/video','refresh');

        } else {
            
            redirect('K_Konten/tambah_video','refresh');
            
        }
    }

    public function proseseditvideo($id){
        if($this->Video_Model->editvideo($id)){
            redirect('K_Konten/video','refresh');

        } else {
            redirect('K_Konten/video','refresh');
            
        }
    }

    public function delete_video($id) {
        if ($this->Video_Model->delete_video($id)) {
            redirect('K_Konten/video','refresh');
        } else {
            // Handle error
        }
    } 

    //Jurusan
    public function jurusan() {
        $data['jurusan_admin']=$this->Jurusan_Model->getjurusan();
        $this->load->view('admin/admin_konten/jurusan',$data);
    }
    
    public function tambah_jurusan() {
        $this->load->view('admin/admin_konten/tambah_jurusan');
    }

    public function edit_jurusan($id) {
        $data['jurusan_admin']= $this->Jurusan_Model->getjurusanbyid($id)->row();
        $this->load->view('admin/admin_konten/edit_jurusan', $data);
    }


    public function prosestambahjurusan(){
        if($this->Jurusan_Model->tambahjurusan()){
            redirect('K_Konten/jurusan','refresh');

        } else {
            
            redirect('K_Konten/tambah_jurusan','refresh');
            
        }
    }

    public function proseseditjurusan($id){
        if($this->Jurusan_Model->editjurusan($id)){
            redirect('K_Konten/jurusan','refresh');

        } else {
            redirect('K_Konten/jurusan','refresh');
            
        }
    }

    public function delete_jurusan($id) {
        if ($this->Jurusan_Model->delete_jurusanbyadmin($id)) {
            redirect('K_Konten/jurusan','refresh');
        } else {
            // Handle error
        }
    } 


    //Manajemen
    public function manajemen() {
        $data['manajemen']=$this->Manajemen_Model->getmanajemen();
        $this->load->view('admin/admin_konten/manajemen',$data);
    }

    public function tambah_manajemen() {
        $this->load->view('admin/admin_konten/tambah_manajemen');
    }

    public function prosestambahmanajemen(){
        if($this->Manajemen_Model->tambahmanajemen()){
            redirect('K_Konten/manajemen','refresh');

        } else {
            
            redirect('K_Konten/tambah_manajemen','refresh');
            
        }
    }

    public function edit_manajemen($id) {
        $data['manajemen']= $this->Manajemen_Model->getmanajemenbyid($id)->row();
        $this->load->view('admin/admin_konten/edit_manajemen', $data);
    }

    public function proseseditmanajemen($id){
        if($this->Manajemen_Model->editmanajemen($id)){
            redirect('K_Konten/manajemen','refresh');

        } else {
            redirect('K_Konten/manajemen','refresh');
            
        }
    }

    public function delete_manajemen($id) {
        if ($this->Manajemen_Model->delete_manajemen($id)) {
            redirect('K_Konten/manajemen','refresh');
        } else {
            // Handle error
        }
    } 

    //PPDB
    public function ppdb() {
        $data['ppdb_admin']=$this->PPDB_Model->getppdb();
        $this->load->view('admin/admin_konten/ppdb',$data);
    }
    
    public function tambah_ppdb() {
        $this->load->view('admin/admin_konten/tambah_ppdb');
    }

    public function edit_ppdb($id) {
        $data['ppdb_admin']= $this->PPDB_Model->getppdbbyid($id)->row();
        $this->load->view('admin/admin_konten/edit_ppdb', $data);
    }


    public function prosestambahppdb(){
        if($this->PPDB_Model->tambahppdb()){
            redirect('K_Konten/ppdb','refresh');

        } else {
            
            redirect('K_Konten/tambah_ppdb','refresh');
            
        }
    }

    public function proseseditppdb($id){
        if($this->PPDB_Model->editppdb($id)){
            redirect('K_Konten/ppdb','refresh');

        } else {
            redirect('K_Konten/ppdb','refresh');
            
        }
    }

    public function delete_ppdb($id) {
        if ($this->PPDB_Model->delete_ppdb($id)) {
            redirect('K_Konten/ppdb','refresh');
        } else {
            // Handle error
        }
    } 

    //Galeri
    public function galeri() {
        $data['galeri']=$this->Galeri_Model->getgaleri();
        $this->load->view('admin/admin_konten/galeri',$data);
    }

    public function tambah_galeri() {
        $this->load->view('admin/admin_konten/tambah_galeri');
    }

    public function edit_galeri($id) {
        $data['galeri']= $this->Galeri_Model->getgaleribyid($id)->row();
        $this->load->view('admin/admin_konten/edit_galeri', $data);
    }


    public function prosestambahgaleri(){
        if($this->Galeri_Model->tambahgaleri()){
            redirect('K_Konten/galeri','refresh');

        } else {
            
            redirect('K_Konten/tambah_galeri','refresh');
            
        }
    }

    public function proseseditgaleri($id){
        if($this->Galeri_Model->editgaleri($id)){
            redirect('K_Konten/galeri','refresh');

        } else {
            redirect('K_Konten/galeri','refresh');
            
        }
    }

    public function delete_galeri($id) {
        if ($this->Galeri_Model->delete_galeri($id)) {
            redirect('K_Konten/galeri','refresh');
        } else {
            // Handle error
        }
    } 

}