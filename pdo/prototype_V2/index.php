<?php
require_once "db.php";

// fetch all products
$stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
   <style>
    button{
        margin: 10px;
    }
h2{
    margin: 10px;
}
   </style>
</head>
<body>

<h2>List of Products</h2>

<a href="add.php"><button type="button" class="btn btn-success" ><i class="bi bi-plus-square"></i> add product</button></a>
<table class="table table-dark table-striped table-hover w-auto ">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>update</th>
        <th>delete</th>
    </tr>

    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['quantity'] ?></td>
            <td><a href="edit.php?id=<?= $product['id'] ?>"><button type="button" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></button></a></td>
            <td><a href="delete.php?id=<?= $product['id'] ?>" onclick="return confirm('Delete this product?')"><button type="button" class="btn btn-outline-danger"><i class="bi bi-trash3-fill"></i></button></a></td>
        </tr>
        
    <?php endforeach; ?>
</table>


</body>
</html>
