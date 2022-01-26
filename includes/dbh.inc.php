<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginSystem";

$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);

if(!$conn){
    die("error connecting to the database" .mysqli_connect_error());
}