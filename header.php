<?php

    session_start();

    /* important Sources: 
    
    All logos and images taken on : https://www.flaticon.com/ 
    help for functions : https://www.w3schools.com/howto/default.asp
    help for login: https://www.youtube.com/watch?v=gCo6JqGMi30
    design inspiration :https://fr.lush.com/?gclid=CjwKCAjw9MuCBhBUEiwAbDZ-7o7xaqf0T13ohf9HZQp5_Lh8CMlz1WLn6EbP7efG2Ib7SmoEZpcm3RoC_6sQAvD_BwE
                        https://poveria-demo.myshopify.com/
    backgrounds: https://unsplash.com/s/photos/computer
    help for selling: https://www.youtube.com/watch?v=SZc9M_kKrzs&t=934s
    help for shopping cart: https://www.youtube.com/watch?v=0wYSviHeRbs
*/
/*
if(isset($_POST["add_to_cart"]))
{   

    if(isset($_COOKIE["shopping_cart"])){
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
    }
    else{
        $cart_data = array();
    }

    $item_id_list = array_column($cart_data, 'itemid');

    if(in_array($_GET["id"], $item_id_list)){

        foreach($cart_data as $keys => $values){
        
            if($cart_data[$keys]["itemid"] == $_GET["id"])
            {
            $cart_data[$keys]["quantity"] = $cart_data[$keys]["quantity"] + $_POST["quantity"];
            }
        }
    }
    else{
    $item_array = array(
    'itemid'   => $_GET["id"],
    'itemname'   => $_POST["hidden_name"],
    'itemprice'  => $_POST["hidden_price"],
    'quantity'  => $_POST["quantity"],
    'image' => $_POST['hidden_image']
    );
    $cart_data[] = $item_array;
    }
    $item_data = json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));
    header("location:auctions.php?success=1");
}


if(isset($_POST["buy_now"]))
{
    if(isset($_COOKIE["shopping_cart2"])){
        $cookie_data = stripslashes($_COOKIE['shopping_cart2']);
        $cart_data = json_decode($cookie_data, true);
    }
    else{
        $cart_data = array();
    }

    $item_id_list = array_column($cart_data, 'itemid');

    if(in_array($_GET["id"], $item_id_list)){

        foreach($cart_data as $keys => $values){
        
            if($cart_data[$keys]["itemid"] == $_GET["id"])
            {
            $cart_data[$keys]["quantity"] = $cart_data[$keys]["quantity"] + $_POST["quantity"];
            }
        }
    }
    else
    {
    $item_array = array(
    'itemid'   => $_GET["id"],
    'itemname'   => $_POST["hidden_name"],
    'itembuynowprice'  => $_POST["hidden_price"],
    'quantity'  => $_POST["quantity"],
    'image' => $_POST['hidden_image']
    );
    $cart_data[] = $item_array;
 }
    $item_data = json_encode($cart_data);
    setcookie('shopping_cart2', $item_data, time() + (86400 * 30));
    header("location:auctions.php?success=1");
}

*/


if(isset($_POST["add_to_cart"])){  // Shopping cart table for bids

    if(isset($_SESSION["shopping_cart"])){

            $item_array_id = array_column($_SESSION["shopping_cart"],"itemid");

            if(!in_array($_GET["id"],$item_array_id)){

                $count = count($_SESSION["shopping_cart"]);
                $item_array = array('itemid' => $_GET["id"] , 
                                'itemname' => $_POST['hidden_name'], 
                                'itemprice' => $_POST['hidden_price'],
                                'quantity' => $_POST['quantity'], 'image' => $_POST['hidden_image'],
                            'about' => $_POST['about'],'highbid' => $_POST['highbid']);
                                
            $_SESSION["shopping_cart"][$count] = $item_array;
            }
            /*
            else{
                    
                    echo '<script> alert("item already added"); </script>';
                    echo '<script> window.location = "auctions.php" </script>';

            }
            */
    }
    else{

        $item_array = array('itemid' => $_GET["id"] , 
                            'itemname' => $_POST['hidden_name'], 
                            'itemprice' => $_POST['hidden_price'],
                            'quantity' => $_POST['quantity'] );
        $_SESSION["shopping_cart"][0] = $item_array;
        }
}




