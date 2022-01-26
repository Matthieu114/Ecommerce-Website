<?php

include 'dbh.inc.php';
$deleteid = $_GET["deleteid"];

//delete a user

$sql2 ="DELETE FROM users WHERE usersId='$deleteid';";

$stmt2 = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt2,$sql2)){
        header("location: ../information.php?error=stmterror");
        exit();
}

$resultData2 = mysqli_query($conn,$sql2);

if($resultData2){

    mysqli_stmt_close($stmt2); // Close connection

    header("location: ../information.php?succesfullydeletedrow"); // redirects to all records page
    exit();	
}
else{
        header("location: ProjetInfo/information.php?error=didntdelete");
}