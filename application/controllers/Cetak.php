<?php 
require_once APPPATH.'../vendor/autoload.php';
class Cetak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('PPDB_Model');
    }

    public function cetakpdf($id){
        $data['ppdb'] = $this->PPDB_Model->getpendaftarbyid($id);
        $this->load->view('admin/ppdb/karturegistrasi', $data);
    }
    
}