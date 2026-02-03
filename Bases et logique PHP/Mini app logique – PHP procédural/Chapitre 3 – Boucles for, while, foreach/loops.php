<?php
//while loop
$count = 0;
while($count < 5){
   echo $count++ . "<br>";
}
echo "done while loops" . "<br>";

//====================================
//do...while loop
$num = 8;
do{
    echo $num . "<br>";
    $num++ ;
}while($num < 5);
echo "done do...while loop" . "<br>";

//=====================================
//for loop
for($i = 0; $i < 5; $i++){
    echo $i . "<br>";
}

$names = [" monir", "alae", "brahim"];
for($x = 0; $x < count($names); $x++){
echo $names [$x] . "<br>";
}

//===================================
//foreach loop
$abtal = ["ayoub", "monir", "brahim" ];
foreach($abtal as $batal){
    echo $batal . "<br>";}
//$batal = ayoub
//$batal = monir
//$batal = brahim


$ages = ["alae" => 21, "monir" => 20];
foreach ($ages as $name => $age) {
    echo "$name is $age years old<br>";
}//key => value 



//===================================
//break and continue
$web = ["html", "css", "js"];
$dev = 0;
while($dev < count($web)){
    if ($dev == 1){
        break;
    }echo $web[$dev] . "<br>";
    $dev++;
}//outpot = html

$backend = ["php", "sql", "nextjs"];
for($back = 0; $back < count($backend); $back++){
    if($back == 1){
        continue;
    }echo $backend[$back] . "<br>";
}//outpot = php / nextjs