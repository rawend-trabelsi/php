<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panier extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Produits_model');  
        $this->load->model('Panier_model');
        $this->load->model('Commande_model'); // Charger le modèle Commande
    }

    // Fonction pour ajouter un produit au panier
    public function ajouter($id) {
        // Récupérer la quantité depuis le formulaire
        $quantite = $this->input->post('quantity');
    
        // Vérifier si la quantité est valide (supérieure à 0)
        if ($quantite > 0) {
            // Récupérer les détails du produit par ID
            $product = $this->Produits_model->recupererProduitParId($id);
    
            if ($product) {
                // Ajouter le produit au panier en spécifiant la quantité
                $this->Panier_model->ajouterAuPanier($product, $quantite);
    
                // Rediriger vers la page du produit ou toute autre page souhaitée
                redirect('/' . $id);
            } else {
                // Produit non trouvé, gérer en conséquence (rediriger vers une page d'erreur, afficher un message, etc.)
                show_error('Product not found', 404);
            }
        } else {
            // Quantité non valide, gérer en conséquence (rediriger vers une page d'erreur, afficher un message, etc.)
            show_error('Invalid quantity', 400);
        }
    }
    
    // Fonction pour afficher le panier
    public function afficher() {
        // Récupérer les articles et le total du panier en utilisant Panier_model
        $data['items'] = $this->Panier_model->get_items_du_panier();
        $data['total'] = $this->Panier_model->calculer_total_du_panier();

        // Charger la vue du panier
        $this->load->view('panier/index', $data);
    }

    // Fonction pour annuler un article du panier
    public function annuler_item($id) {
        // Récupérer les articles du panier
        $cartItems = $this->Panier_model->get_items_du_panier();
    
        // Vérifier si l'article avec l'ID spécifié existe dans le panier
        if (isset($cartItems[$id])) {
            // Supprimer l'article du panier
            unset($cartItems[$id]);
    
            // Mettre à jour la session avec les articles du panier modifiés
            $this->session->set_userdata('panier', $cartItems);
    
            // Rediriger vers la page d'affichage du panier
            redirect(site_url('panier/afficher'));
        } else {
            // Article non trouvé dans le panier, gérer en conséquence (rediriger vers une page d'erreur, afficher un message, etc.)
            show_error('Item not found in the cart', 404);
        }
    }

    // Fonction pour passer une commande
    public function commander() {
        // Récupérer les données du formulaire de commande
        $nom_client = $this->input->post('nom_client');
        $prenom_client = $this->input->post('prenom_client');
        $adresse_client = $this->input->post('adresse_client');

        // Récupérer le total du panier
        $total_panier = $this->Panier_model->calculer_total_du_panier();

        // Créer les données de la commande
        $order_data = array(
            'panier_id' => 1, // Remplacez 1 par l'ID du panier approprié
            'date_creation' => date('Y-m-d H:i:s'),
            'status'    => 'Pending',
            'customer_data' => serialize(array('nom' => $nom_client, 'prenom' => $prenom_client, 'adresse' => $adresse_client)),
            'items' => serialize($this->Panier_model->get_items_du_panier()), // Récupérer les articles du panier
            'total' => $total_panier, // Enregistrer le total du panier dans la commande
        );

        // Créer la commande dans la base de données
        $order_id = $this->Commande_model->create_order($order_data);

        // Afficher un message de succès
        $data['success_message'] = "Order placed successfully! Your Order ID is $order_id.";

        // Charger la vue du panier avec le message de succès
        $this->load->view('panier/index', $data);
    }
}
?>
