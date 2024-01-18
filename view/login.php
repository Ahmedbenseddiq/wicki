<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-image">
                            <img src="https://images.pexels.com/photos/117729/pexels-photo-117729.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" class="img-fluid h-100">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <form class="user" method="post" action="../controller/login.contr.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            <div id="emailError" style="color: red;"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Enter Password">
                                            <div id="passwordError" style="color: red;"></div>
                                            <div class="password-toggle" onclick="togglePasswordVisibility()">
                                                <i class="fas fa-eye"></i>
                                            </div>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>

                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="register.php">Don't have an account?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            var emailInput = document.getElementById('exampleInputEmail').value;
            var passwordInput = document.getElementById('exampleInputPassword').value;

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]+$/;

            // Validate email
            if (!emailRegex.test(emailInput)) {
                document.getElementById('emailError').innerText = 'Please enter a valid email address.';
                return false;
            } else {
                document.getElementById('emailError').innerText = '';
            }

            // Validate password
            if (!passwordRegex.test(passwordInput)) {
                document.getElementById('passwordError').innerText = 'Password must have at least one uppercase letter, one lowercase letter, one number, and one special character.';
                return false;
            } else {
                document.getElementById('passwordError').innerText = '';
            }

            // If all validations pass, you can continue with the form submission
            return true;
        }

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('exampleInputPassword');
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        }
    </script>
    <script src="assets/js/sb-admin-2.min.js"></script>
</body>

</html>
