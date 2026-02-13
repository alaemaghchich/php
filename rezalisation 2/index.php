<?php
require "fonctions.php";

$consultations = readConsultations();

// SORT
if (isset($_GET["sort"])) {
    if ($_GET["sort"] === "date") {
        usort($consultations, fn($a,$b)=>strcmp($a["date_consultation"],$b["date_consultation"]));
    }
    if ($_GET["sort"] === "name") {
        usort($consultations, fn($a,$b)=>strcmp($a["nom"],$b["nom"]));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Consultations</title>
<style>
body { 
font-family: Arial; 
background-color: #eef2f7;
}
header{
    background-color: #dbecfb;
    border: 2px solid #3498db;
    border-radius: 20px;
    margin: 10px;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
h2 { color: #2c3e50;
}
.actions a {
    margin-left: 5px;
    color: white;
    background-color: #3498db;
    padding: 8px 12px;
    border-radius: 4px;
    text-decoration: none;
}
.actions a:hover { background-color: #2980b9;
}
.card {
background-color: white;
padding: 20px;
margin-bottom: 15px;
border-radius: 8px;
box-shadow: 0 4px 10px rgba(0,0,0,0.1);
border-left: 6px solid #3498db;
}
.alert {
margin-top: 8px;
padding: 6px;
border-radius: 4px;
font-weight: bold;
}
.alert-danger {
background-color: #ffe6e6;
color: #c0392b;
}
.badge {
display: inline-block;
padding: 4px 8px;
margin: 3px;
background-color: #dff0ff;
color: #2980b9;
border-radius: 20px;
font-size: 12px; }
</style>
</head>
<body>
<header>
  <div class="title">
    <h2>Consultations List</h2>
  </div>
  <div class="actions">
       <span>Sort by:</span>
    <a href="?sort=date">Date</a>
    <a href="?sort=name">Name</a>
    <a href="add.php" style="background-color: green;">Add Consultation</a>
  </div>
</header>

<br><br>

<?php foreach($consultations as $c): ?>
<div class="card">
<strong>ID:</strong> <?= $c["id_patient"] ?><br>
<strong>Name:</strong> <?= $c["prenom"] ?> <?= $c["nom"] ?><br>
<strong>Age:</strong> <?= $c["age"] ?><br>
<strong>Date:</strong> <?= $c["date_consultation"] ?><br>
<strong>Temperature:</strong> <?= $c["temperature"] ?><br>
<strong>Pressure:</strong> <?= $c["tension"] ?><br>
<strong>BMI:</strong> <?= $c["imc"]; ?><br>

<strong>Symptoms:</strong>
<?php
if (!empty($c["symptomes"])) {
    foreach($c["symptomes"] as $s) echo "<span class='badge'>$s</span>";
} else {
    echo "None";
}
?><br>

<?php
list($sys,$dia) = explode("/",$c["tension"]);
if ($c["temperature"]>=38.5) echo "<div class='alert alert-danger'>⚠ Fever detected</div>";
if ($sys>=140 || $dia>=90) echo "<div class='alert alert-danger'>⚠ Hypertension detected</div>";
if ($c["imc"] < 18.5) {
    echo "<div style='background-color: #fff3cd; color: #856404;' class='alert'>⚠ Underweight BMI</div>";
} elseif ($c["imc"] >= 18.5 && $c["imc"] < 25) {
    echo "<div style='background-color: #d4edda; color: #155724;' class='alert'>⚠ Normal weight BMI</div>";
} elseif ($c["imc"] >= 25 && $c["imc"] < 30) {
    echo "<div style='background-color: #fff3e0; color: #e67e22;' class='alert'>⚠ Overweight BMI</div>";
} else {
    echo "<div style='background-color: #ffe6e6; color: #c0392b;' class='alert'>⚠ Obese BMI</div>";
}
?>

</div>
<?php endforeach; ?>

</body>
</html>
