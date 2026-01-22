<?php
$animaux = ["Chat", "Chien", "Lapin"];//simple array
echo "Premier animal : " . $animaux[0] . "<br>";
foreach ($animaux as $animal) {
    echo "Animal : $animal <br>";
}


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
echo $names[3];
echo count($names);




$a = [1, 2, 3];
$b = [4, 5];
$result = array_merge($a, $b);
print_r($result);
