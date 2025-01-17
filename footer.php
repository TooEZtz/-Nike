<?php
function nike_footer()
{
echo<<<NIKE
<footer>
  <div class="grid-container">
    <div class="section customer-service">
      <h4>Customer Service</h4>
      <p>Contact Us</p>
      <p>Order Status</p>
      <p>Shipping & Delivery</p>
      <p>Returns</p>
      <p>FAQs</p>
      <p>Size Charts</p>
    </div>


    <div class="section company-info">
      <h4>Company Information</h4>
      <p>About Nike</p>
      <p>Careers</p>
      <p>Newsroom</p>
      <p>Sustainability</p>
      <p>Investors</p>
    </div>


    <div class="section shopping">
      <h4>Shopping</h4>
      <p>Find a Store</p>
      <p>Gift Cards</p>
      <p>Promotions</p>
      <p>New Arrivals</p>
      <p>Membership Benefits</p>
    </div>


    <div class="section social-media">
      <h4>Social Media</h4>
      <p>Instagram</p>
      <p>Facebook</p>
      <p>Twitter</p>
      <p>YouTube</p>
    </div>

    <div class="section Legal">
      <h4>Legal</h4>
      <p>Terms of Use</p>
      <p>Privacy Policy</p>
      <p>Cookie Settings</p>
      <p>Accessibility</p>
    </div>
  </div>
  
    <div class="section country-region">
      <h4>Country/Region Selector</h4>
      <select>
        <option>United States</option>
        <option>Canada</option>
        <option>United Kingdom</option>
        <option>Germany</option>
        <option>France</option>
      </select>
    </div>

    
      <div class="section subscription">
        <h4>Newsletter Signup</h4>
        <p>Sign up to receive exclusive offers and updates from Nike!</p>
        <form>
          <input type="email" placeholder="Enter your email" required>
          <button type="submit">Subscribe</button>
        </form>
      </div>
   <!-- Branding -->
   <div class="section branding">
    <p>© 2024 ! Nike, Inc. All Rights Reserved.</p>
  </div>
 </footer>
NIKE;
}
?>