<?php
// index.php
require_once 'db.php';
require_once 'functions.php';

$searchFilter = $_GET['search'] ?? '';
$categoryFilter = $_GET['category'] ?? '';
$sortFilter = $_GET['sort'] ?? 'newest';

$recipes = getRecipes($pdo, $searchFilter, $categoryFilter, $sortFilter);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Recettes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Liste des recettes</h1>

    <div class="form-container">
        <form method="GET" action="index.php">
            
            <input type="text" name="search" placeholder="Chercher une recette..." 
                   value="<?= htmlspecialchars($searchFilter) ?>">

            <select name="category">
                <option value="">Toutes les catégories</option>
                <option value="Entrée" <?= $categoryFilter === 'Entrée' ? 'selected' : '' ?>>Entrée</option>
                <option value="Plat" <?= $categoryFilter === 'Plat' ? 'selected' : '' ?>>Plat</option>
                <option value="Dessert" <?= $categoryFilter === 'Dessert' ? 'selected' : '' ?>>Dessert</option>
            </select>

            <select name="sort">
                <option value="newest" <?= $sortFilter === 'newest' ? 'selected' : '' ?>>Plus récentes</option>
                <option value="oldest" <?= $sortFilter === 'oldest' ? 'selected' : '' ?>>Plus anciennes</option>
                <option value="time_asc" <?= $sortFilter === 'time_asc' ? 'selected' : '' ?>>Temps croissant</option>
                <option value="time_desc" <?= $sortFilter === 'time_desc' ? 'selected' : '' ?>>Temps décroissant</option>
            </select>

            <button type="submit">Filtrer</button>
            <a href="index.php">Réinitialiser</a>
        </form>
    </div>

    <div class="recipe-grid">
        <?php if (count($recipes) > 0): ?>
            <?php foreach ($recipes as $recipe): ?>
                <div class="card">
                    <?php if (!empty($recipe['image'])): ?>
                        <img src="<?= htmlspecialchars($recipe['image']) ?>" alt="<?= htmlspecialchars($recipe['name']) ?>">
                    <?php endif; ?>
                    
                    <h3><?= htmlspecialchars($recipe['name']) ?></h3>
                    <p><span class="badge"><?= htmlspecialchars($recipe['category']) ?></span></p>
                    <p>Temps de prép : <?= htmlspecialchars($recipe['prep_time']) ?> min</p>
                    <p><small>Ajouté le : <?= date('d/m/Y', strtotime($recipe['created_at'])) ?></small></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune recette trouvée avec ces critères.</p>
        <?php endif; ?>
    </div>

</body>
</html>