<?php

// Assume you have a CategoryController.php file within your controllers folder

require_once '../models/CategoryDAO.php'; // Adjust the path if needed

class CategoryController {
    private $categoryDAO;

    public function __construct() {
        $this->categoryDAO = new CategoryDAO();
    }

    public function displayAllCategories() {
        $categories = $this->categoryDAO->get_all_categories();

        // Assuming you have a view file named 'categories_view.php' in your views folder
        // You can pass $categories to your view for display
        include '../views/categories_view.php'; // Adjust the path if needed
    }
}

// Usage in your application:

$categoryController = new CategoryController();
$categoryController->displayAllCategories();
