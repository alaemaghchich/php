<?php
require_once '../db.php';
require_once '../functions.php';

// 1. Get the ID from the URL
$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: read.php');
    exit;
}

// 2. Fetch the current recipe data to pre-fill the form
$stmt = $pdo->prepare("SELECT * FROM recipes WHERE id = :id");
$stmt->execute([':id' => $id]);
$recipe = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$recipe) {
    die("Recipe not found!");
}

$categories = getCategories($pdo);
$error = '';

// 3. Handle the update when form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $prep_time = trim($_POST['prep_time'] ?? '');
    $category_id = $_POST['category_id'] ?? '';
    $image_name = $recipe['image']; // Keep old image by default

    if (empty($name) || empty($prep_time) || empty($category_id)) {
        $error = "Please fill in all required fields.";
    } else {
        // Handle new image upload if provided
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['image']['tmp_name'];
            $file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $image_name = time() . '.' . $file_ext;
            move_uploaded_file($tmp_name, '../images/' . $image_name);
            
            // Optional: Delete the old image file from the folder to save space
            if (!empty($recipe['image']) && file_exists('../images/' . $recipe['image'])) {
                unlink('../images/' . $recipe['image']);
            }
        }

        // 4. Execute the Update query
        $sql = "UPDATE recipes 
                SET name = :name, prep_time = :prep_time, image = :image, category_id = :category_id, edited_at = NOW() 
                WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':prep_time' => $prep_time,
            ':image' => $image_name,
            ':category_id' => $category_id,
            ':id' => $id
        ]);

        header('Location: read.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2><i class="bi bi-pen"></i> Edit Recipe: <?= htmlspecialchars($recipe['name']) ?></h2>

        <?php if($error): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Recipe Name</label>
        <input type="text" name="name" value="<?= htmlspecialchars($recipe['name']) ?>" required>
    </div>

    <div class="form-group">
        <label>Prep Time (min)</label>
        <input type="number" name="prep_time" value="<?= htmlspecialchars($recipe['prep_time']) ?>" required>
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name="category_id" required>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $recipe['category_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
    <label for="formFileMultiple" class="form-label">Image (Optional)</label>
    <input class="form-control" type="file" name="image" accept="image/*" id="formFileMultiple" multiple>
    <p>Current image: <?= htmlspecialchars($recipe['image']) ?></p>
    </div>
    <button type="submit" class="btn btn-success">Save Recipe</button>
    <a href="read.php" ><button type="button" class="btn btn-danger">Cancel</button></a>

</form>