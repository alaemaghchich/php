<?php

//read JSON file 
function readConsultations() {
    $file = "data/consultations.json";
    if (!file_exists($file)) return [];
    $data = file_get_contents($file);
    return json_decode($data, true);
}

//save to JSON file
function saveConsultations($consultations) {
    $file = "data/consultations.json";
    file_put_contents($file, json_encode($consultations, JSON_PRETTY_PRINT));
}

//generate unique patient ID
function generatePatientId() {
    $date = date("Ymd");
    $random = rand(1000, 9999);
    return "PAT-" . $date . "-" . $random;
}

//calculate age from birthdate
function calculateAge($birthdate) {
    $today = date("Y-m-d");
    $diff = date_diff(date_create($birthdate), date_create($today));
    return $diff->y;
}

//calculate BMI
function calculateBMI($weight, $height) {
    return $weight / ($height * $height);
}
