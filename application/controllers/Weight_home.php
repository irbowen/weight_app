<?php

  class Weight_home extends CI_Controller {

    private $data;

    public function __construct() {
      parent::__construct();
      $this->load->library(array('session', 'lib_login'));
      $this->load->model('weight_model');
    }

    public function facebook()
    {
        $fb_data = $this->lib_login->facebook();

        // check login data
        if (isset($fb_data['me'])) {
            $this->data['login_info'] = "Hello, " . $fb_data['me']['name'] . ", your id is : " . $fb_data['me']['id'] . "<br/>";
            $this->weight_model->create_user($fb_data['me']['id'], $fb_data['me']['name']);
        } else {
            $this->data['login_info'] = '<a href="' . $fb_data['loginUrl'] . '">Login</a>';
        }
    }

    public function index()	{
      $this->load->helper('url');
      $this->load->view('weight_app/header');
      $this->facebook();
      $this->load->view('weight_app/login', $this->data);
      $this->data['lifts'] = $this->weight_model->get_all();
      $this->load->view('weight_app/lifts', $this->data);
      //$this->load->library('facebook/facebook');
      //echo $login_url = $this->facebook->login_url();
      //echo file_get_contents(site_url('[ADDRESS TO CONTROLLER FUNCTION]'));
      $this->load->view('weight_app/footer');
    }

}
