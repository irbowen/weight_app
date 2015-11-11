<?php
  class Weight_home extends CI_Controller {

    private $data;

    public function __construct() {
      parent::__construct();
    }

    public function index()	{
      $this->load->helper('url');
      $this->load->view('weight_app/header');
      $this->load->model('weight_model');
      $this->data['lifts'] = $this->weight_model->get_all();
      $this->load->view('weight_app/lifts', $this->data);
      //$this->load->library('facebook/facebook');
      //echo $login_url = $this->facebook->login_url();
      //echo file_get_contents(site_url('[ADDRESS TO CONTROLLER FUNCTION]'));
      $this->load->view('weight_app/footer');
    }

}
