<?php
include "env.php";

$email = $_POST['email'];
$fetchIP = $mysqli->query("SELECT ip_address FROM users WHERE email = '$email'");
$ip_address = mysqli_fetch_array($fetchIP);

echo json_encode($ip_address);
?>