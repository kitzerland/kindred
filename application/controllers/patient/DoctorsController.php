<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DoctorsController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->user->can('doctors')){ show_404(); }
        $this->load->model('doctor/doctors');

    }

    public function index(){
        $data = $this->input->get();
        $this->flash->old($data);

    	$data = [
    		"view" => "patient/doctors",
    		"title" => "Doctors",
            "cities" => $this->doctors->cities(),
            "doctors" => $this->doctors->doctors($data)
    	];
        $this->load->view("template", $data);
    }



}