<?php
    if(isset($_POST['submitBtn'])) {
        include("conn.php");
        $sql = "INSERT INTO `user` (`User_Name`, `E-mail_Address`, `Address`, `Contact_Number`, `Date_of_Birth`, `Password`) VALUES ('$_POST[username]','$_POST[email]','$_POST[address]','$_POST[contactNum]','$_POST[DOB]','$_POST[password]')";
    
        if (!mysqli_query($conn,$sql)){
            die('Error: ' . mysqli_error($conn));
        }
        else {
            echo '<script>alert("Successfully registered! Lets login ^w^");
            window.location.href = "login.php";
            </script>';
        }

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link href="css/customer.css" rel="stylesheet">
    </head>
    
    <body id = "registbody">
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
                    session_start();
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
        <form method = "post" enctype = "multipart/form-data">
        
            <div id = "registbox">
            
                <div id = "registright">
                    <h2 id = "registfont">Sign Up</h2><br><br>
                    <img src = "images/registpic3.jpg" id = "registpic" alt = "Register Image"><br><br>
                </div>
            
                <div id = "registLeft">
                
                    <label id = "registlabel">Username: </lable><br>
                    <input id = "registinput" type = "text" name = "username" required = "required" maxlength = "30" size = "25"><br><br>
                    
                    <label id = "registlabel">Email: </lable><br>
                    <input id = "registinput" type = "email" name = "email" required = "required" maxlength = "100" size = "25"><br><br>
                    
                    <label id = "registlabel">Address: </lable><br>
                    <textarea id = "registTA" name = "address" required = "required" maxlength = "200" size = "25"></textarea><br><br>
                    
                    <label id = "registlabel">Contact Number: </lable><br>
                    <input id = "registinput" type = "tel" name = "contactNum" required = "required" maxlength = "30" size = "25"><br><br>
                    
                    <label id = "registlabel">Date of Birth: </lable><br>
                    <input id = "dateinput" type = "date" name = "DOB"><br><br>
                    
                    <label id = "registlabel">Password: </lable><br>
                    <input id = "registinput" type = "password" name = "password" required = "required" maxlength = "30" size = "25"><br><br>
                    
                    <button id = "registbutt" type = "submit" name = "submitBtn">Sign Up</button>
                </div>
            </div>
        </form>
        <div class="footer">
            <div id="aboutus">
                <h1>About Us</h1>
                <p>
                    The main purpose of Petparadise is to sell and offer the food , 
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