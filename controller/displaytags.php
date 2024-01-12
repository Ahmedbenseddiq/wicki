<?php

require_once('../model/TagDAO.php');

$tagDAO = new TagDAO(); // Instantiate TagDAO object

$tags = $tagDAO->getTags(); // Fetch tags

// Include or require your view file where the table HTML is located
// include('../view/display_tags_table.php'); // You need to create this view file

?>
