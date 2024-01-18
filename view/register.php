<?php
$title = "Register";

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-image">
                    <img src="https://images.pexels.com/photos/117729/pexels-photo-117729.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" class="img-fluid h-100">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            



                            <form class="user" action="../controller/signup.contr.php" method="post" enctype="multipart/form-data" onsubmit="return validateSignupForm()">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="firstname" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                                        <div id="firstnameError" style="color: red;"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lastname" class="form-control  form-control-user" id="exampleLastName" placeholder="Last Name">
                                        <div id="lastnameError" style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text"  name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                    <div id="emailError" style="color: red;"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password"  name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        <div id="passwordError" style="color: red;"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password"  name="confirm-password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Confirm Password">
                                        <div id="confirmPasswordError" style="color: red;"></div>
                                    </div>
                                </div>
                                <button name="register" type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>



                            <hr>
                            
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <script>
        function validateSignupForm() {
            var firstnameInput = document.getElementById('exampleFirstName').value;
            var lastnameInput = document.getElementById('exampleLastName').value;
            var emailInput = document.getElementById('exampleInputEmail').value;
            var passwordInput = document.getElementById('exampleInputPassword').value;
            var confirmPasswordInput = document.getElementById('exampleRepeatPassword').value;

            if (!firstnameInput) {
                document.getElementById('firstnameError').innerText = 'Please enter your first name.';
                return false;
            } else {
                document.getElementById('firstnameError').innerText = '';
            }

            if (!lastnameInput) {
                document.getElementById('lastnameError').innerText = 'Please enter your last name.';
                return false;
            } else {
                document.getElementById('lastnameError').innerText = '';
            }

            if (!emailInput) {
                document.getElementById('emailError').innerText = 'Please enter your email address.';
                return false;
            } else {
                document.getElementById('emailError').innerText = '';
            }


            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
           

            if (!emailRegex.test(emailInput)) {
                document.getElementById('emailError').innerText = 'Please enter a valid email address.';
                return false;
            } else {
                document.getElementById('emailError').innerText = '';
            }

            if (!passwordInput) {
                document.getElementById('passwordError').innerText = 'Please enter a password.';
                return false;
            } else {
                document.getElementById('passwordError').innerText = '';
            }

            if (!confirmPasswordInput) {
                document.getElementById('confirmPasswordError').innerText = 'Please confirm your password.';
                return false;
            } else {
                document.getElementById('confirmPasswordError').innerText = '';
            }

            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]+$/;


            if (!passwordRegex.test(passwordInput)) {
                document.getElementById('passwordError').innerText = 'Password must have at least one uppercase letter, one lowercase letter, one number, and one special character.';
                return false;
            } else {
                document.getElementById('passwordError').innerText = '';
            }


            if (passwordInput !== confirmPasswordInput) {
                document.getElementById('confirmPasswordError').innerText = 'Passwords do not match.';
                return false;
            } else {
                document.getElementById('confirmPasswordError').innerText = '';
            }

            return true;
        }
        </script>
        
    <script src="../../assets/js/sb-admin-2.min.js"></script>

</body>

</html>