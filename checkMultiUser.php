<?php
session_start();
require "functions.php";

$email = $_SESSION['email'];
$ipAddress = $_SESSION['ip_address'];
$response = json_decode(checkIpUser($email), true);
$ipAddressFromDB = $response['ip_address'];

if($ipAddressFromDB != $ipAddress){
    $callback = [
        'status' => 'failed',
        'message' => 'Another device try to log in with this account, you will be removed from this account!',
    ];
}else{
    $callback = [
        'status' => 'ok'
    ];
}

echo json_encode($callback);

?>