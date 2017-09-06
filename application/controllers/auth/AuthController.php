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
    		"title" => "Login"
    	];
        $this->load->view("template", $data);
    }

    public function login(){
        $data = $this->input->post();
        $this->flash->old(["username" => $data["username"]]);
        return $this->auth->login($data);
    }

    public function logout(){
        return $this->auth->logout();
    }

}