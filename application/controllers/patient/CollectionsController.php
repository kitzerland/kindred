<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CollectionsController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        // $this->load->model('auth/auth');

    }

    public function index(){
    	$data = [
    		"view" => "patient/collections",
    		"title" => "Document Collections"
    	];
        $this->load->view("template", $data);
    }

}