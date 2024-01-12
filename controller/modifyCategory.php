<?php
// modifyCategoryController.php


$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;

// Check if the category_id is provided
if ($category_id !== null) {
    // Fetch category details
    $category = get_cats($category_id);

    // Load the view
    include('../views/modifyCategoryView.php');
} else {
    // Handle the case where category_id is not provided
    echo "Category ID is missing.";
}
?>
