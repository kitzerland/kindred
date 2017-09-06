<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppointmentsController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('doctor/appointments');
    }

    public function index(){
        $input = $this->input->get();
        $this->flash->old($input);
        $input["from"] = isset($input["from"]) ? $input["from"] : "";
        $input["to"] = isset($input["to"]) ? $input["to"] : "";

    	$data = [
    		"view" => "doctor/appointments",
    		"title" => "Appointments",
            "appointments" => $this->appointments->appointments($input),
            "from" => $input["from"],
            "to" => $input["to"]
    	];
        $this->load->view("template", $data);
    }

    public function discard($id = 0){
        $input = $this->input->get();
        $input["from"] = isset($input["from"]) ? $input["from"] : "";
        $input["to"] = isset($input["to"]) ? $input["to"] : "";

        return $this->appointments->discard($id, $input);
    }

    public function confirm($id = 0){
        $input = $this->input->get();
        $this->flash->old($input);
        $post = $this->input->post();
        $input = array_merge($input, $post);

        $input["from"] = isset($input["from"]) ? $input["from"] : "";
        $input["to"] = isset($input["to"]) ? $input["to"] : "";
        $input["time"] = isset($input["time"]) ? $input["time"] : "";

        return $this->appointments->confirm($id, $input);
    }

    public function patient($id = 0){
        $input = $this->input->get();
        $this->flash->old($input);
        $input["from"] = isset($input["from"]) ? $input["from"] : "";
        $input["to"] = isset($input["to"]) ? $input["to"] : "";

        $data = [
            "view" => "doctor/patient",
            "title" => "Patient Details",
            "from" => $input["from"],
            "to" => $input["to"],
            "patient" => $this->appointments->patient($id, $input)
        ];
        $this->load->view("template", $data);
    }

    public function rate($id = 0){
        $rating = isset($this->input->post()["rating"]) ? $this->input->post()["rating"] : 0;
        $input = $this->input->get();
        $this->flash->old($input);

        $input["from"] = isset($input["from"]) ? $input["from"] : "";
        $input["to"] = isset($input["to"]) ? $input["to"] : "";
        $input["rating"] = $rating;

        return $this->appointments->rate($id, $input);
    }

}