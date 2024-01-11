<?php


require_once('../model/UserDAO.php');


// var_dump($_POST);
$userDAO = new UserDAO();
$errors = [];

if(isset($_POST['register'])){
    $prenom = $_POST['firstname'];
    $nom = $_POST['lastname'];
    $email = $_POST['email'];
    $pass1 = $_POST['password'];
    $pass2 = $_POST['confirm-password'];

    $password = password_hash($pass2, PASSWORD_DEFAULT);
    $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $patternName = '/^[a-zA-Z\s\'.-]+$/';
    $patternPassword = '/^.{4,}$/';

    
    if (!preg_match($patternEmail, $email)) {
        $errors[] = "Email is not valid.";
    }

    
    if (!preg_match($patternPassword, $pass1) || !preg_match($patternPassword, $pass2)) {
        $errors[] = "Please use at least 4 characters for the password.";
    }

    
    if (!preg_match($patternName, $nom) || !preg_match($patternName, $prenom)) {
        $errors[] = "Name is not valid.";
    }

    
    if ($pass1 !== $pass2) {
        $errors[] = "The passwords do not match.";
    }

    if (empty($errors)) {
        
        $result = $userDAO->Signup($prenom, $nom, $email, $password);
        var_dump($result);
        if($result) {
            // Redirect to categories.php after successful registration
            header('Location: ../view/categories.php');
            exit();
        } else {
            
            echo "Registration failed. Please try again.";
        }
    } else {
        
        foreach ($errors as $error) {
            echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">' . $error . '</div>';
        }
    }
}
?>
