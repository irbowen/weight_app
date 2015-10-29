<?php
  class Welcome extends CI_Controller {

    private $data;

    public function __construct() {
      parent::__construct();
    }

    public function index()	{
      $this->load->model('weight_model');
      $this->data['lifts'] = $this->weight_model->get_all();
      $this->load->view('lifts', $this->data);
    }

}
