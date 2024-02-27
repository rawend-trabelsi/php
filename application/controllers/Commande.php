<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commande extends CI_Controller {
       
    public function __construct() {
        parent::__construct();
        $this->load->model('Commande_model');
        $this->load->model('Panier_model');
    }

    public function index() {
        $this->load->library('form_validation');
    
        // Validate form inputs
        $this->form_validation->set_rules('nom_client', 'Nom Client', 'required');
        $this->form_validation->set_rules('prenom_client', 'Prenom Client', 'required');
        $this->form_validation->set_rules('adresse_client', 'Adresse Client', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Load your checkout cart view with form validation errors
            $this->load->view('commander/index');
        } else {
            // Get form data
            $customer_data = array(
                'nom_client'    => $this->input->post('nom_client'),
                'prenom_client' => $this->input->post('prenom_client'),
                'adresse_client' => $this->input->post('adresse_client'),
            );
    
            // Assuming $panier_id is defined somewhere
            $panier_id = 1; // Replace with the actual value
    
            // Check if $panier_id exists in the panier table
            $panier_exists = $this->Panier_model->check_panier_existence($panier_id);
    
            if ($panier_exists) {
                // Get the total of the cart using Panier_model
                $total_panier = $this->Panier_model->calculer_total_du_panier(); // Add this line to get the total
    
                // Get the items from the cart using Panier_model
                $items = $this->Panier_model->get_items_du_panier();
    
                // Create the order in the database
                $order_data = array(
                    'panier_id' => $panier_id, // Add this line to set the panier_id
                    'date_creation' => date('Y-m-d H:i:s'),
                    'status'    => 'Pending',
                    'customer_data' => $customer_data,
                    'items' => $items,
                    'total' => $total_panier,
                );
    
                $order_id = $this->Commande_model->create_order($order_data);
    
                // Display success message on the same page
                $data['success_message'] = "Order placed successfully! Your Order ID is $order_id.";
    
                // Load your checkout cart view with success message
                $this->load->view('commander/index', $data);
            } else {
                // Handle the case where $panier_id does not exist in the panier table
                $data['error_message'] = "Panier with ID $panier_id does not exist.";
                $this->load->view('commander/index', $data);
            }
        }
    }
}
?>
