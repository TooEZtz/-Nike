<?php
include "/xampp/htdocs/Nike/functions.php";
include "/xampp/htdocs/Nike/header.php";
include "/xampp/htdocs/Nike/footer.php";
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "Product not found.";
    exit();
}

$product_id = $_GET['id'];

$pdo = pdo_connect_mysql();
$stmt = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$stmt->bindParam(':id', $product_id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "Product not found.";
    exit();
}

$in_stock = $product['is_in_inventory'] > 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        <?php
            include "/xampp/htdocs/Nike/STYLES/styles.css";
            include "/xampp/htdocs/Nike/STYLES/productpage.css";
            include "/xampp/htdocs/Nike/STYLES/leaf.css";
        ?>
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Nike/Images/sike_logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='icons'>
    <title><?php echo $product['name']; ?> </title>
</head>
<body>
    <?php nike_header(); ?>
    <video class="videobg" src="./Images/hero4.mp4" muted loop autoplay></video>
    <section class="product">
        <div class="product-detail">
            <div class="product-img">
                <img src="<?php echo $product['imageURL']; ?>" alt="Image of <?php echo $product['name']; ?>" onerror="this.onerror=null;this.src='./Images/noImage.jpg';">
            </div>
            <div class="product-info">
                <h2><?php echo $product['name']; ?></h2>
                <p><?php echo $product['gender'] ."'S " . $product['category'] . " SHOES"; ?></p>
                <p>Price: $<?php echo $product['price']; ?></p>

                <form method="POST" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="10" value="1">

                    <div class="stock-info">
                        <?php if ($in_stock): ?>
                            <button type="submit" class="add-to-cart">Add to Cart</button>
                        <?php else: ?>
                            <button type="button" class="add-to-cart" disabled>Out of Stock</button>
                            <p class="error">This product is not available right now.</p>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php nike_footer(); ?>
</body>
</html>