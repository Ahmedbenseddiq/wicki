<?php
// LogoutController.php

// Start the session
session_start();

// Destroy the session data
session_destroy();

// Redirect to the login page or any other page as needed
header("Location: index.php");
exit();
?>
