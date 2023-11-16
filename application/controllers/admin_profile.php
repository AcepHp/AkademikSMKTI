<?php
class admin_profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation'); 
        $this->load->model('admin_profile_model');
    }

    public function index() {
        if ($this->session->userdata('role') !== 'Admin') {
            redirect('auth');
        }
        
        // Validasi jika ada perubahan kata sandi
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->change_password();
        }
        // Validasi jika ada perubahan foto
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->tambah_dan_rubah_foto();
        }

        $data['admin'] = $this->admin_profile_model->get_admin_data_NIP($this->session->userdata('NIP'));

        $this->load->view('admin/setting_profile/Setting_profile', $data);
    }

    public function change_password() {
        $this->form_validation->set_rules('pwdsekarang', 'Password Sekarang', 'required');
        $this->form_validation->set_rules('pwdbaru', 'Password Baru', 'required|min_length[6]');
    
        if ($this->form_validation->run() == TRUE) {
            $NIP = $this->session->userdata('NIP');
            $password_sekarang = md5($this->input->post('pwdsekarang'));
            $password_baru = md5($this->input->post('pwdbaru'));
    
            // Verifikasi password saat ini
            $admin = $this->admin_profile_model->get_admin_by_nip_password($NIP, $password_sekarang);

            if ($admin) {
                $this->admin_profile_model->update_password($NIP, $password_baru);
                $this->session->set_flashdata('success_msg', 'Password berhasil diubah.');
            } else {
                $this->session->set_flashdata('error_msg', 'Password yang anda masukkan salah.');
            }
            
        }
        redirect('admin_profile/index');
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
        $admin = $this->admin_profile_model->get_admin_data_NIP($NIP);
        $old_file = $admin->file_foto;
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
            $this->admin_profile_model->update_file_photo($NIP, $file_foto);
            $this->session->set_flashdata('success_msg', 'Foto berhasil diperbarui.');
            $updatedadminfoto = $this->admin_profile_model->get_admin_data_NIP($NIP);
            $this->session->set_userdata('Foto', $updatedadminfoto->file_foto);
        }
        redirect('admin_profile/index');
    }


    

    
}
?>