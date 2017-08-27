<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppointmentController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        return "hello";
        // $this->load->model('auth/auth');

    }

    public function index($slug = 0){

        $btn = "<a style='padding: 3px 5px 3px 5px;' class='btn' href='". base_url('/appointments') ."'><i class='pe-7s-back-2'></i> Go Back To Appointments</a>";

    	$data = [
    		"view" => "doctor/appointment",
    		"title" => "Appointment #$slug Details",
            "dom" => $btn,
            "slug" => $slug
    	];
        $this->load->view("template", $data);
    }

}