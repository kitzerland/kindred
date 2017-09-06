<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bookings extends CI_Model {

    public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }

    public function bookings($input){
    	$from = $input["from"];
    	$to = $input["to"];
    	$this->db->select("user_schedule_booking.id, user.first_name, user.last_name, city.name as city, user_schedule.date, user_schedule.from, user_schedule.to, user_schedule_booking.status as status_id, IF(TIME(user_schedule_booking.assigned_time) = 0, '', user_schedule_booking.assigned_time) AS assigned_time,
				CASE user_schedule_booking.status
		  		WHEN '0' THEN 'pending'
		  		WHEN '-1' THEN 'disapproved'
		  		WHEN '1' THEN 'confirmed'
		  		ELSE ''
		  		END as 'status'
    		");
    	$this->db->join("user_schedule", "user_schedule.id = user_schedule_booking.user_schedule_id");
    	$this->db->join("user", "user.id = user_schedule_booking.doctor_id");
    	$this->db->join("city", "city.id = user.city");
    	$this->db->where("user_schedule_booking.patient_id", $this->session->userdata("id"));
    	$this->db->where("user_schedule.date BETWEEN DATE('$from') AND DATE('$to')");
        $query = $this->db->get('user_schedule_booking');
        return $query->result();
    }

    public function delete($id, $input){
    	$this->flash->old($input);
    	$from = $input["from"];
    	$to = $input["to"];

    	$this->db->select("status");
    	$query = $this->db->get_where("user_schedule_booking", array("id" => $id, "patient_id" => $this->session->userdata("id")));
    	$booking = $query->row();
        
    	if(count($booking)){
    		if($booking->status != 1){
    			$this->db->where("id", $id);
		    	$deleted = $this->db->delete("user_schedule_booking");
		    	if($deleted){
		    		$this->flash->success("Successfully deleted");
			    	return redirect("/bookings?from=$from&to=$to");
		    	}
		    	$this->flash->danger("Sorry, This booking cannot be deleted");
		    	return redirect("/bookings?from=$from&to=$to");
    		}
    		$this->flash->danger("Sorry, Your booking has been confirmed");
		    return redirect("/bookings?from=$from&to=$to");
    	}
    	$this->flash->danger("Invalid booking selected");
        return redirect("/bookings?from=$from&to=$to");
    }

    public function doctor($id, $input){
    	$from = $input["from"];
    	$to = $input["to"];
    	// print_r($input);
    	
    	$this->db->select("id");
    	$query = $this->db->get_where("user_schedule_booking", array("id" => $id));
    	$booking = $query->row();

    	if($booking){
    		$this->db->select("user_schedule_booking.id, user.first_name, user.last_name, IFNULL(user_schedule_booking.doctor_rating, '0') AS rating, user.address, city.name as city");
    		$this->db->join("user", "user.id = user_schedule_booking.doctor_id");
    		$this->db->join("city", "city.id = user.city");
    		$this->db->where("user_schedule_booking.id", $booking->id);
	    	$query = $this->db->get('user_schedule_booking');
	    	$doctor = $query->row();

	    	if(count($doctor)){
	    		$this->flash->old(['rating' => $doctor->rating]);
	    		return $doctor;
	    	}
	    	$this->flash->danger("Sorry, doctor details not available");
    		return redirect("/bookings?from=$from&to=$to");
    	}
		$this->flash->danger("Invalid booking selected");
		return redirect("/bookings?from=$from&to=$to");
    }

    public function rate($id, $input){
    	$from = $input["from"];
    	$to = $input["to"];
    	$rating = $input["rating"];

    	$row = [
	    	"doctor_rating" => $rating,
    		"updated_at" => date("Y-m-d H:i:s")
    	];

    	$query = $this->db->get_where("user_schedule_booking", array("id" => $id));
    	$booking = $query->row();
    	if(count($booking)){
    		$this->db->where("user_schedule_booking.id", $id);
    		$updated = $this->db->update("user_schedule_booking", $row);
            if($updated){
        		$this->flash->success("Rating submitted");
        		return redirect("/bookings/$id/doctor?from=$from&to=$to");
            }
            $this->flash->danger("Rating could not be submitted");
            return redirect("/bookings/$id/doctor?from=$from&to=$to");
    	}
    	$this->flash->danger("Sorry, you cannot rate this doctor");
    	return redirect("/bookings/$id/doctor?from=$from&to=$to");
    }
}