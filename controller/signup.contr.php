<?php
require_once('../model/UserDAO.php');

$user =  new UserDAO();

        if(isset($_POST['create'])){
            $prenom = $_POST['firstname'];
            $nom = $_POST['lastname'];
            $email = $_POST['email'];
            $pass1 = $_POST['password'];
            $pass2 = $_POST['confirm-password'];
         

            $password = password_hash($pass2, PASSWORD_DEFAULT);
            $errors = array();
            $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
            $patternName = '/^[a-zA-Z\s\'.-]+$/';
            $patternPassword = '/^.{4,}$/';

            if (!preg_match($patternEmail, $email)) {
                array_push($errors, "Email is not valid.");
            }
            if (!preg_match($patternPassword, $pass1)) {
                array_push($errors, "Please use at least 4 characters");
            }
            if (!preg_match($patternPassword, $pass2)) {
                array_push($errors, "Please use at least 4 characters");
            }
            if (!preg_match($patternName, $nom)) {
                array_push($errors, "Name is not valid.");
            }
            if (!preg_match($patternName, $prenom)) {
                array_push($errors, "Name is not valid.");
            }
            
            if ($pass1 !== $pass2) {
                array_push($errors, "The password does not match");
            }
            
            if (count($errors) > 0) {

                foreach ($errors as $error) {
                    echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">' . $error . '</div>';
               
                }
                
        }else{
            $login =$user->Signup($prenom,$nom,$email,$password);
            if($login == true){

            }else{
                
            }
        }


    }
     
    
