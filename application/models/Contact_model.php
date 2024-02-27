<?php
class Contact_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    // Save contact information to the database
    public function saveContact($data) {
        // Insert data into the 'contacts' table
        return $this->db->insert('contact', $data);
    }

    // Delete contact from the database
    public function delete_contact($contact_id) {
        // Delete the contact from the 'contact' table based on the contact ID
        return $this->db->delete('contact', array('id' => $contact_id));
    }

    public function get_contacts() {
        // Retrieve all contacts from the 'contacts' table
        $query = $this->db->get('contact');

        // Check if there are results
        if ($query->num_rows() > 0) {
            // Return the results as an array of objects
            return $query->result();
        } else {
            // No contacts found
            return array();
        }
    }
}
?>
