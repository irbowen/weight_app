<?php

class Weight_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_all() {
    $query = $this->db->query("SELECT name, description, variant FROM lifts");
    return $query->result_array();
  }

  public function get_all_from_lift($lift) {
    $query_string = "SELECT W.weights, W.reps, W.sets, W.workout_data
                    FROM workouts W, lifts L
                    WHERE W.lift_id = L.lift_id AND
                    L.name = '$lift'";
    return $this->db->query($query_string);
  }

}
