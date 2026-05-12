<?php
class car{
public $module;
public $color;
public $year;

public function start(){
    return "the car module : " . $this->module . " his color is : " . $this->color . " and is creatted on : " . $this->year;
}
}
$car1 = new car();
$car1->module = "bmw";
$car1->color = "black";
$car1->year = "2022";
 echo $car1->start() . "<br>";

 $car2 = new car();
 $car2->module = "dacia ";
 $car2->color = "blue ";
 $car2->year = "2005";
 echo $car2->start();