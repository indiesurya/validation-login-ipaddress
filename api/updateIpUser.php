<?php
include "env.php";

$email = $_POST['email'];
$ip_address = $_POST['ip_address'];

$updateIp = $mysqli->query("UPDATE users SET ip_address = '$ip_address' WHERE email = '$email'");
?>