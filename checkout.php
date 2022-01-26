<?php 
    include_once 'header.php';
?> 


<div class="checkout">

    <table class="checkout_table">
        <tr style="background-color:dodgerblue">
            <th width=40%><h4 style="color:black">PANIER</h4></th>
            <th width=20%>Quantity</th>
            <th width=20%>Price</th>
            <th width=20%>Total Price</th>
        </tr>
    </table>
        <?php
        
        if(isset($_GET['id'])){
            
            require_once 'includes/dbh.inc.php';
            
            $auctionId = $_GET["id"];
        /*
            $sql = "SELECT * FROM auctions WHERE auctionId = '$auctionId';"; // verifies if they exist in php database
            $stmt = mysqli_stmt_init($conn);
            
            if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("location: ../auctions.php?error=stmterror");
                    exit();
            }
            $resultData = mysqli_query($conn,$sql);

            if(mysqli_num_rows($resultData)>0){
                    while($row = mysqli_fetch_assoc($resultData)){ */
                        if(isset($_SESSION["shopping_cart2"])){
                        $total = 0;
                        foreach($_SESSION["shopping_cart2"] as $keys => $values){

        ?> 


        <form action="includes/myOrders.inc.php?id=<?php echo $auctionId ?>&delete=<?php echo $auctionId ?>" method="post" enctype="multipart/form-data">
        
                <input type="hidden" name="image" value="<?php echo $values["image"]?>">
                <input type="hidden" name="name" value="<?php echo $values["itemname"]; ?>">
                <input type="hidden" name="quantity" value="<?php echo $values["quantity"]; ?>">
                <input type="hidden" name="price" value="<?php echo $values["itembuynowprice"]; ?>">
                <input type="hidden" name="about" value="<?php echo $values["about"]?>">
        

        <table class="content_table" width=100%>                    
        <tr>
            <td style="padding:10px;text-align:center;" width=40%> <img src="./uploads/<?php echo $values["image"]?>" style="border:solid 1px black"> <?php echo $values["itemname"]; ?></td>
            <td width=20%><?php echo $values["quantity"]; ?></td>
            <td width=20%>$ <?php echo $values["itembuynowprice"]; ?></td>
            <td width=20%>$ <?php echo number_format($values["quantity"] * $values["itembuynowprice"], 2) ?></td>
        </tr>
        <tr>

        
            <?php 
            /* $total += ($values["quantity"] * $values["itembuynowprice"]); 
                    } */ ?>
            
            <td colspan="3" style="padding:20px"><?php echo $values["about"]?></td>
            
            <?php if(isset($_SESSION["useruid"])){ ?>  

            <td style="text-align:center" >  <input type="submit" value="CheckOut" name="order" id="checkout_btn"> </td> 

            </form>

            <?php 
                } else{ ?>
                <td style="text-align:center">  <input type="submit" value="CheckOut" name="checkout" id="checkout_btn"></td>
            <?php   
                echo '<script>  alert("Log in to continue your purchase!");  </script>';
                echo '<script> window.location = "login.php" </script>'; 
                 } ?>
        </tr>    
        </table>
        
        
        <?php }  }
                } //}  } ?>
</div>


<?php  include_once 'footer.php'; ?>