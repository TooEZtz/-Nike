<?php
session_start();
include "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['complete_purchase'])) {
    if (isset($_SESSION['email'])) {
        
        $email = $_SESSION['email'];
        
      
        $pdo = pdo_connect_mysql();

       
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

      
        if ($user) {
            $user_id = $user['id']; 

            
            $subtotal = (float)$_POST['subtotal'];
            $tax = (float)$_POST['tax'];
            $delivery_fee = (float)$_POST['delivery_fee'];
            $total = (float)$_POST['total'];

            
            $stmt = $pdo->prepare("INSERT INTO orders (user_id, subtotal, tax, delivery_fee, total, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
            $stmt->execute([$user_id, $subtotal, $tax, $delivery_fee, $total]);

            $order_id = $pdo->lastInsertId();

            
            foreach ($cartItems as $item) {
                $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)");
                $stmt->execute([$order_id, $item['product_id'], $item['quantity']]);
            }

        
            header("Location: orderConfirmation.php?order_id=$order_id");
            exit();
        } else {
         
            echo "User not found.";
        }
    } else {
       
        header("Location: SignIn.php");
        exit();
    }
} else {
   
    header("Location: checkout.php");
    exit();
}
?>
