<?php 
session_start();
include("conn.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

    $sql="SELECT User_ID FROM user WHERE User_Name='$username' and Password='$password'";

    if($result=mysqli_query($conn,$sql)) {
        $rowcount=mysqli_num_rows($result);
    }

    while($row = mysqli_fetch_array($result)) {
        $id = $row['User_ID'];
    }

    if($rowcount==1) {
        $_SESSION['username']=$username;
        $_SESSION['user_id']=$id;
        echo "<script>alert('Login Successful!');</script>";
        echo "<script>window.location.href='index.php';</script>";

    }
    else {
        echo "<script>alert('Your Login Name or Password is invalid. Please try again');</script>";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Login Page </title>
        <link href="css/customer.css" rel="stylesheet">
    </head>
    <body id = "logbody">
        <div class="header">
            <div id="logo">
                PetParadise
                <a href="cart.php"><button id="cart"><image src="images/cart-outline.svg"></image></button></a>
            </div>
            <div id="navbar">
                <nav>
                    <a href="index.php">Home</a>
                    <a href="category(food).php?petcategory=Dog">Dog</a>
                    <a href="category(food).php?petcategory=Cat">Cat</a>
                    <a href="category(food).php?petcategory=Small Animal">Small Animal</a>
                    <a href="category(food).php?petcategory=Aquatic">Aquatic</a>           
                    <?php
                    if (isset($_SESSION["username"])) {
                            echo "<a class=\"loginsignup\" href=\"logout.php\">Logout</a>";
                            echo "<a class=\"loginsignup\" href=\"account.php\">My Account</a>";
                    }
                    else{
                        echo "<a class=\"loginsignup\" href=\"login.php\">Login</a>";
                        echo "<a class=\"loginsignup\" href=\"signup.php\">Sign up</a>";
                    }
                    ?>
                </nav>
            </div>
        </div>        
        <div class = "loginbox">
            <form method = "post">
                <div id = "logleft">
                    <h2 class = "lsfont">Log In</h2><br><br>
                    <img src = "images/loginpic.jpg" class = "image" alt = "Login Image"><br>
                    <div id = "goregist">
                        Haven't register yet? <a href="signup.php">Click here</a>
                    </div>
                </div>
                <div id = "logright">
                    <lable class = "label">Username: </lable><br>
                    <input class = "input" type = "text" name = "username" required = "required" maxlength = "30" size = "25"><br><br><br>
                    <lable class = "label">Password: </lable><br>
                    <input class = "input" type = "password" name = "password" required = "required" maxlength = "30" size = "25"><br><br><br>
                    <button class = "logbutt" type = "submit" name = "submitBtn">Log In</button>
                </div>
            </form>
        </div>
        <div class="footer">
            <div id="aboutus">
                <h1>About Us</h1>
                <p>
                    The main purpose of PetParadise is to sell and offer the food , 
                    treats and other supplies to the pets in Malaysia.  PetParadise is also 
                    aimed to help the pet parents to get the pet supplies easier during this 
                    Covid-19 pandemic by providing the delivery service.
                </p>
            </div>
            <div id="contactmethod">
                <h1>Contact Method</h1>
                <p>
                    Address: <br>
                    No. 37, Jalan Kartunis U1/47
                    Temasya Industrial Park , Glenmarie
                    40150 Shah Alam
                    Selangor D.E. , Malaysia<br>
                    Tel: +60165423698<br>
                    E-mail: online@petparadise.com.my
                </p>
            </div>
        </div>
    </body>
</html>
