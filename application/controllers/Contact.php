<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function index() {
        $data['message'] = ''; // Initialize an empty message variable

        // Check if the form is submitted
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Load the contact model
            $this->load->model('Contact_model');

            // Set validation rules (you can customize these based on your requirements)
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('message', 'Message', 'required');

            // Check if form validation passes
            if ($this->form_validation->run() === TRUE) {
                // Get form data
                $first_name = $this->input->post('first_name');
                $last_name = $this->input->post('last_name');
                $email = $this->input->post('email');
                $phone = $this->input->post('phone');
                $message_text = $this->input->post('message');

                // Save data to the database using the model
                $data_to_insert = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'phone' => $phone,
                    'message' => $message_text
                );

                if ($this->Contact_model->saveContact($data_to_insert)) {
                    // Set a success message
                    $data['message'] = 'Contact information saved successfully!';
                } else {
                    // Set an error message if the insertion fails
                    $data['message'] = 'Error saving contact information. Please try again.';
                }
            }
        }

        $this->load->view('contact/index', $data);
    }
}
?>
