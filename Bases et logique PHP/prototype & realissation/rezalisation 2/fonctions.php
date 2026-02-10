<?php

function generatePatientId() {
    return "PAT-" . date('Ymd') . "-" . rand(1000, 9999);
}

function calculateAge($birth_date) {
    $birth = new DateTime($birth_date);
    $today = new DateTime();
    return $today->diff($birth)->y;
}

function calculateIMC($weight, $height) {
    return round($weight / ($height * $height), 1);
}

function detectAlerts($temperature, $sys, $dia, $imc) {
    $alerts = [];

    if ($temperature >= 38.5) $alerts[] = "Fever";
    if ($sys >= 140 || $dia >= 90) $alerts[] = "Hypertension";
    if ($imc < 18.5) $alerts[] = "Underweight";
    if ($imc >= 30) $alerts[] = "Overweight";

    return $alerts;
}

function readConsultations($file) {
    if (!file_exists($file)) return [];
    return json_decode(file_get_contents($file), true) ?? [];
}

function saveConsultations($file, $data) {
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}
