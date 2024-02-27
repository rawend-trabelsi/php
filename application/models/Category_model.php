<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function get_categories($search = '') {
        if ($search) {
            $this->db->like('nom', $search);
        }
        return $this->db->get('categories')->result();
    }

    public function create_category($data) {
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }

    public function get_category($id) {
        return $this->db->get_where('categories', ['id' => $id])->row();
    }

    public function update_category($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('categories', $data);
    }

    public function delete_category($id) {
        $this->db->where('id', $id);
        $this->db->delete('categories');
    }
}
