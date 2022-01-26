<?php

if(isset($_POST["submit"]))
{
    $user = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputlogin($user,$pwd) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    loginUser($conn,$user,$pwd);
}
else{
    header("location: ../login.php");
    exit();
}


 