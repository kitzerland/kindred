<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CitiesController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('city/cities');
    }

    public function cities(){
    	echo json_encode($this->cities->cities());
    }

}