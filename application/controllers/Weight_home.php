<?php
  class Weight_home extends CI_Controller {

    private $data;

    public function __construct() {
      parent::__construct();
    }

    public function index()	{
      $this->load->view('weight_app/header');
      $this->load->model('weight_model');
      $this->data['lifts'] = $this->weight_model->get_all();
      $this->load->view('weight_app/lifts', $this->data);
      $this->load->view('weight_app/footer');
    }

}
