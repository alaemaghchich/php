<?php
function getCategories($pdo) {
    $stmt = $pdo->query("SELECT * FROM categories");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getRecipes($pdo) {
    $sql = "SELECT r.id, r.name, r.prep_time, r.image, c.name AS category_name
        FROM recipes r
        LEFT JOIN categories c ON r.category_id = c.id
        ORDER BY r.created_at DESC";

    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>