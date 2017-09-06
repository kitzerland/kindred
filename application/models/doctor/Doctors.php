<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Doctors extends CI_Model {

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

    public function doctors($data){
        $city = isset($data["city"]) ? $data["city"] : "";
        $date = isset($data["date"]) ? $data["date"] : "";

        $this->db->select("user.id, user.registration_number, '-' as schedule_date, user.first_name, user.last_name, user.username, user.address, user.gender, user.age, city.name as city");
        $this->db->from("user");
        $this->db->join("city", "city.id = user.city");
        $this->db->where('type', 2);
        $this->db->where('active', 1);
        $this->db->where('city', $city);
        $query = $this->db->get();
        $users = $query->result();

        foreach($users as $user){
            $this->db->select("user_schedule.id, user_schedule.date, user_schedule.from, user_schedule.to");
            $this->db->from("user_schedule");
            $this->db->where("user_schedule.user_id", $user->id);
            $this->db->where("user_schedule.date", $date);
            $squery = $this->db->get();
            $user->schedule_date = $date;
            $user->schedules = $squery->result();
        }

        return $users;


    }

}