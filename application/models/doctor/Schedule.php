<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Schedule extends CI_Model {

    public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }


    public function schedules(){
    	$this->db->select("user_schedule.id, user_schedule.date, user_schedule.from, user_schedule.to");
    	$this->db->from("user_schedule");
    	$this->db->where("user_schedule.user_id", $this->session->userdata("id"));
        $query = $this->db->get();
        return $query->result();
    }

    public function create($data){
    	$data = array(
    		'user_id' => $this->session->userdata("id"),
            'date' => $data['date'],
            'from' => $data['from'],
            'to' => $data['to'],
            "created_at" => date("Y-m-d H:i:s")
        );
        $created = $this->db->insert('user_schedule', $data);
        if($created){
            $this->flash->success("Schdule created.");
            $this->flash->old([]);
            return redirect('/schedule');
        }
        $this->flash->danger("Sorry, schdule cannot be created.");
        return redirect('/schedule');
    }

    public function delete($id){
    	$this->db->select("id");
        $query = $this->db->get_where('user_schedule', array('id' => $id), 1);
        $schedule = $query->row();
        if($schedule){

            $this->db->from('user_schedule_booking');
            $this->db->where("user_schedule_id", $schedule->id);
            $count = $this->db->count_all_results();

            if($count == 0){
                $this->db->where('id', $schedule->id);
                $deleted = $this->db->delete('user_schedule');
                if($deleted){
                    $this->flash->success("Successfully deleted");
                    return redirect("/schedule");
                }
                $this->flash->danger("Schedule cannot be deleted");
                return redirect("/schedule");
            }
            $this->flash->danger("Sorry, you have appointments added in this time slot");
            return redirect("/schedule");
        }
        $this->flash->danger("Invalid schedule");
        return redirect("/schedule");
    }

    
}