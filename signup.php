<?php
include_once 'header.php';

?>

<div class="wrapper2" >

<?php  if(isset($_SESSION["adminid"])){ ?>

    <form action="includes/signup.inc.php" method="post"><br>

        <div class="form-content2">

            <div style="background-color:dodgerblue;padding:5px">
                <h2 style="text-align: center; color:black;margin:0;text-align:left;padding:2px 0 2px 4px">Add Supplier</h2>
            </div>
            <p style="text-align: center;color:black"> Enter the supplier details </p>
            <hr>
        <section class="signup-form">
            <label for="uid"> Username </label><br>
            <input type="text" name="uid" placeholder="Username ..." id="uid" required> <br>  

            <label for="fname"> Full Name</label><br>
            <input type="text" name="fullname" placeholder="Full Name..." id="fname" required> <br>

            <label for="address">Address</label> <br>
            <textarea name="address" id="address" cols="50" rows="3" placeholder="address..." style="margin-top:4px;border-radius:1px" required></textarea>
            <br>

            <label for="email"> Email </label><br>
            <input type="email" name="email" placeholder="E-Mail..." id="email" required> <br>

            <label for="myinput">Password</label><br>
            <input type="password" name="pwd" id="myinput" placeholder="pasword..." required> <br>

            <label for="myinput2"> Repeat Password </label><br>
            <input type="password" name="repeat-pwd" id="myinput2" placeholder="Repeat password..." required> <br>

            <label for="view-pword" style="color:black; font-family: 'Roboto', sans-serif;">
            <input type="checkbox" name="view-pword" onclick="passwordVis()" id="view-pword"> See Password </label> <br><br>
            

            <input type="submit" value="Add" name="add" class="post_item">
               
               <?php 

            if(isset($_GET["error"])){

                if($_GET["error"]=="invaliduid"){
                     echo "<p>Username is invalid!<p>";
                }
                else if($_GET["error"] == "invalidemail"){
                    echo "<p>Email is invalid!<p>";
                }
                else if($_GET["error"] == "passwordsdontmatch"){
                    echo "<p> Passwords dont match!<p>";
                }
                else if($_GET["error"] == "usernametaken"){
                    echo "<p> Username or Email already exists! <p>";
                }
                else if($_GET["error"] == "stmtfailed"){
                    echo "<p> something went wrong try again! <p>";
                }
                else if($_GET["error"] == "none"){
                    echo "<p> You have signed up! <p>";
                }
            }
        ?>   
            </section>
        </div>
    </form>
    

    


<?php } else{ ?>
    

    <form action="includes/signup.inc.php" method="post" style="margin:0 auto"><br>

    <div class="form-content">

            <div style="background-color:dodgerblue;padding:5px">
                <h2 style="text-align: center; color:black;margin:0">Sign Up</h2>
            </div>
        
        <section class="signup-form">
            <p style="text-align: center;">please fill in this form to create an account </p>
            <hr>
            <label for="acc-type" style="font-family: 'Roboto', sans-serif; color: black;"> <b>This account is for : </b> </label> 
            <select name="acc-type" id="acc-type">
                    <option value="buyer" name="buyer" value="Buyer"> Buying </option>
                    <option value="seller" name="seller" value="Seller"> Selling</option>       
                </select>

                <br>
                <br>

              <p>UserName</p> <input type="text" name="uid" placeholder="Username ..."> <br>  
              <p>Full Name</p> <input type="text" name="fullname" placeholder="Full Name..."> <br>    
              <p>Address</p> <input type="text" name="address" placeholder="Address..."> <br>
              <p>E-mail</p>  <input type="email" name="email" placeholder="E-Mail..."> <br>
              <p>Password</p>  <input type="password" name="pwd" id="myinput" placeholder="password..."> <br>
              <p>Password</p>  <input type="password" name="repeat-pwd" id="myinput2" placeholder="Repeat password..."> <br>
              <label for="view-pword" style="color:black; font-family: 'Roboto', sans-serif;">
              <input type="checkbox" name="view-pword" onclick="passwordVis()" id="view-pword"> See Password </label>
             <p>By creating an account you agree to our <a href="#" style="color:blue">Terms & Privacy</a> 
             <input type="checkbox" name="terms" ></p>
               
 
               <div class="clearfix ">
               <button type="submit" class="cancelbtn"> Cancel </button> 
               <button type="submit" class="submitbtn" name = "submit"> Continue </button> 
               
               </div>
               
               <?php 

            if(isset($_GET["error"])){

                if($_GET["error"]=="emptyinput"){
                    echo "<p>Fill in all fields!<p>";
                }
                else if($_GET["error"]=="invaliduid"){
                     echo "<p>Username is invalid!<p>";
                }
                else if($_GET["error"] == "invalidemail"){
                    echo "<p>Email is invalid!<p>";
                }
                else if($_GET["error"] == "passwordsdontmatch"){
                    echo "<p> Passwords dont match!<p>";
                }
                else if($_GET["error"] == "usernametaken"){
                    echo "<p> Username or Email already exists! <p>";
                }
                else if($_GET["error"] == "stmtfailed"){
                    echo "<p> something went wrong try again! <p>";
                }
                else if($_GET["error"] == "acceptterms"){
                    echo "<p> Accept the terms and conditions !<p>";
                }
                else if($_GET["error"] == "none"){
                    echo "<p> You have signed up! <p>";
                }
            }
        ?>   
            </section>
        </div>
    </form>    

<?php } ?>

</div>

<?php include_once 'footer.php'; ?>

<script>
 function passwordVis(){
    let x = document.getElementById("myinput")
    let y = document.getElementById('myinput2')
    if( x.type ==="password" || y.type ==="password"){ x.type = "text"; y.type="text" }
    else{x.type = "password"; y.type = "password"}
    }
</script>