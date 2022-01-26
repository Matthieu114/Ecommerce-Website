<?php

session_start();



if(isset($_POST["post"])){

    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';
  
    $username = $_SESSION["useruid"];

    $name =$_POST["title"];

    $file =$_FILES['image'];
    $image =$_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image']['type'];

    //$imageExt = explode('.',$image);
    //$imageActualExt = strtolower(end($imageExt));

    if($imageError === 0){
        if($imageSize < 500000){
                //$imageNew = uniqid('',true).".".$imageActualExt;
                $target = "/opt/lampp/htdocs/uploads/".$image;
                move_uploaded_file($imageTmp,$target);
                //header("location: auctions.php?uploadsuccessful");
        }else{
                echo 'file is too big to upload';
        }
    }else{

        echo 'there was an error uploading your file';
    }

    $buynow= $_POST["buynow"];
    $price =$_POST["price"];
    $end_date =$_POST["date"];
    $about =$_POST["description"];
    $category=$_POST["category"];
    

    addSale($conn,$name,$image,$price,$buynow,$about,$category,$end_date,$username,$adminuid);
}