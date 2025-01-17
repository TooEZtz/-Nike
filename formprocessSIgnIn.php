<?php
include "/xampp/htdocs/Nike/functions.php";
session_start();
$pdo = pdo_connect_mysql();


if (!isset($_POST['email'], $_POST['signin_pass'])) {
    header("Location: signin.php?error=missing_fields");
    exit();
}


$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');  // Escape special HTML chars

$password = htmlspecialchars(trim($_POST['signin_pass']), ENT_QUOTES, 'UTF-8');


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: signin.php?error=invalid_email");
    exit();
}


$query = "SELECT * FROM users WHERE email = :email";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
  
    if ($password === $user['password']) {  
        $_SESSION['email'] = $email;
        header("Location: products.php?gender=MEN");
        exit();
    } else {
        header("Location: signin.php?error=incorrect_password");
        exit();
    }
} else {
   
    header("Location: signin.php?error=email_not_found");
    exit();
}
?>
