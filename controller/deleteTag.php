<?php
session_start();
require_once('../model/TagDAO.php');

$tagDAO = new TagDAO();

if (isset($_POST['delete_tag'])) {
    $tagId = isset($_POST['tag_id']) ? $_POST['tag_id'] : null;

    if (!$tagId) {
        $_SESSION['error'] = "Invalid tag ID.";
        header('location: ../view/admin.php');
        exit();
    }

    $tagDAO->deleteTag($tagId);

    $_SESSION['success'] = "Tag deleted successfully.";
    header('location: ../view/tags.php');
    exit();
} else {
    $_SESSION['error'] = "Invalid request to delete tag.";
    header('location: ../view/tags.php');
    exit();
}
?>
