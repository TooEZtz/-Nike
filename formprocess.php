<?php
include "/xampp/htdocs/Nike/functions.php"; 
session_start(); 


if (!isset($_POST['email'], $_POST['firstName'], $_POST['lastName'], $_POST['password'], $_POST['confirm_password'], $_POST['phone'])) {
    header("Location: signup.php?error=missing_fields");
    exit();
}


$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$firstName = htmlspecialchars(trim($_POST['firstName']), ENT_QUOTES, 'UTF-8');  // Escape special HTML chars
$lastName = htmlspecialchars(trim($_POST['lastName']), ENT_QUOTES, 'UTF-8');  // Escape special HTML chars
$phone = htmlspecialchars(trim($_POST['phone']), ENT_QUOTES, 'UTF-8');  // Escape special HTML chars
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: signup.php?error=invalid_email");
    exit();
}


if ($password !== $confirmPassword) {
    header("Location: signup.php?error= Password Mismatch <br/> Please Try again");
    exit();
}


if (strlen($password) < 6) {
    header("Location: signup.php?error=Password Too Short<br/> Please Try again");
    exit();
}


if (!preg_match('/^[0-9]{10}$/', $phone)) {
    header("Location: signup.php?error= Invalid Phone no.<br/> Please Try again");
    exit();
}


$pdo = pdo_connect_mysql();

// Check if email already exists
$query = "SELECT * FROM users WHERE email = :email";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if ($user) {
    header("Location: signup.php?error=Email exists <br/> Please Try again");
    exit();
}


$query = "INSERT INTO users (email, First_Name, Last_Name, password, Phone_number) VALUES (:email, :firstName, :lastName, :password, :phone)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
$stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR); 
$stmt->bindParam(':phone', $phone, PDO::PARAM_STR);

if ($stmt->execute()) {   
    header("Location: SignIn.php");
    exit();
} else {
    // Database error
    header("Location: signup.php?error=database_error");
    exit();
}
?>
