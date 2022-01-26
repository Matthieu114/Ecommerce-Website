<?php 

include_once 'functions.inc.php';
require_once 'dbh.inc.php';
session_start();


if(isset($_POST["order"])){ 

    if(isset($_GET["delete"])){

        $deleteid = $_GET["delete"];
        
        foreach($_SESSION["shopping_cart2"] as $keys => $values)
        {
        if($values["itemid"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart2"][$keys]);
            }
        }
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["itemid"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
            
            }
        }
            // Delete an auction
            $sql = "DELETE FROM auctions WHERE auctionId='$deleteid';";

            $stmt = mysqli_stmt_init($conn);
            $resultData = mysqli_query($conn,$sql);

            $image = $_POST["image"];
            $itemname = $_POST["name"];
            $quantity = $_POST["quantity"];
            $buynow = $_POST["price"];
            $about = $_POST["about"];
            $user = $_SESSION["useruid"];
            $id = $_GET["id"];

            addProduct($conn,$itemname,$image,$quantity,$buynow,$about,$user,$id);
            
    }

   /*echo "<h1>TETETYSDUGQIHSD</h1>";
    echo $image;
    echo $itemname;
    echo $quantity;
    echo $buynow;
    echo $about;
    echo $user;
    */

}

?>