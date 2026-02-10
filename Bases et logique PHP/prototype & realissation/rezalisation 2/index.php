<?php
require_once 'fonctions.php';

$file = 'data/consultations.json';
$consultations = readConsultations($file);

$sort = $_GET['sort'] ?? '';

if ($sort === 'date') {
    usort($consultations, fn($a,$b) =>
        strcmp($b['consultation']['date'], $a['consultation']['date'])
    );
}

if ($sort === 'name') {
    usort($consultations, fn($a,$b) =>
        strcmp($a['patient']['name'], $b['patient']['name'])
    );
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Consultations</title>
</head>
<body>

<h2>All Consultations</h2>

<a href="?sort=date">Sort by date</a> |
<a href="?sort=name">Sort by name</a> |
<a href="add.php">Add consultation</a>

<hr>

<?php foreach ($consultations as $c): ?>
    <div style="border:1px solid #000; margin:10px; padding:10px;">
        <strong><?= $c['patient']['name'] ?> <?= $c['patient']['lastname'] ?></strong><br>
        Date: <?= $c['consultation']['date'] ?><br>
        IMC: <?= $c['consultation']['imc'] ?><br>

        <?php if (!empty($c['consultation']['alerts'])): ?>
            <p style="color:red;">
                 Alerts: <?= implode(', ', $c['consultation']['alerts']) ?>
            </p>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

</body>
</html>
