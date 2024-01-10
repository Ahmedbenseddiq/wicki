<?php


require_once 'model/categoryDAO.php';

class CategoryController {
    public function displayCategories() {
        $categoryDAO = new CategoryDAO();
        $categories = $categoryDAO->get_all_categories();
        // print_r($categories);
        include 'view\homePage.php';
    }
}
?>

