<?php

require_once "config.php";
require_once "classes/Database.php";
require_once "classes/User.php";
require_once "classes/UserRepository.php";

$db = new Database();

$pdo = $db->getConnection();

$repo = new UserRepository($pdo);

$users = $repo->findAll();

foreach ($users as $user) {

    echo $user->getCompleteName();
    echo "<br>";
    echo $user->getMail();
    echo "<hr>";
}