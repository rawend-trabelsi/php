
<?php
class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function verify_user($username, $password) {
       
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
        return $query->row();
    }
}
