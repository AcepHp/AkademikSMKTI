<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model'); // Perhatikan bahwa nama model diawali dengan huruf kapital
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('Auth/login');
    }

    public function do_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        $user = $this->Auth_model->login($username, $password);
    
        if ($user !== null && is_object($user)) {
            $this->session->set_userdata('user_id', $user->id_users);
            $this->session->set_userdata('role', $user->role);
    
            // Simpan nama siswa, NISN, dan foto dalam sesi
            if ($user->role === 'Siswa') {
                $this->session->set_userdata('login', true);
                $this->session->set_userdata('id_users', $user->id_users);
                $this->session->set_userdata('aktif', $user->aktif);
                $this->session->set_userdata('nama_lengkap', $user->nama_lengkap);
                $this->session->set_userdata('nisn', $user->NISN);
                $this->session->set_userdata('Foto', $user->file_foto);
    
            } elseif ($user->role === 'Guru') {
                // For Guru role, store the NIP in session
                $this->session->set_userdata('NIP', $user->NIP);
                $this->session->set_userdata('nama_lengkap', $user->nama_lengkap);

                $this->session->set_userdata('Foto', $user->file_foto);
                $this->session->set_userdata('id_users', $user->id_users);
                $this->session->set_userdata('aktif', $user->aktif);


                $GuruData = $this->auth_model->getGuruDataByNIP($user->NIP);
                if ($GuruData && isset($GuruData->NIP)) {
                    $this->session->set_userdata('ID_Guru', $GuruData->ID_Guru);
                }
            } elseif ($user->role === 'Admin') {
                // For Guru role, store the NIP in session
                $this->session->set_userdata('NIP', $user->NIP);
                $this->session->set_userdata('nama_lengkap', $user->nama_lengkap);

                $this->session->set_userdata('Foto', $user->file_foto);
                $this->session->set_userdata('id_users', $user->id_users);
                $this->session->set_userdata('aktif', $user->aktif);

            } elseif ($user->role === 'SuperAdmin') {
                // For Guru role, store the NIP in session
                $this->session->set_userdata('NIP', $user->NIP);
                $this->session->set_userdata('nama_lengkap', $user->nama_lengkap);

                $this->session->set_userdata('Foto', $user->file_foto);
                $this->session->set_userdata('id_users', $user->id_users);
                $this->session->set_userdata('aktif', $user->aktif);
            }elseif ($user->role === 'Wakasek') {
                // For Guru role, store the NIP in session
                $this->session->set_userdata('NIP', $user->NIP);
                $this->session->set_userdata('nama_lengkap', $user->nama_lengkap);

                $this->session->set_userdata('Foto', $user->file_foto);
                $this->session->set_userdata('id_users', $user->id_users);
                $this->session->set_userdata('aktif', $user->aktif);

            }elseif ($user->role === 'Kajur') {
                // For Guru role, store the NIP in session
                $this->session->set_userdata('NIP', $user->NIP);
                $this->session->set_userdata('nama_lengkap', $user->nama_lengkap);

                $this->session->set_userdata('Foto', $user->file_foto);
                $this->session->set_userdata('id_users', $user->id_users);
                $this->session->set_userdata('aktif', $user->aktif);
            }
    
            // Redirects
            switch ($user->role) {
                case 'Siswa':
                    redirect('Siswa');
                    break;
                case 'Guru':
                    redirect('Guru');
                    break;
                case 'Admin': 
                    redirect('admin');
                    break;
                case 'SuperAdmin': 
                    redirect('admin');
                    break;
                case 'Wakasek': 
                    redirect('admin');
                    break;
                case 'Kajur': 
                    redirect('admin');
                    break;
                default:
                    redirect('auth');
                    break;
            }
        } else {
            // Login gagal, atur pesan error berdasarkan alasan
            $data['error'] = 'Username atau password salah. Silakan coba lagi.';
            if (!$this->auth_model->check_username($username)) {
                $data['error'] = 'Username tidak valid. Silakan coba lagi.';
            } elseif (!$this->auth_model->check_password($username, $password)) {
                $data['error'] = 'Password salah. Silakan coba lagi.';
            }
            $this->load->view('Auth/login', $data);
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function ganti_password($id_users) {
        $data['id_users'] = $id_users;
        $this->load->view('Auth/gantipass', $data);
    }

    public function editpass($id_users) {
        $password = $this->input->post('password');
        $confirmPassword = $this->input->post('confirm_password');
    
        // Pastikan ada data pengguna dengan ID yang sesuai
        $user = $this->Auth_model->getuserbyid($id_users);
    
        if ($user) {
            if ($password === $confirmPassword) {
                $this->Auth_model->updatePassword($id_users, $password);
    
                // Redirect setelah mengubah kata sandi
                redirect('Siswa/index');
            } else {
                $data['error'] = 'Password dan konfirmasi password tidak cocok.';
                $data['id_users'] = $id_users;
                $this->load->view('Auth/gantipass', $data);
            }
        } 
    }
    
    
    
    
}