<?php

require_once('../model/CategoryDAO.php');



$categoryDAO = new CategoryDAO();

// Fetch all categories
$categories = $categoryDAO->get_cats();
// var_dump($categories);

