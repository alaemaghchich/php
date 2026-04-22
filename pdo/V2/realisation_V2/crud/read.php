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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2><i class="bi bi-list-task"></i> Recipes List</h2>
        
        <a href="create.php"><button type="button" class="btn btn-outline-success"><i class="bi bi-plus-lg"></i> Add a Recipe</button></a>
        
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
                        <a href="update.php?id=<?= $recipe['id'] ?>"><button type="button" class="btn btn-outline-warning"><i class="bi bi-pen"></i>Edit</button></a>
                        <a href="delete.php?id=<?= $recipe['id'] ?>" onclick="return confirm('Are you sure you want to delete this recipe?');"><button type="button" class="btn btn-outline-danger"><i class="bi bi-trash3"></i> delete</button></a>
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
        <a href="../index.php"><button type="button" class="btn btn-outline-dark"><i class="bi bi-arrow-return-left"></i> Back to Home</button></a>
    </div>
</body>
</html>