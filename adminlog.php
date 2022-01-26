<?php
include_once 'header.php';

?>

<form action="includes/loginadmin.inc.php" method="post" > <br>
        <div class="wrapper2">
        <section class="login-form">
            <div style="background-color:dodgerblue;">
            <h2 style="text-align: center;color:black;margin:0;">Admin</h2>
            </div>
            <p style="text-align: center;">enter your administrator credentials</p>
            <hr>
   
            <p>Username/Email</p> <input type="text" name="uid" placeholder="Username/email ..."> <br>
            <p>Password</p>  <input type="password" name="pwd" id="myinput" placeholder="password..."> <br>
            <label for="view-pword" style="color:black; font-family: 'Roboto', sans-serif;">
            <input type="checkbox" name="view-pword" id="view-pword" onclick="passwordVis()"> See Password </label>
              
            <div class="clearfix ">
               <button type="submit" class="cancelbtn"> Cancel </button> 
               <button type="submit" class="submitbtn" name="submit"> Log In </button> 
            </div>
                    
            <?php
                if(isset($_GET["error"])){

                    if($_GET["error"]=="emptyinput"){
                        echo "<p>Fill in all fields!<p>";
                    }
                    else if($_GET["error"]=="wronglogin"){
                         echo "<p>Username/Email is invalid!<p>";
                    }
                    // else if($_GET["error"]=="wrongpassword"){
                    //     echo "<p>password is invalid!<p>";
                    // }
                    else if($_GET["error"] == "none"){
                        echo "<p> You have logged in! <p>";
                    }
                }
            ?>
        </section>
    </form>
    <br>

<?php include_once 'footer.php'; ?>


<script>
 function passwordVis(){
    let x = document.getElementById("myinput")
    if( x.type ==="password"){ x.type = "text"; }
    else{x.type = "password" }
    }
</script>