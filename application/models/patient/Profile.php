<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Model {

    public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }

    public function cities(){
        $this->db->select("id, name");
        $query = $this->db->get('city');
        return $query->result();
    }

    public function profile(){
    	$this->db->select("first_name, last_name, username, address, city, gender, age");
        $query = $this->db->get_where('user', array('id' => $this->session->userdata("id")), 1);
        return $query->row();
    }

    public function update($data){
        $data = array(
            'username' => $data['username'],
            'password' => $data['password'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'city' => $data['city'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            "updated_at" => date("Y-m-d H:i:s")
        );
        $this->db->where('id', $this->session->userdata("id"));
        $updated = $this->db->update('user', $data);
        if($updated){
            $this->flash->success("Your prfile has been updated.");
            return redirect('/patient_profile');
        }
        $this->flash->danger("Sorry, your profile cannot be updated.");
        return redirect('/patient_profile');
    }
}