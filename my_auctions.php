<?php include_once 'header.php' ?>

<div class="auction-background" class="body">

        <?php if(isset($_SESSION["adminid"])) { ?>

        
        <h1 style="color:black;text-align:center;background-color:dodgerblue;margin:0;padding:5px">List of Products</h1>
        <div class="new_entry">  <a href="add_auction.php"><input type="button" value="&#43; New Entry" id="new_entry" > </a> </div>
        <hr style="border:1px solid #ddd">
                <table class="table">
                        <thead>
                        <tr>    
                                <th> # </th>
                                <th style="width:125px">Img</th>
                                <th style="width:225px">Category</th>
                                <th style="width:450px">Product</th>
                                <th style="width:450px">Other Info</th>
                                <th style="width:225px">Action</th>
                               
                        </tr>
                        </thead>        
                        <?php
                        require_once 'includes/dbh.inc.php';
                                $sql = "SELECT * FROM auctions;"; // selects all items from database
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt,$sql)){
                                        header("location: ../auctions.php?error=stmterror");
                                        exit();
                                }
                                $resultData = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($resultData)>0){

                                      while($row = mysqli_fetch_assoc($resultData)){                
                        ?>
                        <tbody>
                        <tr style="font-size:small;">
                                <td> <?php echo $row['auctionId']; ?></td>
                                <td><img src="./uploads/<?php echo $row['aImage'];?>"></td>
                                <td style="text-align:center;font-size:medium"> <?php echo strtoupper($row['aCategory']) ?></td>

                                <td><b> Name: </b><?php echo $row['aName'] ?><br><b>Description:</b> <?php echo $row['aAbout'] ?> </td>
                                <td><b>Starting price:</b> <?php echo $row['aPrice']?> $ <br>
                                <b> Buy Now: </b> <?php echo $row['aBuyNow'] ?>$ <br>
                                <b> End Date/Time: </b><?php echo $row['aEnd_date'] ?> <br>
                                <b> Put up by: </b><?php echo $row['aUser'] ?> </td> 
                                <td style="text-align:center">
                                <a href="edit.php?editid=<?php echo $row["auctionId"]?>"><input type="button" class="edit_button" name="edit" value="edit"></a> 
                                <a href="includes/delete.inc.php?deleteid=<?php echo $row["auctionId"]?>;"><input type="button" class="delete_button" name="delete" value="delete"></a>
                                </td>
                        </tr>
                        </tbody>
                
                <?php  } } ?>

                
                </table>
                <div style="height:20px;"></div>

        <?php } else { ?>


        <h1 style="color:black;text-align:center;background-color:dodgerblue">Your auctions</h1>
        <div style="height:20px"></div>
                <table class="table">
                        <thead>
                        <tr>
                                <th style="width:125px">Img</th>
                                <th style="width:225px">Category</th>
                                <th style="width:450px">Product</th>
                                <th style="width:450px">Other Info</th>
                                <th style="width:225px">Action</th>

                        </tr>
                        </thead>        
                        <?php
                        require_once 'includes/dbh.inc.php';
                                $sql = "SELECT * FROM auctions WHERE aUser = ?;"; // verifies if they exist in php database
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt,$sql)){
                                        header("location: ../auctions.php?error=stmterror");
                                        exit();
                                }
                                
                                mysqli_stmt_bind_param($stmt,"s",$_SESSION["useruid"]);
                                mysqli_stmt_execute($stmt);

                                $resultData = mysqli_stmt_get_result($stmt);

                                if(mysqli_num_rows($resultData)>0){

                                      while($row = mysqli_fetch_assoc($resultData)){                
                        ?>
                        <tbody>
                        <tr style="font-size:small;">
                                <td><img src="./uploads/<?php echo $row['aImage'];?>"></td>
                                <td style="text-align:center;font-size:medium"> <?php echo strtoupper($row['aCategory']) ?></td>

                                <td><b> Name: </b><?php echo $row['aName'] ?><br><b>Description:</b> <?php echo $row['aAbout'] ?> </td>
                                <td><b>Starting price:</b> <?php echo $row['aPrice']?> $ <br>
                                <b> Buy Now: </b> <?php echo $row['aBuyNow'] ?>$ <br>
                                <b> End Date/Time: </b><?php echo $row['aEnd_date'] ?> <br>
                                <b> Put up by: </b><?php echo $row['aUser'] ?> </td> 
                                <td style="text-align:center">
                                <a href="edit.php?editid=<?php echo $row["auctionId"]?>"><input type="button" class="edit_button" name="edit" value="edit"></a> 
                                <a href="includes/delete.inc.php?deleteid=<?php echo $row["auctionId"]?>"><input type="button" class="delete_button" name="delete" value="delete"></a>
                                </td>
                                
                        </tr>
                        </tbody>
                
                <?php          }
                        }
                        else{
                              echo '<h3 style="color:black;margin-left:30px"> You have no auctions </h3>';  
                        }       mysqli_stmt_close($stmt);   
                ?>
                </table>
                <div style="height:20px;"></div>


        <?php } ?>

</div>
<?php include_once 'footer.php' ?>