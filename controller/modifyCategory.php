<?php
session_start();
require_once('../model/CategoryDAO.php');

$categoriesOBJ = new CategoryDAO();

// Check if the form is submitted
if (isset($_POST['modify_category'])) {
    $categoryId = $_POST['category_id'];
    $newCategoryName = $_POST['new_category_name']; // Assuming you have a field for the new category name
    $newImage = $_FILES['new_uploaded_file']['tmp_name']; // Assuming you have a field for the new image

    // You may need additional validation and security measures here

    // Perform the modification
    $success = $categoriesOBJ->updateCat($categoryId, $newCategoryName, $newImage);

    if ($success) {
        $_SESSION['success'] = "Category modified successfully.";
    } else {
        $_SESSION['error'] = "Failed to modify category.";
    }

    // Redirect to the appropriate page (adjust the path as needed)
    // header('location:../view/admin.php');
    echo "yes";
    exit();
} else {
    // If the form is not submitted, redirect to the appropriate page
    // header('location:../view/admin.php');
    echo "no";
    exit();
}
?>
