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
print_r($result);
