<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commande_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function create_order($order_data) {
        // Serialize arrays before insertion
        $order_data['customer_data'] = serialize($order_data['customer_data']);
        $order_data['items'] = serialize($order_data['items']);
    
        // Insert data into the 'commandes' table
        $this->db->insert('commandes', $order_data);
    
        // Return the ID of the inserted row
        return $this->db->insert_id();
    }
    
    
    // Fonction pour vérifier l'existence d'un panier
    public function check_panier_existence($panier_id) {
        // Vérifier si le panier avec l'ID spécifié existe dans la table 'panier'
        $this->db->where('id', $panier_id);
        $query = $this->db->get('panier');

        return $query->num_rows() > 0;
    }

    // Fonction pour récupérer les données de la table 'commandes'
    public function get_table_data() {
        // Sélectionner les colonnes souhaitées de la table 'commandes'
        $this->db->select('id, date_creation, customer_data, items, total');
        
        // Exécuter la requête pour récupérer les données
        $query = $this->db->get('commandes');

        // Vérifier si la requête a réussi avant d'appeler result()
        if ($query) {
            return $query->result();
        } else {
            // Gérer le cas où la requête échoue (optionnel)
            return array();
        }
    }
    
}
?>
