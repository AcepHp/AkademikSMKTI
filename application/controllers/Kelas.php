<?php
class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['kelas'] = $this->Kelas_model->get_kelas();
        $this->load->view('admin/data_master/kelas/data_kelas', $data);
    }

    public function create()
    {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['tingkatan'] = $this->Kelas_model->get_tingkatan();
        $data['jurusan'] = $this->Kelas_model->get_jurusan();

        // Memvalidasi inputan form
        $this->form_validation->set_rules('id_kelas', 'Kode Kelas', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        $this->form_validation->set_rules('kode_tingkatan', 'Kode Tingkatan', 'required');
        $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form kembali dengan pesan error
            $this->load->view('admin/data_master/kelas/tambah_kelas', $data);
        } else {
            // Jika validasi berhasil, tambahkan data ke dalam database
            $data_kelas = array(
                'id_kelas' => $this->input->post('id_kelas'),
                'nama_kelas' => $this->input->post('nama_kelas'),
                'kode_tingkatan' => $this->input->post('kode_tingkatan'),
                'kode_jurusan' => $this->input->post('kode_jurusan')
            );

            if ($this->Kelas_model->create_kelas($data_kelas)) {
                $this->session->set_flashdata("success_tambah", "Data Kelas berhasil ditambahkan!");
                redirect('kelas/index');
            } else {
                // Handle error
            }
        }
    }

    // Fungsi untuk menampilkan form tambah kelas
    public function add()
    {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['tingkatan'] = $this->Kelas_model->get_tingkatan();
        $data['jurusan'] = $this->Kelas_model->get_jurusan();
        $this->load->view('admin/data_master/kelas/tambah_kelas', $data);
    }

    public function edit($id_kelas)
    {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['tingkatan'] = $this->Kelas_model->get_tingkatan();
        $data['jurusan'] = $this->Kelas_model->get_jurusan();
        $data['kelas_item'] = $this->Kelas_model->get_kelas_by_id($id_kelas);

        // Memvalidasi inputan form
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        $this->form_validation->set_rules('kode_tingkatan', 'Kode Tingkatan', 'required');
        $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form edit kelas dengan pesan error
            $this->load->view('admin/data_master/kelas/edit_kelas', $data);
        } else {
            // Jika validasi berhasil, update data ke dalam database
            $data_kelas = array(
                'nama_kelas' => $this->input->post('nama_kelas'),
                'kode_tingkatan' => $this->input->post('kode_tingkatan'),
                'kode_jurusan' => $this->input->post('kode_jurusan')
            );

            if ($this->Kelas_model->update_kelas($id_kelas, $data_kelas)) {
                $this->session->set_flashdata("success_edit", "Data Kelas berhasil diupdate!");
                redirect('kelas/index');
            } else {
                // Handle error
            }
        }
    }
    
    public function delete($id_kelas){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        if ($this->Kelas_model->delete_kelas($id_kelas)) {
            $this->session->set_flashdata("success_hapus", "Data Kelas berhasil dihapus!");
            redirect('kelas/index');
        } else {
            // Handle error
        }
    }
    }
?>