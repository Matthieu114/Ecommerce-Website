<?php include_once 'header.php'; ?>



<div class="auction-background" class="body" style="width: 55%">

<h1 style="color:black;text-align:center;background-color:dodgerblue">Your Orders and auctions</h1>
        <div style="height:20px"></div>
                <table class="table" style="width:90%">
                        <thead>
                        <tr>
                                <th style="width:20%px">Img</th>
                                <th style="width:80%px">Product</th>
                                
                        </tr>
                        </thead>       

                        <?php
                        require_once 'includes/dbh.inc.php';
                                //$id = $_GET["id"];
                                $user = $_SESSION["useruid"];
                                $sql = "SELECT * FROM products WHERE aUser = '$user';"; // verifies if they exist in php database

                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt,$sql)){
                                        //header("location: ../auctions.php?error=stmterror");
                                        exit();
                                }
                                
                                $resultData = mysqli_query($conn,$sql);

                                if(mysqli_num_rows($resultData)>0){

                                      while($row = mysqli_fetch_assoc($resultData)){                
                        ?>
                        <tbody>
                        <tr style="font-size:small;">
                                <td><img src="/ProjetInfo/uploads/<?php echo $row['aImage'];?>"></td>
                                <td><b> Name: </b><?php echo $row['aName'] ?><br><b>Description:</b> <?php echo $row['aAbout'] ?><br>
                                 <b> Bought For: </b> <?php echo $row['aBuyNow'] ?>$</td> 
                        </tr>
                        </tbody>
                
                <?php          }
                        }
                        else{
                              echo '<h3 style="color:black;margin-left:30px"> You have not bought or bid on anything</h3>';  
                        }       mysqli_stmt_close($stmt);   
                ?>
                </table>
                <div style="height:20px;"></div>


                <div style="height:20px"></div>
                <table class="table" style="width:90%">
                        <thead>
                        <tr>
                                <th style="width:20%px">Img</th>
                                <th style="width:80%px">Product</th>
                                <th> New bid</th>
                                <th> Action </th>
                                
                        </tr>
                        </thead>       

                        <?php
                        require_once 'includes/dbh.inc.php';
                                //$id = $_GET["id"];
                                $user = $_SESSION["useruid"];
                                $sql = "SELECT * FROM auctions WHERE highestBidder = '$user';"; // verifies if they exist in php database

                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt,$sql)){
                                        //header("location: ../auctions.php?error=stmterror");
                                        exit();
                                }
                                
                                $resultData = mysqli_query($conn,$sql);

                                if(mysqli_num_rows($resultData)>0){

                                      while($row = mysqli_fetch_assoc($resultData)){                
                        ?>
                        <tbody>
                        <tr style="font-size:small;">
                                <td><img src="/ProjetInfo/uploads/<?php echo $row['aImage'];?>"></td>
                                <td><b> Name: </b><?php echo $row['aName'] ?><br><b>Your bid</b> <?php echo $row['currentBid'] ?>$<br>
                                </td> 
                               <?php foreach($_SESSION["shopping_cart"] as $keys => $values){ ?>

                <form action="includes/myBids.inc.php?id=<?php echo $values["itemid"] ?>" method="post">

            
                    
                    <td> <input type="text" name="newbid" style="height:20px;border:solid black 1px">  </td>
                    <td><input type="submit" id="bid_btn" name="bid">
                    <input type="hidden" name="currentprice" value= <?php echo $values["itemprice"] ?>>
                

                </form>
                        </tr>
                        </tbody>
                
                <?php    }      }
                        }
                        else{
                              echo '<h3 style="color:black;margin-left:30px"> You have not bought or bid on anything</h3>';  
                        }       mysqli_stmt_close($stmt);   
                ?>
                </table>
                <div style="height:20px;"></div>


                


</div>
 




<?php include_once 'footer.php'; ?>