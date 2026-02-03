<?php

function avg($notes) {
    return array_sum($notes) / count($notes);
}

function getMention($moyenne) {
    if ($moyenne >= 16) {
        return "Very Good";
    } elseif ($moyenne >= 14) {
        return "Good";
    } elseif ($moyenne >= 12) {
        return "Fairly Good";
    } elseif ($moyenne >= 10) {
        return "Pass";
    } else {
        return "fail";
    }
}

$resultat = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom   = $_POST['nom'];
    $note1 = $_POST['note1'];
    $note2 = $_POST['note2'];
    $note3 = $_POST['note3'];
}

$notes = [$note1, $note2, $note3];

$valid = true;
foreach ($notes as $note) {
    if ($note < 0 || $note > 20) {
        $valid = false;
        break;
    }
}

if ($valid) {
    $moyenne = avg($notes);
    $mention = getMention($moyenne);
    $resultat = "Student: $nom <br> Average: $moyenne / 20 <br> Mention: $mention";
} else {
    $resultat = "Error: The grades must be between 0 and 20.";
}

if ($resultat != "") {
    echo "<div>$resultat</div>";
} else {
    echo "No data received.";
}
