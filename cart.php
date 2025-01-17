<?php
session_start();
include "functions.php";

$pdo = pdo_connect_mysql();
if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
    exit();
  }

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = (int)$_POST['product_id'];
    $quantity = max(1, (int)$_POST['quantity']); 

    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = :id');
    $stmt->bindParam(':id', $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }
    header("Location: cart.php");
    exit();
}


if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart'][$_GET['remove']])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    header("Location: cart.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'quantity-') === 0 && is_numeric($value)) {
            $id = str_replace('quantity-', '', $key);
            $quantity = max(1, (int)$value);
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
}


$products_in_cart = $_SESSION['cart'] ?? [];
$products = [];
$subtotal = 0.00;

if ($products_in_cart) {
    $placeholders = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $stmt->execute(array_keys($products_in_cart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        $subtotal += $product['price'] * $products_in_cart[$product['id']];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
    <?php
    include "STYLES/cart.css"
    ?>
   </style>
    <title>Document</title>
</head>
<body>
<div class="cart content-wrapper">
<h1>Shopping Cart</h1>
<form action="checkout.php" method="post">
<table>
<thead>
<tr>
<td colspan="2">Product</td>
<td>Price</td>
<td>Quantity</td>
<td>Total</td>

</tr>
</thead>
<tbody>
<?php if (empty($products)): ?>
<tr>
<td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
</tr>
<?php else: ?>
<?php foreach ($products as $product): ?>
<tr>
<td class="img">
<a href="index.php?page=product&id=<?= $product['id'] ?>">
<img src="<?= $product['imageURL'] ?>" width="50" height="50" alt="<?= $product['name'] ?>" onerror="this.onerror=null;this.src='Images/noImage.jpg'";>
</a>
</td>
<td>

<a href="index.php?page=product&id=<?= $product['id'] ?>">
<?= $product['name'] ?>
</a>
<br>
<a href="index.php?page=cart&remove=<?= $product['id'] ?>" class="remove">Remove</a>

</td>

<td class="price">&dollar;
<?= $product['price'] ?>
</td>

<td class="quantity">

<input type="number" name="quantity-<?= $product['id'] ?>" 
       value="<?= $_SESSION['cart'][$product['id']] ?? 1 ?>" 
       min="1" placeholder="Quantity" required>
</td>

<td class="price">&dollar;

<?= $product['price'] * $products_in_cart[$product['id']] ?>
</td>
</tr>
<?php endforeach; ?>
<?php endif; ?>
</tbody>
</table>
<div class="subtotal">
        <span class="text">Subtotal</span>
        <span class="price">&dollar;<?= $subtotal ?></span>
    </div>
   
    <input type="hidden" name="subtotal" value="<?= $subtotal ?>">
    <div class="buttons">
        <input type="submit" value="CheckOut" name="checkout">
    </div>
   <script src="cart.js"></script> 
</body>
</html>