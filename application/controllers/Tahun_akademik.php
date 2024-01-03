<?php
class Tahun_akademik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tahun_akademik_model');
        $this->load->model('PPDB_Model');
    }

    // Fungsi untuk menampilkan daftar tahun akademik
    public function index()
    {
        $data['ppdb'] = $this->PPDB_Model->getpendaftar();
        $data['tahun_akademik'] = $this->Tahun_akademik_model->get_all_tahun_akademik();
        $this->load->view('admin/data_master/tahun_akademik/data_tahun', $data);
    }

    // Fungsi untuk menambahkan tahun akademik
    // Fungsi untuk menambahkan tahun akademik
    public function tambah_tahun()
{
     $data['statuses'] = $this->Tahun_akademik_model->get_all_status_as_array();
    
    // Mengambil data tahun akademik dari model
    $data['tahun_akademiks'] = $this->Tahun_akademik_model->get_all_tahun_akademik();

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data_post = array(
            'tahun_akademik' => $this->input->post('tahun_akademik'),
            'status' => $this->input->post('status')
        );
        if ($data_post['status'] === 'Aktif') {
            $this->Tahun_akademik_model->nonaktifkan_tahun_akademik_aktif();
        }

        if ($this->Tahun_akademik_model->tambah_tahun_akademik($data_post)) {
            $this->session->set_flashdata("success_tambah", "Tahun Akademik berhasil ditambahkan!");
            redirect('tahun_akademik');
        }
    }

    $this->load->view('admin/data_master/tahun_akademik/tambah_tahun', $data);
}

    // Fungsi untuk mengedit tahun akademik

    public function edit_tahun($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array(
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'status' => $this->input->post('status')
            );

            // Jika status diubah menjadi Aktif, nonaktifkan semua semester yang aktif
            if ($data['status'] === 'Aktif') {
                $this->Tahun_akademik_model->nonaktifkan_tahun_akademik_aktif();
            }

            if ($this->Tahun_akademik_model->update_tahun_akademik($id, $data)) {
                $this->session->set_flashdata("success_edit", "Tahun Akademik berhasil diupdate!");
                redirect('tahun_akademik');
            }
        }

        $data['tahun_akademik'] = $this->Tahun_akademik_model->get_tahun_akademik_by_id($id);
        $this->load->view('admin/data_master/tahun_akademik/edit_tahun', $data);
    }
    
    
    

    // Fungsi untuk menghapus tahun akademik
    public function hapus_tahun($id)
    {
        if ($this->Tahun_akademik_model->delete_tahun_akademik($id)) {
            $this->session->set_flashdata("success_hapus", "Tahun Akademik berhasil dihapus!");
            redirect('tahun_akademik');
        }
    }
}