<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Produits_model');
        $this->load->model('Panier_model'); 
    }

    public function index() {
        $this->load->library('pagination'); // Load the pagination library
    
        // Configuration de la pagination
        $config['base_url'] = site_url('welcome/index');
        // Dans le contrôleur Utilisateur
        $config['total_rows'] = $this->Produits_model->countParfums(); 
        $config['per_page'] = 10; 
        $config['uri_segment'] = 3; 
    
        $this->pagination->initialize($config);
    
        // Récupération des produits paginés depuis la base de données
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['parfums'] = $this->Produits_model->getParfumsPaginated($config['per_page'], $page);
    
        // Chargement de la vue avec les données paginées
        $data['nombre_articles_du_panier'] = $this->Panier_model->get_nombre_articles_du_panier();
        $this->load->view('utilisateur/index', $data);
    }
    
    public function product_details($product_id) {
        // Load the model to get product details
        $this->load->model('Produits_model');
        
        // Get product details by product_id
        $data['product'] = $this->Produits_model->recupererProduitParId($product_id);
        
        // Pass the product_id to the view
        $data['product_id'] = $product_id;
        
        // Load the view with the data
        $this->load->view('product_details', $data);
    }
    
    
    public function search() {
        $searchTerm = $this->input->get('q'); // Get search term from the query string
    
        // Perform the search using the model
        $data['parfums'] = $this->Produits_model->searchParfums($searchTerm);
    
        // Load the view with the search results
        $this->load->view('utilisateur/search_results', $data);
    }
    
    
    
    

    public function categorie($categorie_id) {
        // Récupération des produits par catégorie
        $data['parfums'] = $this->Produits_model->getProduitsByCategorie($categorie_id);

        // Chargement de la vue avec les produits de la catégorie
        $this->load->view('utilisateur/categorie', $data);
    }

    public function panier() {
        $data['items'] = $this->Panier_model->get_items_du_panier();
        $this->load->view('panier/afficher_panier', $data);
    }


    public function viewProduct($id) {
        // Retrieve the product details by ID from the model
        $data['product'] = $this->Produits_model->recupererProduitParId($id);
    
        // Check if the product exists
        if (!$data['product']) {
            show_error('Product not found', 404);
        }
    
        // Load a view to display the product details
        $this->load->view('product_details', $data);
    }
    

}
?>
