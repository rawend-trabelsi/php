<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parfums extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Parfums_model');
        $this->load->library('form_validation');
    }
    public function edit($id) {
        $data['perfume'] = $this->Parfums_model->getPerfumeById($id);
        $data['categories'] = $this->Parfums_model->getCategories();
        $this->load->view('parfums/edit', $data);
    }
    
    public function update($id) {
        $this->form_validation->set_rules('nom', 'Name', 'required');
        $this->form_validation->set_rules('prix', 'Price', 'required|numeric');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('categorie', 'Category', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $data['perfume'] = $this->Parfums_model->getPerfumeById($id);
            $data['categories'] = $this->Parfums_model->getCategories();
            $this->load->view('parfums/edit', $data);
        } else {
            $data = array(
                'nom' => $this->input->post('nom'),
                'prix' => $this->input->post('prix'),
                'description' => $this->input->post('description'),
                'categorie_id' => $this->input->post('categorie'),
            );
    
            $this->Parfums_model->updatePerfume($id, $data);
    
            redirect('parfums');
        }
    }
   
    public function index() {
        $search = $this->input->get('search');
        $data['perfumes'] = $this->Parfums_model->getPerfumes($search);
        $data['search'] = $search;

        $this->load->view('parfums/index', $data);
    }
    

    public function create() {
        $data['categories'] = $this->Parfums_model->getCategories();
        $this->load->view('parfums/create', $data);
    }

    public function store() {
        $this->form_validation->set_rules('nom', 'Name', 'required');
        $this->form_validation->set_rules('prix', 'Price', 'required|numeric');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('categorie', 'Category', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('parfums/create');
        } else {
            $config['upload_path'] = FCPATH . 'uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image_path = $upload_data['file_name'];
    
                $data = array(
                    'nom' => $this->input->post('nom'),
                    'image' => $image_path,
                    'prix' => $this->input->post('prix'),
                    'description' => $this->input->post('description'),
                    'categorie_id' => $this->input->post('categorie'),
                );
    
                $this->Parfums_model->addPerfume($data);
    
                redirect('parfums');
            } else {
                $this->create(); 
            }
        }
    }
    
    
    public function delete($id) {
        $this->Parfums_model->deletePerfume($id);
        redirect('parfums');
    }
    public function countParfums() {
        return $this->db->count_all('parfums');
    }
    
    

}
?>
