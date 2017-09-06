<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cities extends CI_Model {

    public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }

    public function cities(){
    	$this->db->select("id, name");
        $query = $this->db->get('city');
        return $query->result();
    }
}