<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Utilisateur extends CI_Controller {
    public function about() {
        $this->load->view('utilisateur/about');
    }
}
?>