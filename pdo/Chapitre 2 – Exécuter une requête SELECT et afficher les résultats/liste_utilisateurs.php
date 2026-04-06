<?php
require 'connexion.php';

try {
    $sql = "SELECT * FROM Utilisateur";
    $stmt = $pdo->query($sql);

    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Email</th></tr>";

    foreach ($utilisateurs as $user){
        echo "<tr>";
        echo "<td>" . $user['id'] . "</td>";
        echo "<td>" . $user['nom'] . "</td>";
        echo "<td>" . $user['email'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


/*$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");   
$stmt->execute(['email' => 'test@gmail.com']);
$user = $stmt->fetch(PDO::FETCH_BOTH);*/


/*$stmt = $pdo->prepare("INSERT INTO users(name, age) VALUES(:name, :age)");
$stmt->execute(['name' => 'Alae','age' => 20]);*/