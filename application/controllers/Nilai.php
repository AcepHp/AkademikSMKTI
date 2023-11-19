<?php

require_once(APPPATH.'libraries/tcpdf/tcpdf.php');

class Nilai extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Nilai_model');
        $this->load->model('Kelas_model'); // Memanggil model Kelas_model
        $this->load->model('Jurusan_model'); // Memanggil model Jurusan_model
        $this->load->model('Datasiswa_model'); // Memanggil model Datasiswa_model
        $this->load->model('Mapel_model'); 
        $this->load->model('Tingkatan_model'); 
        $this->load->model('KelolaKelas_model'); 
        $this->load->model('Tahun_akademik_model'); 
    }

    public function index(){
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        // Mendapatkan data siswa berdasarkan filter jika ada
        $kode_jurusan = $this->input->post('kode_jurusan'); // Ganti 'kode_jurusan' sesuai dengan nama input pada form
        $kode_tingkatan = $this->input->post('kode_tingkatan'); // Ganti 'kode_tingkatan' sesuai dengan nama input pada form
        $id_kelas = $this->input->post('id_kelas');
        $id_tahun = $this->input->post('id_tahun'); // Tambahkan ini untuk mendapatkan tahun akademik
        $nama_kelas = $this->KelolaKelas_model->get_nama_kelas_by_id($id_kelas);

        $data['tahun'] = $this->KelolaKelas_model->get_all_tahun_akademik();
        $tahun_akademik_aktif_id = $this->KelolaKelas_model->get_tahun_akademik_aktif_id();

        if (!empty($kode_jurusan) && !empty($kode_tingkatan) && !empty($id_kelas) && !empty($id_tahun)) {
            $data['siswa'] = $this->KelolaKelas_model->get_siswa_by_jurusan_kelas_tahun($kode_jurusan, $kode_tingkatan, $id_kelas, $id_tahun);
        } else {
            $data['siswa'] = array(); // Jika tidak ada filter, set array kosong
        }

        $data['id_kelas'] = $id_kelas; // Menambahkan id_kelas ke dalam data
        $data['kode_jurusan'] = $kode_jurusan; // Pass kode_jurusan to the view
        $data['id_tahun'] = $id_tahun; // Tambahkan id_tahun ke dalam data
        $data['nama_kelas'] = $nama_kelas;
        $data['tahun_akademik_aktif_id'] = $tahun_akademik_aktif_id;

        // Anda mungkin masih perlu mendapatkan data jurusan dan tingkatan dari model jika diperlukan
        $data['jurusan'] = $this->Jurusan_model->get_all_jurusan();
        $data['tingkatan'] = $this->Tingkatan_model->get_all_tingkatan();

        $this->load->view('guru/nilai/filter_nilai', $data);
    }



    public function cari_data(){
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $kode_jurusan = $this->input->get('kode_jurusan');
        $kode_tingkatan = $this->input->get('kode_tingkatan');
        $id_kelas = $this->input->get('id_kelas');
        $id_tahun = $this->input->get('id_tahun');
        $nama_kelas = $this->KelolaKelas_model->get_nama_kelas_by_id($id_kelas);

        // Mendapatkan ID tahun akademik aktif
        $data['tahun'] = $this->KelolaKelas_model->get_all_tahun_akademik();
        $tahun_akademik_aktif_id = $this->KelolaKelas_model->get_tahun_akademik_aktif_id();

        if (!empty($tahun_akademik_aktif_id)) {
            // Menggunakan kode_jurusan, kode_tingkatan, dan id_kelas sebagai filter
            $data['siswa'] = $this->KelolaKelas_model->get_siswa_by_jurusan_kelas_tahun($kode_jurusan, $kode_tingkatan, $id_kelas, $tahun_akademik_aktif_id);
        } else {
            $data['siswa'] = array();
        }

        // Mengirim data filter jurusan, tingkatan, dan kelas ke view
        $data['jurusan'] = $this->Jurusan_model->get_all_jurusan();
        $data['tingkatan'] = $this->Tingkatan_model->get_all_tingkatan();
        $data['selected_jurusan'] = $kode_jurusan;
        $data['selected_tingkatan'] = $kode_tingkatan;
        $data['tahun_akademik_aktif_id'] = $tahun_akademik_aktif_id;


        // Menambahkan id_kelas, kode_jurusan, id_tahun, dan kode_tingkatan ke dalam data
        $data['id_kelas'] = $id_kelas;
        $data['kode_jurusan'] = $kode_jurusan;
        $data['id_tahun'] = $tahun_akademik_aktif_id;
        $data['kode_tingkatan'] = $kode_tingkatan;
        $data['nama_kelas'] = $nama_kelas;

        // Menyaring kelas berdasarkan jurusan dan tingkatan yang dipilih
        $data['kelas'] = $this->KelolaKelas_model->get_kelas_by_jurusan_tingkatan($kode_jurusan, $kode_tingkatan);

        $this->load->view('Guru/nilai/filter_nilai', $data);
    }

    public function get_kelas_by_jurusan() {
        $kode_jurusan = $this->input->post('kode_jurusan');
        $kelas = $this->Kelas_model->get_kelas_by_jurusan($kode_jurusan);
    
        $kelas_dropdown = array();
        foreach ($kelas as $row) {
            $kelas_dropdown[$row->id_kelas] = $row->nama_kelas;
        }
    
        echo json_encode($kelas_dropdown);
    }
    public function tampil_nilai($nisn) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        // Mendapatkan informasi semester aktif dari model Semester_model
        $this->load->model('Semester_model');
        $semester_aktif = $this->Semester_model->get_active_semester();
    
        // Mendapatkan data siswa berdasarkan NISN
        $data['siswa'] = $this->Nilai_model->get_siswa_by_NISN($nisn);
    
        // Mendapatkan ID tahun akademik aktif
        $tahun_akademik_aktif_id = $this->KelolaKelas_model->get_tahun_akademik_aktif_id();
    
        // Pastikan variabel tahun_akademik_aktif_id telah diset ke dalam data
        $data['tahun_akademik_aktif_id'] = $tahun_akademik_aktif_id;
    
        if (!empty($data['siswa']) && !is_null($tahun_akademik_aktif_id) && $semester_aktif) {
            // Mendapatkan data nama kelas siswa berdasarkan NISN
            $data['nama_kelas'] = $this->Nilai_model->get_nama_kelas_by_NISN($nisn);
    
            // Mendapatkan nama jurusan siswa berdasarkan NISN
            $data['nama_jurusan'] = $this->Nilai_model->get_nama_jurusan_by_NISN($nisn);
    
            // Mendapatkan data nilai siswa berdasarkan NISN, tahun akademik aktif, dan semester aktif
            $data['nilai'] = $this->Nilai_model->get_nilai_by_nisn_tahun_semester($nisn, $tahun_akademik_aktif_id, $semester_aktif->id_semester);
    
            $data['semester_aktif'] = $semester_aktif->nama_semester;
        } else {
            $data['siswa'] = array(); // Jika tidak ada data siswa atau tahun akademik aktif, set array siswa kosong
            $data['nama_kelas'] = 'Tidak Ada Kelas'; // Jika tidak ada data siswa atau tahun akademik aktif, set pesan default untuk kelas
            $data['nama_jurusan'] = 'Tidak Ada Jurusan'; // Jika tidak ada data siswa atau tahun akademik aktif, set pesan default untuk jurusan
            $data['nilai'] = array(); // Set array nilai kosong
            $data['semester_aktif'] = 'Tidak Ada Semester Aktif'; // Jika tidak ada semester aktif, set pesan default
        }
    
        // Mendapatkan data siswa dan mata pelajaran
        $data['nama_lengkap'] = $this->Nilai_model->get_nama_lengkap_by_nisn($nisn);
        $data['mata_pelajaran'] = $this->Mapel_model->get_mapel();
    
        $this->load->view('Guru/nilai/data_nilai', $data);
    }

    public function tambah_nilai($nisn) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        // Mendapatkan kode jurusan dan kode_tingkatan menggunakan fungsi get_kode_jurusan_tingkatan_by_NISN
        $kode_jurusan_tingkatan = $this->Nilai_model->get_kode_jurusan_tingkatan_by_NISN($nisn);
    
        if ($kode_jurusan_tingkatan) {
            $kode_jurusan = $kode_jurusan_tingkatan->kode_jurusan;
            $kode_tingkatan = $kode_jurusan_tingkatan->kode_tingkatan;
    
            // Mengambil detail siswa berdasarkan NISN yang diberikan
            $data['siswa'] = $this->Nilai_model->get_siswa_by_NISN($nisn);
    
            if ($data['siswa']) {
                // Mendapatkan semua data mata pelajaran yang tersedia berdasarkan kode jurusan dan kode_tingkatan siswa
                $data['semesteraktif'] = $this->Nilai_model->get_active_semester();
                $data['mata_pelajaran'] = $this->Nilai_model->get_mata_pelajaran_by_jurusan_kelas_tingkatan($data['siswa']->NISN ,$kode_jurusan, $data['siswa']->id_kelas, $kode_tingkatan, $data['semesteraktif']->id_semester);
                $data['validasi'] = $this->Nilai_model->validasi_mata_pelajaran_admin();
    
                // Mendapatkan tahun akademik aktif
                $this->load->model('Tahun_Akademik_model');
                $tahun_akademik_aktif = $this->Tahun_Akademik_model->get_tahun_akademik_aktif();
    
                // Mendapatkan informasi semester aktif
                $this->load->model('Semester_model');
                $semester_aktif = $this->Semester_model->get_active_semester();
    
                if ($tahun_akademik_aktif && $semester_aktif) {
                    $data['tahun_akademik'] = $tahun_akademik_aktif->id_tahun; // Menggunakan id_tahun
                    $data['semester_aktif'] = $semester_aktif->id_semester; // Menggunakan id_semester
    
                    $this->load->view('Guru/nilai/tambah_nilai', $data);
                } else {
                    // Menangani kasus ketika tahun akademik atau semester aktif tidak ditemukan
                    // Anda dapat mengarahkan ke halaman error atau menampilkan pesan kesalahan di sini
                    echo "Tahun akademik atau semester aktif tidak ditemukan"; // Sesuaikan pesan ini sesuai kebutuhan
                }
            } else {
                // Menangani kasus ketika siswa dengan NISN yang diberikan tidak ditemukan
                // Anda dapat mengarahkan ke halaman error atau menampilkan pesan kesalahan di sini
                echo "Siswa tidak ditemukan"; // Sesuaikan pesan ini sesuai kebutuhan
            }
        } else {
            // Handle jika data kode jurusan atau kode_tingkatan tidak ditemukan
            echo "Data kode jurusan atau kode_tingkatan tidak ditemukan"; // Sesuaikan pesan ini sesuai kebutuhan
        }
    }
    
    
    public function simpan_tambah_nilai() {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        // Mendapatkan data dari formulir
        $nisn = $this->input->post('nisn');
        $id_tahun = $this->input->post('id_tahun');
        $id_semester = $this->input->post('id_semester');
        $id_mapel = $this->input->post('id_mapel');
        $kehadiran = $this->input->post('kehadiran');
        $tugas = $this->input->post('tugas');
        $uts = $this->input->post('uts');
        $uas = $this->input->post('uas');
        $persentase_kehadiran = $this->input->post('persentase_kehadiran');
        $persentase_tugas = $this->input->post('persentase_tugas');
        $persentase_uts = $this->input->post('persentase_uts');
        $persentase_uas = $this->input->post('persentase_uas');
        $nilai_akhir = $this->input->post('nilai_akhir');
    
        // Memanggil model untuk menyimpan data
        $this->Nilai_model->simpan_tambah_nilai($nisn, $id_tahun, $id_semester, $id_mapel, $kehadiran, $tugas, $uts, $uas, $nilai_akhir, $persentase_kehadiran, $persentase_tugas, $persentase_uts, $persentase_uas);
    
        // Redirect ke halaman yang sesuai dengan NISN
        redirect('nilai/tampil_nilai/' . $nisn); // Pastikan NISN ada di sini
    }
    

    
    public function edit_nilai($id_nilai) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $data['nilai'] = $this->Nilai_model->get_nilai_by_id($id_nilai);
    
        if ($data['nilai']) {
            $nisn = $data['nilai']->NISN;
            $data['siswa'] = $this->Nilai_model->get_siswa_by_NISN($nisn);
            $data['mata_pelajaran'] = $this->Nilai_model->get_mata_pelajaran_by_jurusan_kelas($data['siswa']->kode_jurusan, $data['siswa']->id_kelas);
            $data['nisn'] = $nisn;
    
            // Mendapatkan tahun akademik aktif
            $this->load->model('Tahun_Akademik_model');
            $tahun_akademik_aktif = $this->Tahun_Akademik_model->get_tahun_akademik_aktif();
    
            // Mendapatkan semester aktif
            $this->load->model('Semester_model');
            $semester_aktif = $this->Semester_model->get_active_semester();
    
            if ($tahun_akademik_aktif && $semester_aktif) {
                $data['id_tahun'] = $tahun_akademik_aktif->id_tahun;
                $data['id_semester'] = $semester_aktif->id_semester;
    
                $this->load->view('Guru/nilai/edit_nilai', $data);
            } else {
                echo "Tahun akademik atau semester aktif tidak ditemukan";
            }
        } else {
            echo "Data nilai tidak ditemukan";
        }
    }
    
    public function edit_data_nilai() {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        $id_nilai = $this->input->post('id_nilai');
        $id_mapel = $this->input->post('id_mapel');
        $id_tahun = $this->input->post('id_tahun');
        $id_semester = $this->input->post('id_semester');
        $kehadiran = $this->input->post('kehadiran');
        $tugas = $this->input->post('tugas');
        $uts = $this->input->post('uts');
        $uas = $this->input->post('uas');
        $persentase_kehadiran = $this->input->post('persentase_kehadiran');
        $persentase_tugas = $this->input->post('persentase_tugas');
        $persentase_uts = $this->input->post('persentase_uts');
        $persentase_uas = $this->input->post('persentase_uas');
        $nilai_akhir = $this->input->post('nilai_akhir');
    
        // Memanggil model untuk menyimpan data
        $this->Nilai_model->edit_nilai($id_nilai, $id_mapel, $id_tahun, $id_semester, $kehadiran, $tugas, $uts, $uas, $nilai_akhir, $persentase_kehadiran, $persentase_tugas, $persentase_uts, $persentase_uas);
    
        // Redirect ke halaman yang sesuai dengan NISN
        $nisn = $this->input->post('nisn');
        redirect('nilai/tampil_nilai/' . $nisn);
    }
    
    
    
    public function hapus_nilai($id_nilai) {
        if ($this->session->userdata('role') !== 'SuperAdmin') {
            redirect('auth');
        }
        // Pastikan Anda memiliki fungsi di model yang dapat menghapus data berdasarkan ID_Nilai
        $this->Nilai_model->hapus_data_nilai($id_nilai);
        
        // Kirim respons JSON ke JavaScript
        echo json_encode(['status' => 'success']);
    }

     // penilaian untuk guru

    public function penilaian() {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }
        $tahun = $this->Nilai_model->get_tahun();
        $semester = $this->Nilai_model->get_semester();
    
        // Ambil nilai id_tahun dari hasil query tahun yang didapat
        $id_tahun = $tahun[0]->id_tahun; 
    
        // Ambil nilai id_semester dari hasil query semester yang didapat
        $id_semester = $semester[0]->id_semester; 
        
        $data['tahun'] = $tahun;
        $data['semester'] = $semester;
        $data['guru'] = $this->Nilai_model->get_mapel_data($this->session->userdata('ID_Guru'),$id_tahun,$id_semester);
        $data['tingkatan'] = $this->Nilai_model->get_tingkatan();
        
        $this->load->view('Guru/Penilaian/penilaian', $data);
    }    

    public function penilaian_siswa($id_kelas,$id_tahun,$id_mapel) {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }
        $semester = $this->Nilai_model->get_semester();
        
        // Ambil nilai id_semester dari hasil query semester yang didapat
        $id_semester = $semester[0]->id_semester; 
        
        $data['semester'] = $semester;

        $data['siswa'] = $this->Nilai_model->get_all_siswa_by_kelas($id_kelas,$id_tahun,$id_mapel,$id_semester);
        $data['kelas'] = $this->Nilai_model->get_detail_kelas($id_kelas);
        $data['mapel'] = $this->Nilai_model->  get_detail_kelas_mapel($id_kelas);
        
        $this->load->view('Guru/Penilaian/tampil_siswa', $data);
    }  

    public function tambah_nilai_guru($NISN,$id_kelas) {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }
        $data['kelas'] = $this->Nilai_model->get_detail_kelas($id_kelas);
        $data['mapel'] = $this->Nilai_model-> get_detail_kelas_mapel($id_kelas);
        $data['siswa'] = $this->Nilai_model->get_siswa_by_NISN_guruu($NISN);
        $data['semester'] = $this->Nilai_model->get_semester();

        $this->load->view('Guru/Penilaian/tambah_nilai_guru', $data);
    } 

    public function edit_nilai_guru($NISN,$id_kelas,$id_mapel) {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }
        $data['kelas'] = $this->Nilai_model->get_detail_kelas($id_kelas);
        $data['mapel'] = $this->Nilai_model-> get_detail_kelas_mapel($id_kelas);
        $data['siswa'] = $this->Nilai_model->get_siswa_by_NISN_guru($NISN,$id_mapel);

        $this->load->view('Guru/Penilaian/edit_nilai_guru', $data);
    } 

    public function simpan_tambah_nilai_guru() {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }
        // Mendapatkan data dari formulir
        $id_kelas = $this->input->post('id_kelas');
        $id_semester = $this->input->post('id_semester');
        $id_tahun = $this->input->post('id_tahun');
        $nisn = $this->input->post('NISN');
        $id_mapel = $this->input->post('id_mapel');
        $kehadiran = $this->input->post('kehadiran');
        $tugas = $this->input->post('tugas');
        $uts = $this->input->post('uts');
        $uas = $this->input->post('uas');
        $persentase_kehadiran = $this->input->post('persentase_kehadiran');
        $persentase_tugas = $this->input->post('persentase_tugas');
        $persentase_uts = $this->input->post('persentase_uts');
        $persentase_uas = $this->input->post('persentase_uas');
        $nilai_akhir = $this->input->post('nilai_akhir');
    
        // Memanggil model untuk menyimpan data
        $this->Nilai_model->simpan_data_nilai($nisn, $id_tahun, $id_semester, $id_mapel, $kehadiran, $tugas, $uts, $uas, $nilai_akhir, $persentase_kehadiran, $persentase_tugas, $persentase_uts, $persentase_uas);
        // Redirect ke halaman yang sesuai tujuan
        redirect('nilai/penilaian_siswa/' . $id_kelas . '/' . $id_tahun. '/' . $id_mapel); // Pastikan NISN ada di sini
    }

    public function edit_data_nilai_guru() {
        if ($this->session->userdata('role') !== 'Guru') {
            redirect('auth');
        }
        // Mendapatkan data dari formulir
        $id_nilai = $this->input->post('id_nilai');
        $id_kelas = $this->input->post('id_kelas');
        $id_semester = $this->input->post('id_semester');
        $id_tahun = $this->input->post('id_tahun');
        $nisn = $this->input->post('NISN');
        $id_mapel = $this->input->post('id_mapel');
        $kehadiran = $this->input->post('kehadiran');
        $tugas = $this->input->post('tugas');
        $uts = $this->input->post('uts');
        $uas = $this->input->post('uas');
        $persentase_kehadiran = $this->input->post('persentase_kehadiran');
        $persentase_tugas = $this->input->post('persentase_tugas');
        $persentase_uts = $this->input->post('persentase_uts');
        $persentase_uas = $this->input->post('persentase_uas');
        $nilai_akhir = $this->input->post('nilai_akhir');
    
        // Memanggil model untuk mengedit data
        $this->Nilai_model->edit_nilai($id_nilai, $id_mapel, $id_tahun, $id_semester, $kehadiran, $tugas, $uts, $uas, $nilai_akhir, $persentase_kehadiran, $persentase_tugas, $persentase_uts, $persentase_uas);

        // Redirect ke halaman yang sesuai tujuan
        redirect('nilai/penilaian_siswa/' . $id_kelas . '/' . $id_tahun . '/' . $id_mapel); // Pastikan NISN ada di sini
    }
    
    // siswa tampil nilai
    public function siswa_tampil_nilai() {
        if ($this->session->userdata('role') !== 'Siswa') {
            redirect('auth');
        }
        $tahun = $this->Nilai_model->get_tahun();
        $semester = $this->Nilai_model->get_semester();
    
        // Ambil nilai id_tahun dari hasil query tahun yang didapat
        $id_tahun = $tahun[0]->id_tahun; 
    
        // Ambil nilai id_semester dari hasil query semester yang didapat
        $id_semester = $semester[0]->id_semester; 
        
        $data['tahun'] = $tahun;
        $data['semester'] = $semester;
        $data['nilai'] = $this->Nilai_model->get_nilai_datasiswa_nilai($this->session->userdata('nisn'));
        $data['siswa'] = $this->Nilai_model->get_nilai_datasiswa_siswa($this->session->userdata('nisn'));
       // $data['siswa'] = $this->Nilai_model->get_nilai_datasiswa($this->session->userdata('nisn'));
        $data['tingkatan'] = $this->Nilai_model->get_tingkatan();
        
        $this->load->view('siswa/nilai/tampil_nilai', $data);
    }    

    public function siswa_tampil_nilai_semester() {
        if ($this->session->userdata('role') !== 'Siswa') {
            redirect('auth');
        }
        $tahun = $this->Nilai_model->get_tahun();
        $semester = $this->Nilai_model->get_semester();
        $tingkat = $this->Nilai_model->get_tingkat_by_nisn($this->session->userdata('nisn'));
    
        // Ambil nilai id_tahun dari hasil query tahun yang didapat
        $id_tahun = $tahun[0]->id_tahun; 
    
        // Ambil nilai id_semester dari hasil query semester yang didapat
        $id_semester = $semester[0]->id_semester; 

         // Initialize $kode_tingkatan to handle the case where $tingkat is null
        $kode_tingkatan = null;

        // Check if $tingkat is not null before accessing its properties
        if ($tingkat !== null) {
            $kode_tingkatan = $tingkat->kode_tingkatan;
        }
        
        $data['tahun'] = $tahun;
        $data['semester'] = $semester;
        $data['siswa'] = $this->Nilai_model->get_siswa_by_NISN($this->session->userdata('nisn'));
        $data['kelas'] = $this->Nilai_model->get_siswa_kelas_by_nisn($this->session->userdata('nisn'));
        $data['jurusan'] = $this->Nilai_model->get_siswa_jurusan_by_nisn($this->session->userdata('nisn'));
        $data['nilai'] = $this->Nilai_model->get_nilai_datasiswa_by_status($id_semester,$id_tahun,$kode_tingkatan,$this->session->userdata('nisn'));

        $this->load->view('siswa/nilai/tampil_nilai_semester',$data);
    }

    public function cetak_nilai($nisn) {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Siswa') {
            redirect('auth');
        }
    // Mendapatkan data nilai siswa berdasarkan tahun akademik dan semester aktif
    $tahun_akademik_id = $this->KelolaKelas_model->get_tahun_akademik_aktif_id();
    $semester_aktif = $this->KelolaKelas_model->get_semester_aktif();
    
    // Pastikan tahun akademik dan semester aktif sudah ditemukan
    if (!empty($tahun_akademik_id) && !empty($semester_aktif)) {
        // Mendapatkan nama peserta didik berdasarkan NISN
        $this->load->model('Nilai_model');
        $nama_peserta_didik = $this->Nilai_model->get_nama_lengkap_by_nisn($nisn);
        $this->load->model('Nilai_model');
        $kelas_info = $this->Nilai_model->getKelasInfoByNISN($nisn);

        $tahun_akademik = $this->Tahun_akademik_model->getTahunAkademikById($tahun_akademik_id);
    
        if ($nama_peserta_didik) {
            // Mendapatkan data nilai siswa dari model berdasarkan tahun akademik dan semester aktif
            $data['nilai_siswa'] = $this->Nilai_model->get_nilai_by_nisn_tahun_semester($nisn, $tahun_akademik_id, $semester_aktif->id_semester);
    
            // Tambahkan tahun akademik aktif dan semester aktif ke data
            $data['tahun_akademik_id'] = $tahun_akademik_id;
            $data['semester_aktif'] = $semester_aktif;
            $data['nisn'] = $nisn;
            $data['kelas_info'] = $kelas_info;
            $data['tahun_akademik'] = $tahun_akademik;
            
            // Tambahkan nama peserta didik ke data
            $data['nama_peserta_didik'] = $nama_peserta_didik;

            // Mendapatkan capaian kompetensi untuk setiap mata pelajaran
            foreach ($data['nilai_siswa'] as $nilai) {
                $nilai->capaian = $this->Nilai_model->getCapaianKompetensiById($nilai->id_mapel);
            }

            // Membuat objek PDF
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetMargins(15, 15, 15, true);
            // Menambahkan halaman pertama
            $pdf->AddPage();

            // Menambahkan isi HTML ke halaman PDF
            $html = $this->load->view('guru/nilai/cetak_nilai', $data, true);
            $pdf->writeHTML($html, true, false, true, false, '');

            // Output PDF ke browser
            $pdf->Output('Nilai_Siswa.pdf', 'I');
        } else {
            // Handle jika nama peserta didik tidak ditemukan
            echo "Nama peserta didik tidak ditemukan";
        }
    } else {
        // Handle jika tahun akademik atau semester aktif tidak ditemukan
        echo "Tahun akademik atau semester aktif tidak ditemukan";
    }
}

    
    
    

    

}