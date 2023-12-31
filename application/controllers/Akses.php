<?php
class Akses extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('KelolaAkses_Model');
        $this->load->library('session');
    }

    //Siswa
    public function siswa() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['datasiswa'] = $this->KelolaAkses_Model->getalldatasiswa();
        $this->load->view("admin/KelolaAkses/akses_siswa", $data);
    }

    public function detailsiswa($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['datasiswa'] = $this->KelolaAkses_Model->detaildatasiswa($id);
        $this->load->view('admin/KelolaAkses/detail_siswa', $data);
    }

    public function aktifkansiswa($id_users){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $this->KelolaAkses_Model->aktifkan($id_users);
        $this->session->set_flashdata('sukses_aktif', 'Akun Siswa telah Aktif');

        redirect('Akses/detailsiswa/' .$id_users); 
    }

    public function nonaktifkansiswa($id_users){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $this->KelolaAkses_Model->nonaktifkan($id_users);
        $this->session->set_flashdata('sukses_nonaktif', 'Akun Siswa berhasil di Non-Aktifkan');

        redirect('Akses/detailsiswa/' .$id_users); 
    }

    public function reset_password_siswa($id_users) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $this->KelolaAkses_Model->resetpasswordsiswa($id_users);
        $this->session->set_flashdata('sukses_reset', 'Password telah berhasil di reset');
        // Redirect atau tampilkan pesan berhasil
        redirect('Akses/detailsiswa/' .$id_users);
    }

    //Guru
    public function guru() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['dataguru'] = $this->KelolaAkses_Model->getalldataguru();
        $this->load->view('admin/KelolaAkses/akses_guru', $data);
    }

    public function detailguru($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['dataguru'] = $this->KelolaAkses_Model->detaildataguru($id);
        $this->load->view('admin/KelolaAkses/detail_guru', $data);
    }

    public function aktifkanguru($id_users){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $this->KelolaAkses_Model->aktifkan($id_users);
        $this->session->set_flashdata('sukses_aktif', 'Akun guru telah Aktif');

        redirect('Akses/detailguru/' .$id_users); 
    }

    public function nonaktifkanguru($id_users){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $this->KelolaAkses_Model->nonaktifkan($id_users);
        $this->session->set_flashdata('sukses_nonaktif', 'Akun guru berhasil di Non-Aktifkan');

        redirect('Akses/detailguru/' .$id_users); 
    }

    public function reset_password_guru($id_users) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $this->KelolaAkses_Model->resetpasswordguru($id_users);
        $this->session->set_flashdata('sukses_reset', 'Password telah berhasil di reset');
        // Redirect atau tampilkan pesan berhasil
        redirect('Akses/detailguru/' .$id_users);
    }

    public function konfirmasiResetPasswordAdmin($id_users) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
		$username = $this->input->post('username');
        $password = md5($this->input->post('password'));
		$user = $this->KelolaAkses_Model->passwordadmin($username, $password);


        if ($user && $user->aktif == 1) {
			$this->reset_password_siswa($id_users);
			$this->session->set_flashdata('sukses', 'Password User telah direset!.');
            // Jika berhasil mereset kata sandi, arahkan ke halaman detail karyawan dengan $user_id
            redirect('Akses/reset_password_siswa/' . $id_users);
        } else {
			$this->session->set_flashdata('gagal', 'Verifikasi Password Admin Gagal!.');
            redirect('Akses/reset_password_siswa/' . $id_users);
        }
    }

    public function konfirmasiResetPasswordAdminguru($id_users) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
		$username = $this->input->post('username');
        $password = md5($this->input->post('password'));
		$user = $this->KelolaAkses_Model->passwordadmin($username, $password);


        if ($user && $user->aktif == 1) {
			$this->reset_password_guru($id_users);
			$this->session->set_flashdata('sukses', 'Password User telah direset!.');
            // Jika berhasil mereset kata sandi, arahkan ke halaman detail karyawan dengan $user_id
            redirect('Akses/reset_password_guru/' . $id_users);
        } else {
			$this->session->set_flashdata('gagal', 'Verifikasi Password Admin Gagal!.');
            redirect('Akses/reset_password_guru/' . $id_users);
        }
    }

    //Akun
    public function index(){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }

        $this->load->model('Auth_model');
        $data['akun']=$this->Auth_model->getuser();
        $this->load->view("admin/KelolaAkses/akun", $data);
    }
    
    public function tambahakun() {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        $this->load->view('admin/KelolaAkses/tambah_akun');
    }

    public function prosestambahakun(){
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if($this->KelolaAkses_Model->tambahakun()){
            redirect('Akses/index','refresh');

        } else {
            
            redirect('Akses/tambahakun','refresh');
            
        }
    }

    public function delete_akun($id) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' && $this->session->userdata('role') !== 'Wakasek' && $this->session->userdata('role') !== 'Kajur') {
            redirect('auth');
        }
        if ($this->KelolaAkses_Model->delete_akun($id)) {
            redirect('Akses/index','refresh');
        } else {
            // Handle error
        }
    }
}
