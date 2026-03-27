<?php
require 'connexion.php';

try {
    $sql = "SELECT * FROM Utilisateur";
    $stmt = $pdo->query($sql);

    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Email</th></tr>";

    foreach ($utilisateurs as $user) {
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