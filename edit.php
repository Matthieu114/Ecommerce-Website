<?php

$editid = $_GET["editid"];

if(isset($_POST["update"])){

    include_once 'includes/functions.inc.php';
    require_once 'includes/dbh.inc.php';
    /*$image =$_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image']['type'];

    if($imageError === 0){
        if($imageSize < 500000){
                $target = "/opt/lampp/htdocs/ProjetInfo/uploads/".$image;
                move_uploaded_file($imageTmp,$target);
        }else{
                echo 'file is too big to upload';
        }
    }else{

        echo 'there was an error uploading your file';
    }
    */

    //$image = $_POST["image"];
    $name =$_POST["title"];
    $buynow= $_POST["buynow"];
    $price =$_POST["price"];
    $end_date =$_POST["date"];
    $about =$_POST["description"];
    $category=$_POST["category"];

    edititem($conn,$name,$buynow,$price,$end_date,$about,$category,$editid);
}   

?>



<?php
include_once 'header.php';
?>



<div class = "sell_container" style="text-align:left;">
    <div class="title"><h1>Edit Auction Post</h1></div>
    <div class="sale_form">
    <form  method="post" enctype="multipart/form-data">

    <?php
        if(isset($_GET['editid'])){
            require_once 'includes/dbh.inc.php';
            $editid = $_GET["editid"];
            $sql = "SELECT * FROM auctions WHERE auctionId = '$editid';"; // verifies if they exist in php database
            $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("location: ../auctions.php?error=stmterror");
                    exit();
                }
            $resultData = mysqli_query($conn,$sql);
            if(mysqli_num_rows($resultData)>0){
            while($row = mysqli_fetch_assoc($resultData)){ 
                                        
    ?>
        <label for="title"> Item Name / Model </label><br>
        <input type="text" id="title" name="title" placeholder="Item name" value="<?php echo $row["aName"]; ?>"><br>
        <label for="category"> Category  (Current : <?php echo $row["aCategory"]; ?>)</label><br>
        <select name="category" id="category" style="width: 150px;padding:4px;margin-top:4px"> 
            <option value="<?php echo $row["aCategory"]; ?>"></option>
            <option value="phone">Phone</option>
            <option value="laptop">Laptop</option>
            <option value="pc">PC</option>
        </select>
        <br><br>
        <label for="descrition">Description</label> <br>
        <textarea name="description" id="description" cols="60" rows="3" placeholder="about this item..." style="margin-top:4px;border-radius:1px" 
         required><?php echo $row["aAbout"]; ?></textarea>
        <br>            
        <div style="margin-top: 4px">
            <div style="float:left; margin-right:5px" >
            <label for="price">Starting Price</label> <br>
            <input type="number" name="price" id="price" placeholder="Price..." min="0" max="50000" step="25" value="<?php echo $row["aPrice"]; ?>">
            </div>
            <div>
            <label for="buynow">Buy It Now</label>
            <br>
            <input type="number" name="buynow" id="buynow" min="0" max="50000" step="25" placeholder="buy now price..." value="<?php echo $row["aBuyNow"]; ?>"> 
            </div>
        </div>

        <?php $datesep = explode(' ',$row["aEnd_date"]);
        $datevalue = $datesep[0];
        //echo "<h1 style=color:black;> $datevalue </h1>";?>

        <br>
        <label for="end_date"> Auction end Date</label> <br>
         <input type="date" name="date" id="end_date" value="<?php echo $datevalue; ?>">  
         <p id="time"></p>

        <script> 
            function timeFunction(){
                var x = document.getElementById("end_date").value;
                document.getElementById("time").innerHTML = x;
            }     
        </script>

        <br>
        <label for="image">Product Image </label> <br>
        <input type="file" name="image" id="image" placeholder='image file' style="border:solid 1px #ddd; padding:4px"> 
        <img src="./uploads/<?php echo $row['aImage'];?>" style="width:80px; height55px;">
        <br><br>
        <input type="submit" value="Update" name="update" class="post_item">

        <?php  }  }   else{echo 'Result not found';} mysqli_stmt_close($stmt);   } ?>                       
    </form>
    </div>
</div>

<?php
include_once 'footer.php';
?>



