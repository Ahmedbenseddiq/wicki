<?php
session_start();
require_once('../model/CategoryDAO.php');

// Create CategoryDAO object
$categoriesOBJ = new CategoryDAO();

// Fetch categories
$categories = $categoriesOBJ->get_cats();

if (isset($_POST['add'])) {
    // Get form inputs
    $name = isset($_POST['catName']) ? $_POST['catName'] : '';
    $image = isset($_FILES['catImg']) ? $_FILES['catImg'] : null;

    if (empty($name) || !$image || $image['error'] != 0) {
        $_SESSION['error'] = "Please provide a category name and a valid image.";
        header('location:../view/admin.php');
        
        exit();
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($image['type'], $allowedTypes)) {
        $_SESSION['error'] = "Invalid image format. Please upload a JPEG, PNG, or GIF.";
        header('location:../view/admin.php');
        // echo " image.";
        exit();
    }

    // Read image content
    $imageContent = file_get_contents($image['tmp_name']);

    // Insert category into the database
    $categoriesOBJ->insertCat($name, $imageContent);

    // Redirect to the admin page
    header('location:../view/admin.php');
    // echo "success.";
    exit();
}

include('../view/admin.php');
?>
