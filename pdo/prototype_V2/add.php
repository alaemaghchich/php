<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    function add($name, $price, $quantity){
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO products (name, price, quantity) VALUES (:name, :price, :quantity)");
        return $stmt->execute([':name' => $name,':price' => $price,':quantity' => $quantity]);
    }
    add($_POST['name'], $_POST['price'], $_POST['quantity']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
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

<center><h1>add product</h1></center>
<center><form method="POST">
<input class="form-control" type="text" name="name" placeholder="product name..."><br>
<input class="form-control" type="number" name="price" placeholder="price..."><br>
<input class="form-control" type="number" name="quantity" placeholder="quantity"><br>


<button type="submit" class="btn btn-outline-success">add</button>
</form></center>

</body>
</html>