<?php
session_start();

require_once('../model/WikiDAO.php');
require_once('../model/TagDAO.php');

$wikiDAO = new WikiDAO();
$tagDAO = new TagDAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_wiki'])) {
    // Assuming you have form fields like wiki_title, wiki_content, existing_tags, category_id, etc.
    $wiki_title = $_POST['wiki_title'];
    $wiki_content = $_POST['wiki_content'];
    $category_id = $_POST['category_id'];  // Adjust as needed

    // Check if tags were selected
    $selected_tags = isset($_POST['existing_tags']) ? $_POST['existing_tags'] : [];

    // Assuming you have a method to add a wiki in your WikiDAO
    $wiki_id = $wikiDAO->insertWiki($wiki_title, $wiki_content, $category_id);

    if ($wiki_id) {
        // If the wiki was added successfully, associate tags
        foreach ($selected_tags as $tag_id) {
            $tagDAO->associateTagWithWiki($tag_id, $wiki_id);
        }

        $_SESSION['success'] = "Wiki added successfully.";
        header('Location: ../view/your_wiki_page.php'); // Redirect to your wiki page
        exit();
    } else {
        $_SESSION['error'] = "Failed to add wiki.";
        header('Location: ../view/your_add_wiki_page.php'); // Redirect back to the add wiki page
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request to add wiki.";
    header('Location: ../view/your_add_wiki_page.php'); // Redirect back to the add wiki page
    exit();
}
?>
