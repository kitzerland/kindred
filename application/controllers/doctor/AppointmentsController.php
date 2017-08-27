<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppointmentsController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        // $this->load->model('auth/auth');

    }

    public function index(){
    	$data = [
    		"view" => "doctor/appointments",
    		"title" => "Appointments"
    	];
        $this->load->view("template", $data);
    }

}