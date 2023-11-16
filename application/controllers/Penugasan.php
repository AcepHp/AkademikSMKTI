<?php
class Penugasan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('penugasan_model');
        $this->load->library('form_validation');
    }


    public function index() {
        $data['data'] = $this->penugasan_model->get_all_mata_pelajaran(); 
        $this->load->view('admin/penugasan/penugasan', $data); 
    }

    // Form lihat penugasan
    public function lihat($id_mapel) {
        $tahun = $this->penugasan_model->get_tahun();
        $semester = $this->penugasan_model->get_semester();
    
        // Ambil nilai id_tahun dari hasil query tahun yang didapat
        $id_tahun = $tahun[0]->id_tahun; 
    
        // Ambil nilai id_semester dari hasil query semester yang didapat
        $id_semester = $semester[0]->id_semester; 
        
        $data['tahun'] = $tahun;
        $data['semester'] = $semester;
    
        $data['pengajar_mapel'] = $this->penugasan_model->get_pengajar_by_mapel($id_mapel, $id_tahun, $id_semester);
        $data['mapel'] = $this->penugasan_model->get_mapel_by_id($id_mapel);
        $this->load->view('admin/penugasan/lihat_penugasan', $data);
    }
    
    // form tambah penugasan
    public function tambah_penugasan($id_mapel,$kode_jurusan,$kode_tingkatan) {
        $data['pengajar_mapel'] = $this->penugasan_model->get_mapel_by_id($id_mapel);
        $data['kelas'] = $this->penugasan_model->get_kelas_tanpa_penugasan($kode_jurusan, $id_mapel, $kode_tingkatan);
        $data['guru'] = $this->penugasan_model->get_all_guru();
        $data['tahun'] = $this->penugasan_model->get_tahun();
        $data['semester'] = $this->penugasan_model->get_semester();

        $this->load->view('admin/penugasan/tambah_penugasan', $data); 
    }

    //proses tambah data penugasan
    public function tambah_data() {
        // Ambil nilai id_mapel dari sesi
        $id_mapel=$this->input->post('id_mapel');
    
        // Buat array data untuk disimpan
        $data = array(
            'ID_Guru' => $this->input->post('ID_Guru'),
            'id_mapel' => $this->input->post('id_mapel'),
            'id_kelas' => $this->input->post('id_kelas'),
            'id_tahun' => $this->input->post('id_tahun'),
            'id_semester' => $this->input->post('id_semester'),
        );
    
        // Panggil model untuk menyimpan data
        $this->penugasan_model->tambah_data($data);
        // Redirect ke halaman lihat penugasan
        redirect('Penugasan/lihat/' . $id_mapel);
    }
    
    public function delete_penugasan($id, $id_mapel) {
        // Hapus penugasan berdasarkan ID
        if ($this->penugasan_model->delete_penugasan($id)) {
            // Redirect ke halaman lihat penugasan
            redirect('Penugasan/lihat/' . $id_mapel);
        } else {
            // Handle error
        }
    }
    

    //edit penugasan

    public function edit_penugasan($id) {
        $data['penugasan'] = $this->penugasan_model->get_penugasan_by_id($id);
        $data['guru'] = $this->penugasan_model->get_all_guru();
        $this->load->view('admin/penugasan/edit_penugasan', $data);
    }
    
    public function update_penugasan($id) {

        $id_mapel=$this->input->post('id_mapel');

        // Buat array data untuk diupdate
        $data = array(
            'ID_Guru' => $this->input->post('ID_Guru'),
        );

        // Panggil model untuk melakukan update data
        $this->penugasan_model->update_penugasan($id, $data);

        // Redirect kembali ke halaman lihat penugasan
        redirect('Penugasan/lihat/' . $id_mapel);
    }
    
    


    
    
    
}
    