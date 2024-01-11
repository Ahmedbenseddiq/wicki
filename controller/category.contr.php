<?php
session_start();
require_once('../model/CategoryDAO.php');
$categoriesOBJ = new CategoryDAO();
$categories = $categoriesOBJ->get_cats();
if(isset($_POST['add']) ){
    $name = $_POST['catName'];
    $image = $_FILES['catImg'];
    $tmp_name = $_FILES['catImg']['tmp_name'];
    $image = file_get_contents($tmp_name);
    $categoriesOBJ->insertCat($name,$image);
    header('location:../view/dashboard.php');
}