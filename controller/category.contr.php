<?php
session_start();
require_once('../model/CategoryDAO.php');

$categoriesOBJ = new CategoryDAO();
$categories = $categoriesOBJ->get_cats();


if (isset($_POST['add'])) {
    $name = isset($_POST['catName']) ? $_POST['catName'] : '';
    $image = isset($_FILES['catImg']) ? $_FILES['catImg'] : null;

    if (empty($name) || !$image || $image['error'] != 0) {
        $_SESSION['error'] = "Please provide a category name and a valid image.";
        exit();
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($image['type'], $allowedTypes)) {
        $_SESSION['error'] = "Invalid image format. Please upload a JPEG, PNG, or GIF.";
        exit();
    }

    $imageContent = file_get_contents($image['tmp_name']);
    $categories = $categoriesOBJ->insertCat($name, $imageContent);

    // echo "success.";
    header('location:../view/admin_category.php');
    exit();
}


if (isset($_POST['delete_category'])) {
        $categoryId = isset($_POST['category_id']) ? $_POST['category_id'] : null;
    
        if (!$categoryId) {
            $_SESSION['error'] = "Invalid category ID.";
            header('location: ../view/admin_category.php');
            exit();
        }
    
        try {
            $categoriesOBJ->deleteCat($categoryId);
            $_SESSION['success'] = "Category deleted successfully.";
            header('location: ../view/admin_category.php');
            exit();
        } catch (Exception $e) {
            if ($e->getCode() == 23000) { // Foreign key violation error code
                $_SESSION['error'] = "Cannot delete category due to existing wikis .";
            } else {
                $_SESSION['error'] = "Error deleting category: " . $e->getMessage();
            }
            header('location: ../view/admin_category.php');
            exit();
        }
} 


if (isset($_POST['update'])) {
    $cat_id = isset($_POST['cat_id']) ? $_POST['cat_id'] : '';
    $name = isset($_POST['cat_name']) ? $_POST['cat_name'] : '';
    $image = isset($_FILES['cat_image']) ? $_FILES['cat_image'] : null;

    // Check for required data
    if (empty($name)) {
        $_SESSION['error'] = "Please provide a category name.";
    } else {
        try {
            // Call the update_category method in your CategoryDAO class
            $imageContent = $image && $image['error'] == 0 ? file_get_contents($image['tmp_name']) : null;

            // Update category
            $categoriesOBJ->update_category($cat_id, $name, $imageContent);

            $_SESSION['success'] = "Category updated successfully.";
        } catch (Exception $e) {
            $_SESSION['error'] = "Error updating category: " . $e->getMessage();
        }
    }

    header('location: ../view/admin_category.php');
    exit();
}


