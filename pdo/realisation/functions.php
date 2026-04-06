<?php
require 'db.php'; 

function getRecipes() {
    global $pdo; 
    $stmt = $pdo->query("SELECT * FROM recipes ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function searchRecipes($keyword) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM recipes WHERE name LIKE :keyword");
    $stmt->execute(['keyword' => "%" . $keyword . "%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function filterByCategory($category) {
    global $pdo; 
    $stmt = $pdo->prepare("SELECT * FROM recipes WHERE category = :category");
    $stmt->execute(['category' => $category]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function sortRecipes($order) {
    global $pdo; 
    $sql = "SELECT * FROM recipes";

    if ($order == 'temps_asc') {
        $sql .= " ORDER BY prep_time ASC";
    } elseif ($order == 'temps_desc') {
        $sql .= " ORDER BY prep_time DESC";
    } elseif ($order == 'recent') {
        $sql .= " ORDER BY created_at DESC";
    } elseif ($order == 'ancien') {
        $sql .= " ORDER BY created_at ASC";
    }

    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}