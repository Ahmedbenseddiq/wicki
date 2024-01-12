<?php

require_once('../model/CategoryDAO.php');



$categoryDAO = new CategoryDAO();


$categories = $categoryDAO->get_cats();
// var_dump($categories);


session_start();
require_once('../model/CategoryDAO.php');

// Create CategoryDAO object
$categoriesOBJ = new CategoryDAO();

// Fetch categories with names and image data
$categories = $categoriesOBJ->get_cats();
// var_dump($categories);
// Display categories
// include('../view/display_categories.php');
?>
