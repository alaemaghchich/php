<?php
function saluer(){
    echo "hello world !" . "<br>";
}
saluer();//hello world 

//========================================================

function addition($a ,$b)//parametre
{
    return $a + $b . "<br>";
}
echo "somme : " . addition(5, 10);//argumment  //somme : 15

//===========================================================

function welcome($name = "visiteur"){
    echo "welcome " . $name . "<br>";
}
 welcome();//welcome visiteur

 //========================================

function local(){
    $x = 5; //local example
    $x++;
    echo $x . "<br>";
}
local();//6
local();//6
local();//6

//============================

function staticExample(){
    static $x = 5;
    $x++;
    echo $x . "<br>";
}
staticExample();//6
staticExample();//7
staticExample();//8

//===========================

$x = 5;//global
function globalExample(){
    global $x;
    $x++;
}
globalExample();
echo $x . "<br>";//6
globalExample();
echo $x; // 7