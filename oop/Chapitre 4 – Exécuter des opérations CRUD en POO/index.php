<?php
require_once "Database.php";
require_once "user.php";

//connexion
$db = new database();
$db->getConnect();
 
//create user
$user = new User($db);
$user->name = "Alice";
$user->mail = "alice@test.com";
$user->create();

//read users
$user->read();
foreach($user as $u){
    echo $u['name'] . " - " . $u["mail"] . "<br>";
}