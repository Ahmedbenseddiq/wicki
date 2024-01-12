<?php
session_start();
require_once('../model/CategoryDAO.php');

$categoriesOBJ = new CategoryDAO();

if (isset($_POST['delete_category'])) {
    $categoryId = isset($_POST['category_id']) ? $_POST['category_id'] : null;

    if (!$categoryId) {
        $_SESSION['error'] = "Invalid category ID.";
        header('location: ../view/admin.php');
        exit();
    }

    try {
        $categoriesOBJ->deleteCat($categoryId);
        $_SESSION['success'] = "Category deleted successfully.";
        header('location: ../view/admin.php');
        exit();
    } catch (Exception $e) {
        if ($e->getCode() == 23000) { // Foreign key violation error code
            $_SESSION['error'] = "Cannot delete category due to existing wikis .";
        } else {
            $_SESSION['error'] = "Error deleting category: " . $e->getMessage();
        }
        header('location: ../view/admin.php');
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request to delete category.";
    header('location: ../view/admin.php');
    exit();
}
?>
