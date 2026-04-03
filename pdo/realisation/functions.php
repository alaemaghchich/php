<?php
function searchRecipes($search) {
    return !empty($search) ? " name LIKE :search " : "";
}

function filterByCategory($category) {
    $categories_valides = ['Entrée', 'Plat', 'Dessert'];
    if (in_array($category, $categories_valides)) {
        return " category = :category ";
    }
    return "";
}

function sortRecipes($sort) {
    switch ($sort) {
        case 'time_asc': return " ORDER BY prep_time ASC ";
        case 'time_desc': return " ORDER BY prep_time DESC ";
        case 'oldest': return " ORDER BY created_at ASC ";
        case 'newest': 
        default: return " ORDER BY created_at DESC ";
    }
}

function getRecipes($pdo, $search = '', $category = '', $sort = '') {
    $sql = "SELECT * FROM recipes";
    $conditions = [];
    $params = [];
    $sqlSearch = searchRecipes($search);
    $sqlCategory = filterByCategory($category);
    if ($sqlSearch !== "") {
        $conditions[] = $sqlSearch;
        $params[':search'] = '%' . $search . '%';
    }
    if ($sqlCategory !== "") {
        $conditions[] = $sqlCategory;
        $params[':category'] = $category;
    }
    if (count($conditions) > 0) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }
    $sql .= sortRecipes($sort);

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>