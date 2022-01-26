<?php
include_once 'header.php';
?>


        
<div class="wrapper2" >

<section class="signup-form2">

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="includes/payment.inc.php" method="post">
        <div class="row">
            <div class="col-50">
                <h3 style="color:black">Billing Address</h3>
                <label for="fname"><i class="fa fa-user"></i> Full Name *</label>
                <input type="text" id="fname" name="firstname" placeholder="John M. Doe" required>
                <label for="email"><i class="fa fa-envelope"></i> Phone Number </label>
                <input type="text" id="phone" name="phone" placeholder="+33 07 65 78 45 92...">
                <label for="adr"><i class="fa fa-address-card-o"></i> Address * </label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
                <label for="city"><i class="fa fa-institution"></i> City *</label>  
                <input type="text" id="city" name="city" placeholder="New York" required>

                <label for="zip">Postal code *</label>
                <input type="text" id="zip" name="postal" placeholder="10001" required>
        </div>

          <div class="col-50">
            <h3 style="color:black">Payment</h3>
            <label for="fname"> Accepted Cards</label> 
            <div class="icon-container">
              <img src="./images/visa.gif" class="fa fa-cc-visa" >
              <img src="./images/amex.gif" class="fa fa-cc-amex" >
              <img src="./images/mastercard.gif" class="fa fa-cc-mastercard">
              <img src="./images/discover.gif" class="fa fa-cc-discover">
              <img src="./images/paypal.gif" class="fa fa-cc-paypal">
              <select name="cardtype" id="card" size=1 style="margin-top:10px">
                    <option value="visa"> Visa </option>
                    <option value="amex"> American Express</option>
                    <option value="mastercard">Mastercard</option>
                    <option value="disover">Discover</option>
                    <option value="paypal">Paypal</option>
                </select>
            </div>
            <label for="cname">Name on Card *</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
            <label for="ccnum">Credit card number *</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
            <label for="expmonth">Exp Month *</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" required>

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year *</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV *</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" required>
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Order Now!" name="order" class="btn">
      </form>
</div>
</div>
</div>
</div>



</section>

</div> 
<?php

include_once 'footer.php';

?>