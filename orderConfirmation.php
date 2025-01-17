<?php
session_start();
include "functions.php";

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->execute([$order_id]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="STYLES/final.css">
</head>
<body>
    <div class="order-confirmation">
        <h1>Order Completed!</h1>
        <p>Thank you for your purchase. Your order has been successfully placed.</p>
        <p>Order ID: <?= $order['id'] ?></p>
        <p>Subtotal: &dollar;<?= number_format($order['subtotal'], 2) ?></p>
        <p>Tax: &dollar;<?= number_format($order['tax'], 2) ?></p>
        <p>Delivery Fee: &dollar;<?= number_format($order['delivery_fee'], 2) ?></p>
        <p>Total: &dollar;<?= number_format($order['total'], 2) ?></p>

        <form action="index.php" method="get">
            <input type="submit" value="Go to Homepage">
        </form>
    </div>

  
    <div class="spline-frame">
        <iframe src="https://my.spline.design/nikeairmax90celebrationwithmousehover-f81d0524384f9cf02f7b03625aa203cd/" frameborder="0" width="100%" height="100%"></iframe>
    </div>
</body>
</html>

