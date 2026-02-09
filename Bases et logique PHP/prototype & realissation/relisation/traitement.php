<?php
require_once 'fonctions.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $birthdate = $_POST["date"];
    $filier = $_POST["filiere"];
    $notes = [$_POST['notepc1'], $_POST['notepc2'],
              $_POST['noteen1'], $_POST['noteen2'],
              $_POST['notemath1'], $_POST['notemath2'],
              $_POST['noteph1'], $_POST['noteph2'],
              $_POST['notesvt1'], $_POST['notesvt2']];

if (verifierNotes($notes) == false) {
    echo "Error: Invalid grades, must be between 0 and 20";
    exit;
}

    $avgPC = avg($notes[0], $notes[1]);
    $avgEN = avg($notes[2], $notes[3]);
    $avgMATH = avg($notes[4], $notes[5]);
    $avgPH = avg($notes[6], $notes[7]);
    $avgSVT = avg($notes[8], $notes[9]);


if($filier == "scmath"){
    $coef = [ "math" => 9, "physique" => 7, "svt" => 3, "Philosophie" => 2, "english" => 2 ];
  }
  elseif($filier == "scpc"){
    $coef = [ "math" => 7, "physique" => 7, "svt" => 5, "Philosophie" => 2, "english" => 2 ];
  }
  elseif($filier == "scsvt"){
    $coef = [ "math" => 7, "physique" => 5, "svt" => 7, "Philosophie" => 2, "english" => 2 ];
  }

    $avggeneral = (
        $avgPC * $coef["physique"] +
        $avgMATH * $coef["math"] +
        $avgSVT * $coef["svt"] +
        $avgEN * $coef["english"] +
        $avgPH * $coef["Philosophie"]
    ) / array_sum($coef);

    $mention = getMention($avggeneral);
    $final = finalResult($avggeneral);

    echo "<h2>student information</h2>";
    echo "Name: $name $lastname <br>";
    echo "Birth Date: $birthdate <br>";
    echo "Filiere: $filier <br>";
    echo "<h2>Notes</h2>";
    echo "Physique: $avgPC <br>";
    echo "English: $avgEN <br>";
    echo "Math: $avgMATH <br>";
    echo "Philosophie: $avgPH <br>";
    echo "SVT: $avgSVT <br>";
    echo "<h3>general average: $avggeneral</h3>";
    echo "<h3>montion: $mention</h3>";
    echo "<h3> final result: $final</h3>";
}
?>
