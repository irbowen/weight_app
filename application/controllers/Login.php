<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'lib_login'));
    }

    /**
     * facebook login
     *
     * @return void
     * @author appleboy
     **/
    public function facebook()
    {
        $fb_data = $this->lib_login->facebook();

        // check login data
        if (isset($fb_data['me'])) {
            //print_r($fb_data);
            echo "Hello, " . $fb_data['me']['name'] . ", your id is : " . $fb_data['me']['id'] . "<br/>";
        } else {
            echo '<a href="' . $fb_data['loginUrl'] . '">Login</a>';
        }
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */