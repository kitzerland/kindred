<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Model {

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

    public function createPatient($data){
        $data = array(
            'username' => $data['username'],
            'password' => $data['password'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'city' => $data['city'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            "active" => 1,
            "type" => 1,
            "created_at" => date("Y-m-d H:i:s")
        );
            	
    	$query = $this->db->query('SELECT COUNT(*) as count FROM user WHERE user.username = "'. $data['username'] .'" LIMIT 1');
    	$count = $query->row()->count;

    	if($count == 0){
    		$inserted = $this->db->insert('user', $data);
	    	if($inserted){
	    		$this->flash->success("Successfully registered");
	    		return redirect('/login');
	    	}
	    	$this->flash->danger("Registration failed");
			return redirect('/patient_registration');
    	}
    	$this->flash->danger("Username already taken");
		return redirect('/patient_registration');
    }

    public function createDoctor($data){
        $data = array(
            'registration_number' => $data['registration_number'],
            'username' => $data['username'],
            'password' => $data['password'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'city' => $data['city'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            "active" => 0,
            "type" => 2,
            "created_at" => date("Y-m-d H:i:s")
        );
                
        $query = $this->db->query('SELECT COUNT(*) as count FROM user WHERE user.username = "'. $data['username'] .'" LIMIT 1');
        $count = $query->row()->count;

        if($count == 0){
            $inserted = $this->db->insert('user', $data);
            if($inserted){
                $this->flash->success("Successfully registered. Your account will be activated later on.");
                return redirect('/login');
            }
            $this->flash->danger("Registration failed");
            return redirect('/doctor_registration');
        }
        $this->flash->danger("Username already taken");
        return redirect('/doctor_registration');
    }

    public function login($data){
        $this->db->select('first_name, last_name, type, id, active');
        $query = $this->db->get_where('user', array(
            'username' => $data['username'],
            'password' => $data['password']
        ), 1);
        $user = $query->row();
        if($user){
            if($user->active == 1){
                $userdata = array(
                    "first_name" => $user->first_name,
                    "last_name" => $user->last_name,
                    "type" => $user->type,
                    "id" => $user->id,
                    "active" => $user->active,
                    "logged_in" => true
                );

                $this->session->set_userdata($userdata);
                return redirect("/dashboard");
            }
            $this->flash->danger("Your account is not activated yet.");
            return redirect("/login");
        }
        $this->flash->danger("Invalid username/password");
        return redirect("/login");
    }

    public function logout(){
        $userdata = array( "first_name", "last_name", "type", "id", "active" );
        $this->session->unset_userdata($userdata);
        $this->session->set_userdata('logged_in', false);
        $this->flash->warning("You have been logged out");
        return redirect("/login");
    }

}