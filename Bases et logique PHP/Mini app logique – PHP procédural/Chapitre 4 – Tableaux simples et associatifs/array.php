<?php
$animaux = ["Chat", "Chien", "Lapin"];//simple array
echo "Premier animal : " . $animaux[0] . "<br>";
foreach ($animaux as $animal) {
    echo "Animal : $animal <br>";}



$voiture = ["marque" => "Toyota",
            "modele" => "Corolla",
            "année" => 2020];//associative array

echo "Modèle : " . $voiture["modele"] . "<br>";


$fruits = ["Pomme", "Banane"];
array_push($fruits, "Mangue"); // Ajoute "Mangue"
unset($fruits[1]); // Supprime "Banane"
echo "Nombre de fruits : " . count($fruits) . "<br>";




$names = ["ahmed" , "mohamed" , "ali"];
$names[] = "omar"; //Ajoute omar
echo $names[3] . "<br>";
echo count($names) . "<br>";




$frontend = ["html", "css", "js"];
$backend = ["mySQL", "PHP"];
$result = array_merge($frontend, $backend);
echo "<pre>";
print_r($result);
echo "</pre>";

 


//Multidimensional Arrays
$notes = [[12, 15, 14,[100 , 5 , 1]],[10, 18, 16], [9, 11, 13]];
echo $notes[0][3][2] . "<br>";//outpot 1
echo $notes [1][0] . "<br>"; //outpot 10