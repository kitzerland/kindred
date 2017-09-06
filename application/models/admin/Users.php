<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Model {

    public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }

    public function users($data){
        $type = isset($data["type"]) ? $data["type"] : "-1";
    	$this->db->select("id, registration_number, first_name, last_name, username, address, city, active, gender, age");
        $query = $this->db->get_where('user', array('type' => $type));
        return $query->result();
    }

    public function deactivate($id = 0){
        $this->db->select("id, type");
        $query = $this->db->get_where('user', array('id' => $id), 1);
        $user = $query->row();
        if($user){

            $data = array(
                "active" => 0,
                "updated_at" => date("Y-m-d H:i:s")
            );

            $this->db->where('id', $user->id);
            $updated = $this->db->update('user', $data);
            if($updated){
                $this->flash->success("Successfully deactivated");
                return redirect("/users?type=". $user->type);
            }
            $this->flash->danger("Status cannot be changed");
            return redirect("/users?type=". $user->type);
        }
        $this->flash->danger("Invalid user");
        return redirect("/users");
    }

    public function activate($id = 0){
        $this->db->select("id, type");
        $query = $this->db->get_where('user', array('id' => $id), 1);
        $user = $query->row();
        if($user){

            $data = array(
                "active" => 1,
                "updated_at" => date("Y-m-d H:i:s")
            );

            $this->db->where('id', $user->id);
            $updated = $this->db->update('user', $data);
            if($updated){
                $this->flash->success("Successfully activated");
                return redirect("/users?type=". $user->type);
            }
            $this->flash->danger("Status cannot be changed");
            return redirect("/users?type=". $user->type);
        }
        $this->flash->danger("Invalid user");
        return redirect("/users");
    }

    public function reset($id = 0){
        $this->db->select("id, type");
        $query = $this->db->get_where('user', array('id' => $id), 1);
        $user = $query->row();
        if($user){

            $data = array(
                "password" => "",
                "updated_at" => date("Y-m-d H:i:s")
            );

            $this->db->where('id', $user->id);
            $updated = $this->db->update('user', $data);
            if($updated){
                $this->flash->success("Password successfully reset");
                return redirect("/users?type=". $user->type);
            }
            $this->flash->danger("Password cannot be reset");
            return redirect("/users?type=". $user->type);
        }
        $this->flash->danger("Invalid user");
        return redirect("/users");
    }

    public function delete($id = 0){
        $this->db->select("id, type");
        $query = $this->db->get_where('user', array('id' => $id), 1);
        $user = $query->row();
        if($user){

            $this->db->where('id', $user->id);
            $deleted = $this->db->delete('user');
            if($deleted){
                $this->flash->success("Successfully deleted");
                return redirect("/users?type=". $user->type);
            }
            $this->flash->danger("User cannot be deleted");
            return redirect("/users?type=". $user->type);
        }
        $this->flash->danger("Invalid user");
        return redirect("/users");
    }

}