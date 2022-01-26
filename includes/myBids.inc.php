<?php 

include_once 'functions.inc.php';
require_once 'dbh.inc.php';
session_start();


if(isset($_POST["bid"])){

    
    $itemid = $_GET["id"]; 
    $updatebid = $_POST["newbid"];
    $currentbid = $_POST["currentprice"];
    $highestBidder = $_SESSION["useruid"];

    if($updatebid > $currentbid){

        if(isset($_SESSION["shopping_cart"])){

            foreach($_SESSION["shopping_cart"] as $keys => $values){
            
                if($values["itemid"] == $itemid)
                {
                    $_SESSION["shopping_cart"][$keys]['highbid'] = $highestBidder ;
                    $_SESSION["shopping_cart"][$keys]['itemprice'] = $updatebid ;

                }
        }
    }

        $sql2 = "UPDATE auctions SET currentBid = '$updatebid', highestBidder='$highestBidder' WHERE auctionId = '$itemid';";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql2)){
            
                //echo "Error updating record: " . $conn->error;
                header("location: ../ProjetInfo/my_auctions.php?error=stmterror");
                exit();
        }
            $resultData = mysqli_query($conn,$sql2);
             if($resultData){
                header("location: ../view_auction_items.php?allgood&auctionId=$itemid");;// redirects to all records page
                mysqli_stmt_close($stmt); // Close connection
                exit();	
            }
            else{
                    header("location: ..auctions.php?error=didntedit");
            }
        

    }else{

        echo '<script>  alert("your bid must be higher than the current bid");  </script>';
        echo '<script> window.location = "../auctions.php" </script>'; 
    }
  
}