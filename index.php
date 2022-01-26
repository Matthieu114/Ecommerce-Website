<?php
include_once 'header.php';

?>

    <div class="wrapper2" id="wrapper2"> 
        <section class="index-intro"> 
         <?php   
        if(isset($_SESSION["useruid"])){    
            echo(strftime("<h1 style='font-size:120px;margin:0'>%H:%M</h1>"));
            echo"<h1 style='margin:0'>  Welcome " . $_SESSION["useruid"]." !</h1>";
        }
        else if(isset($_SESSION["adminid"])){
            echo(strftime("<h1 style='font-size:80px'>%H:%M</h1>"));
            echo"<h1 style='margin-bottom:0;'>  Welcome " . $_SESSION["adminuid"]." !</h1>";
        }
        else{ echo(strftime("<h1 style='font-size:80px;'>%H:%M</h1>"));
            echo'<h1 style="margin-bottom:0px;">Welcome to Tech Market</h1>';
        }
        ?>

        <!--  <div style="text-align:center"><h1>Welcome to </h1> <h1 style="color:black"> Tech</h1><h1> Market </h1></div> -->
    
     <?php 
        if(isset($_SESSION["adminuid"])){      
    ?>

            <div class="see-container">
                <a href="profile.php" class="products-button">Edit Website Information</a>
            </div>

    <?php } else{ ?>

            <div class="see-container">
                <a href="auctions.php" class="products-button">Discover Our Products</a>
            </div>
            
    
    <?php  } ?>
    </section>

    </div>

<?php
include_once 'footer.php';
?>