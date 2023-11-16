<?php

    class Auth_model extends CI_Model {
        public function __construct() {
            parent::__construct();
        }
    
        public function login($username, $password) {
            // Enkripsi password dengan MD5 sebelum mencocokkannya dengan yang ada di basis data
            $password_md5 = md5($password);
    
            $this->db->where('username', $username);
            $this->db->where('password', $password_md5); // Menggunakan password yang dienkripsi dengan MD5
            $query = $this->db->get('users');
    
            if ($query->num_rows() == 1) {
                return $query->row();
            } else {
                return false;
            }
        }

        public function getStudentDataByNISN($nisn) {
            $this->db->where('NISN', $nisn);
            $query = $this->db->get('siswa');
        
            if ($query->num_rows() == 1) {
                return $query->row();
            } else {
                return false;
            }
        }

        
        public function check_username($username) {
            $query = $this->db->get_where('users', array('username' => $username));
            return $query->num_rows() > 0; // Kembalikan TRUE jika username valid, FALSE jika tidak valid
        }
    
        public function check_password($username, $password) {
            $query = $this->db->get_where('users', array('username' => $username));
        
            if ($query->num_rows() === 1) {
                $user = $query->row();
        
                // Verifikasi password yang dienkripsi dengan MD5
                if ($user->password === md5($password)) { // Enkripsi password yang ada di basis data dengan MD5
                    return true; // Password cocok
                }
            }
        
            return false; // Password tidak cocok
        }

        public function getGuruDataByNIP($NIP) {
            $this->db->where('nip', $NIP);
            $query = $this->db->get('guru');
        
            if ($query->num_rows() == 1) {
                return $query->row();
            } else {
                return false;
            }
        }

        public function getuserbyid($id) {
            $this->db->where('id_users', $id);
            return $this->db->get('users')->row_array();
        }
        
        public function updatePassword($id_users, $newPassword) {
            // Hash kata sandi baru sebelum menyimpannya dengan MD5
            $hashedPassword = md5($newPassword);
            
            // Update kata sandi di database
            $data = array(
                'password' => $hashedPassword, 
                'aktif' => '1'
            );
            
            $user = $this->Auth_model->login($username, $password);
            $this->session->set_userdata('aktif', $user->aktif);

            $this->db->where('id_users', $id_users);
            $this->db->update('users', $data);
            
            return ($this->db->affected_rows() > 0);
        }        

    }
    


?>