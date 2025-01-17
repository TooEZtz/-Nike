<?php
session_start();
include "functions.php";

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$pdo = pdo_connect_mysql();

// Get user_id based on email stored in session
$email = $_SESSION['email'];
$query = "SELECT id FROM users WHERE email = :email LIMIT 1";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->execute();

// Check if the user exists and fetch the user_id
if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = $user['id']; // Assign user_id
} else {
    // Handle case where user is not found in the database
    header("Location: login.php");
    exit;
}

// Get the subtotal from the POST request or set it to 0.00 if not available
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['subtotal'])) {
    $subtotal = (float)$_POST['subtotal'];
} else {
    $subtotal = 0.00;
}

$taxPercentage = 12;
$deliveryFee = 15;
$taxAmount = $subtotal * ($taxPercentage / 100);
$total = $subtotal + $deliveryFee + $taxAmount;

// Collect Credit Card Information from the form
if (isset($_POST['card_name'], $_POST['card_number'], $_POST['expiration_date'], $_POST['cvv'])) {
    $card_name = htmlspecialchars(trim($_POST['card_name']), ENT_QUOTES, 'UTF-8');
    $card_number = htmlspecialchars(trim($_POST['card_number']), ENT_QUOTES, 'UTF-8');
    $expiration_date = htmlspecialchars(trim($_POST['expiration_date']), ENT_QUOTES, 'UTF-8');
    $cvv = htmlspecialchars(trim($_POST['cvv']), ENT_QUOTES, 'UTF-8');

    // Insert order into database
    $order_query = "INSERT INTO orders (user_id, subtotal, tax, delivery_fee, total) VALUES (:user_id, :subtotal, :tax, :delivery_fee, :total)";
    $stmt = $pdo->prepare($order_query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':subtotal', $subtotal, PDO::PARAM_STR);
    $stmt->bindParam(':tax', $taxAmount, PDO::PARAM_STR);
    $stmt->bindParam(':delivery_fee', $deliveryFee, PDO::PARAM_STR);
    $stmt->bindParam(':total', $total, PDO::PARAM_STR);
    $stmt->execute();


    $order_id = $pdo->lastInsertId();

    $cc_query = "INSERT INTO credit_cards (user_id, card_name, card_number, expiration_date, cvv, created_at) VALUES (:user_id, :card_name, :card_number, :expiration_date, :cvv, NOW())";
    $stmt = $pdo->prepare($cc_query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':card_name', $card_name, PDO::PARAM_STR);
    $stmt->bindParam(':card_number', $card_number, PDO::PARAM_STR);
    $stmt->bindParam(':expiration_date', $expiration_date, PDO::PARAM_STR);
    $stmt->bindParam(':cvv', $cvv, PDO::PARAM_STR);
    $stmt->execute();

    
    $_SESSION['order_success'] = "Your order has been placed successfully! 🏅";

    // Redirect to index.php
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="STYLES/checkout.css">
</head>
<body>
    <div class="checkout content-wrapper">
        <h1>Checkout</h1>
        <table>
            <tr>
                <td>Subtotal</td>
                <td>&dollar;<span id="subtotal"><?= $subtotal ?></span></td>
            </tr>
            <tr>
                <td>Tax (<?= $taxPercentage ?>%)</td>
                <td>&dollar;<span id="tax"><?= $taxAmount ?></span></td>
            </tr>
            <tr>
                <td>Delivery Fee</td>
                <td>&dollar;<span id="delivery-fee"><?= $deliveryFee ?></span></td>
            </tr>
            <tr>
                <td>Total</td>
                <td>&dollar;<span id="total"><?= $total ?></span></td>
            </tr>
        </table>

        <h2>Enter Credit Card Details</h2>
        <form method="POST" action="">
            <label for="card_name">Cardholder's Name</label>
            <input type="text" name="card_name" id="card_name" required>

            <label for="card_number">Card Number</label>
            <input type="text" name="card_number" id="card_number" required>

            <label for="expiration_date">Expiration Date (MM/YYYY)</label>
            <input type="text" name="expiration_date" id="expiration_date" required>

            <label for="cvv">CVV</label>
            <input type="text" name="cvv" id="cvv" required>

            <input type="hidden" name="subtotal" value="<?= $subtotal ?>">

            <button type="submit">Submit Payment</button>
        </form>
    </div>
</body>
</html>
