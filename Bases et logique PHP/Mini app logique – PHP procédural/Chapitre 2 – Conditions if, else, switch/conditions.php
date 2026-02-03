<?php
$age = 21;
if ($age <= 18){
    echo "you're minor : under 18";
}else{
    echo "you're adult : upper 18" . "<br>" ;
} 



$note = 16.99;
if($note >= 18){
    echo "very good , congratulations" . "<br>";
}elseif($note >= 16){
    echo "very good" . "<br>";
}elseif($note >= 14){
    echo "good" . "<br>";
}elseif($note >= 12){
    echo "bit good" . "<br>";
}elseif($note >= 10){
    echo "not bad" . "<br>";
}else{
    echo "Failed" . "<br>";
}



$jour = "Vendredi";
switch ($jour) {
    case "Lundi":
        echo "Début de semaine";
        break;
    case "Vendredi":
        echo "Dernier jour avant le week-end";
        break;
    default:
        echo "Jour normal";
}

$age = 100;
 echo ($age >= 18) ? "adult" : (($age >= 13) ? "teen" : "kids");

 