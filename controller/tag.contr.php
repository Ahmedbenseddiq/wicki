<?php
include '../model/tagDAO.php';



$tagOBJ = new TagDAO();
$tags = $tagOBJ->getTags();




if(isset($_POST['add'])){
    $tag_name = $_POST['tagName'];
    $tagOBJ->insertTag($tag_name);
    header('location: ../view/admin_tag.php');

}

if (isset($_POST['delete_tag'])) {
    $tagId = isset($_POST['tag_id']) ? $_POST['tag_id'] : null;

    if (!$tagId) {
        $_SESSION['error'] = "Invalid tag ID.";
        header('location: ../view/admin_tag.php');
        exit();
    }

    $tagOBJ->deletetag($tagId);

    $_SESSION['success'] = "Tag deleted successfully.";
    header('location: ../view/admin_tag.php');
    exit();
}

if (isset($_POST['update'])) {
    $tag_id = isset($_POST['tag_id']) ? $_POST['tag_id'] : '';
    $tag_name = isset($_POST['tagName']) ? $_POST['tagName'] : '';

    // Check for required data
    if (empty($tag_name)) {
        $_SESSION['error'] = "Please provide a tag name.";
    } else {
        try {
            // Call the updateTag method in your TagDAO class
            $tagOBJ->updateTag($tag_id, $tag_name);

            $_SESSION['success'] = "Tag updated successfully.";
        } catch (Exception $e) {
            $_SESSION['error'] = "Error updating tag: " . $e->getMessage();
        }
    }
    header('location: ../view/admin_tag.php');
    exit();
}
