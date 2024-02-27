<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('category_model');
    }

    public function index() {
        $search = $this->input->get('search');
        $data['categories'] = $this->category_model->get_categories($search);
        $this->load->view('categories/index', $data);
    }

    public function create() {
        $this->load->view('categories/create');
    }

    public function store() {
        $this->form_validation->set_rules('nom', 'Nom', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('categories/create');
        } else {
            $data = array(
                'nom' => $this->input->post('nom')
                // Add other fields as needed
            );

            $category_id = $this->category_model->create_category($data);

            redirect('categories/index');
        }
    }

    public function edit($id) {
        $data['category'] = $this->category_model->get_category($id);
        $this->load->view('categories/edit', $data);
    }

    public function update($id) {
        $this->form_validation->set_rules('nom', 'Nom', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['category'] = $this->category_model->get_category($id);
            $this->load->view('categories/edit', $data);
        } else {
            $data = array(
                'nom' => $this->input->post('nom')
                // Add other fields as needed
            );

            $this->category_model->update_category($id, $data);

            redirect('categories/index');
        }
    }

    public function delete($id) {
        $this->category_model->delete_category($id);

        redirect('categories/index');
    }
}
