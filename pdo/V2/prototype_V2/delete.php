<?php
require_once "db.php";

function deleteProduct($id, $pdo) {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
    return $stmt->execute(['id' => $id]);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    if (deleteProduct($id, $pdo) == true) {
        header("Location: index.php"); 
        exit();
    } else {
        echo "Erreur lors de la suppression.";
    }
} else {
    echo "ID invalide.";
}
?>