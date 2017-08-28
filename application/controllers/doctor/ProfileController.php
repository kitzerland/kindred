<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        // $this->load->model('auth/auth');

    }

    public function index(){
    	$data = [
    		"view" => "doctor/profile",
    		"title" => "My Profile"
    	];
        $this->load->view("template", $data);
    }

}