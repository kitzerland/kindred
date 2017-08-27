<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        // $this->load->model('auth/auth');

    }

    public function index(){
    	$data = [
    		"view" => "patient/booking",
    		"title" => "Booking Reqest"
    	];
        $this->load->view("template", $data);
    }

}