<?php
$dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
$user = "root";
$pass = "";
try{
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(PDOException $e){
    echo "somthing went wrong : " . $e->getMessage();
}