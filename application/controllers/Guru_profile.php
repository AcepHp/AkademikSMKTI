<?php
class Guru_profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation'); // Tambahkan ini
        $this->load->model('Guru_profilemodel');
    }

    public function index() {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }

        // Validasi jika ada perubahan kata sandi
        if  ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->change_password();
        }
        // Validasi jika ada perubahan foto
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->tambah_dan_rubah_foto();
        }

        $data['guru'] = $this->Guru_profilemodel->get_guru_data($this->session->userdata('NIP'));
        $data['guruu'] = $this->Guru_profilemodel->get_guru_data_NIP($this->session->userdata('NIP'));

        $this->load->view('Guru/Setting_profile/Setting_profile', $data);
    }

    public function change_password() {
        $this->form_validation->set_rules('pwdsekarang', 'Password Sekarang', 'required');
        $this->form_validation->set_rules('pwdbaru', 'Password Baru', 'required|min_length[6]');
    
        $success_msg = 'Password berhasil diubah.';
        $error_msg = 'Password yang Anda masukkan salah.';
    
        if ($this->form_validation->run() == TRUE) {
            $NIP = $this->session->userdata('NIP');
            $password_sekarang = md5($this->input->post('pwdsekarang'));
            $password_baru = md5($this->input->post('pwdbaru'));
    
            // Verifikasi password saat ini
            $admin = $this->Guru_profilemodel->get_guru_by_nip_password($NIP, $password_sekarang);
    
            if ($admin) {
                // Proceed with password change
                $this->Guru_profilemodel->update_password($NIP, $password_baru);
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('msg', $success_msg);
            } else {
                $this->session->set_flashdata('alert', 'error');
                $this->session->set_flashdata('msg', $error_msg);
            }
        } else {
            $this->session->set_flashdata('alert', 'error');
            $this->session->set_flashdata('msg', $error_msg);
        }
    
        redirect('guru_profile/index');
    }
    
    public function tambah_dan_rubah_foto() {
        $NIP = $this->session->userdata('NIP');
    
        // Configuration for uploading files
        $config['upload_path'] = './assets/uploads/foto/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 10240; // 10MB maximum size
        $config['file_name'] = uniqid();
    
        $this->load->library('upload', $config);
    
        // Hapus foto sebelumnya
        $guru = $this->Guru_profilemodel->get_guru_data_NIP($NIP);
        $old_file = $guru->file_foto;
        if (!empty($old_file)) {
            $file_path = './assets/uploads/foto/' . $old_file;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    
        if (!$this->upload->do_upload('file_foto')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error_msg', $error);
        } else {
            $upload_data = $this->upload->data();
            $file_foto = $upload_data['file_name'];
            $this->Guru_profilemodel->update_file_photo($NIP, $file_foto);
            $this->session->set_flashdata('success_msg', 'Foto berhasil diperbarui.');
            $updatedgurufoto = $this->Guru_profilemodel->get_guru_data_NIP($NIP);
            $this->session->set_userdata('Foto', $updatedgurufoto->file_foto);
        }
        redirect('Guru_profile/index');
    }


    public function update_data() {
        
        $this->form_validation->set_rules('NIP', 'NIP', 'required');
        $this->form_validation->set_rules('Nama_Lengkap', 'Nama Lengkap');
        $this->form_validation->set_rules('Tempat_Lahir', 'Tempat Lahir');
        $this->form_validation->set_rules('Tanggal_Lahir', 'Tanggal Lahir');
        $this->form_validation->set_rules('Jenis_kelamin', 'Jenis Kelamin');
        $this->form_validation->set_rules('Alamat', 'Alamat');
        $this->form_validation->set_rules('Pendidikan', 'Pendidikan');
        $this->form_validation->set_rules('Tanggal_Mulai', 'Tanggal Mulai');

        //Nip
        $NIP = $this->session->userdata('NIP');

        if ($this->form_validation->run() == TRUE) {
             // Validasi berhasil, lakukan pembaruan data
             $NIP = $this->session->userdata('NIP');
             $data = array(
                 'Nama_Lengkap' => $this->input->post('Nama_Lengkap'),
                 'Tempat_Lahir' => $this->input->post('Tempat_Lahir'),
                 'Tanggal_Lahir' => $this->input->post('Tanggal_Lahir'),
                 'Jenis_Kelamin' => $this->input->post('Jenis_kelamin'),
                 'Alamat' => $this->input->post('Alamat'),
                 'Pendidikan' => $this->input->post('Pendidikan'),
                 'Tanggal_Mulai' => $this->input->post('Tanggal_Mulai')
             );
 
             // Panggil model untuk melakukan pembaruan data guru
             $this->Guru_profilemodel->update_guru($NIP, $data);
 
             // Set flash data untuk pesan sukses
             $this->session->set_flashdata('success_msg', 'Data siswa berhasil diperbarui.');
            redirect('Guru_profile/index');
        } else {
            redirect('Guru_profile/index');
        }
    }

    
}
?>