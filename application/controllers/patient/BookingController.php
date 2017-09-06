<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('patient/booking');

    }

    public function index($id = 0){
        $date = isset($this->input->get()["date"]) ? $this->input->get()["date"] : "";
    	$data = [
    		"view" => "patient/booking",
    		"title" => "Booking Reqest",
            "summary" => $this->booking->summary($id, $date)
    	];
        $this->load->view("template", $data);
    }

    public function book($doctor_id = 0){
        $date = isset($this->input->get()["date"]) ? $this->input->get()["date"] : "";
        $data = $this->input->post();
        $this->flash->old($data);

        $data["show_documents"] = isset($data["show_documents"]) && $data["show_documents"] == 1 ? 1 : 0;
        $data["schedule"] = isset($data["schedule"]) ? $data["schedule"] : 0;

        return $this->booking->book($data, $doctor_id, $date);
        // print_r($data);
        // return redirect("/booking/$doctor_id?date=$date");
    }

}