<?php

if(isset($_POST["submit"])){

    $user = $_POST["uid"];
    $fname = $_POST["fullname"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["repeat-pwd"];
    $terms = $_POST["terms"];
    $acctype=$_POST["acc-type"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


  /*  if(isset($_POST["submit"]))
    {
        echo $user;
        echo $fname;
        echo $address;
        echo $email;
        echo $pwd;
        echo $pwdRepeat;
        echo $acctype;
    }

    */
    

    if(emptyInputSignup($user,$fname,$address,$email,$pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalidUsername($user) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if(uidExists($conn, $user,$email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }  
    if(checkedTerms($terms)!== false){
        header("location: ../signup.php?error=acceptterms");
        exit();

    }

    createUser($conn,$user,$fname,$address,$email,$pwd,$acctype);

    
}
else if(isset($_POST["add"])){

    $user = $_POST["uid"];
    $fname = $_POST["fullname"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["repeat-pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(invalidUsername($user) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if(uidExists($conn, $user,$email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }  

    addUser($conn,$user,$fname,$address,$email,$pwd,$acctype);

}
 
