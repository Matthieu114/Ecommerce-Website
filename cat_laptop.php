<?php
include_once 'header.php';
?>

<div class='items-background'>
    <div class="title"> <h1>Our Laptops's</h1> </div> 
   
    <div class='items-grid'>

         <?php 
            require_once 'includes/dbh.inc.php';
                $sql = "SELECT * FROM auctions WHERE aCategory = 'laptop';"; // verifies if they exist in php database
                $stmt = mysqli_stmt_init($conn);
                 if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("location: ../auctions.php?error=stmterror");
                    exit();
                } 

                $resultData = mysqli_query($conn,$sql);

                if(mysqli_num_rows($resultData)>0){
                while($row = mysqli_fetch_assoc($resultData)){                
            ?>                   
        <div>
            <p style="color:black"><?php echo $row['aName'];?></p>
            <a href="view_auction_items.php?auctionId=<?php echo$row['auctionId'];?>"> <img src="./uploads/<?php echo $row['aImage'];?>"></a> 
            <p style="color:black"> Starting price: <?php echo $row['aPrice'];?>$</p>
        </div>
        <?php }
                }
                else{ echo '<h3 style="color:black;margin-left:10px"> There are no items </h3>';  }
                mysqli_stmt_close($stmt);   
                
        ?>
    </div>
</div>

<?php
include_once 'footer.php';
?>