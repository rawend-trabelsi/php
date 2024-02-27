<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

   public function __construct() {
      parent::__construct();
      // Load database library
      $this->load->database();
   }

   public function add_admin($data) {
     
      $this->db->insert('users', $data);
   }
}
