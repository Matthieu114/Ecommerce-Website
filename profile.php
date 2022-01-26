<?php 
include_once 'header.php';
?>

<div class="grid-height">

<?php
   if(isset($_SESSION["useruid"])){ 
       echo "<h1> - " . strtoupper($_SESSION["useruid"]) . "'s Profile -</h1>";
      }
  else if(isset($_SESSION["adminuid"])){
      echo'<h1> Aministrator settings </h1>' ;
    }
  else { echo'<h1>Your Profile</h1>'; }
?>

  <?php if(isset($_SESSION["adminuid"])){ ?>


   <div class="grid-items">
        <div class ="item2"> <a href="#"><img src="./images/cogwheel.png" alt="settings"><h4> Settings </h4></a></div>
        <div class ="item4"> <a href="information.php"> <img src="./images/adminuser.png" alt="info"> <h4>Edit Users</h4></a> </div>
        <div class ="item6"> <a href="my_auctions.php">  <img src="./images/auction.png" alt="auction"> <h4>Edit auctions</h4></a> </div>
   </div>


<?php } else if($_SESSION["usertype"] == 'buyer') { ?>

  <div class="grid-items-buyer">
        <div class ="item6"> <a href="myOrders.php">  <img src="./images/auction.png" alt="auction"> <h4>My Bids and orders</h4></a> </div>
        <div class ="item2"> <a href="#"><img src="./images/cogwheel.png" alt="settings"><h4> Settings </h4></a></div>
        <div class ="item3"> <a href="payment.php"> <img src="./images/credit-card.png" alt="credit-card"><br> <h4> Add Payment Method</h4> </a></div>
        <div class ="item4"> <a href="information.php"> <img src="./images/information.png" alt="info"> <h4>Personal information</h4></a> </div>

   </div>

<?php } else { ?>

  <div class="grid-items">
        <div class ="item2"> <a href="#"><img src="./images/cogwheel.png" alt="settings"><h4> Settings </h4></a></div>
        <div class ="item4"> <a href="information.php"> <img src="./images/information.png" alt="info"> <h4>Personal information</h4></a> </div>
        <div class ="item6"> <a href="my_auctions.php">  <img src="./images/auction.png" alt="auction"> <h4>My Auctions & Sales</h4></a> </div>
   </div>

<?php } ?>

</div>

<?php
include_once 'footer.php';
?>