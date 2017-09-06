<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('auth/auth');
    }

    public function index(){
    	$data = [
    		"view" => "patient/registration",
    		"title" => "Registration",
            "cities" => $this->auth->cities()
    	];
        $this->load->view("template", $data);
    }

    public function create(){
        $data = $this->input->post();
        $this->flash->old($data);

        $rules = array(
            'username' => "required",
            'password' => "required",
            'first_name' => "required",
            'last_name' => "required",
            'address' => "required",
            'city' => "required",
            'gender' => "required",
            'age' => "required|integer"
        );

        $messages = [
            'required' => 'This field is required',
            'integer' => 'Invalid input',
        ];

        $this->validator->validate($data, $rules, $messages);

        if($this->validator->fails()){
            $this->flash->errors($this->validator->errors());
            return redirect('/patient_registration');
        }

        return $this->auth->createPatient($data);
    }

}