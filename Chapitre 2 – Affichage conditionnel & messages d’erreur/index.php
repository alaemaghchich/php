<?php
if($_SERVER["REQUEST_METHOD"] !== "POST"){
    http_response_code(405);
    exit("method not alowed");
}
$username = $_POST["nom"];
$length = $_POST["length"];

function generatePassword($length) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    
    return substr(str_shuffle($chars), 0, $length);
}

$pass = generatePassword($length);

echo $username . "<br>";
echo $pass;