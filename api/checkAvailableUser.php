<?php
include "env.php";
if($_POST){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ip_address = $_POST['ip_address'];
    $userValidated =  $mysqli->query("SELECT * FROM users WHERE email = '$email' and password = '$password'");
    $cekUserValidated = mysqli_num_rows($userValidated);
    if($cekUserValidated > 0){
        $callback = [
            'status' => 'success',
            'email' => $email,
            'ip_address' => $ip_address
        ];
    }else{
        $callback = [
            'status' => 'failed',
            'message' => 'Incorrect Credentials'
        ];
    }

    echo json_encode($callback);
}else{
    echo 'Wrong method!';
}
?>