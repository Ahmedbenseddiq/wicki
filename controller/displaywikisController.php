<?php

require_once('../model/WikiDAO.php');

$wikiDAO = new WikiDAO();

// Assuming you have the $category_id from the URL parameter
$category_id = isset($_GET['cat_id']) ? $_GET['cat_id'] : null;

if ($category_id !== null) {
    // Fetch wikis based on the specific category
    $wikis = $wikiDAO->get_wikis_by_category($category_id);

    // Now you can use $wikis to display the wikis based on the specific category
    // For example, you might pass $wikis to your view or directly display them here
    foreach ($wikis as $wiki) {
        // Display wiki information as needed
        echo '<h2>' . $wiki['wiki_title'] . '</h2>';
        echo '<p>' . $wiki['wiki_content'] . '</p>';
        // Add more HTML structure or styling as needed
    }
} else {
   
    echo 'No category ID provided.';
    
}

?>
