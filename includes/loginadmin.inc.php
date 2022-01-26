<?php

if(isset($_POST["submit"]))
{
    $user = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputlogin($user,$pwd) !== false){
        header("location: ../adminlog.php?error=emptyinput");
        exit();
    }
    loginAdmin($conn,$user,$pwd);
}
else{
    header("location: ../adminlog.php");
    exit();
}
 