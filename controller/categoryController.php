<?php
// CategoryController.php

require_once '../models/category/categoryDAO.php'; 

require_once '../connexion.php'; 

class CategoryController {
    private $categoryDAO;

    public function __construct() {
        $this->categoryDAO = new CategoryDAO();
    }

    public function loadHomePage() {
        $categories = $this->categoryDAO->get_all_categories();
        $errorMessage = null;

        if ($categories === null || empty($categories)) {
            $errorMessage = "No categories found.";
        }

        // Pass data to the view
        $this->renderView('homePage.php', compact('categories', 'errorMessage'));
    }

    private function renderView($viewFile, $data) {
        extract($data); // Extract variables from the associative array
        include '../views/' . $viewFile;
    }
}



