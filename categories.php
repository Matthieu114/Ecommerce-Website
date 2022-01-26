<?php
include_once 'header.php';
?>
<div style="margin-top:70px">
<h1 id="cat_h1" >Take a look at all our products</h1>
</div>
<div class="cat-body" style="margin-top:100px" class="body">

    <div class="cat-grid">    
        <div><a href="cat_phones.php" style = "color : black"><img src="./images/smartphone.png" alt="smartphone"> <br> Newest Phones</a></div>
        <div><a href="cat_pc.php" style = "color : black" ><img src="./images/pc.png" alt="pc"> <br>Newest PC's</a> </div>
        <div><a href="cat_laptop.php" style = "color : black"><img src="./images/laptop.png" alt="laptop"><br> Newest Laptops</a> </div>
    </div>


    <!--<h4 style="text-align:center"> Your Market offers the lastest and best products available today</h4> -->

    <div class="slideshow-container">  <!-- source https://www.w3schools.com/howto/howto_js_slideshow.asp -->
                <!-- Full-width images with number and caption text -->
               
                <?php
                require_once 'includes/dbh.inc.php';
                        $sql = "SELECT * FROM carousel;"; // verifies if they exist in php database
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                                header("location: ../index.php?error=stmterror");
                                exit();
                        }
                        
                        $resultData = mysqli_query($conn,$sql);

                        if(mysqli_num_rows($resultData)>0){
                             while($row = mysqli_fetch_assoc($resultData)){                
                ?>
                <div class="mySlides fade">
                    <img src="./carousel_pics/<?php echo $row['cImage'];?>" style="width:100%;">
                    <div class="text"><p style="color:white;"><?php echo $row['cId'];?> </p></div>
                </div>

                <?php          }
                        }
                        else{
                                echo '</p>There is a problem with the carousel images<p>';  
                        }       mysqli_stmt_close($stmt);   
                ?>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a> <!-- &#10094; est le html pour une fleche pointant vers la gauche -->
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
                <br>
</div>



<script>

    var slideIndex = 1;
    autoSlides();
    showSlides(slideIndex);


    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function autoSlides(){
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1} 
        slides[slideIndex-1].style.display = "block"; 
        setTimeout(autoSlides, 5000);
    }

    function showSlides(n) {
    var i;

    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");

    if (n > slides.length) {slideIndex = 1} 
    if (n < 1) {slideIndex = slides.length}

    for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; 
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block"; 
    dots[slideIndex-1].className += " active";
    }

 </script> 


<?php
include_once 'footer.php';
?>