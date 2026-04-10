<?php
require_once "db.php";

$id = $_GET['id'] ?? null;

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute([':id' => $id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name'])) ?? '';
    $price = (float)$_POST['price'] ?? 0;
    $quantity = (int)$_POST['quantity'] ?? 0;
    
    function update($id, $name, $price, $quantity) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE products SET name = :name, price = :price, quantity = :quantity  WHERE id = :id");
        return $stmt->execute([':id' => $id,':name' => $name,':price' => $price,':quantity' => $quantity]);
    }
if (!empty($name) && $price > 0 && $quantity >= 0) {
        add($name, $price, $quantity);
        header("Location: index.php");
        exit;
    } else {
echo "<center><p style='color: rgb(255, 0, 0);'>please enter correct information!</p></center>";    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        h1{margin-top: 20px; }
        form{
            width: 300px;
            background-color: aliceblue;
            margin-top: 50px;
            padding: 20px;
            border-radius: 25px;
            box-shadow: 25px;
        }
    </style>
</head>
<body>
<center><h1>edit product</h1></center>
<center><form method="POST">
<input class="form-control" type="text" name="name" value="<?= $product['name'] ?>" placeholder="product name..."><br>
<input class="form-control" type="number" name="price" value="<?= $product['price'] ?>" placeholder="price..."><br>
<input class="form-control" type="number" name="quantity"  value="<?= $product['quantity'] ?>"  placeholder="quantity"><br>
<button type="submit" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i> edit product</button>
</form></center>
</body>
</html>