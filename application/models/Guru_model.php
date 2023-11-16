<?php
class Guru_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load library database
    }
}