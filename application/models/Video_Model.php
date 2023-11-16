<?php

    class Video_Model extends CI_Model {
        public function __construct() {
            parent::__construct();
        }
    
        public function getvideo() {
            return $this->db->get('video');
        }

        public function getvideobyid($id) {
            $this->db->where('id_video', $id);
            return $this->db->get('video');
        }

        public function get_youtube_video_id($url) {
            $video_id = '';
        
            // Menemukan domain dalam URL
            preg_match('/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\//', $url, $matches);
        
            if (!empty($matches)) {
                $domain = $matches[3];
        
                // Berdasarkan domain yang ditemukan, kita akan mengekstrak video ID
                switch ($domain) {
                    case 'youtube.com':
                        parse_str(parse_url($url, PHP_URL_QUERY), $query_params);
                        if (isset($query_params['v'])) {
                            $video_id = $query_params['v'];
                        }
                        break;
        
                    case 'youtu.be':
                        $path = parse_url($url, PHP_URL_PATH);
                        $video_id = trim($path, '/');
                        break;
        
                    default:
                        // Tindakan apa yang harus dilakukan jika domain yang tidak dikenali ditemukan?
                        break;
                }
            }
        
            return $video_id;
        }        

        public function tambahvideo(){
            $judul = $this->input->post("judul");
            $url = $this->input->post("url");       
            
            $video_id = $this->get_youtube_video_id($url);

            $video = array(
                "judul" => $judul,
                "url" => $url,
                "created" => date('Y-m-d'),
            );

            $this->db->where("id_video", $video);
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil ditambahkan !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->insert("video",$video);
        }
        
        public function editvideo($id) {
            $judul = $this->input->post("judul");
            $url = $this->input->post("url");             
            
            $video = array(
                "judul" => $judul,
                "url" => $url,
                "created" => date('Y-m-d'),
            );
        
            $this->db->where("id_video", $id);
            $this->session->set_flashdata("success", "<div class='alert alert-success' role='alert'>Slide show berhasil diupdate !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            return $this->db->update("video", $video);
        }

        public function delete_video($id) {
            $this->db->where('id_video', $id);
            return $this->db->delete('video');
        }

    }
?>
