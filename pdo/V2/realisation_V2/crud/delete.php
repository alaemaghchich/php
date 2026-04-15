<?php
require_once '../db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // 1. Optional: Get image name to delete the file from the server
    $stmt = $pdo->prepare("SELECT image FROM recipes WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $recipe = $stmt->fetch();

    if ($recipe && !empty($recipe['image'])) {
        $image_path = '../images/' . $recipe['image'];
        if (file_exists($image_path)) {
            unlink($image_path); // This removes the file from the /images folder
        }
    }

    // 2. Delete the record from database
    $stmt = $pdo->prepare("DELETE FROM recipes WHERE id = :id");
    $stmt->execute([':id' => $id]);
}

// 3. Redirect back to the list
header('Location: read.php');
exit;