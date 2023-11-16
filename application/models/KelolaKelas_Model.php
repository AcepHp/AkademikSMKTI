<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaKelas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_kelola_kelas() {
        // Query untuk mengambil semua data kelola_kelas
        $this->db->select('*');
        $this->db->from('kelola_kelas');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_id_kelola_kelas($id_kelas, $kode_jurusan) {
        $this->db->select('id_kelola_kelas');
        $this->db->from('kelola_kelas');
        $this->db->where('id_kelas', $id_kelas);
        $this->db->where('kode_jurusan', $kode_jurusan);
    
        $query = $this->db->get();
        $result = $query->row();
    
        return isset($result->id_kelola_kelas) ? $result->id_kelola_kelas : null;
    }
    

    
    public function get_nama_kelas_by_id($id_kelas) {
        $this->db->select('nama_kelas');
        $this->db->from('kelas');
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get();
        $result = $query->row();
        return isset($result->nama_kelas) ? $result->nama_kelas : null;
    }
    public function get_nama_jurusan_by_kode($kode_jurusan) {
        $this->db->select('nama_jurusan');
        $this->db->from('jurusan');
        $this->db->where('kode_jurusan', $kode_jurusan);
        $query = $this->db->get();
        $result = $query->row();
        return isset($result->nama_jurusan) ? $result->nama_jurusan : null;
    }
    public function get_tahun_akademik_by_id($id_tahun) {
        $this->db->select('tahun_akademik');
        $this->db->from('tahun_akademik');
        $this->db->where('id_tahun', $id_tahun);
        $query = $this->db->get();
        $result = $query->row();
        return isset($result->tahun_akademik) ? $result->tahun_akademik : null;
    }
    public function get_nama_tingkatan_by_kode($kode_tingkatan) {
        $this->db->select('nama_tingkatan');
        $this->db->from('tingkatan');
        $this->db->where('kode_tingkatan', $kode_tingkatan);
        $query = $this->db->get();
        $result = $query->row();
        return isset($result->nama_tingkatan) ? $result->nama_tingkatan : null;
    }
    
                

    public function get_siswa_by_jurusan_kelas_tahun($kode_jurusan, $kode_tingkatan, $id_kelas, $tahun_akademik) {
        $this->db->select('siswa.NISN, siswa.Nama_lengkap, kelola_kelas.id_kelas'); // Tambahkan id_kelas ke dalam select
        $this->db->from('siswa');
        $this->db->join('kelola_kelas', 'siswa.NISN = kelola_kelas.NISN', 'left');
        $this->db->join('tahun_akademik', 'kelola_kelas.id_tahun = tahun_akademik.id_tahun');
        $this->db->where('kelola_kelas.kode_jurusan', $kode_jurusan);
        $this->db->where('kelola_kelas.kode_tingkatan', $kode_tingkatan);
        $this->db->where('kelola_kelas.id_kelas', $id_kelas);
        $this->db->where('tahun_akademik.status', 'Aktif');
        $this->db->where('tahun_akademik.id_tahun', $tahun_akademik);
        $query = $this->db->get();
        return $query->result();
    }
    
    

    public function get_tahun_akademik_aktif_id() {
        $this->db->select('id_tahun');
        $this->db->from('tahun_akademik');
        $this->db->where('status', 'Aktif');
        $query = $this->db->get();
        $result = $query->row();
        return isset($result->id_tahun) ? $result->id_tahun : null;
    }
    public function get_semester_aktif() {
        // Mendapatkan semester aktif dari tabel semester atau sumber data lain yang sesuai
        // Misalnya, dengan mengambil data dari tabel yang menyimpan semester aktif
        $this->db->select('id_semester, nama_semester');
        $this->db->where('status', 'aktif'); // Sesuaikan dengan aturan status semester aktif di tabel Anda
        $query = $this->db->get('semester'); // Sesuaikan dengan nama tabel semester Anda

        if ($query->num_rows() > 0) {
            return $query->row();
        }

        return null; // Mengembalikan null jika tidak ada semester aktif
    }
    public function get_kode_jurusan() {
        $this->db->select('kode_jurusan');
        $this->db->from('jurusan');
        $query = $this->db->get();
        $result = $query->row();
        return isset($result->kode_jurusan) ? $result->kode_jurusan : null;
    }
    public function get_kode_jurusan_by_id_kelas($id_kelas) {
        // Gantilah 'tabel_kelas' dan 'kode_jurusan_field' dengan nama tabel dan kolom yang sesuai di database Anda.
        $this->db->select('kode_jurusan');
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get('kelola_kelas');
    
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->kode_jurusan;
        } else {
            return null;
        }
    }
    public function get_kode_tingkatan_by_id_kelas($id_kelas) {
        $this->db->select('kode_tingkatan');
        $this->db->from('kelas');
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get();
        $result = $query->row();
        return isset($result->kode_tingkatan) ? $result->kode_tingkatan : null;
    }

    public function get_all_siswa() {
        $this->db->select('*');
        $this->db->from('siswa'); // Ganti dengan tabel siswa yang sesuai dengan struktur database Anda
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil query sebagai array objek
    }

    
        


    
    public function get_kelas_by_jurusan_tingkatan($kode_jurusan, $kode_tingkatan) {
        $this->db->select('id_kelas, nama_kelas');
        $this->db->from('kelas');
        $this->db->where('kode_jurusan', $kode_jurusan);
        $this->db->where('kode_tingkatan', $kode_tingkatan);
    
        $query = $this->db->get();
    
        return $query->result();
    }
    public function get_siswa_tidak_di_kelas() {
        $this->db->select('s.*');
        $this->db->from('siswa s');
        $this->db->join('kelola_kelas kk', 's.NISN = kk.NISN', 'left');
        $this->db->where('kk.NISN IS NULL');
        
        $query = $this->db->get();
        
        return $query->result();
    }
    public function tambah_siswa_ke_kelas($selected_siswa, $id_kelas, $kode_jurusan, $id_tahun, $kode_tingkatan) {
        // Loop melalui daftar siswa yang dipilih dan tambahkan ke dalam tabel kelola_kelas
        foreach ($selected_siswa as $nisn) {
            // Cek apakah data siswa sudah ada dalam tabel kelola_kelas
            $existing_data = $this->db->get_where('kelola_kelas', array(
                'NISN' => $nisn,
                'id_kelas' => $id_kelas,
                'kode_jurusan' => $kode_jurusan,
                'id_tahun' => $id_tahun,
                'kode_tingkatan' => $kode_tingkatan
            ));
    
            // Jika data siswa belum ada, maka masukkan ke dalam tabel kelola_kelas
            if ($existing_data->num_rows() == 0) {
                // Data siswa yang akan dimasukkan ke dalam tabel kelola_kelas
                $data = array(
                    'NISN' => $nisn,
                    'id_kelas' => $id_kelas,
                    'kode_jurusan' => $kode_jurusan,
                    'id_tahun' => $id_tahun,
                    'kode_tingkatan' => $kode_tingkatan
                );
    
                // Masukkan data siswa ke dalam tabel kelola_kelas
                $this->db->insert('kelola_kelas', $data);
            }
        }
    }
    public function get_siswa_by_nisn($nisn) {
        $this->db->where('NISN', $nisn);
        $query = $this->db->get('siswa');
        return $query->row(); // Mengembalikan satu baris data siswa berdasarkan NISN
    }
    public function update_kelas_siswa($nisn, $new_kelas_id) {
        $data = array(
            'id_kelas' => $new_kelas_id
        );

        $this->db->where('NISN', $nisn);
        $this->db->update('kelola_kelas', $data);

        return $this->db->affected_rows(); // Mengembalikan jumlah baris yang terpengaruh oleh operasi update
    }
    public function get_all_tahun_akademik() {
        // Query untuk mengambil semua data tahun akademik
        $this->db->select('*');
        $this->db->from('tahun_akademik');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_kelas_by_tingkatan($kode_tingkatan) {
        $this->db->select('*');
        $this->db->from('nama_tabel_kelas'); // Gantilah 'nama_tabel_kelas' dengan nama tabel kelas Anda
        $this->db->where('kode_tingkatan', $kode_tingkatan);
        $query = $this->db->get();
    
        if ($query === FALSE) {
            // Tambahkan penanganan kesalahan
            die($this->db->error());
        }
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data yang cocok
        }
    }
    public function naik_kelas($current_kelas_id, $tingkatan, $next_kelas_id, $tahun_akademik, $selected_siswa) {
        // Memutakhirkan data siswa dengan kelas yang baru, tingkatan yang baru, dan tahun akademik yang baru
        foreach ($selected_siswa as $siswa_id) {
            // Perbarui data siswa dengan kelas dan tingkatan yang baru
            $data = array(
                'id_kelas' => $next_kelas_id,
                'kode_tingkatan' => $tingkatan,
                'id_tahun' => $tahun_akademik,
            );
    
            $this->db->where('NISN', $siswa_id);
            $this->db->update('kelola_kelas', $data);
        }
    }
    public function get_nama_kelas_by_NISN($nisn) {
        $this->db->select('kelas.nama_kelas');
        $this->db->from('kelola_kelas');
        $this->db->join('kelas', 'kelola_kelas.id_kelas = kelas.id_kelas');
        $this->db->where('kelola_kelas.NISN', $nisn);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->nama_kelas;
        } else {
            return 'Tidak ditemukan'; // Anda bisa mengganti dengan pesan yang sesuai jika tidak ada nama kelas yang ditemukan
        }
    }
    

    
    
}
?>