if(isset($_POST["buy_now"])){ //buy now shopping cart table 

    if(isset($_SESSION["shopping_cart2"])){

            $item_array_id = array_column($_SESSION["shopping_cart2"],"itemid");
            if(!in_array($_GET["id"],$item_array_id)){

                $count = count($_SESSION["shopping_cart2"]);
                $item_array = array('itemid' => $_GET["id"] , 
                                'itemname' => $_POST['hidden_name'], 
                                'itembuynowprice' => $_POST['hidden_buynow'],
                                'quantity' => $_POST['quantity'], 'image' => $_POST['hidden_image'],
                                'about' => $_POST['about']);
                                
            $_SESSION["shopping_cart2"][$count] = $item_array;
            }
            else{
                    echo '<script> alert("item already added"); </script>';
                    echo '<script> window.location = "auctions.php" </script>';

            }
    }
    else{

        $item_array = array('itemid' => $_GET["id"] , 
                            'itemname' => $_POST['hidden_name'], 
                            'itembuynowprice' => $_POST['hidden_price'],
                            'quantity' => $_POST['quantity'] );
        $_SESSION["shopping_cart2"][0] = $item_array;
        }
}



if(isset($_GET["action"])){ //delete item from bid table in shopping cart  

    if($_GET["action"] == "delete"){
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["itemid"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>  alert("Item deleted!");  </script>';
                echo '<script> window.location = "auctions.php" </script>';
            }
        }

    }
}

