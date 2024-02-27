
<?php
class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->helper('url'); 
    }

    public function login() {
        $this->load->view('auth/login');
    }

    public function process_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->user_model->verify_user($username, $password);

        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            redirect('Home/index');
        } else {
            $data['error'] = 'Identifiants incorrects.';
            $this->load->view('auth/login', $data);
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('auth/login');
    }
}
