<?php

class Weight_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_all() {
    $query = $this->db->query("SELECT name, description FROM lifts");
    return $query->result_array();
  }

}
