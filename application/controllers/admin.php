<?php
class admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_Model');
        $this->load->model('Jurusan_model');
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');
    }
    public function index() {
        
        $this->load->view('admin/d_admin');
    }

    public function data_nilai() {
        $this->load->model('Admin_Model');
        $data['nilai'] = $this->Admin_Model->get_nilai();
        $this->load->view('admin/filter_kelola_nilai', $data); // Gunakan $data untuk mengirim data ke view
    }

    public function pengajar(){
        $this->load->model('Admin_Model');
        $data['guru'] = $this->Admin_Model->get_guru();
        $this->load->view('admin/pengajar', $data); // Gunakan $data untuk mengirim data ke view
    }

    

    public function tambah_guru() {
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
            );

            $this->Admin_Model->tambah_guru($data);
            redirect('admin/pengajar'); // Ganti dengan halaman tujuan setelah submit

            $user_data = array(
                'id_users' => $this->input->post('id_users'),
                'NISN' => null,
                'Nama_Lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role' => 'Guru',
                'NIP' => $this->input->post('nip'),
                'Foto'=> null,
                'aktif'=> $this->input->post('aktif')
            );

            $this->Datasiswa_model->create_user_account($user_data);
        }

        $this->load->view('admin/tambah_guru'); // Tampilkan view form tambah guru
    }


    public function edit_guru($id) {
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
    
            redirect('admin/pengajar'); // Redirect ke halaman daftar guru (pengajar) setelah proses update
        }
    
        $this->load->view('admin/edit_guru', $data); // Tampilkan view form edit guru
    }

    public function delete_guru($id) {
        if ($this->Admin_Model->delete_guru($id)) {
            redirect('admin/pengajar');
        } else {
            // Handle error
        }
    }    


    public function filter_data() {
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
    