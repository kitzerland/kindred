<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('auth/auth');

    }

    public function index(){
    	$data = [
    		"view" => "auth/index",
    		"title" => "My Profile"
    	];
        $this->load->view("auth/template", $data);
    }

}