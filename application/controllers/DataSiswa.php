<?php
require 'vendor/autoload.php';
class DataSiswa extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Datasiswa_model');
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->library('upload');
    }

    public function index() {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $data['siswa'] = $this->Datasiswa_model->get_siswa_data();
        $this->load->view('Admin/KelolaSiswa/data_siswa', $data);
    }

    public function tambah_siswa() {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $data['siswa'] = $this->Datasiswa_model->get_siswa_all_nisn();
        $this->load->view('Admin/KelolaSiswa/tambah_data',);
    }

    public function proses_tambah_siswa() {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
    
        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nisn', 'NISN', 'required');
    
        $nisn = $this->input->post('nisn');
        $nis = $this->input->post('nis');
    
        $is_nisn_unique = !$this->Datasiswa_model->is_nisn_exists($nisn);
        $is_nis_unique = !$this->Datasiswa_model->is_nis_exists($nis);
    
        if (!$is_nisn_unique) {
            $this->form_validation->set_message('is_unique', 'NISN ' . $nisn . ' sudah digunakan.');
        }
    
        if (!$is_nis_unique) {
            $this->form_validation->set_message('is_unique', 'NIS ' . $nis . ' sudah digunakan.');
        }
    
        if ($this->form_validation->run() == FALSE) {
            // Load the view with the form data and error messages
            $data['nisn_exists'] = $is_nisn_unique;
            $data['nis_exists'] = $is_nis_unique;
            $this->session->set_flashdata('error_message', 'Error: Data siswa gagal ditambahkan.');
            $this->load->view('admin/KelolaSiswa/tambah_data', $data);
        } elseif (!$is_nisn_unique && !$is_nis_unique) {
            // Load the view with the form data and error messages for both NISN and NIS
            $data['nisn_exists'] = $nisn;
            $data['nis_exists'] = $nis;
            $this->session->set_flashdata('error_message', 'Error: Data siswa gagal ditambahkan.');
            $this->load->view('admin/KelolaSiswa/tambah_data', $data);
        } elseif (!$is_nisn_unique) {
            // Load the view with the form data and error message for NISN
            $data['nisn_exists'] = $nisn;
            $this->session->set_flashdata('error_message', 'Error: Data siswa gagal ditambahkan.');
            $this->load->view('admin/KelolaSiswa/tambah_data', $data);
        } elseif (!$is_nis_unique) {
            // Load the view with the form data and error message for NIS
            $data['nis_exists'] = $nis;
            $this->session->set_flashdata('error_message', 'Error: Data siswa gagal ditambahkan.');
            $this->load->view('admin/KelolaSiswa/tambah_data', $data);
        } else {
            $data_siswa = array(
                'NIS' => $this->input->post('nis'),
                'NISN' => $this->input->post('nisn'),
                'Nama_lengkap' => $this->input->post('nama_lengkap'),
                'Tempat_lahir' => $this->input->post('tempat_lahir'),
                'Tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'Jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'Alamat' => $this->input->post('alamat'),
                'Tinggal_dengan' => $this->input->post('tinggal_dengan'),
                'email' => $this->input->post('email'),
                'Nama_ayah' => $this->input->post('nama_ayah'),
                'Nama_ibu' => $this->input->post('nama_ibu'),
                'Nama_wali' => $this->input->post('nama_wali'),
                'No_telp_ortu' => $this->input->post('no_telp_ortu'),
                'No_telp_wali' => $this->input->post('no_telp_wali'),
                // Add other fields as needed
            );
    
            $this->Datasiswa_model->tambah_siswa($data_siswa);
    
            // Membuat akun pengguna (user account)
            $user_data = array(
                'id_users' => $this->input->post('id_users'),
                'NISN' => $this->input->post('nisn'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')), // You might consider using a more secure method for password hashing
                'role' => 'Siswa',
                'NIP' => null,
                'aktif' => $this->input->post('aktif')
            );
    
            $this->Datasiswa_model->create_user_account($user_data);
            
            redirect('datasiswa/index');
        }
    }
    

    public function edit_siswa($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
    
        $data['siswa_data'] = $this->Datasiswa_model->get_siswa_by_id($id);
        if ($data['siswa_data']) {
            $this->load->view('Admin/KelolaSiswa/edit_data', $data);
            
        } else {
            // Show error message or take action if student data is not found
        }
    }
    
    public function update_data_siswa($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
    
            if ($this->form_validation->run() == FALSE) {
                $data['siswa_data'] = $this->Datasiswa_model->get_siswa_by_id($id);
    
                if ($data['siswa_data']) {
                    $data['siswa_data']->Tanggal_lahir = date('Y-m-d', strtotime($data['siswa_data']->Tanggal_lahir));
                    $this->load->view('Admin/KelolaSiswa/edit_data', $data);
                } else {
                    // Show error message or take action if student data is not found
                }
            } else {
                $data = array(
                    'NIS' => $this->input->post('nis'),
                    'NISN' => $this->input->post('nisn'),
                    'Nama_lengkap' => $this->input->post('nama_lengkap'),
                    'Tempat_lahir' => $this->input->post('tempat_lahir'),
                    'Tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'Jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'Alamat' => $this->input->post('alamat'),
                    'Tinggal_dengan' => $this->input->post('tinggal_dengan'),
                    'Nama_ayah' => $this->input->post('nama_ayah'),
                    'Nama_ibu' => $this->input->post('nama_ibu'),
                    'email' => $this->input->post('email'),
                    'Nama_wali' => $this->input->post('nama_wali'),
                    'No_telp_ortu' => $this->input->post('no_telp_ortu'),
                    'No_telp_wali' => $this->input->post('no_telp_wali'),
                    // Add other fields as needed
                );

                $this->Datasiswa_model->update_siswa($id, $data);

                $new_password = $this->input->post('new_password');
                $hashed_new_password = $new_password ? md5($new_password) : '';
                
                $user_data = array(
                    'password' => $hashed_new_password
                );

                $this->Datasiswa_model->update_user_account($data['NISN'], $user_data);
                
                redirect('DataSiswa/index');
            }
        }
    }
    
    
    public function hapus_siswa($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
    
        $siswa_data = $this->Datasiswa_model->get_siswa_by_id($id);
        $nisn = $siswa_data->NISN;

        // Delete the user account associated with the student
        $this->Datasiswa_model->hapus_user_account($nisn);

        // Delete the student data
        $this->Datasiswa_model->hapus_siswa($id);
    
        redirect('Datasiswa/index');
    }

    public function import()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $upload_status = $this->uploadDoc();
        if ($upload_status !== false) {
            $inputFileName = 'assets/uploads/imports/' . $upload_status;
            $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
            $spreadsheet = $reader->load($inputFileName);
            $sheet = $spreadsheet->getActiveSheet();

            $highestRow = $sheet->getHighestRow();

            $count_Rows = 0;
            // Mulai dari baris 2 untuk melewati baris header
            for ($row = 2; $row <= $highestRow; $row++) {
                $nis = $sheet->getCell('A' . $row)->getValue();
                $nisn = $sheet->getCell('B' . $row)->getValue();
                $nama_lengkap = $sheet->getCell('C' . $row)->getValue();
                $tempat_lahir = $sheet->getCell('E' . $row)->getValue();
                $tanggal_lahir = $sheet->getCell('F' . $row)->getValue();
                $jenis_kelamin = $sheet->getCell('G' . $row)->getValue();
                $alamat = $sheet->getCell('H' . $row)->getValue();
                $tinggal_dengan = $sheet->getCell('I' . $row)->getValue();
                $nama_ayah = $sheet->getCell('J' . $row)->getValue();
                $nama_ibu = $sheet->getCell('K' . $row)->getValue();
                $nama_wali = $sheet->getCell('L' . $row)->getValue();
                $no_telp_ortu = $sheet->getCell('M' . $row)->getValue();
                $no_telp_wali = $sheet->getCell('N' . $row)->getValue();
                $email = $sheet->getCell('O' . $row)->getValue();

                // Add the $user_data array
                $user_data = array(
                    'NISN' => $nisn,
                    'nama_lengkap' => $nama_lengkap,
                    'username' => $nisn,
                    'password' => md5('siswasmktignc'), // You might consider using a more secure method for password hashing
                    'role' => 'Siswa',
                    'NIP' => null,
                    'aktif' => '0',
                );

                // Insert user data into 'users' table
                $this->db->insert('users', $user_data);

                $data = array(
                    'NIS' => $nis,
                    'NISN' => $nisn,
                    'Nama_lengkap' => $nama_lengkap,
                    'Tempat_lahir' => $tempat_lahir,
                    'Tanggal_Lahir' => $tanggal_lahir,
                    'Jenis_kelamin' => $jenis_kelamin,
                    'Alamat' => $alamat,
                    'Tinggal_dengan' => $tinggal_dengan,
                    'Nama_ayah' => $nama_ayah,
                    'Nama_ibu' => $nama_ibu,
                    'Nama_wali' => $nama_wali,
                    'No_telp_ortu' => $no_telp_ortu,
                    'No_telp_wali' => $no_telp_wali,
                    'email' => $email,
                );

                $this->db->insert('siswa', $data);
                $count_Rows++;
            }
            $this->session->set_flashdata('success', 'Berhasil mengimpor data');
            redirect(base_url('DataSiswa'));
        } else {
            $this->session->set_flashdata('error', 'Berkas tidak diunggah');
            redirect(base_url('DataSiswa'));
        }
    } else {
        $this->load->view('Admin/KelolaSiswa/import');
    }
}



	function uploadDoc()
	{
		$uploadPath = 'assets/uploads/imports/';
		if(!is_dir($uploadPath))
		{
			mkdir($uploadPath,0777,TRUE); // FOR CREATING DIRECTORY IF ITS NOT EXIST
		}

		$config['upload_path']=$uploadPath;
		$config['allowed_types'] = 'csv|xlsx|xls';
		$config['max_size'] = 1000000;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if($this->upload->do_upload('upload_excel'))
		{
			$fileData = $this->upload->data();
			return $fileData['file_name'];
		}
		else
		{
			return false;
		}
	}
    public function downloadTemplate()
    {
    $templateFilePath = FCPATH . 'assets/uploads/template/template_siswa.xlsx'; // Sesuaikan dengan path file template Anda
    
    if (file_exists($templateFilePath)) {
        $data = file_get_contents($templateFilePath);
        force_download('template_siswa.xlsx', $data);
    } else {
        // File template tidak ditemukan
        show_404();
    }
}


    // ... Other controller functions
}