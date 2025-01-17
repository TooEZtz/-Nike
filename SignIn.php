<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: ./products.php?gender=MEN");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <style>
    <?php
    include "/xampp/htdocs/Nike/STYLES/signin.css";
    ?>
  </style>
</head>
<body>
  <header>
    <div class="logos">
      <picture>
        <img src="/NIke/Images/sike_logo.png" alt="">
      </picture>
      <picture>
        <img src="/Nike/Images/MJ.png" alt="">
      </picture>
    </div>
  </header>
  <section>
    <div class="container">
      <h1>Enter your email to join us or sign in.</h1>
    
      <form action="formprocessSignIn.php" method="POST">
        <label for="email">Email Id</label>
        <input type="text" name="email" placeholder="Enter your Email Id">
        <label for="password">Password</label>
        <input type="password" name="signin_pass" placeholder="Enter your password">
        <p>By continuing, I agree to ! Nike's <span>Privacy Policy</span> and <span>Terms of Use</span>.</p>
        <div class="btns">
        <a href="signup.php" class="btn">Signup</a>
        <button type="submit" class="btn">Continue</button>
        </div>
      </form>
    </div>
  </section>

  <?php
 
 if (isset($_GET['error'])) {
  $error = $_GET['error'];
  echo "<script type='text/javascript'>
        alert('$error');
        </script>";
}
  ?>

  <script>
    <?php
    include "/xampp/htdocs/Nike/formValidation.js";
    ?>
  </script>
</body>
</html>
