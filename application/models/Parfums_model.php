<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parfums_model extends CI_Model {

   
    public function getPerfumes($search = '') {
        if (!empty($search)) {
            $this->db->like('nom', $search);
            
        }

        return $this->db->get('parfums')->result();
    }


    public function addPerfume($data) {
        $this->db->insert('parfums', $data);
        return $this->db->insert_id();
    }

    public function getPerfumeById($id) {
        return $this->db->get_where('parfums', ['id' => $id])->row();
    }

    public function updatePerfume($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('parfums', $data);
    }

    
    public function deletePerfume($id) {
        $this->db->where('id', $id);
        $this->db->delete('parfums');
    }
    

    public function getCategories() {
        return $this->db->get('categories')->result();
    }
}
?>
z