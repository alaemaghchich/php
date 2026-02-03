<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $name = trim($_POST["name"]);
    $mail = trim($_POST["mail"]);
}
if(empty($name) || empty($mail)){
    echo "all inputs is requird";
}elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
    echo "check ur email";
}else{
    echo "welcome sir: " . $name . "ur mail " . $mail;
}