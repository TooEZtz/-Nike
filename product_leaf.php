<?php
function leaf($name,$description,  $price, $imgurl,$id) {
  echo <<<NIKE
  <div class="container-leaf">
    <div class="img-container">
     <img src="$imgurl" alt="Image of $name" onerror="this.onerror=null;this.src='./Images/noImage.jpg';">
    </div>
    <div class="text-container">
      <div class="product_name"><p>$id $name</p></div>
      <div class="product_description"><p>$description</p></div>
      <div class="product_price"><p>$$price</p></div>
    </div>
  </div>
  NIKE;
}
?>
