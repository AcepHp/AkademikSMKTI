<?php
require_once APPPATH.'../vendor/autoload.php';
class PPDB extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PPDB_Model');
        $this->load->model('Jurusan_Model');
        $this->load->model('Jurusan_model');
        $this->load->model('Tahun_akademik_model');
    }

    public function index() {
        $data['jurusan']=$this->Jurusan_model->getjurusan();
        $this->load->view('dashboard/PPDB/ppdb', $data);
    }

    public function form() {
        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
   		$data['provinsi'] = $get_prov->result();
   		$data['path'] = base_url('assets');
        $data['jurusan_item']=$this->Jurusan_Model->get_jurusan();
        $data['jurusan'] = $this->Jurusan_Model->get_jurusan();
        $data['nomor_registrasi'] = $this->PPDB_Model->generate_nomor_registrasi();

        // var_dump($data);
        $this->load->view('dashboard/PPDB/form5', $data);   
    }

    public function add_ajax_kab($id_prov)
	{
    	$query = $this->db->get_where('wilayah_kabupaten',array('provinsi_id'=>$id_prov));
    	$data = "<option value='' disabled selected>- Select Kabupaten -</option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id."'>".$value->nama."</option>";
    	}
    	echo $data;
	}
  
	public function add_ajax_kec($id_kab)
	{   
    	$query = $this->db->get_where('wilayah_kecamatan',array('kabupaten_id'=>$id_kab));
    	$data = "<option value='' disabled selected> - Pilih Kecamatan - </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id."'>".$value->nama."</option>";
    	}
    	echo $data;
	}
  
	public function add_ajax_des($id_kec)
	{
    	$query = $this->db->get_where('wilayah_desa',array('kecamatan_id'=>$id_kec));
    	$data = "<option value='' disabled selected> - Pilih Desa - </option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id."'>".$value->nama."</option>";
    	}
    	echo $data;
	}

    // Bagian Admin

    //Diterima
    public function diterima() {
        $data['ppdb'] = $this->PPDB_Model->getpendaftar();
        $this->load->view('admin/ppdb/diterima', $data);
    }

    //Tidak Diterima
    public function tidakditerima() {
        $data['ppdb'] = $this->PPDB_Model->getpendaftar();
        $this->load->view('admin/ppdb/tidakditerima', $data);
    }

    // Fungsi untuk menyimpan data pendaftaran ke dalam database
    public function simpan_pendaftaran() {
        // Load model
        $this->load->model('PPDB_Model');
        // Ambil data dari form yang dikirimkan
        $provinsi = $this->input->post('provinsi', true);
        $kabkot = $this->input->post('kabupaten_kota', true);
        $kecamatan = $this->input->post('kecamatan', true);
        $desa = $this->input->post('kelurahan_desa', true);
        
        $provinsi_data = $this->db->get_where('wilayah_provinsi', array('id' => $provinsi))->row();
        $provinsi_input = ($provinsi_data) ? $provinsi_data->nama : "Provinsi Tidak Ditemukan";
        
        $kabkot_data = $this->db->get_where('wilayah_kabupaten', array('id' => $kabkot))->row();
        $kabkot_input = ($kabkot_data) ? $kabkot_data->nama : "Kabupaten/Kota Tidak Ditemukan";
        
        $kecamatan_data = $this->db->get_where('wilayah_kecamatan', array('id' => $kecamatan))->row();
        $kecamatan_input = ($kecamatan_data) ? $kecamatan_data->nama : "Kecamatan Tidak Ditemukan";
        
        $desa_data = $this->db->get_where('wilayah_desa', array('id' => $desa))->row();
        $desa_input = ($desa_data) ? $desa_data->nama : "Desa Tidak Ditemukan";
        // Generate the registration number
        $nomor_registrasi = $this->PPDB_Model->generate_nomor_registrasi();
        
        $data = array(
            'NISN' => $this->input->post('NISN', true),
            'nomor_registrasi' => $nomor_registrasi,
            'pilihan_satu' => $this->input->post('pilihan_satu', true),
            'pilihan_dua' => $this->input->post('pilihan_dua', true),
            'Nama_lengkap' => $this->input->post('Nama_lengkap', true),
            'Jenis_kelamin' => $this->input->post('Jenis_kelamin', true),
            'asal_sekolah' => $this->input->post('asal_sekolah', true),
            'Tempat_lahir' => $this->input->post('Tempat_lahir', true),
            'Tanggal_Lahir' => $this->input->post('Tanggal_Lahir', true),
            'agama' => $this->input->post('agama', true),
            'Alamat' => $this->input->post('Alamat', true),
            'provinsi' => $provinsi_input,
            'kabupaten_kota' => $kabkot_input,
            'kecamatan' => $kecamatan_input,
            'kelurahan_desa' => $desa_input,
            'rt' => $this->input->post('rt', true),
            'rw' => $this->input->post('rw', true),
            'kode_pos' => $this->input->post('kode_pos', true),
            'nomor_telp' => $this->input->post('nomor_telp', true),
            'email' => $this->input->post('email', true),
            'Nama_ayah' => $this->input->post('Nama_ayah', true),
            'pendidikan_ayah' => $this->input->post('pendidikan_ayah', true),
            'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah', true),
            'penghasilan_ayah' => $this->input->post('penghasilan_ayah', true),
            'Nama_ibu' => $this->input->post('Nama_ibu', true),
            'pendidikan_ibu' => $this->input->post('pendidikan_ibu', true),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu', true),
            'penghasilan_ibu' => $this->input->post('penghasilan_ibu', true),
            'No_telp_ortu' => $this->input->post('No_telp_ortu', true),
            'Nama_wali' => $this->input->post('Nama_wali', true),
            'pendidikan_wali' => $this->input->post('pendidikan_wali', true),
            'pekerjaan_wali' => $this->input->post('pekerjaan_wali', true),
            'penghasilan_wali' => $this->input->post('penghasilan_wali', true),
            'No_telp_wali' => $this->input->post('No_telp_wali', true),
            'jarak_tempuh' => $this->input->post('jarak_tempuh', true),
            'waktu_tempuh' => $this->input->post('waktu_tempuh', true),
            'tb' => $this->input->post('tb', true),
            'bb' => $this->input->post('bb', true),
            'jumlah_saudara' => $this->input->post('jumlah_saudara', true),
            'Tahun_akademik' => $this->input->post('Tahun_akademik', true),
            'status' => 2
        );
    
        // Panggil fungsi simpan_pendaftaran dari model untuk menyimpan data
        if ($this->PPDB_Model->simpan_pendaftaran($data)) {
            $data = array(
            'NISN' => $this->input->post('NISN', true),
            'nomor_registrasi' => $nomor_registrasi,
            'pilihan_satu' => $this->input->post('pilihan_satu', true),
            'pilihan_dua' => $this->input->post('pilihan_dua', true),
            'Nama_lengkap' => $this->input->post('Nama_lengkap', true),
            'Jenis_kelamin' => $this->input->post('Jenis_kelamin', true),
            'asal_sekolah' => $this->input->post('asal_sekolah', true),
            'Tempat_lahir' => $this->input->post('Tempat_lahir', true),
            'Tanggal_Lahir' => $this->input->post('Tanggal_Lahir', true),
            'agama' => $this->input->post('agama', true),
            'Alamat' => $this->input->post('Alamat', true),
            'provinsi' => $provinsi_input,
            'kabupaten_kota' => $kabkot_input,
            'kecamatan' => $kecamatan_input,
            'kelurahan_desa' => $desa_input,
            'rt' => $this->input->post('rt', true),
            'rw' => $this->input->post('rw', true),
            'kode_pos' => $this->input->post('kode_pos', true),
            'nomor_telp' => $this->input->post('nomor_telp', true),
            'email' => $this->input->post('email', true),
            'Nama_ayah' => $this->input->post('Nama_ayah', true),
            'pendidikan_ayah' => $this->input->post('pendidikan_ayah', true),
            'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah', true),
            'penghasilan_ayah' => $this->input->post('penghasilan_ayah', true),
            'Nama_ibu' => $this->input->post('Nama_ibu', true),
            'pendidikan_ibu' => $this->input->post('pendidikan_ibu', true),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu', true),
            'penghasilan_ibu' => $this->input->post('penghasilan_ibu', true),
            'No_telp_ortu' => $this->input->post('No_telp_ortu', true),
            'Nama_wali' => $this->input->post('Nama_wali', true),
            'pendidikan_wali' => $this->input->post('pendidikan_wali', true),
            'pekerjaan_wali' => $this->input->post('pekerjaan_wali', true),
            'penghasilan_wali' => $this->input->post('penghasilan_wali', true),
            'No_telp_wali' => $this->input->post('No_telp_wali', true),
            'jarak_tempuh' => $this->input->post('jarak_tempuh', true),
            'waktu_tempuh' => $this->input->post('waktu_tempuh', true),
            'tb' => $this->input->post('tb', true),
            'bb' => $this->input->post('bb', true),
            'jumlah_saudara' => $this->input->post('jumlah_saudara', true),
            'Tahun_akademik' => $this->input->post('Tahun_akademik', true),
            'status' => 2
            );
        
            // Panggil model atau lakukan operasi database di sini
            $this->load->model('PPDB_Model'); // Gantilah 'PPDB_model' dengan nama model yang sesuai

            // Tambahkan tanggal registrasi beserta jam, menit, dan detik
            $tanggal_registrasi = date("Y-m-d H:i:s");

            // Update tanggal registrasi dalam data yang sudah disimpan
            $this->PPDB_Model->update_tanggal_registrasi($nisn, $tanggal_registrasi);
        
            // Setelah data berhasil disimpan, arahkan pengguna kembali ke halaman lain atau tampilkan pesan sukses
            redirect('PPDB/form');
            $response = array('status' => 'success', 'message' => 'Data tersimpan dengan sukses.');
            var_dump($data);
        } else {
            $response = array('status' => 'error', 'message' => 'Gagal menyimpan data pendaftaran.');
        }
    
        // Mengembalikan respons dalam format JSON
        echo json_encode($response);
    }

    //Pop Up
    public function popup() {
        $data['popup']=$this->PPDB_Model->getpopup();
        $this->load->view('admin/ppdb/popup',$data);
    }

    public function tambah_popup() {
        $this->load->view('admin/ppdb/tambah_popup');
    }

    public function prosestambahpopup(){
        if($this->PPDB_Model->tambahpopup()){
            redirect('PPDB/popup');

        } else {
            redirect('PPBD/tambah_popup','refresh');
            
        }
    }

    public function edit_popup($id) {
        $data['popup']= $this->PPDB_Model->getpopupbyid($id)->row();
        $this->load->view('admin/ppdb/edit_popup', $data);
    }

    public function proseseditpopup($id){
        if($this->PPDB_Model->editpopup($id)){
            redirect('PPDB/popup','refresh');

        } else {
            redirect('PPDB/edit_popup','refresh');
            
        }
    }

    public function delete_popup($id) {
        if ($this->PPDB_Model->delete_popup($id)) {
            redirect('PPDB/popup','refresh');
        } else {
        }
    }
    
    public function status($popup_id){
        $this->PPDB_Model->update_popup($popup_id);
    }

    // Kuota Pendaftaran
    public function kuota() {
        
        $data['kuota']=$this->PPDB_Model->getkuota();
        $this->load->view('admin/ppdb/kuota',$data);
    }

    public function tambah_kuota() {
        $data['tahun']=$this->Tahun_akademik_model->get_tahun_akademik();
        $data['tahun_item']=$this->Tahun_akademik_model->get_all_tahun_akademik();
        $data['jurusan_item']=$this->Jurusan_Model->get_jurusan();
        $data['jurusan'] = $this->Jurusan_Model->get_jurusan();
        $this->load->view('admin/ppdb/tambah_kuota', $data); // 
    }

    public function prosestambahkuota(){
        if($this->PPDB_Model->tambahkuota()){
            redirect('PPDB/kuota','refresh');

        } else {
            
            redirect('PPBD/tambah_kuota','refresh');
            
        }
    }

    public function edit_kuota($id) {
        $data['kuota']= $this->PPDB_Model->getkuotabyid($id)->row();
        $data['kuota2']= $this->PPDB_Model->getkuotabyid($id);
        $data['tahun']=$this->Tahun_akademik_model->get_tahun_akademik();
        $data['tahun_item']=$this->Tahun_akademik_model->get_all_tahun_akademik();
        $data['jurusan_item']=$this->Jurusan_Model->get_jurusan();
        $data['jurusan'] = $this->Jurusan_Model->get_jurusan();
        $this->load->view('admin/ppdb/edit_kuota', $data);
    }

    public function proseseditkuota($id){
        if($this->PPDB_Model->editkuota($id)){
            redirect('PPDB/kuota','refresh');

        } else {
            redirect('PPDB/edit_kuota','refresh');
            
        }
    }

    public function delete_kuota($id) {
        if ($this->PPDB_Model->delete_kuota($id)) {
            redirect('PPDB/kuota','refresh');
        } else {
        }
    } 

    // Semua Pendaftar
    public function pendaftar() {
        $data['ppdb'] = $this->PPDB_Model->getpendaftar();
        $this->load->view('admin/ppdb/pendaftar' , $data);
    }

    public function editpendaftaran($id) {
        if($this->PPDB_Model->editpendaftar($id)){
            redirect('PPDB/pendaftar','refresh');

        } else {
            redirect('PPDB/pendaftar','refresh');
            
        };
    }

    public function proseseditpendaftar($id){
        if($this->PPDB_Model->editpendaftar($id)){
            $this->session->set_flashdata("error", "<div class='alert alert-danger' role='alert'>Gunakan format gambar yang sesuai (.gif/.jpg/.png) !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Kuota Penuh !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            redirect('PPDB/pendaftar','refresh');

        } else {
            redirect('PPDB/editpendaftar','refresh');
            
        }
    }

    public function delete_pendaftar($id) {
        if ($this->PPDB_Model->delete_pendaftar($id)) {
            redirect('PPDB/pendaftar','refresh');
        } else {
        }
    }

    public function sendemail($id) {
        // Muat data yang diperlukan dari Model
        $data = $this->PPDB_Model->getDataById($id);
    
        if ($data) {
            // Set variabel file dan pesan sesuai dengan data yang diambil
            $file = 'Kartu_Registrasi_PPDB'; // Ganti dengan nama file yang sesuai dengan kebutuhan Anda
    
            // Panggil sendPdfToEmail dengan parameter yang sesuai
            if ($this->PPDB_Model->sendPdfToEmail($id, $data['email'], $file)) {
                $this->session->set_flashdata('success_send_email', 'Email berhasil dikirim!');
                redirect('PPDB/pendaftar', 'refresh');
            } else {
                $this->session->set_flashdata('error_send_email', 'Gagal mengirim email.');
                redirect('PPDB/sendemail', 'refresh');
            }
        } else {
            // Handle jika data tidak ditemukan
            redirect('PPDB/sendemail', 'refresh');
        }
    }
    
    public function prosessendemail($id) {
        // Muat data yang diperlukan dari Model, set file dan pesan, dan panggil sendPdfToEmail
        $data = $this->PPDB_Model->getDataById($id);
    
        if ($data) {
            $file = 'Kartu_Registrasi_PPDB'; // Ganti dengan nama file yang sesuai dengan kebutuhan Anda
    
            if ($this->PPDB_Model->sendPdfToEmail($id, $data['email'], $file)) {
                redirect('PPDB/pendaftar', 'refresh');
            } else {
                redirect('PPDB/sendemail', 'refresh');
            }
        } else {
            redirect('PPDB/sendemail', 'refresh');
        }
    }    
    
    //Email Pengirim
    public function tampil_email(){
        $data['email'] = $this->PPDB_Model->email();
        $this->load->view('admin/email/tampil_email', $data);
    }

    public function email($id){
        $data['email'] = $this->PPDB_Model->email_id($id)->row();
        $this->load->view('admin/email/email', $data);
    }

    public function proseseditemail($id){
        if($this->PPDB_Model->edit_email($id)){
            redirect('PPDB/tampil_email','refresh');

        } else {
            redirect('PPDB/email/'. $id);
            
        }
    }
    
}