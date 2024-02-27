<?php
class Panier_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    
    public function ajouterAuPanier($product, $quantite) {
        // Récupérer le panier depuis la session ou créer un tableau vide s'il n'existe pas
        $panier = $this->session->userdata('panier') ? $this->session->userdata('panier') : array();
    
        // Récupérer l'ID du produit
        $product_id = $product->id;
    
        // Assurez-vous que $panier_id est défini (remplacez 1 par l'ID correct du panier)
        $panier_id = 1;
    
        if (array_key_exists($product_id, $panier)) {
            // Le produit existe déjà dans le panier, augmenter la quantité
            $panier[$product_id]['quantite'] += $quantite;
        } else {
            // Le produit n'est pas dans le panier, l'ajouter avec la quantité spécifiée
            $panier[$product_id] = array(
                'id' => $product_id,
                'nom' => $product->nom,
                'prix_unitaire' => $product->prix,
                'quantite' => $quantite,
            );
        }
    
        // Mettre à jour le panier dans la session
        $this->session->set_userdata('panier', $panier);
    
        // Assurez-vous que $produit_id est correctement défini en fonction de votre modèle de données
        $produit_id = $product->id;
    
        // Ajouter l'élément du panier à la table panier_items
        $this->db->insert('panier_items', array(
            'panier_id' => $panier_id,
            'produit_id' => $produit_id,
            'quantite' => $quantite,
            'prix_unitaire' => $product->prix
        ));
    }
    
    
    

    public function get_nombre_articles_du_panier() {
        // Retrieve the cart from the session
        $panier = $this->session->userdata('panier') ? $this->session->userdata('panier') : array();

        // Calculate and return the total quantity of items in the cart
        $total_quantity = array_sum(array_column($panier, 'quantite'));
        return $total_quantity;
    }

    public function get_items_du_panier() {
        // Retrieve the cart from the session
        $panier = $this->session->userdata('panier') ? $this->session->userdata('panier') : array();

        // Return the cart items
        return $panier;
    }

    public function calculer_total_du_panier() {
        // Récupérer le panier depuis la session
        $panier = $this->session->userdata('panier') ? $this->session->userdata('panier') : array();
    
        // Initialiser le total à zéro
        $total = 0;
    
        // Parcourir les articles du panier pour calculer le total
        foreach ($panier as $item) {
            $total += $item['prix_unitaire'] * $item['quantite'];
        }
    
        return $total;
    }

    public function creer_commande($nom, $prenom, $adresse) {
        // Insérer la commande avec les informations du client
        $this->db->insert('commandes', array(
            'date_creation' => date('Y-m-d H:i:s'),
            'status' => 'En cours',
            'nom_client' => $nom,
            'prenom_client' => $prenom,
            'adresse_client' => $adresse
        ));
        log_message('debug', 'Attempting to create order for ' . $nom . ' ' . $prenom);
        // ... rest of the code
        // Obtenez l'ID de la dernière commande insérée
        $commande_id = $this->db->insert_id();
    
        // Récupérer le panier depuis la session
        $panier = $this->session->userdata('panier') ? $this->session->userdata('panier') : array();
    
        // Insérez chaque élément du panier dans la table panier_items associée à la commande
        foreach ($panier as $item) {
            $this->db->insert('panier_items', array(
                'commande_id' => $commande_id,
                'produit_id' => $item['id'],
                'quantite' => $item['quantite'],
                'prix_unitaire' => $item['prix_unitaire']
                // Ajoutez d'autres colonnes nécessaires à panier_items
            ));
        }
    
        // Réinitialiser le panier après avoir créé la commande
        $this->session->unset_userdata('panier');
    }
    public function check_panier_existence($panier_id) {
        // Vérifier si le panier avec l'ID spécifié existe dans la table panier
        $this->db->where('id', $panier_id);
        $query = $this->db->get('panier');

        return $query->num_rows() > 0;
    }
}
?>
