<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->user->can('patient_profile')){ show_404(); }
        $this->load->model('patient/profile');
    }

    public function index(){
        $this->flash->input($this->profile->profile());
    	$data = [
    		"view" => "patient/profile",
    		"title" => "My Profile",
            "cities" => $this->profile->cities()
    	];
        $this->load->view("template", $data);
    }

    public function update(){
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
            return redirect('/patient_profile');
        }

        return $this->profile->update($data);
    }

}