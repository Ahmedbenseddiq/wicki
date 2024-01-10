<?php
// CategoryController.php

require_once '../models/category/categoryDAO.php'; 

require_once '../connexion.php'; 

class CategoryController {
    private $categoryDAO;
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
        $this->categoryDAO = new CategoryDAO($this->db);
    }

    public function loadHomePage() {
        $categories = $this->categoryDAO->get_all_categories();

        if ($categories !== null && !empty($categories)) {
            
            include '../views/homePage.php'; 
        } else {
            
            $errorMessage = "No categories found.";
            include '../views/homePage.php'; 
        }
    }
}
