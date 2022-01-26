<?php
include_once 'header.php';
?>


<div class = "sell_container" style="text-align:left;">
    <div class="title"><h1>Add New Auction</h1></div>

    <div class="sale_form">
    <form action="./includes/auction_post.inc.php" method="post" enctype="multipart/form-data">

        <label for="title"> Item Name / Model </label><br>
        <input type="text" id="title" name="title" placeholder="Item name" required><br>

        <label for="category"> Category</label><br>
        <select name="category" id="category" style="width: 150px;padding:4px;margin-top:4px">
            <option value="phone">Phone</option>
            <option value="laptop">Laptop</option>
            <option value="pc">PC</option>
        </select>

        <br><br>

        <label for="descrition">Description</label> <br>
        <textarea name="description" id="description" cols="60" rows="3" placeholder="about this item..." style="margin-top:4px;border-radius:1px" required></textarea>
        <br>            
        <div style="margin-top: 4px">
            <div style="float:left; margin-right:5px" >
            <label for="price">Starting Price</label> <br>
            <input type="number" name="price" id="price" placeholder="Price..." min="0" max="50000" step="25" required>
            </div>
            <div>
            <label for="buynow">Buy It Now</label><br>
            <input type="number" name="buynow" id="buynow" min="0" max="50000" step="25" placeholder="buy now price..." > 
            </div>
        </div>
        <br>
        <br>
        <label for="end_date"> Auction end Date</label><br>
        <input type="date" name="date" id="end_date" required>
        <p id="time"></p>
        <script>
            function timeFunction(){
                var x = document.getElementById("end_date").value;
                document.getElementById("time").innerHTML = x;
            }
        </script>

        <label for="image">Product Image </label><br>
        <input type="file" name="image" id="image" placeholder='image file' style="border:solid 1px #ddd; padding:4px">

        <br><br>


        <input type="submit" value="Post" name="post" class="post_item">
    </form>

    </div>

</div>



<?php
include_once 'footer.php';
?>