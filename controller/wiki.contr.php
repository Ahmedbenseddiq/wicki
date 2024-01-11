<?php
require_once('../model/WikiDAO.php');
require_once('../model/UserDAO.php');


if(isset($_POST['add'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $image = $_FILES['image'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $image = file_get_contents($tmp_name);
    session_start();
    $userEmail = $_SESSION['email'];
    $user = new UserDAO();
    $userid = $user->Get_user_id($userEmail);
    $wiki = new WikiDAO();
    if (isset($_SESSION['email'])){
        $article = $wiki->insertWiki($title,$content,$image,$userid,$category);
        header("location: ../view/feed.php");
}else{
    header('location:../view/login.php');
}
    
}

