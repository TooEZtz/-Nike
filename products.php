<?php
include "/xampp/htdocs/Nike/functions.php";
include "/xampp/htdocs/Nike/header.php";
include "/xampp/htdocs/Nike/footer.php";
include "/xampp/htdocs/Nike/product_leaf.php";
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: signin.php");
  exit();
}

$gender = isset($_GET['gender']) ? $_GET['gender'] : 'MEN';
$pdo = pdo_connect_mysql();
if($gender == "ALL"){
$stmt = $pdo->prepare('SELECT * FROM products');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}else{

$stmt = $pdo->prepare('SELECT * FROM products WHERE gender = :gender');
$stmt->bindParam(':gender', $gender);
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    <?php
     include "/xampp/htdocs/Nike/STYLES/styles.css";
     include "/xampp/htdocs/Nike/STYLES/leaf.css";
    ?>
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../Nike/Images/sike_logo.png"> 
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='icons'>
  <title>! Nike. Don't Just Do It</title>
</head>
<body>
  <?php nike_header(); ?>
  <div class="category-filter">
    <button onclick="window.location.href='products.php?gender=MEN'">Men's</button>
    <button onclick="window.location.href='products.php?gender=WOMEN'">Women's</button>
    <button onclick="window.location.href='products.php?gender=KIDS'">Kids</button>
  </div>

  <section class="products">
    <div class="products_space">
      <?php
      foreach ($recently_added_products as $product) {
          $description = $product['gender'] . "'s " . $product['category'] . " SHOES";
          echo '<a class="link" href="productpage.php?id=' . $product['id'] . '">';
          leaf($product['name'], $description, $product['price'], $product['imageURL'], $product['id']);
          echo '</a>';
      }
      ?>
    </div>
  </section>
  <?php nike_footer(); ?>

</body>
</html>
