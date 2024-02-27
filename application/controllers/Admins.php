<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

   public function __construct() {
      parent::__construct();
      // Load necessary libraries, models, etc.
   }

   public function add_admin() {
      // Load form helper and validation library
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->model('Admin_model'); // Load your admin model
  
      // Set validation rules
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
  
      if ($this->form_validation->run() == FALSE) {
          // Validation failed, load the form view
          $this->load->view('admins/add_admin');
      } else {
          // Validation passed, add admin to the database
          $data = array(
              'username' => $this->input->post('username'),
              'password' => $this->input->post('password'), // Save password as plain text
          );
  
          // Call the model method to add admin to the database
          $this->Admin_model->add_admin($data);
  
          // Display success alert
          $data['success_message'] = 'Admin added successfully!';
          $this->load->view('admins/add_admin', $data);
      }
  }
}  