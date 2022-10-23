<?php
session_start();
require "functions.php";

if($_SESSION){
    if($_SESSION['email']){
        header('Location: index.php');
    }
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ip_address = $_SERVER['REMOTE_ADDR'];

    $resultValidatedUser = json_decode(checkValidatedUser($email, $password, $ip_address), true);

    if($resultValidatedUser['status'] == 'success'){
        updateIP($ip_address, $email);
        $_SESSION['email'] = $email;
        $_SESSION['ip_address'] = $ip_address;
        header('Location: index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-4 p-5 shadow-sm border rounded-3">
                <h2 class="text-center mb-4 text-primary">Login Form</h2>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" class="form-control border border-primary" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Password</label>
                        <input type="password" class="form-control border border-primary" id="password" name="password">
                    </div>
                    <p class="small"><a class="text-primary" href="#">Forgot password?</a></p>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit" name="submit">Login</button>
                    </div>
                </form>
                <div class="mt-3">
                    <p class="mb-0  text-center">Don't have an account? <a href="#"
                            class="text-primary fw-bold">Sign
                            Up</a></p>
                </div>
            </div>
        </div>
    </body>

</html>