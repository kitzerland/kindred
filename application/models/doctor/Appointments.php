<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Appointments extends CI_Model {

    public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }

    public function appointments($input){
    	$from = $input["from"];
    	$to = $input["to"];
    	$this->db->select("user_schedule_booking.id, user.first_name, user.last_name, city.name as city, user_schedule.date, user_schedule.from, user.age, user_schedule.to, user_schedule_booking.status as status_id, IF(TIME(user_schedule_booking.assigned_time) = 0, '', user_schedule_booking.assigned_time) AS assigned_time,
				CASE user_schedule_booking.status
			  		WHEN '0' THEN 'pending'
			  		WHEN '-1' THEN 'discarded'
			  		WHEN '1' THEN 'confirmed'
			  		ELSE ''
		  		END as 'status',
                CASE user.gender
                	WHEN '0' THEN 'Female'
			  		WHEN '1' THEN 'Male'
			  		ELSE ''
		  		END as 'gender'
    		");
    	$this->db->join("user_schedule", "user_schedule.id = user_schedule_booking.user_schedule_id");
    	$this->db->join("user", "user.id = user_schedule_booking.patient_id");
    	$this->db->join("city", "city.id = user.city");
    	$this->db->where("user_schedule_booking.doctor_id", $this->session->userdata("id"));
    	$this->db->where("user_schedule.date BETWEEN DATE('$from') AND DATE('$to')");
        $query = $this->db->get('user_schedule_booking');
        return $query->result();
    }

    public function discard($id, $input){
    	$from = $input["from"];
    	$to = $input["to"];
    	$query = $this->db->get_where("user_schedule_booking", array("id" => $id, "doctor_id" => $this->session->userdata("id")));
    	$appointment = $query->row();

    	if(count($appointment)){
    		$row = [
		    	"status" => "-1",
	    		"updated_at" => date("Y-m-d H:i:s")
	    	];
	    	$this->db->where("user_schedule_booking.id", $id);
    		$updated = $this->db->update("user_schedule_booking", $row);
    		if($updated){
    			$this->flash->success("Appointment discarded");
		        return redirect("/appointments?from=$from&to=$to");
    		}
    		$this->flash->danger("This appointment cannot be discarded");
	        return redirect("/appointments?from=$from&to=$to");
    	}
    	$this->flash->danger("Invalid appointment selected");
        return redirect("/appointments?from=$from&to=$to");
    }


    public function confirm($id, $input){
    	$time = $input["time"];
    	$from = $input["from"];
    	$to = $input["to"];
    	$query = $this->db->get_where("user_schedule_booking", array("id" => $id, "doctor_id" => $this->session->userdata("id")));
    	$appointment = $query->row();

    	if(count($appointment)){
    		$row = [
    			"assigned_time" => $time,
		    	"status" => "1",
	    		"updated_at" => date("Y-m-d H:i:s")
	    	];
	    	$this->db->where("user_schedule_booking.id", $id);
    		$updated = $this->db->update("user_schedule_booking", $row);
    		if($updated){
    			$this->flash->success("Appointment confirmed");
		       	return redirect("/appointments/$id/patient?from=$from&to=$to");
    		}
    		$this->flash->danger("This appointment cannot be confirmed");
	        return redirect("/appointments/$id/patient?from=$from&to=$to");
    	}
    	$this->flash->danger("Invalid appointment selected");
        return redirect("/appointments/$id/patient?from=$from&to=$to");
    }

    public function patient($id, $input){
    	$from = $input["from"];
    	$to = $input["to"];
    	
    	$this->db->select("id");
    	$query = $this->db->get_where("user_schedule_booking", array("id" => $id));
    	$appointment = $query->row();

    	if($appointment){
    		$this->db->select("user_schedule_booking.id, user.first_name, user.last_name, IFNULL(user_schedule_booking.patient_rating, '0') AS rating, user_schedule.date, user_schedule.from, user_schedule.to, HOUR(user_schedule.from) as hour_min, HOUR(user_schedule.to) as hour_max, user.address, user.age, city.name as city, IF(TIME(user_schedule_booking.assigned_time) = 0, '', user_schedule_booking.assigned_time) AS assigned_time,
				CASE user.gender
                	WHEN '0' THEN 'Female'
			  		WHEN '1' THEN 'Male'
			  		ELSE ''
		  		END as 'gender'
    			");
    		$this->db->join("user_schedule", "user_schedule.id = user_schedule_booking.user_schedule_id");
    		$this->db->join("user", "user.id = user_schedule_booking.patient_id");
    		$this->db->join("city", "city.id = user.city");
    		$this->db->where("user_schedule_booking.id", $appointment->id);
	    	$query = $this->db->get('user_schedule_booking');
	    	$patient = $query->row();

	    	if(count($patient)){
	    		$this->flash->old(['rating' => $patient->rating]);
	    		return $patient;
	    	}
	    	$this->flash->danger("Sorry, patient details not available");
    		return redirect("/appointments?from=$from&to=$to");
    	}
		$this->flash->danger("Invalid appointment selected");
		return redirect("/appointments?from=$from&to=$to");
    }

    public function rate($id, $input){
    	$from = $input["from"];
    	$to = $input["to"];
    	$rating = $input["rating"];

    	$row = [
	    	"patient_rating" => $rating,
    		"updated_at" => date("Y-m-d H:i:s")
    	];

    	$query = $this->db->get_where("user_schedule_booking", array("id" => $id));
    	$booking = $query->row();
    	if(count($booking)){
    		$this->db->where("user_schedule_booking.id", $id);
    		$updated = $this->db->update("user_schedule_booking", $row);
            if($updated){
        		$this->flash->success("Rating submitted");
        		return redirect("/appointments/$id/patient?from=$from&to=$to");
            }
            $this->flash->danger("Rating could not be submitted");
            return redirect("/appointments/$id/patient?from=$from&to=$to");
    	}
    	$this->flash->danger("Sorry, you cannot rate this patient");
    	return redirect("/appointments/$id/patient?from=$from&to=$to");
    }

}