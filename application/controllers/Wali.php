<?php
class Wali extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Wali_model');
        $this->load->model('Jurusan_model'); // Pastikan model ini dimuat
        $this->load->model('Kelas_model'); // Pastikan model ini dimuat
        $this->load->model('Admin_Model'); // Pastikan model ini dimuat
        $this->load->model('Tingkatan_Model'); // Pastikan model ini dimuat
    }
        

    public function index() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }

        $data['wali'] = $this->Wali_model->get_wali();
        $this->load->view('admin/walikelas', $data);
    }

    public function tambah_wali() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        // Ambil data dari model
        $data['jurusan'] = $this->Jurusan_model->get_all_jurusan();
        $data['kelas'] = $this->Wali_model->get_kelas_not_in_wali();
        $data['guru'] = $this->Wali_model->get_guru_not_in_kelas();
        $data['Tingkatan'] = $this->Tingkatan_Model->get_all_tingkatan();
    
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data_posted = array(
                'kode_jurusan' => $this->input->post('kode_jurusan'),
                'id_kelas' => $this->input->post('id_kelas'),
                'Nama_Lengkap' => $this->input->post('wali_kelas'),
            );
    
            $result = $this->Wali_model->tambah_wali($data_posted);
    
            if ($result) {
                $this->session->set_flashdata('success_tambah', 'Wali Kelas berhasil ditambahkan!');
                $data['wali'] = $this->Wali_model->get_wali();
    
                // Tampilkan view dengan data yang sudah diperbarui
                redirect('Wali/index');
            } else {
                echo "Gagal menambahkan data wali.";
            }
        } else {    
            // Tampilkan formulir tambah_wali dengan data yang telah diambil
            $this->load->view('admin/tambah_wali', $data);
        }
    }

    public function edit_wali($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin') {
            redirect('auth');
        }
        $data['Jurusan'] = $this->Jurusan_model->get_all_jurusan();
        $data['kelas'] = $this->Kelas_model->get_kelas(); // Fix: Correct model name
        $data['guru'] = $this->Wali_model->get_guru_not_in_kelas();
        $data['Tingkatan'] = $this->Tingkatan_Model->get_all_tingkatan();
        $data['wali'] = $this->Wali_model->get_single_wali($id);
    
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $namaLengkap = $this->input->post('wali_kelas');
    
            // Use $id parameter instead of $ID_Guru
            $this->Wali_model->edit_wali($id, $namaLengkap);
    
            $this->session->set_flashdata('success_edit', 'Wali Kelas berhasil diupdate!');
            redirect('wali/index');
        }
    
        // Tampilkan formulir edit_wali
        $this->load->view('admin/edit_wali', $data);
    }

    public function delete_wali($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        if ($this->Wali_model->delete_wali($id)) {
            $this->session->set_flashdata('success_hapus', 'Wali Kelas berhasil dihapus!');
            redirect('wali/index');
        } else {
            // Handle error
        }
    }
    }
?>