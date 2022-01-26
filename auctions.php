<?php include_once 'header.php' ?>



<div class="auction-background">
        <h1 style="color:black;text-align:center;background-color:dodgerblue;padding:10px">Browse Our Items</h1>
        <div style="height:15px"></div>
                <table class="table">
                        <thead>
                        <tr>    
                                <th> # </th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>View Info</th>
                        </tr>
                        </thead>

                        <?php
                        
                        require_once 'includes/dbh.inc.php';
                                $sql = "SELECT * FROM auctions;"; // verifies if they exist in php database
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
                        <tr>    
                                <td><?php echo $row['auctionId'];?></td>
                                <td><img src="./uploads/<?php echo $row['aImage'];?>"></td>
                                <td> <?php echo $row['aAbout'] ?> </td>
                                <td style="text-align:center;"> <a href="view_auction_items.php?auctionId=<?php echo$row['auctionId'] ;?>"><input type="button" value="Info" id="btn_view"></a></td>
                        </tr>
                        </tbody>
                
                <?php          }
                        }
                        else{
                              echo 'Result not found';  
                        }
                        mysqli_stmt_close($stmt);   ?>

                </table>

                <div style="height:20px;"></div>

        
</div>


<?php include_once 'footer.php' ?>