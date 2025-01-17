<?php
function home(){
echo<<<NIKE
<section class="hero1">
    <video class="hero1_video"  autoplay loop muted>
      <source src="../Nike/Images/hero3.mp4" type="video/mp4">
      </video>
      <div class="hero1_overlay">
        <h1>Don't Just Do It.</h1><br/>
        <h2>Believe first, <span>Wear it,</span> then Do it.</h2>
      </div>
  </section>
  <div class="Texts">
    <span>Latest Drops</span>
    <h1>
      Featuring Air Jackson's 4
    </h1>
    <p>What are you waiting for? Get yours Today</p>
    <a class="buttons" href="products.php?gender=ALL">Shop Now</a>
  </div>
  <section class="hero2">
   <div class="images">
    <img src="../Nike/Images/hero1.jpg" alt="">
    <img src="../Nike/Images/hero2.jpg" alt="">
   </div>
  </section>
 <section class="hero3">
  <img src="../Nike/Images/sike_logo.png" height="100px" width="100px" alt="Nike logo">
  <nav class="bot_nav">
    <ul>
    <li><a href="#">Find a Store</a></li>
    <li><a href="#">Help</a></li>
    <li><a href="signup.php">Join Us</a></li>
    <li><a href="SignIn.php">Sign In</a></li>
    </ul>
  </nav>
 </section>
NIKE;
}
?>