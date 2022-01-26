<?php
include_once 'header.php'
?>


<div class="auction-background">

<?php if(isset($_SESSION["adminid"])){ ?>

    <h1 style="color:black;text-align:center;background-color:dodgerblue;margin:0;padding:5px">List of Products</h1>
        <div class="new_entry">  <a href="signup.php"><input type="button" value="&#43; Add Supplier" id="new_entry" > </a> </div>
        <hr style="border:1px solid #ddd">
                <table class="table">
                        <thead>
                        <tr>    
                                <th> # </th>
                                <th style="width:125px">Img</th>
                                <th style="width:225px">Name</th>
                                <th style="width:450px">Username</th>
                                <th style="width:450px">Other Info</th>
                                <th style="width:225px">Action</th>
                               
                        </tr>
                        </thead>        
                        <?php
                        require_once 'includes/dbh.inc.php';
                                $sql = "SELECT * FROM users;"; // selects all items from database
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt,$sql)){
                                        header("location: ../auctions.php?error=stmterror");
                                        exit();
                                }
                                $resultData = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($resultData)>0 ){

                                    

                                      while($row = mysqli_fetch_assoc($resultData)){ 
                                          
                                        if($row['usersAcctype']=='seller'){
                        ?>          
                        <tbody>
                        <tr style="font-size:small;">
                                
                                
                                <td> <?php echo $row['usersId']; ?></td>
                                <td><img src="./uploads/<?php echo $row['aImage'];?>"></td>
                                <td><b> Name: </b><?php echo $row['usersName'] ?></td>
                                <td><b>Username: </b> <?php echo $row['usersUid']?><br>
                                <td><b> Email </b> <?php echo $row['usersEmail'] ?><br>
                                <b> Address: </b><?php echo $row['usersAddress'] ?> <br></td> 
                                <td style="text-align:center">
                                <a href="edit.php?editid=<?php echo $row["usersId"]?>;"><input type="button" class="edit_button" name="edit" value="edit"></a> 
                                <a href="includes/deleteuser.inc.php?deleteid=<?php echo $row["usersId"]?>;"><input type="button" class="delete_button" name="delete" value="delete"></a>
                                </td>
                        </tr>
                        </tbody>
                
                <?php } } } ?>

                
                </table>
                <div style="height:20px;"></div>

        <?php }else{ ?>

</div>



 <div class="outer-wrap">
    <h1>Your account Information</h1>
    <div class ="inner-wrap">
    <?php if(isset($_SESSION["useruid"] ) ){  ?>
    
    <table id="info-tab" style="width:100%" > 
    <caption> <b> Account </b> </caption>
    <tr>
        <th>Username: </th>
        <th>Full Name: </th>
        <th>Email: </th>
        <th>Address: </th>
        <th>Account type: </th>
    </tr>
    <tr>
        <td><?php echo $_SESSION["useruid"]; ?></td>
        <td><?php echo $_SESSION["username"]; ?></td>
        <td><?php echo $_SESSION["useremail"]; ?></td>
        <td><?php echo $_SESSION["useraddr"]; ?></td>
        <td><?php echo $_SESSION["usertype"]; ?></td>
    </tr>

   

    </table>

    </div>


    
    <table id="billing"><caption> <b>Billing and Payment information </b> </caption>
        <tr>
            <th>Billing Address</th>
            <th>Card Information</th>
        </tr>
        <?php
                         

                        require_once 'includes/dbh.inc.php';
                        $username = $_SESSION["username"];
                        $sql = "SELECT * FROM payment WHERE fname = '$username';"; // verifies if they exist in php database
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                                header("location: ../auctions.php?error=stmterror");
                                exit();
                        }
                        $resultData = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($resultData)>0){
                                while($row = mysqli_fetch_assoc($resultData)){ 
                ?> 
        <tr>
            <td> <b>Address:</b> <?php echo $row["billingAdress"]. " "; echo $row["billingCity"] . " ";echo $row["billingZip"]; ?></td>
            <td> <?php echo $row["cType"] . "<br>"; echo $row["Cnumb"] . "<br>"; echo $row["expMonth"]. " ";echo $row["expYear"] . "<br>";
            echo $row["CVV"]; ?> </td>
        </tr>

        <?php } } else{ echo 'Result not found'; }
                mysqli_stmt_close($stmt); 
        ?>
    </table>


<?php
}
?>

</div>

<?php } ?>


<?php
include_once 'footer.php'
?>