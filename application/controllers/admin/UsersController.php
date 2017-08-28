<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('auth/auth');

    }

    public function index(){
    	$data = [
    		"view" => "admin/users",
    		"title" => "Users"
    	];
        $this->load->view("admin/template", $data);
    }

}