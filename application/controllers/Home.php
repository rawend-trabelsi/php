
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
       
    }

    public function index() {
        

        // Load the view and pass the contacts data
        $this->load->view('Home/index');
    }
}
