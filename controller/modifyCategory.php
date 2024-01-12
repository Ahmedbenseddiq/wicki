<?php
require_once('../model/CategoryDAO.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modify_category'])) {



    $categoryId = $_POST['category_id'];
    $newCategoryName = htmlspecialchars($_POST['catName']);
    

    $newImageData = get_cats($_FILES['catImg']);


    $categoryDAO = new CategoryDAO();

 
    $success = $categoryDAO->updateCat($categoryId, $newCategoryName, $newImageData);

    if ($success) {
        // Redirect to a success page
        header('Location: ../view/successPage.php');
        exit();
    } else {
        // Handle the case where modification fails (redirect or show an error)
        echo "Failed to modify the category.";
    }
} else {
    // Handle other cases or redirect to an error page
    echo "Invalid request.";
}
?>
