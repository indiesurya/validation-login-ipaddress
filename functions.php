<?php

function checkValidatedUser($email, $password, $ip_address){
    $url ='http://127.0.0.1/validation-account-login/api/checkAvailableUser.php';

    $fields = [
        'email' => $email,
        'password' => $password,
        'ip_address' => $ip_address
    ];

    $fields_string = http_build_query($fields);

    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

    $result = curl_exec($ch);

    return $result;
}

function checkIpUser($email){
    $url ='http://127.0.0.1/validation-account-login/api/checkIpUser.php';

    $fields = [
        'email' => $email
    ];

    $fields_string = http_build_query($fields);

    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

    $result = curl_exec($ch);

    return $result;
}

function updateIP($ipAddress, $email){
    $url ='http://127.0.0.1/validation-account-login/api/updateIpUser.php';

    $fields = [
        'email' => $email,
        'ip_address' => $ipAddress
    ];

    $fields_string = http_build_query($fields);

    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

    $result = curl_exec($ch);

    return $result;
}
?>