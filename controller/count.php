<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}   
require_once('../model/CategoryDAO.php');
require_once('../model/TagDAO.php');
require_once('../model/WikiDAO.php');

$categoriesOBJ = new CategoryDAO();
$tagsOBJ = new TagDAO();
$wikiDAO = new WikiDAO();


$categoryCount = $categoriesOBJ->countCategories();
$tagCount = $tagsOBJ->countTags();
$wikiCount = $wikiDAO->CountWikis();

// include('../view/admin.php');
?>
