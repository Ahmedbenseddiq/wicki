<?php
require_once('../model/UserDAO.php');

// var_dump($_POST);
$userDAO = new UserDAO();


if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Add pattern checks
    $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $patternPassword = '/^.{4,}$/';

    $errors = [];

    // Validate email
    if (!preg_match($patternEmail, $email)) {
        $errors[] = "Email is not valid.";
    }

    // Validate password
    if (!preg_match($patternPassword, $password)) {
        $errors[] = "Please use at least 4 characters for the password.";
    }

    // If there are no errors, proceed with authentication
    if (empty($errors)) {
        // Validate user input against the database using the UserDAO
        $isValidUser = $userDAO->verifyUser($email, $password);

        if($isValidUser) {
            // User authentication successful
            // Redirect to categories.php or any other page you want
            header('Location: ../view/categories.php');
            exit();
        } else {
            // User authentication failed
            // Display an error message on the login page
            echo "Wrong email or password. Please try again.";
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">' . $error . '</div>';
        }
    }
}
?>
