
<?php include_once 'header.php' ?>


<div class="info-background">
        
       <div><h1 style="color:black;text-align:center;background-color:dodgerblue;margin:0px">Auction Post Information</h1></div>
       
       <div class="info-content-left">
                <?php
                         if(isset($_GET['auctionId'])){

                        require_once 'includes/dbh.inc.php';
                        $auctionId = $_GET["auctionId"];
                        $sql = "SELECT * FROM auctions WHERE auctionId = '$auctionId';"; // verifies if they exist in php database
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                                header("location: ../auctions.php?error=stmterror");
                                exit();
                        }
                        $resultData = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($resultData)>0){
                                while($row = mysqli_fetch_assoc($resultData)){ 
                        ?>      
                
                <form action="auctions.php?action=add&id=<?php echo $row["auctionId"]?>" method="post">

                                <div style="background:lightgrey;"><h4 style="margin:0px;color:black">Product Image</h4></div>
                                <br>
                                <img src="./uploads/<?php echo $row['aImage'];?>" id="auction_image"> <br><br>
                <?php          }
                        }
                        else{
                              echo 'Result not found';  
                        }
                        mysqli_stmt_close($stmt);   }
                ?>     
       </div>
        

       <div class = "info-content-right">
                <?php
                         if(isset($_GET['auctionId'])){

                        require_once 'includes/dbh.inc.php';
                        $auctionId = $_GET["auctionId"];
                        $sql = "SELECT * FROM auctions WHERE auctionId = '$auctionId';"; // verifies if they exist in php database
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                                header("location: ../auctions.php?error=stmterror");
                                exit();
                        }
                        $resultData = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($resultData)>0){
                                while($row = mysqli_fetch_assoc($resultData)){ 
                ?>  

<script>
        // Set the date we're counting down to
        var countDownDate = new Date("<?php echo $row["aEnd_date"]?>").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();
        
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
        
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";
        
        // If the count down is over, write some text 
        if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
        }
        }, 1000);
</script>

        <div style="background:lightgrey;border-bottom:solid 2px black"><h4 style="color:black;text-align:center;margin:0px">Product Details</h4></div>

        <h3 style="color: black"> <b>Auction ends in: </b> <h9 id ="demo"><?php echo $row["aEnd_date"]?></h9> </h3> 
        <h6 style="color: black;margin:0px;"><b>Model / Name: </b> <?php echo $row['aName'] ?></h6> 
        <h6 style="color: black"> <b>Type: </b> <?php echo strtoupper($row['aCategory']) ?></h6> 
        <h6 style="color: black"><b> Starting Price: </b> <?php echo $row['aPrice'] ?>$</h6>
        <h6 style="color: black"><b> Buy Now: </b> <?php echo $row['aBuyNow'] ?>$</h6>
        <h6 style="color: black"> <b>Description: </b><?php echo $row['aAbout'] ?> </h6>
        <h6 style="color: black"> <b>Created By: </b><?php echo $row['aUser'] ?> </h6>  
        <h6 style="color: black"> <b>End Date </b><?php echo $row['aEnd_date'] ?> </h6>

        <input type="hidden" name="hidden_name" value ="<?php echo $row["aName"];?>">
        <input type="hidden" name="hidden_price" value ="<?php echo $row["aPrice"];?>">
        <input type="hidden" name="hidden_buynow" value ="<?php echo $row["aBuyNow"];?>">
        <input type="hidden" name="hidden_image" value="<?php echo $row["aImage"]; ?>">
        <input type="hidden" name="about" value="<?php echo $row["aAbout"]; ?>">
        <input type="hidden" name="currentbid" value="<?php echo $row["currentBid"];?>">
        <input type="hidden" name="highbid" value="<?php echo $row["highestBidder"];?>">
        
        <?php  if(!isset($_SESSION["adminuid"])){?>


                <?php if($row["aBuyNow"] > 0){ ?>
                        <div class="item_bid">
                                <input type="number" name="quantity" id="price" placeholder="quantity" value="1" min="1" max="50000" step="1">
                        </div>
                        <div class="item_bid2">
                                <input type="submit" value="Buy Now" class='buynow' name="buy_now" style="margin-top:5px">
                        </div>      
                        <div class="item_bid">
                             <?php /*   <input type="text" name="newbid" style="height:20px;border:solid black 1px">
                                <input type="hidden" name="currentprice" value= <?php echo $row["aPrice"] ?>> */ ?>
                                <input type="submit" value="add to cart" name="add_to_cart" class="bid">
                        </div>
                        

        <?php } else { ?>
                <div class="item_bid">

                        <?php /*<input type="text" name="newbid" style="height:20px;border:solid black 1px;width:150px;margin:0" placeholder="new bid..."><br>
                        <input type="hidden" name="currentprice" value= <?php echo $row["aPrice"] ?>> */ ?>
                        <input type="submit" value="add to cart" name="add_to_cart" class="bid" style="margin-top:20px;" name="bid">
                </div>

        <?php } ?>

                
        </form>
        </div>


        <?php } ?>
        
        <div style="text-align:center"> 
                <p style="color:black;margin:0">Highest Bid:<?php echo $row["currentBid"];?> </p>
                <p style="margin:0">Current Highest Bidder: <?php echo $row["highestBidder"];?> </p>
        </div>


        <?php } } else{ echo 'Result not found'; }
                mysqli_stmt_close($stmt);   }
        ?>
        
        
</div>


<?php include_once 'footer.php'?>



