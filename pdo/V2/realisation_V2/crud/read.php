<?php
require_once '../db.php';
require_once '../functions.php';

$recipes = getRecipes($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes List</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>📖 Recipes List</h2>
        
        <a href="create.php" class="btn btn-add">➕ Add a Recipe</a>
        
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Prep Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($recipes as $recipe): ?>
                <tr>
                    <td>
                        <?php if(!empty($recipe['image'])): ?>
                            <img src="../images/<?= htmlspecialchars($recipe['image']) ?>" alt="<?= htmlspecialchars($recipe['name']) ?>" width="50">
                        <?php else: ?>
                            <span>No image</span>
                        <?php endif; ?>
                    </td>
                    
                    <td><?= htmlspecialchars($recipe['name']) ?></td>
                    <td><?= htmlspecialchars($recipe['category_name'] ?? 'Uncategorized') ?></td>
                    <td><?= htmlspecialchars($recipe['prep_time']) ?> min</td>
                    
                    <td>
                        <a href="update.php?id=<?= $recipe['id'] ?>" class="btn btn-edit">✏️ Edit</a>
                        <a href="delete.php?id=<?= $recipe['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this recipe?');">❌ Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                
                <?php if(empty($recipes)): ?>
                <tr>
                    <td colspan="5" style="text-align: center;">No recipes found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <br>
        <a href="../index.php" class="btn">🔙 Back to Home</a>
    </div>
</body>
</html>