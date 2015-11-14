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

  public function create_user($user_id, $user_name) {
    $check_query  = "SELECT count(*) FROM users U WHERE U.facebook_id = '$user_id'";
    $results = $this->db->query($check_query)->row_array();
    print_r($results);
    if ($results['count(*)'] == 0) {
      echo "TRYING";
      if (!$this->db->query("INSERT INTO users(name, facebook_id) 
        VALUES ('$user_name', '$user_id')") ) {
        echo $this->db->error();
      }
      echo "Inserted\n"; 
    }
  }

}
