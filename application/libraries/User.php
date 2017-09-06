<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User {

	private $ci;

    public function __construct()
    {
    	$this->ci = &get_instance();
    	$this->ci->load->library("session");
    }

    public function can($permission){
    	$patient = array(
    		'patient_profile', 'doctors'
    	);
    	$doctor = array(
    		'doctor_profile', 'appointments'
    	);
    	$admin = array(
    		''
    	);
    	$roles = array(
    		"1" => $patient, 
    		"2" => $doctor,
    		"99" => $admin
    	);

    	$role = $this->ci->session->userdata("type");
    	if($role){
    		if(in_array($permission, $roles[$role])){
    			return true;
    		}
    	}
    	return false;
    }

}