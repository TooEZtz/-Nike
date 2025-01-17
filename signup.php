
<!DOCTYPE html><?php
session_start();

include "/xampp/htdocs/Nike/functions.php";


if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up | Nike</title>
  <style><?php
  include "/xampp/htdocs/Nike/STYLES/signup.css";
  ?></style>
</head>
<body>
  <header>
    <div class="logos">
      <picture>
        <img src="/Nike/Images/sike_logo.png" alt="Nike Logo">
      </picture>
    </div>
  </header>

  <section>
    <div class="container">
      <h1>Create Your Account</h1>

      <?php if (isset($error)): ?>
        <div style="color: red; font-size: 1em;"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <form action="formprocess.php" method="POST" id="signup-form">
        
        <div class="input-field">
          <label for="first-name">First Name*</label>
          <input type="text" id="first-name" name="firstName" placeholder="Enter your first name" required>
        </div>

        <div class="input-field">
          <label for="last-name">Last Name*</label>
          <input type="text" id="last-name" name="lastName" placeholder="Enter your last name" required>
        </div>

        <div class="input-field">
          <label for="email">Email*</label>
          <input type="email" id="email" name="email" placeholder="Enter your email address" required>
        </div>

        <div class="input-field">
          <label for="phone">Phone Number*</label>
          <input type="text" id="phone" name="phone" placeholder="Enter your 10-digit phone number" required>
        </div>

        <div class="input-field">
          <label for="password">Password*</label>
          <input type="password" id="password" name="password" placeholder="Create your password" required>
        </div>

        <div class="input-field">
          <label for="confirm_password">Confirm Password*</label>
          <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your password" required>
        </div>

        <button type="submit" class="submit-btn">Create Account</button>
        
      </form>
    </div>
  </section>

  <footer>
    <div class="footer-links">
      <a href="./text/T_C.txt">Terms and Conditions</a>
      <a href="./text/P_P.txt">Privacy Policy</a>
    </div>
  </footer>

  <script> 
  <?php 
  include "/xampp/htdocs/Nike/formValidation.js";
  ?></script> 
</body>
</html>
