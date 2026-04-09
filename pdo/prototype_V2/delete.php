<?php
require_once "db.php";
function delete($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM Products WHERE id = :id");
    return $stmt->execute(['id' => $id]);
}