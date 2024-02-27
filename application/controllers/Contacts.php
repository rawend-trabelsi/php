<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Contact_model');
    }

    public function index() {
        // Get contacts from the model
        $data['contacts'] = $this->Contact_model->get_contacts();

        // Load the view and pass the contacts data
        $this->load->view('contacts/index', $data);
    }

    public function delete($contact_id) {
        // Check if the contact ID is provided
        if (!$contact_id) {
            
            redirect('contacts/index'); 
        }

        // Delete the contact using the model
        $this->Contact_model->delete_contact($contact_id);

        // Optionally, you can redirect to the contacts index page after deletion
        redirect('contacts/index');
    }
}
