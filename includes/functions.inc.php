<?php  /* source = https://www.youtube.com/watch?v=gCo6JqGMi30  */ 

        /* SIGNUP SCRIPTS*/ 
        
function emptyInputSignup($user,$fname,$address,$email,$pwd,$pwdRepeat){
    $result;
    if(empty($user) || empty($fname)|| empty($address) || empty($email) || empty($pwd) || empty($pwdRepeat)){
        $result = true; // si les champs sont vides return true
    }
    else
    {
        $result = false;
    }
    return $result;
}

function invalidUsername($user){

    $result;
    
    if(!preg_match("/^[a-zA-Z0-9]*$/", $user)){

        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}


function invalidEmail($email){
    $result;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd,$pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){
        
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function uidExists($conn,$user,$email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;"; // verifies if they exist in php database
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmterror");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"ss",$user,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;

    }
    else {

        $result=false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function adminExists($conn,$user,$email){  // checks for admin in database
    $sql = "SELECT * FROM myAdmin WHERE adminUid = ? OR adminEmail = ?;"; // verifies if they exist in php database
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmterror");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"ss",$user,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;

    }
    else {

        $result=false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn,$user,$fname,$address,$email,$pwd,$acctype){
    $sql = "INSERT INTO users (usersUid,usersName,usersEmail,usersPwd,usersAddress,usersAcctype) VALUES (?,?,?,?,?,?);"; // inserts user in php database 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssssss",$user,$fname,$email,$hashedPwd,$address,$acctype);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function addUser($conn,$user,$fname,$address,$email,$pwd){ //user added by admin
    $sql = "INSERT INTO users (usersUid,usersName,usersEmail,usersPwd,usersAddress,usersAcctype) VALUES (?,?,?,?,?,?);"; // inserts user in php database 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    $seller = 'seller';
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssssss",$user,$fname,$email,$hashedPwd,$address,$seller);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../information.php?error=none");
    exit();
}

function checkedTerms($terms){

    $result;

    if(empty($terms))
    {   
        $result = true;
    }
    else{

        $result = false;
    }

    return $result;
}

/* Login SCRIPTS */ 

function emptyInputlogin($user,$pwd){
    $result;
    if(empty($user)  || empty($pwd))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn,$user,$pwd){

    $uidExists = uidExists($conn,$user,$user);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if($checkPwd === false ){
        header("location: ../login.php?error=wrongpassword");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["username"] = $uidExists["usersName"];
        $_SESSION["useremail"] = $uidExists["usersEmail"];
        $_SESSION["useraddr"] = $uidExists["usersAddress"];
        $_SESSION["usertype"] = $uidExists["usersAcctype"];
        header("location: ../index.php");
        exit();
    }
}

function loginAdmin($conn,$user,$pwd){

    $adminExists = adminExists($conn,$user,$user);

    if($adminExists === false){
        header("location: ../adminlog.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $adminExists["adminPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    // if($checkPwd === false ){
    //     header("location: ../adminlog.php?error=wrongpassword");
    //     exit();
    // }
    // else if($checkPwd === true){
        session_start();
        $_SESSION["adminid"] = $adminExists["adminId"];
        $_SESSION["adminuid"] = $adminExists["adminUid"];
        $_SESSION["username"] = $uidExists["usersName"];
        $_SESSION["useremail"] = $uidExists["usersEmail"];
        $_SESSION["usertype"] = $uidExists["usersAcctype"];
        $_SESSION["useraddr"] = $uidExists["usersAddress"];
        header("location: ../index.php");
        exit();
    // }
}

/* Add a users Payment Card function */

function addCard($cType,$cName,$cNum,$expmonth,$expyear,$cvv){

    $sql = "INSERT INTO users (usersUid,usersName,usersEmail,usersPwd,usersAddress,usersAcctype) VALUES (?,?,?,?,?,?);"; // inserts user in php database 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssssss",$user,$fname,$email,$hashedPwd,$address,$acctype);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();

}

//Function for seller to create a new post 

function addSale($conn,$name,$image,$price,$buynow,$about,$category,$end_date,$username){

    //$sql ="INSERT INTO auctions (aName,aImage,aPrice,aAbout,aCategory) VALUES (?,?,?,?,?);";
    $sql ="INSERT INTO auctions (aName,aImage,aPrice,aBuyNow,aAbout,aEnd_date,aCategory,aUser) VALUES (?,?,?,?,?,?,?,?);";
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../add_auction.php?error=stmtaddfailed");
        exit();
    }

    if(isset($_SESSION["adminuid"])){
        mysqli_stmt_bind_param($stmt,"ssiissss",$name,$image,$price,$buynow,$about,$end_date,$category,$_SESSION["adminuid"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../auctions.php?uploadsuccessful");
    }
    else{
        mysqli_stmt_bind_param($stmt,"ssiissss",$name,$image,$price,$buynow,$about,$end_date,$category,$username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../auctions.php?uploadsuccessful");
    }
   

    exit();

}


function addpayment($conn,$fname, $bilAddress,$bilCity,$bilPostal, $cType,$cardname,$cardnumber,$expmonth,$expyear,$cvv){

    $sql ="INSERT INTO payment (fName,billingAdress,billingCity,billingZip,cType,Cname,Cnumb,expMonth,expYear,CVV) 
            VALUES (?,?,?,?,?,?,?,?,?,?);";
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../payment.php?error=stmtaddfailed");
        exit();
    }

        mysqli_stmt_bind_param($stmt,"ssssssssss",$fname,$bilAddress,$bilCity,$bilPostal,$cType,
                                $cardname,$cardnumber,$expmonth,$expyear,$cvv);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../profile.php?successfullBuy");
        exit();

}

function edititem($conn,$name,$buynow,$price,$end_date,$about,$category,$editid){

    $sql2 = "UPDATE `auctions` SET `aName` = '$name', `aPrice`='$price', `aBuyNow`='$buynow', `aAbout`='$about',`aCategory`='$category',`aEnd_date`='$end_date' WHERE `auctionId` = '$editid';";
    
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql2)){
        
            //echo "Error updating record: " . $conn->error;
            header("location: ../my_auctions.php?error=stmterror");
            exit();
    }
        $resultData = mysqli_query($conn,$sql2);
         if($resultData){
            header("location: ../my_auctions.php?succesfullyeditedrow");// redirects to all records page
            mysqli_stmt_close($stmt); // Close connection
            exit();	
        }
        else{
                header("location: ../my_auctions.php?error=didntedit");
        }
        
}


function addProduct($conn,$itemname,$image,$quantity,$buynow,$about,$user,$id){

    $sql= "INSERT INTO products (`aName`,`aImage`,`aQuantity`,`aBuyNow`,`aAbout`,`aUser`) VALUES (?,?,?,?,?,?);";
    //$sql = "INSERT INTO auctions (aName,aImage) VALUES (?,?);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../myOrders.php?stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ssssss",$itemname,$image,$quantity,$buynow,$about,$user);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../myOrders.php?successadded&id=$id");
}