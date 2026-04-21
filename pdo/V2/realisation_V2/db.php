<?php
$dsn = "mysql:host=localhost;dbname=recettesv2;charset=utf8mb4";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo "Connection failed: " . htmlspecialchars($e->getMessage());
    exit;
}

return $pdo;
