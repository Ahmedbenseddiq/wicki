<?php

require_once('../model/WikiDAO.php');

$wikiDAO = new WikiDAO();

// Fetch wikis
$wikis = $wikiDAO->get_wikis();


?>
