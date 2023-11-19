<?php
class Siswa extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation'); // Tambahkan ini
        $this->load->model('siswa_model');
        $this->load->model('VMT_Model');
        $this->load->model('Nilai_model');
    }

    public function index() {
        if ($this->session->userdata('role') !== 'Siswa') {
            redirect('auth');
        }

        $tahun = $this->Nilai_model->get_tahun();
        $semester = $this->Nilai_model->get_semester();
    
        // Ambil nilai id_tahun dari hasil query tahun yang didapat
        $id_tahun = $tahun[0]->id_tahun; 
    
        // Ambil nilai id_semester dari hasil query semester yang didapat
        $id_semester = $semester[0]->id_semester; 

        $data['vmt'] = $this->VMT_Model->get_all()->row();
        $materi_count = $this->siswa_model->get_all_materi($this->session->userdata('nisn'),$id_tahun,$id_semester);
        $data['materi_count'] = $materi_count;
        $mapel_count = $this->siswa_model->get_all_mapel($this->session->userdata('nisn'));
        $data['mapel_count'] = $mapel_count;
        $data['siswa'] = $this->siswa_model->get_siswa_data($this->session->userdata('nisn'));
       
        
        $data['tahun'] = $tahun;
        $data['semester'] = $semester;
        $data['nilai'] = $this->Nilai_model->get_nilai_datasiswa_nilai($this->session->userdata('nisn'));
        $data['siswaa'] = $this->Nilai_model->get_nilai_datasiswa_siswa($this->session->userdata('nisn'));
       // $data['siswa'] = $this->Nilai_model->get_nilai_datasiswa($this->session->userdata('nisn'));
        $data['tingkatan'] = $this->Nilai_model->get_tingkatan();

        $this->load->view('dashboard/Siswa_dashboard', $data);
    }

    public function settingprofile() {
        if ($this->session->userdata('role') !== 'Siswa') {
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

        $data['siswa'] = $this->siswa_model->get_siswa_data($this->session->userdata('nisn'));
        $data['siswaa'] = $this->siswa_model->get_siswa_dataa($this->session->userdata('nisn'));

        $this->load->view('siswa/settingprofile', $data);
    }


    public function change_password() {
        $this->form_validation->set_rules('pwdsekarang', 'Password Sekarang', 'required');
        $this->form_validation->set_rules('pwdbaru', 'Password Baru', 'required|min_length[6]');
    
        $success_msg = 'Password berhasil diubah.';
        $error_msg = 'Password yang Anda masukkan salah.';
    
        if ($this->form_validation->run() == TRUE) {
            $nisn = $this->session->userdata('nisn');
            $password_sekarang = md5($this->input->post('pwdsekarang'));
            $password_baru = md5($this->input->post('pwdbaru'));
    
            // Verifikasi password saat ini
            $siswa = $this->siswa_model->get_siswa_by_nisn_password($nisn, $password_sekarang);
    
            if ($siswa) {
                // Proceed with password change
                $this->siswa_model->update_password($nisn, $password_baru);
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
    
        redirect('siswa/settingprofile');
    }
    
            

    public function update_data() {
        
         // Validasi form, Anda dapat menggunakan library form_validation CodeIgniter

        $this->form_validation->set_rules('Tempat_lahir', 'Tempat Lahir');
        $this->form_validation->set_rules('Tanggal_Lahir', 'Tanggal Lahir');
        $this->form_validation->set_rules('Jenis_kelamin', 'Jenis Kelamin');
        $this->form_validation->set_rules('Alamat', 'Alamat');
        $this->form_validation->set_rules('Tinggal_dengan', 'Tinggal dengan');
        $this->form_validation->set_rules('Nama_ayah', 'Nama Ayah');
        $this->form_validation->set_rules('Nama_ibu', 'Nama Ibu');
        $this->form_validation->set_rules('Nama_wali', 'Nama Wali');
        $this->form_validation->set_rules('No_telp_ortu', 'No. Telp Orang Tua');
        $this->form_validation->set_rules('No_telp_wali', 'No. Telp Wali');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

         //nisn 
        $nisn = $this->session->userdata('nisn');

        if ($this->form_validation->run() === TRUE) {
            $nisn = $this->session->userdata('nisn');
            $siswa_data = array(
                'Tempat_lahir' => $this->input->post('Tempat_lahir'),
                'Tanggal_Lahir' => $this->input->post('Tanggal_Lahir'),
                'Jenis_kelamin' => $this->input->post('Jenis_kelamin'),
                'Alamat' => $this->input->post('Alamat'),
                'Tinggal_dengan' => $this->input->post('Tinggal_dengan'),
                'Nama_ayah' => $this->input->post('Nama_ayah'),
                'Nama_ibu' => $this->input->post('Nama_ibu'),
                'Nama_wali' => $this->input->post('Nama_wali'),
                'No_telp_ortu' => $this->input->post('No_telp_ortu'),
                'No_telp_wali' => $this->input->post('No_telp_wali'),
                'email' => $this->input->post('email')
            );
            
            $this->siswa_model->update_siswa_by_nisn($nisn, $siswa_data);

            $this->session->set_flashdata('success_msg', 'Data siswa berhasil diperbarui.');
            redirect('siswa/settingprofile');
        } else {
             // Ambil data dari formulir
           

             // Redirect ke halaman sukses atau halaman lain yang sesuai
            redirect('siswa/settingprofile');
        }
    }

    public function tambah_dan_rubah_foto() {
        $nisn = $this->session->userdata('nisn');
    
        // Configuration for uploading files
        $config['upload_path'] = './assets/uploads/foto/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 10240; // 10MB maximum size
        $config['file_name'] = uniqid();
    
        $this->load->library('upload', $config);
    
        // Hapus foto sebelumnya
        $siswa = $this->siswa_model->get_siswa_dataa($nisn);
        $old_file = $siswa->file_foto;
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
            $this->siswa_model->update_file_photo($nisn, $file_foto);
            $this->session->set_flashdata('success_msg', 'Foto berhasil diperbarui.');
            $updatedsiswafoto = $this->siswa_model->get_siswa_dataa($nisn);
            $this->session->set_userdata('Foto', $updatedsiswafoto->file_foto);
        }
        redirect('siswa/settingprofile');
    }
    
    
    
}
?>