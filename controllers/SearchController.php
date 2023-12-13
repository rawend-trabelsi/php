<?php
include_once('../models/SearchModel.php');

class SearchController {
    private $searchModel;

    public function __construct() {
        $this->searchModel = new SearchModel();
    }

    public function searchFood($searchTerm) {
        return $this->searchModel->getFoodBySearchTerm($searchTerm);
    }
}
?>
