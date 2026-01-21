<?php 
$name = "alae maghchich";
$age = 21;
$isconected = true;
$price = 49.99;

echo "name is " . $name . "<br>";
echo "age is : " . ($age<18 ? "ur minor under18" : "ur adult upper18") . "<br>";
echo "is conected : " . ($isconected ? "oui" : "no" ) . "<br>";
//if($isconected = true){
    //echo "oui";
//}else{
   // echo "no";}
   echo "product price is : " . $price . "<br>" ;
   echo gettype($name) . "<br>"; //example with gettype
   var_dump($name)  . "<br>"; //example with var_dump
   $str = "2004";
   $nmbr = (int)$str;
   echo $nmbr;