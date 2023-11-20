<?php
class admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_Model');
        $this->load->model('Jurusan_model');
        $this->load->model('Kelas_model');
        $this->load->model('Berita_Model');
        $this->load->model('Acara_Model');
        $this->load->model('Galeri_Model');
        $this->load->model('Video_Model');
        $this->load->model('Manajemen_Model');
        $this->load->model('VMT_Model');
        $this->load->model('diskusi_model');

        $this->load->library('form_validation');
    }
    public function index() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }

        $data['berita'] = $this->Berita_Model->get_all();
        $data['acara'] = $this->Acara_Model->get_all();
        $data['foto'] = $this->Galeri_Model->get_all();
        $data['video'] = $this->Video_Model->get_all();
        $data['jurusan'] = $this->Jurusan_model->get_all();
        $data['manajemen'] = $this->Manajemen_Model->get_all();
        $data['guru'] = $this->Admin_Model->get_all();
        $data['vmt'] = $this->VMT_Model->get_all()->row();
        $data['diskusi'] = $this->diskusi_model->get_all();
        
        $this->load->view('admin/d_admin', $data);
    }

    public function data_nilai() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $this->load->model('Admin_Model');
        $data['nilai'] = $this->Admin_Model->get_nilai();
        $this->load->view('admin/filter_kelola_nilai', $data); // Gunakan $data untuk mengirim data ke view
    }

    public function pengajar(){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $this->load->model('Admin_Model');
        $data['guru'] = $this->Admin_Model->get_guru();
        $this->load->view('admin/pengajar', $data); // Gunakan $data untuk mengirim data ke view
    }

    public function tambah_guru() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = array(
                'NIP' => $this->input->post('nip'),
                'Nama_Lengkap' => $this->input->post('nama_lengkap'),
                'Tempat_Lahir' => $this->input->post('tempat_lahir'),
                'Tanggal_Lahir' => $this->input->post('tanggal_lahir'),
                'Jenis_Kelamin' => $this->input->post('jenis_kelamin'),
                'Alamat' => $this->input->post('alamat'),
                'Pendidikan' => $this->input->post('pendidikan'),
                'Tanggal_Mulai' => $this->input->post('tanggal_mulai'),
                'Status' => $this->input->post('wali'),
            );

            $this->Admin_Model->tambah_guru($data);
            
            $user_data = array(
                'NISN' => null,
                'Nama_Lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role' => 'Guru',
                'NIP' => $this->input->post('nip'),
                'file_foto'=> null,
                'aktif'=> $this->input->post('aktif')
            );

            $this->Admin_Model->create_user_account($user_data);
            $this->session->set_flashdata('success_tambah', 'Guru berhasil ditambahkan!');
            redirect('admin/pengajar');
        }

        $this->load->view('admin/tambah_guru'); // Tampilkan view form tambah guru
    }

    public function edit_guru($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['guru'] = $this->Admin_Model->get_single_guru($id);
    
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data_to_update = array(
                'NIP' => $this->input->post('nip'),
                'Nama_Lengkap' => $this->input->post('nama_lengkap'),
                'Tempat_Lahir' => $this->input->post('tempat_lahir'),
                'Tanggal_Lahir' => $this->input->post('tanggal_lahir'),
                'Jenis_Kelamin' => $this->input->post('jenis_kelamin'),
                'Alamat' => $this->input->post('alamat'),
                'Pendidikan' => $this->input->post('pendidikan'),
                'Tanggal_Mulai' => $this->input->post('tanggal_mulai'),
            );
    
            $this->Admin_Model->update_guru($id, $data_to_update);
            $this->session->set_flashdata('success_edit', 'Guru berhasil diupdate!');
            redirect('admin/pengajar'); // Redirect ke halaman daftar guru (pengajar) setelah proses update
        }
    
        $this->load->view('admin/edit_guru', $data); // Tampilkan view form edit guru
    }

    public function delete_guru($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        if ($this->Admin_Model->delete_guru($id)) {
            $this->session->set_flashdata('success_hapus', 'Guru berhasil dihapus!');
            redirect('admin/pengajar');
        } else {
            // Handle error
        }
    }    

    public function filter_data() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        
        // Set validation rules
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        
        // Check if form validation passed
        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, reload the view with validation errors
            $this->load->view('filter_data_view');
        } else {
            // Form validation passed, continue with your logic
            $kode_jurusan = $this->input->post('jurusan');
            $id_kelas = $this->input->post('kelas');
        
            $data['jurusan'] = $this->Admin_Model->get_all_jurusan();
            $data['kelas'] = $this->Admin_Model->get_kelas_by_jurusan($kode_jurusan);
        
            if (!empty($kode_jurusan) && !empty($id_kelas)) {
                $data['siswa'] = $this->Admin_Model->get_siswa_by_kelas($kode_jurusan, $id_kelas);
            }
        
            $this->load->view('filter_data_view', $data);
        }
    }
    
    
}
    