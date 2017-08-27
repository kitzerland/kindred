<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingsController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        // $this->load->model('auth/auth');

    }

    public function index(){
    	$data = [
    		"view" => "patient/bookings",
    		"title" => "My Bookings"
    	];
        $this->load->view("template", $data);
    }

}