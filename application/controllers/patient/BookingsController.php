<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingsController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('patient/bookings');

    }

    public function index(){
        $input = $this->input->get();
        $this->flash->old($input);
        $input["from"] = isset($input["from"]) ? $input["from"] : "";
        $input["to"] = isset($input["to"]) ? $input["to"] : "";

    	$data = [
    		"view" => "patient/bookings",
    		"title" => "My Bookings",
            "bookings" => $this->bookings->bookings($input),
            "from" => $input["from"],
            "to" => $input["to"]
    	];
        $this->load->view("template", $data);
    }

    public function delete($id = 0){
        $input = $this->input->get();
        $this->flash->old($input);
        $input["from"] = isset($input["from"]) ? $input["from"] : "";
        $input["to"] = isset($input["to"]) ? $input["to"] : "";

        return $this->bookings->delete($id, $input);
    }

    public function doctor($id = 0){
        $input = $this->input->get();
        $this->flash->old($input);
        $input["from"] = isset($input["from"]) ? $input["from"] : "";
        $input["to"] = isset($input["to"]) ? $input["to"] : "";

        $data = [
            "view" => "patient/doctor",
            "title" => "Doctor Details",
            "from" => $input["from"],
            "to" => $input["to"],
            "doctor" => $this->bookings->doctor($id, $input)
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

        return $this->bookings->rate($id, $input);
    }



}