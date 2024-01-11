<?php
require_once('../model/CategoryDAO.php');


$categoryDAO = new CategoryDAO();

// Fetch categories from the database
$categories = $categoryDAO->get_cats();


include('../view/categories.php');
?>