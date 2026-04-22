<?php
require_once '../db.php';
require_once '../functions.php';

$categories = getCategories($pdo);

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $prep_time = trim($_POST['prep_time'] ?? '');
    $category_id = $_POST['category_id'] ?? '';
    $image_name = '';

    if (empty($name) || empty($prep_time) || empty($category_id)) {
        $error = "Please fill in all required fields (Name, Prep Time, Category).";
    } else {
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
    //When you upload a file to PHP, the server puts it in a temporary folder and gives it a random name.
    $tmp_name = $_FILES['image']['tmp_name'];
    //get the file name only without the path (security)
    $file_name = basename($_FILES['image']['name']);
    $image_name = time() . '_' . $file_name;
    $destination = '../images/' . $image_name;
    move_uploaded_file($tmp_name, $destination);
    }
        /*super global $_files structure
        $_FILES['image'] = 
        ['name' => 'file.jpg',
        'type' => 'image/jpeg', 
        'tmp_name' => '/tmp/php123',
        'error' => upload statu,
        'size' => 12345]; */

        $stmt = $pdo->prepare("INSERT INTO recipes (name, prep_time, image, category_id) VALUES (:name, :prep_time, :image, :category_id)");
        $stmt->execute([':name' => $name,':prep_time' => $prep_time,':image' => $image_name, ':category_id' => $category_id]);
        header('Location: read.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2><i class="bi bi-plus-lg"></i> Add a New Recipe</h2>
        
        <?php if($error): ?>
            <div style="color: red; margin-bottom: 15px; font-weight: bold;"><?= $error ?></div>
        <?php endif; ?>
        
        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="name">Recipe Name *</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="prep_time">Preparation Time (minutes) *</label>
                <input type="number" id="prep_time" name="prep_time" required>
            </div>
            
            <div class="form-group">
                <label for="category_id">Category *</label>
                <select id="category_id" name="category_id" required>
                    <option value="">-- Select a Category --</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Image (Optional)</label>
            <input class="form-control" type="file" name="image" accept="image/*" id="formFileMultiple" multiple>
            </div>
            
            <button type="submit" class="btn btn-success">Save Recipe</button>
            <a href="read.php" ><button type="button" class="btn btn-danger">Cancel</button></a>
            
        </form>
    </div>
</body>
</html>