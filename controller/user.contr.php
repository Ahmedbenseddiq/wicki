<?php
include '../view/includes/session.php';
include '../model/UserDAO.php';
include '../model/wikiDAO.php';
include '../model/CategoryDAO.php';
include '../model/tagDAO.php';
$userOBJ = new UserDAO();
$countusers = $userOBJ->CountUsers();
$wikiOBJ = new WikiDAO();
$countwikis = $wikiOBJ->CountWikis();
$categoryOBJ = new CategoryDAO();
$countcategories = $categoryOBJ->countcategories();
$tagOBJ = new TagDAO();
$counttags = $tagOBJ->countTags();