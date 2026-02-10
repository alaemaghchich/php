<?php
require_once 'fonctions.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "<p>submit the form.</p>";
    echo "<a href='add.php'>Retour</a>";
    exit;
}


$name = trim($_POST['name']);
$lastname = trim($_POST['lastname']);
$birth_date = $_POST['date'];
$sex = $_POST['sex'];
$tel = trim($_POST['tel']);

$date_consultation = $_POST['date_consultation'] ?? '';
$reason = trim($_POST['reason'] ?? '');
$temperature = floatval($_POST['temperature']);
$tension_sys = intval($_POST['tension_sys']);
$tension_dia = intval($_POST['tension_dia']);
$weight = floatval($_POST['poids']);
$height = floatval($_POST['taille']);
$symptoms = $_POST['symptomes'];

$errors = [];

if ($name === '') $errors[] = "Name is required.";
if ($lastname === '') $errors[] = "Last name is required.";
if ($birth_date === '') $errors[] = "Birth date is required.";
if ($sex === '') $errors[] = "Sex is required.";
if ($date_consultation === '') $errors[] = "Consultation date is required.";
if ($reason === '') $errors[] = "Reason is required.";

if ($temperature < 35 || $temperature > 42)
    $errors[] = "Temperature must be between 35°C and 42°C.";
if ($weight < 2 || $weight > 250)
    $errors[] = "Weight must be between 2kg and 250kg.";
if ($height < 0.5 || $height > 2.5)
    $errors[] = "Height must be between 0.5m and 2.5m.";
if ($tension_sys < 80 || $tension_sys > 200)
    $errors[] = "Systolic pressure must be between 80 and 200.";
if ($tension_dia < 40 || $tension_dia > 130)
    $errors[] = "Diastolic pressure must be between 40 and 130.";
if ($date_consultation > date('Y-m-d'))
    $errors[] = "Consultation date cannot be in the future.";


if (!empty($errors)) {
    echo "<h3 style='color:red;'>Errors:</h3><ul>";
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul>";
    echo "<a href='add.php'>Back to form</a>";
    exit;
}



$age    = calculateAge($birth_date);
$imc    = calculateIMC($weight, $height);
$alerts = detectAlerts($temperature, $tension_sys, $tension_dia, $imc);

$patient_id = generatePatientId();


$consultation = [
    'patient' => [
        'id'         => $patient_id,
        'name'       => $name,
        'lastname'   => $lastname,
        'birth_date' => $birth_date,
        'age'        => $age,
        'sex'        => $sex,
        'tel'        => $tel
    ],
    'consultation' => [
        'date'          => $date_consultation,
        'reason'        => $reason,
        'temperature'   => $temperature,
        'tension_sys'   => $tension_sys,
        'tension_dia'   => $tension_dia,
        'weight'        => $weight,
        'height'        => $height,
        'imc'           => $imc,
        'symptoms'      => $symptoms,
        'alerts'        => $alerts
    ]
];



$file = 'data/consultations.json';
$allConsultations = readConsultations($file);
$allConsultations[] = $consultation;
saveConsultations($file, $allConsultations);



echo "<h2 style='color:green;'>Consultation saved successfully </h2>";
echo "<p><strong>Patient:</strong> $name $lastname</p>";
echo "<p><strong>IMC:</strong> $imc</p>";

if (!empty($alerts)) {
    echo "<p style='color:red;'> Alerts: " . implode(', ', $alerts) . "</p>";
}

echo "<a href='add.php'>Add another consultation</a><br>";
echo "<a href='index.php'>View all consultations</a>";
