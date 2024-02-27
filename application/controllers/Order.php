<?php
class Order extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Commande_model');
    }

    public function display_table() {
        $data['Commandes'] = $this->Commande_model->get_table_data();
        $this->load->view('orders/index', $data);
    }
}
