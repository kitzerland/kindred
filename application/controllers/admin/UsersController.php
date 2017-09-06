<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/users');

    }

    public function index(){
        $data = $this->input->get();
        $this->flash->old($data);

    	$data = [
    		"view" => "admin/users",
    		"title" => "Users",
            "users" => $this->users->users($data)
    	];
        $this->load->view("template", $data);
    }

    public function deactivate($id = 0){
        return $this->users->deactivate($id);
    }

    public function activate($id = 0){
        return $this->users->activate($id);
    }

    public function reset($id = 0){
        return $this->users->reset($id);
    }

    public function delete($id = 0){
        return $this->users->delete($id);
    }


}