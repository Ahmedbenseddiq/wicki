<?php
session_start(); // Start the session

require_once('../model/UserDAO.php');

$userDAO = new UserDAO();

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Add pattern checks
    $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $patternPassword = '/^.{4,}$/';

    $errors = [];

    if (!preg_match($patternEmail, $email)) {
        $errors[] = "Email is not valid.";
    }

    if (!preg_match($patternPassword, $password)) {
        $errors[] = "Please use at least 4 characters for the password.";
    }

    if (empty($errors)) {

        $userVerification = $userDAO->verifyUser($email, $password);

        if ($userVerification) {

            // Set session variables
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $userDAO->Get_user_id($email);
            $_SESSION['role'] = $userDAO->Get_user_role($email);

            if (strcasecmp($_SESSION['role'], 'admin') === 0) {
                header('Location: ../view/admin_category.php');
                exit();
            } elseif (strcasecmp($_SESSION['role'], 'auteur') === 0) {
                header('Location: ../view/author.php');
                exit();
            } else {
                // Invalid role
                echo "Invalid role for the user: " . $_SESSION['role'];
            }
        } else {
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
