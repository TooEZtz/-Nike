<?php
session_start();

include_once "home.php";
include_once "header.php"; 
include_once "footer.php"; 
if (isset($_SESSION['order_success'])) {
  $message = $_SESSION['order_success'];
  unset($_SESSION['order_success']); 
}
?>
?>
<script>
        // Display the success message in an alert
        <?php if (isset($message)): ?>
            alert("<?= $message ?>");
        <?php endif; ?>
    </script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="Images/sike_logo.png"> 
 <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='icons'>
 <style>
    <?php
    include "STYLES/styles.css";
    ?>
  </style>
  <title>! Nike. Don't Just Do It</title>
</head>
<body>
  <?php
nike_header();
home();
nike_footer();
?>
</body>
</html>

