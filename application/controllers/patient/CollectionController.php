<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CollectionController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        // $this->load->model('auth/auth');
        
    }

    public function index($slug){
    	$data = [
    		"view" => "patient/collection",
    		"title" => "Upload Documents"
    	];
        $this->load->view("template", $data);
    }

}