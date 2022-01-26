<?php


include 'dbh.inc.php';

$deleteid = $_GET["deleteid"];


// Delete an auction
$sql = "DELETE FROM auctions WHERE auctionId='$deleteid';";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../my_auctions.php?error=stmterror");
        exit();
}

$resultData = mysqli_query($conn,$sql);

if($resultData){

    mysqli_stmt_close($stmt); // Close connection

    header("location: ../my_auctions.php?succesfullydeletedrow"); // redirects to all records page
    exit();	
}
else{
        header("location: ProjetInfo/my_auctions.php?error=didntdelete");
}


