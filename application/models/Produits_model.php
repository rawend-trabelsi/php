<?php

class Produits_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getProduits() {
    
        $query = $this->db->get('parfums');
        return $query->result();
    }
    public function getParfums() {
        return $this->db->get('parfums')->result();
    }
    
    public function countParfums() {
        return $this->db->count_all('parfums');
    }
    
    public function getParfumsPaginated($limit, $offset) {
        $this->db->limit($limit, $offset);
        return $this->db->get('parfums')->result();
    }
    public function getProduitsByCategorie($categorie_id) {
        $this->db->where('categorie_id', $categorie_id);
        $query = $this->db->get('parfums');
        return $query->result();
    }
   
    
    public function recupererProduitParId($produit_id) {
        $this->db->where('id', $produit_id);
        $query = $this->db->get('parfums');
    
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            log_message('error', 'Product not found in database.');
            return false;
        }
    }
    
    public function searchParfums($searchTerm) {
        // Sanitize the search term to prevent SQL injection
        $searchTerm = $this->db->escape_like_str($searchTerm);
    
        // Perform a case-insensitive search query using the COLLATE clause
        $this->db->like('nom', $searchTerm, 'both'); // 'both' means case-insensitive
        $query = $this->db->get('parfums');
    
        return $query->result();
    }
    
    
    
    
}
?>