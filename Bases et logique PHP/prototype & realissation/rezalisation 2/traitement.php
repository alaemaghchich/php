<?php
require "fonctions.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = trim($_POST["nom"]);
    $prenom = trim($_POST["prenom"]);
    $date_naissance = $_POST["date_naissance"];
    $sexe = $_POST["sexe"];
    $telephone = trim($_POST["telephone"]);
    $date_consultation = $_POST["date_consultation"];
    $motif = trim($_POST["motif"]);
    $temperature = floatval($_POST["temperature"]);
    $sys = intval($_POST["sys"]);
    $dia = intval($_POST["dia"]);
    $poids = floatval($_POST["poids"]);
    $taille = floatval($_POST["taille"]);
    $symptomes = $_POST["symptomes"] ?? [];

    // VALIDATION
    if ($nom === "") $errors[] = "Last name required";
    if ($prenom === "") $errors[] = "First name required";
    if ($temperature < 35 || $temperature > 42) $errors[] = "Temperature invalid";
    if ($poids < 2 || $poids > 250) $errors[] = "Weight invalid";
    if ($taille < 0.5 || $taille > 2.5) $errors[] = "Height invalid";
    if ($sys < 80 || $sys > 200) $errors[] = "Systolic invalid";
    if ($dia < 40 || $dia > 130) $errors[] = "Diastolic invalid";
    if ($date_consultation > date("Y-m-d")) $errors[] = "Date cannot be in future";

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo "<a href='add.php'>Back</a>";
        exit;
    }

    $consultations = readConsultations();

$consultations[] = [
    "id_patient" => generatePatientId(),
    "nom" => $nom,
    "prenom" => $prenom,
    "age" => calculateAge($date_naissance),
    "sexe" => $sexe,
    "telephone" => $telephone,
    "date_consultation" => $date_consultation,
    "motif" => $motif,
    "temperature" => $temperature,
    "tension" => "$sys/$dia",
    "poids" => $poids,
    "taille" => $taille,
    "imc" => round(calculateBMI($poids, $taille), 2),
    "symptomes" => $symptomes
];


    saveConsultations($consultations);

    header("Location: index.php");
}
