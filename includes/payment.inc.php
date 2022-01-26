<?php 

include_once 'functions.inc.php';
require_once 'dbh.inc.php';
session_start();

if(isset($_POST["order"])){

    $fname = $_SESSION["username"];
    $bilAddress = $_POST["address"];
    $bilCity = $_POST["city"];
    $bilPostal = $_POST["postal"];
    $cType = $_POST["cardtype"];
    $cardname = $_POST["cardname"];
    $cardnumber= $_POST["cardnumber"];
    $expmonth=$_POST["expmonth"];
    $expyear=$_POST["expyear"];
    $cvv=$_POST["cvv"];

    addpayment($conn,$fname, $bilAddress,$bilCity,$bilPostal, $cType,$cardname,$cardnumber,$expmonth,$expyear,$cvv);

}


