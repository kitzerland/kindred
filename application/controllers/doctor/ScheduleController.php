<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('doctor/schedule');

    }

    public function index(){
    	$data = [
    		"view" => "doctor/schedule",
    		"title" => "My Schedule",
            "schedules" => $this->schedule->schedules()
    	];
        $this->load->view("template", $data);
    }

    public function create(){
        $data = $this->input->post();
        $this->flash->old($data);
        
        return $this->schedule->create($data);
    }

    public function delete($id = 0){
        return $this->schedule->delete($id);
    }

}