<?php
session_start(); 

require_once('../model/WikiDAO.php');
require_once('../model/tagDAO.php');

$wikiDAO = new WikiDAO();

$wikis = $wikiDAO->get_wikis(); 

require_once('../model/CategoryDAO.php');

$categoriesOBJ = new CategoryDAO();

$categories = $categoriesOBJ->get_cats();

$tagsOBJ = new TagDAO();

$categoryId = isset($_GET['category_id']) ? $_GET['category_id'] : null;





if (isset($_GET['id'])) {
    $wikiId = $_GET['id'];

    $wiki = $wikiDAO->getWikiById($wikiId);

    if ($wiki) {
        $wikiName = $wiki['titre'];
        $wikiContent = $wiki['contenu'];
        
        require_once('../view/singleWiki.php');
    } else {
        echo "Wiki not found.";
    }
}

if (isset($_GET['wiki_id'])) {
    $wikiId = $_GET['wiki_id'];

    $wikiBywiki_id = $wikiDAO->getWikiById($wikiId);

}


if (isset($_POST['archieve'])) {
    $wikiId = $_POST['wiki_id'];

    $isArchived = $wikiDAO->toggleArchiveStatus($wikiId);

    if ($isArchived) {
        $_SESSION['success'] = "Wiki archived successfully.";
        echo "yes";
    } else {
        $_SESSION['error'] = "Error archiving wiki.";
        echo "no";
    }

    header('Location: ../view/admin_wiki.php'); 
    
}


if (isset($_POST['add'])) {
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['error'] = "User ID not found.";
        echo "no id";
        exit();
    }

    $user_id = $_SESSION['user_id'];
    // print_r($user_id);
    // die();
    $wikiName = isset($_POST['catName']) ? $_POST['catName'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';

    if (empty($wikiName) || empty($content) || empty($category_id)) {
        $_SESSION['error'] = "Please provide wiki name, content, and select a category.";
        echo "no data";
        exit();
    }

    $existing_tags = isset($_POST['existing_tags']) ? $_POST['existing_tags'] : [];

    $image = isset($_FILES['catImg']) ? $_FILES['catImg'] : null;
    $imageContent = null;

    if ($image && $image['error'] == 0) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    
        if (!in_array($fileExtension, $allowedExtensions)) {
            $_SESSION['error'] = "Invalid image format. Please upload a JPEG, PNG, or GIF.";
            exit();
        }
    
        $filename = uniqid() . '_' . $image['name'];
        $destinationDirectory = '../view/uploads/';
        $destination = $destinationDirectory . $filename;
    
        if (!is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0755, true);  // Creates the directory if it doesn't exist
        }
    
        if (move_uploaded_file($image['tmp_name'], $destination)) {
            $imagePath = 'uploads/' . $filename;  // Store relative path in the database
        } else {
            $_SESSION['error'] = "Error moving the uploaded file.";
            exit();
        }
    }
    

    $wiki_id = $wikiDAO->insertWiki($wikiName, $content, $category_id, $existing_tags, $destination, $user_id);

    if ($wiki_id) {
        $_SESSION['success'] = "Wiki added successfully.";
        header('Location: ../view/author_wiki.php');
    } else {
        $_SESSION['error'] = "Error adding wiki.";
    }

    exit();
}

