<?php
function nike_header()
{
  echo<<<NIKE
<header>
    <div class="left_header">
        <picture class="logo">
            <a href="index.php">
                <img src="../Nike/Images/sike_logo.png" alt="logo">
            </a>
        </picture>
    </div>

  
    

    <div class="mid_header">
        <nav id="navbar">
            <ul class="navbar">
                <li><a href="./products.php?gender=MEN">Men</a></li>
                <li><a href="./products.php?gender=WOMEN">Women</a></li>
                <li><a href="./products.php?gender=KIDS">Kids</a></li>
                <li><a href="./products.php?gender=ALL">All Products</a></li>
            </ul>
        </nav>
    </div>

    <div class="right_header">
        <nav>
            <ul class="navbar">
                <li><a href="./profile.php" class="account"><img width="32" height="32" src="https://img.icons8.com/parakeet-line/48/test-account.png" alt="test-account"/></a></li>
                <li><a href="cart.php" class="cart"><img width="32" height="32" src="https://img.icons8.com/ios-filled/50/shopping-cart.png" alt="shopping-cart"/></a></li>
                <div class="hamburger" id="hamburger-menu">
                <box-icon name='menu'></box-icon>
                 <ul class="navbar">
                <li><a href="./products.php?gender=MEN">Men</a></li>
                <li><a href="./products.php?gender=WOMEN">Women</a></li>
                <li><a href="./products.php?gender=KIDS">Kids</a></li>
                <li><a href="./products.php?gender=ALL">All Products</a></li>
                </ul>
                </div>


            </ul>
        </nav>
    </div>
</header>
NIKE;
}
?>
