<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Flash {

	private $ci;

    public function __construct()
    {
    	$this->ci = &get_instance();
        $this->ci->load->library("session");
    }

    public function danger($msg){
    	$this->ci->session->set_flashdata('flash', ['msg' => $msg, 'type' => 'danger']);
    	return true;
    }

    public function success($msg){
    	$this->ci->session->set_flashdata('flash', ['msg' => $msg, 'type' => 'success']);
    	return true;
    }

    public function warning($msg){
    	$this->ci->session->set_flashdata('flash', ['msg' => $msg, 'type' => 'warning']);
    	return true;
    }

    public function info($msg){
    	$this->ci->session->set_flashdata('flash', ['msg' => $msg, 'type' => 'info']);
    	return true;
    }

    public function input($data = []){
    	$this->ci->session->set_flashdata('input', $data);
    	return true;
    }

    public function old($data = []){
        $this->ci->session->set_flashdata('old', $data);
        return true;
    }

    public function errors($data = []){
        $this->ci->session->set_flashdata('errors', $data);
        return true;
    }

}