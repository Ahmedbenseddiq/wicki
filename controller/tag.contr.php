<?php
include '../model/tagDAO.php';
$tagOBJ = new TagDAO();
$tags = $tagOBJ->getTags();
if(isset($_POST['add'])){
    $tag_name = $_POST['tagName'];
    $tagOBJ->insertTag($tag_name);
    header('location: ../view/dashboard.php');

}
