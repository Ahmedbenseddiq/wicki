<?php

require_once('../model/WikiDAO.php');

$wikiDAO = new WikiDAO();

$wikis = $wikiDAO->get_wikis(); 

session_start();
require_once('../model/CategoryDAO.php');

// Create CategoryDAO object
$categoriesOBJ = new CategoryDAO();

$categories = $categoriesOBJ->get_cats();


?>
