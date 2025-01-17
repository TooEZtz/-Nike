<?php
session_start();
include "functions.php";

if (!isset($_SESSION['email'])) {
  
    header("Location: SignIn.php");
    exit;
}

$user_email = $_SESSION['email'];
$pdo = pdo_connect_mysql();


$stmt = $pdo->prepare("SELECT id, email, First_Name, Last_Name, Phone_number FROM users WHERE email = :email");
$stmt->execute(['email' => $user_email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    
    header("Location: SignUp.php");
    exit;
}


$stmt = $pdo->prepare("SELECT id, user_id, subtotal, tax, delivery_fee, total, created_at 
                       FROM orders WHERE user_id = :user_id ORDER BY created_at DESC LIMIT 5");
$stmt->execute(['user_id' => $user['id']]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        <?php
        include "STYLES/profile.css";
        ?>
    </style>
</head>
<body>
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <img class="profile-pic" src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg" alt="Profile Picture" width="100px" height="100px">
            <h2>Welcome, <?= htmlspecialchars($user['First_Name']) ?> <?= htmlspecialchars($user['Last_Name']) ?></h2>
        </div>
        
        <div class="profile-info">
            <h3>Personal Information</h3>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p><strong>Phone Number:</strong> <?= htmlspecialchars($user['Phone_number']) ?></p>
        </div>

        <div class="profile-orders">
            <h3>Recent Orders</h3>
            <?php if ($orders): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Subtotal</th>
                            <th>Tax</th>
                            <th>Delivery Fee</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= htmlspecialchars($order['id']) ?></td>
                                <td><?= htmlspecialchars($order['created_at']) ?></td>
                                <td>$<?= number_format($order['subtotal'], 2) ?></td>
                                <td>$<?= number_format($order['tax'], 2) ?></td>
                                <td>$<?= number_format($order['delivery_fee'], 2) ?></td>
                                <td>$<?= number_format($order['total'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No recent orders.</p>
            <?php endif; ?>
        </div>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</div>
</body>
</html>