if(isset($_GET["action"])){ // delete item from buy now table in shopping cart

    if($_GET["action"] == "delete2"){
        foreach($_SESSION["shopping_cart2"] as $keys => $values)
        {
            if($values["itemid"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart2"][$keys]);
                echo '<script>  alert("Item deleted!");  </script>';
                echo '<script> window.location = "auctions.php" </script>';
            }
        }

    }
}


/*

if(isset($_GET["action"])) // get for cookies
{
    if($_GET["action"] == "delete"){
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
    
        foreach($cart_data as $keys => $values){
    
            if($cart_data[$keys]['itemid'] == $_GET["id"]){
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie("shopping_cart", $item_data, time() + (86400 * 30));
                header("location:index.php?remove=1");
            }
         }
    }
    if($_GET["action"] == "delete2"){
        $cookie_data = stripslashes($_COOKIE['shopping_cart2']);
        $cart_data = json_decode($cookie_data, true);
    
        foreach($cart_data as $keys => $values){
    
            if($cart_data[$keys]['itemid'] == $_GET["id"]){
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie("shopping_cart2", $item_data, time() + (86400 * 30));
                header("location:index.php?remove=1");
            }
         }
    }
    if($_GET["action"] == "clear"){
        setcookie("shopping_cart", "", time() - 3600);
        header("location:index.php?clearall=1");
    }
    if($_GET["action"] == "clear2"){
        setcookie("shopping_cart2", "", time() - 3600);
        header("location:index.php?clearall=1");
    }
}

if(isset($_GET["success"])){
 $message = 'Item Added into Cart';
}
if(isset($_GET["remove"])){
 $message = 'Item removed from Cart';
}
if(isset($_GET["clearall"])){
 $message = 'Shopping cart cleared';
}
*/
?>
 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap');   
    </style>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/logout_login.css">
    <link rel="stylesheet" href="./css/slideshow.css">
    <link rel="stylesheet" href="./css/buying_collec.css">
    
    <title>Main Page</title>
</head>

<body>
    <div class= "wrapper" id="wrapper"> 
  
            <?php 
                if(isset($_SESSION["useruid"]) && $_SESSION["usertype"]=="buyer"){
                    
             ?>      

                <div class="logo">
                    <a href="index.php"style="text-decoration:none;"><h6> Tech Market </h6>  </a>
                </div>
        
                    <a href="index.php" class="w3-bar-item w3-button">Home</a> 
                    <div class = "dropdown">
                    <button class=dropbtn> <a href="categories.php" class="w3-bar-item w3-button">  Collections </a>  </button> 
                     <div class="class-categories">
                         <a href="cat_phones.php">Phones</a>
                         <a href="cat_pc.php">PCs</a>
                         <a href="cat_laptop.php">Laptops</a>
                     </div>
                    </div>

                   <div class = "dropdown">
                    <button class=dropbtn> <a href="#" class="w3-bar-item w3-button">  Buy </a>  </button> 
                     <div class="class-categories">
                         <a href="auctions.php">Auctions</a>
                         <a href="#">Buy now</a>
                         <a href="#">Best Seller</a>
                     </div>
                    </div>
             <?php   }
                else if(isset($_SESSION["useruid"]) && $_SESSION["usertype"]=="seller"){
            ?>        
                    <div class="logo">
                    <a href="index.php"style="text-decoration:none;"><h6> Tech Market </h6>  </a>
                    </div>
                    
                    <a href="index.php" class="w3-bar-item w3-button">Home</a> 

                    <a href="add_auction.php" class = "class=w3-bar-item w3-button"> Sell</a>   
             <?php   }  
                else if(isset($_SESSION["adminid"])){
             ?>     
                    <div class="logo">
                        <a href="index.php"style="text-decoration:none;">
                        <h6> Tech Market </h6>  </a>
                    </div>
                    <div class = "dropdown">
                            <button class=dropbtn> <a href="categories.php" class="w3-bar-item w3-button">  Collections </a>  </button> 
                        <div class="class-categories">
                         <a href="cat_phones.php">Phones</a>
                         <a href="cat_pc.php">PCs</a>
                         <a href="cat_laptop.php">Laptops</a>
                        </div>
                    </div>
            <?php    }
                else{
            ?>            

                <div class="logo">
                    <a href="index.php"style="text-decoration:none;"><h6> Tech Market </h6>  </a>
                </div>

     
                <div class = "dropdown">
                <button class=dropbtn> <a href="categories.php" class="w3-bar-item w3-button">  Collections </a>  </button> 
                <div class="class-categories">
                    <a href="cat_phones.php">Phones</a>
                    <a href="cat_pc.php">PCs</a>
                    <a href="cat_laptop.php">Laptops</a>
                </div>
                </div>

            <?php    }
            ?>
              

         


           
            
            <?php if(isset($_SESSION["useruid"]) && $_SESSION["userid"] > 1){ ?>

                <div class = "dropdown">
                    <button class=dropbtn> <a href="#" class="w3-bar-item w3-button"> 
                     My account <i class="arrow down"> </i> </a> </button> 
                    <div class="class-categories">
                    <a href="profile.php" class="w3-bar-item w3-button"> Profile</a>
                    <a href="includes/logout.inc.php" class="w3-bar-item w3-button"> Log Out </a>
                    </div>
                </div>

            <?php }
                else if (isset($_SESSION["adminuid"]))
                {   ?>

                    <div class = "dropdown">
                            <button class=dropbtn> <a href="profile.php" class="w3-bar-item w3-button"> administrator <i class="arrow down"></i> </a></button> 
                            <div class="class-categories">
                            <a href="profile.php" class="w3-bar-item w3-button"> Profile </a>
                            <a href="includes/logout.inc.php" class="w3-bar-item w3-button"> Log Out </a>
                            </div>
                    </div>
            <?php    }
                else{ ?>

                <div class = "dropdown">
                    <button class=dropbtn> <a href="#" class="w3-bar-item w3-button"> Your account <i class="arrow down"></i></a> </button> 
                    <div class="class-categories">
                    <a href="login.php" class="w3-bar-item w3-button"> Log In </a>
                    <a href="signup.php" class="w3-bar-item w3-button">  Sign Up</a>
                    <a href="adminlog.php" class="w3-bar-item w3-button">  Admin </a>
                    </div>
                </div>

           <?php     }
            ?>


    <?php if(!isset($_SESSION["adminuid"])){ ?> <!-- If a person is not a buyer they should not have a basket -->

    <div id="basketPanel" class="basketPanel">
        <p style="text-align:center;margin-top:0;color:black">Your basket:</p> 
        <a href="javascript:void(0)" class="closebasket" onclick="closeNav()">&times;</a> <br>
        <hr style="border: solid black 1px;width:90%;margin:0 auto;">
        <br>

        <div class="clear_div">
            <h4 style="width:100%;color:black">Your bids</h4> 
            <a href="index.php?action=clear&id=<?php echo $values["itemid"]?>">
            <input type="button" value="Go to Bids" id="clear_btn"></a>
        </div>
       
        <div class="basket_background">
            <table class="basket_table">
                <tr>
                    <th width = 40%>Product</th>
                    <th width = 10%>Current Bid</th>
                    <th>Highest Bidder </th>
                    <th width = 15% style="text-align:center">new bid Amount</th>
                    <th width = 30%>Action</th>
                </tr>
                <?php  if(isset($_SESSION["shopping_cart"])){
                    
                    
                    $total= 0;
                    
                    foreach($_SESSION["shopping_cart"] as $keys => $values){
                ?>

                <form action="includes/myBids.inc.php?id=<?php echo $values["itemid"] ?>" method="post">

                <tr>
                    <td style="text-align:left"> <img src="./uploads/<?php echo $values["image"] ?>" style="height:70px; width:90px"> <?php echo $values["itemname"]; ?> </td>
                    <td> $ <?php echo $values["itemprice"] ?></td>
                    <td> <?php echo $values["highbid"] ?> </td>
                    <td> <input type="text" name="newbid" style="height:20px;border:solid black 1px">  </td>
                    <td><input type="submit" id="bid_btn" name="bid">
                    <input type="hidden" name="currentprice" value= <?php echo $values["itemprice"] ?>>
                    <a href="index.php?action=delete&id=<?php echo $values["itemid"]?>">
                    <input type="button" value="Delete" id="delete_btn"></a></td>
                </tr>

                </form>

                <?php 
                $total += ( $values["itemprice"]);
                    } 
                ?> 
                <tr>
                    <td colspan="3" align="right" style="border:none">Total bids</td>
                    <td colspan="2" align="right" style="border:none">$ <?php echo number_format($total,2); ?> </td>
                </tr>
                <?php       
                }  
                    
                ?>
            </table>
        </div>
        <br>
        <div class="clear_div">
            <h4 style="width:100%;color:black">Buy Now</h4> 
        </div>
        <div class="basket_background">
            <table class="basket_table">
                <tr>
                    <th width = "40%">Product</th>
                    <th width = "5%">quantity</th>
                    <th width = "10%">Price</th>
                    <th width = "15%">Total</th>
                    <th width = "30%">Action</th>
                </tr>
                <?php if(isset($_SESSION["shopping_cart2"])){
                    $total= 0;
                    foreach($_SESSION["shopping_cart2"] as $keys => $values){; 
                ?>
                <tr>
                    <td style="text-align:left"> <img src="./uploads/<?php echo $values["image"]; ?>" style="height:70px; width:90px"> <?php echo $values["itemname"]; ?> </td>
                    <td><input type="number" name="quantity" value="<?php echo $values["quantity"];?>" size=3></td>
                    <td>$ <?php echo $values["itembuynowprice"]; ?></td>
                    <td>$ <?php echo number_format($values["quantity"] * $values["itembuynowprice"], 2) ?></td>
                    <td><a href="index.php?action=delete2&id=<?php echo $values["itemid"]?>">
                    <input type="button" value="Delete" id="delete_btn"></a></td>
                </tr>
                
                <?php 
                $total += ($values["quantity"] * $values["itembuynowprice"]);
                    } 
                ?> 
                <tr>
                    <td colspan="3" align="right" style="border:none">Total</td>
                    <td colspan="2" align="right" style="border:none">$ <?php echo number_format($total,2); ?> </td>
                </tr>

                
                <?php       
                }  
                    
                ?>
            </table>

            <div class="clear_div">
            <h4 style="width:100%;color:black"></h4> 
                <a href="checkout.php?id=<?php echo $values["itemid"]?>"><input type="button" value="Buy All" id="clear_btn"></a>
            </div>
        </div>
        
        <?php if(!isset($_SESSION["useruid"])){ ?>
        <br><br><br>
        <div style="text-align:center">
        <h6 style="text-align:center;color:black"> Log in to start shopping !</h6>
        <a href="login.php"><input type="button" name="subscribe" value="Log In" id="subscribe2"></a>
        </div>
        <?php } ?>
    </div>    
        <button class="openbasket" onclick="openNav()"><img src="./images/add-to-cart.png" alt="Index"> </button>
    
    <?php } ?>

    </div> <!-- wrapper end div -->

<script>
function openNav() {
  document.getElementById("basketPanel").style.width = "700px";
  document.getElementById("wrapper").style.paddingRight = "820px";
  document.getElementById("wrapper2").style.marginRight = "700px";
  document.getElementById("wrapper2").style.opacity = "0.5";
}


function closeNav() {
  document.getElementById("basketPanel").style.width = "0";
  document.getElementById("wrapper").style.paddingRight = "0";
  document.getElementById("wrapper2").style.marginRight = "0";
  document.getElementById("wrapper2").style.opacity = "1";
}
</script>


