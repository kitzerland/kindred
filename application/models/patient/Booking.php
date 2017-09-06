<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking extends CI_Model {

    public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }

    public function summary($id, $date){
    	$this->db->select("user.id, user.registration_number, '-' as schedule_date, user.first_name, user.last_name, user.username, user.address, user.gender, user.age, city.name as city");
        $this->db->from("user");
        $this->db->join("city", "city.id = user.city");
        $this->db->where('user.type', 2);
        $this->db->where('user.active', 1);
        $this->db->where('user.id', $id);
        $query = $this->db->get();
        $user = $query->row();

        if(count($user)){
        	$this->db->select("user_schedule.id, user_schedule.date, user_schedule.from, user_schedule.to");
            $this->db->from("user_schedule");
            $this->db->where("user_schedule.user_id", $user->id);
            $this->db->where("user_schedule.date", $date);
            $squery = $this->db->get();

            $user->schedule_date = $date;
            $user->schedules = $squery->result();
        }

        return $user;
    }

    public function book($data, $doctor_id, $date){

    	$this->db->select("id, user_id");
    	$query = $this->db->get_where("user_schedule", array("id" => $data["schedule"]));
    	$schedule = $query->row();


    	if(count($schedule)){

    		$this->db->from('user_schedule_booking');
    		$this->db->where("user_schedule_id", $data["schedule"]);
    		$this->db->where("doctor_id", $schedule->user_id);
    		$this->db->where("patient_id", $this->session->userdata("id"));
    		$count = $this->db->count_all_results();

    		if ($count == 0) {
    			
    			$row = [
	    			"user_schedule_id" => $schedule->id,
	    			"patient_id" => $this->session->userdata("id"),
	    			"doctor_id" => $schedule->user_id,
	    			"show_documents" => $data["show_documents"],
	    			"created_at" => date("Y-m-d H:i:s")
	    		];
	    		$inserted = $this->db->insert("user_schedule_booking", $row);
	    		if($inserted){
	    			$this->flash->success("Successfully booked");
			    	return redirect("/bookings?from=$date&to=$date");
	    		}
	    		$this->flash->danger("Sorry, booking is not available");
		    	return redirect("/booking/$doctor_id?date=$date");

    		}
    		$this->flash->danger("Already booked");
	    	return redirect("/booking/$doctor_id?date=$date");
    		
    	}
    	$this->flash->danger("Timeslot expired");
    	return redirect("/booking/$doctor_id?date=$date");



    }

}