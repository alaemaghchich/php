<?php
require_once 'db.php'; 

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

    switch ($order) {
        case 'temps_asc':
            $sql = $sql . " ORDER BY prep_time ASC";
            break;

        case 'temps_desc':
            $sql = $sql . " ORDER BY prep_time DESC";
            break;

        case 'recent':
            $sql = $sql . " ORDER BY created_at DESC";
            break;

        case 'ancien':
            $sql = $sql . " ORDER BY created_at ASC";
            break;

        default:
            $sql = $sql . " ORDER BY created_at DESC";
            break;
    }

    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}