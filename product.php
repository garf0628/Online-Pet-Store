<!DOCTYPE html>
<html>
    <head>
        <title>Petparadise</title>
        <link href="css/customer.css" rel="stylesheet">
    </head>
    <body>
        <header>
        <div class="header">
        <?php
            session_start();
            if (!isset($_SESSION["user_id"])){
                echo "<script>window.location.href= \"login.php\";</script>";
            }
        ?>
            <div id="logo">
                PetParadise
                <a href="cart.php"><button id="cart"><image src="images/cart-outline.svg"></button></a>
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
        <div class="productbody">
            <div id="productimage">
                <?php
                    include("conn.php");
                    $id=intval($_GET["productid"]);
                    $data=mysqli_query($conn, "SELECT * FROM product WHERE Product_ID=$id");
                    $row=mysqli_fetch_assoc($data);
                   
                ?>
                <image id="product" src="products/<?php echo $row["Product_Image"]?>"></image>
            </div>
            <div id="productdetails">
                <h2><?php echo $row["Product_Name"]?></h2>
                <hr>
                <h2>RM <?php echo $row["Price(RM)"]?></h2>
                <h3>Description</h3>
                <p><?php echo $row["Description"]?></p><br>
                <form method="post">
                    <input type="number" id="quantity" name="quantity" value="1" min="1">
                    <input type="submit" id="addtocart" name="AddtoCart" value="Add to Cart">
                </form>
                
                <?php  
                    if (isset($_POST["AddtoCart"])){
                        
                        $productid=intval($row["Product_ID"]);                        
                        if (isset($_SESSION["cart_id"])) {
                            $sql="INSERT INTO cart_product (Cart_ID, Product_ID, Quantity) VALUES ('$_SESSION[cart_id]', $productid, '$_POST[quantity]')";
                            if (!mysqli_query($conn,$sql)){
                                die('Error: ' . mysqli_error($conn));
                            }
                            echo "<script>alert('The item has been added into cart!');</script>";
                        }
                        else{
                            $sql1="INSERT INTO cart (User_ID) VALUES ('$_SESSION[user_id]')";
                            if (!mysqli_query($conn,$sql1)){
                                die('Error: ' . mysqli_error($conn));
                            }
                            $sql2="SELECT * FROM cart ORDER BY Cart_ID DESC LIMIT 1";
                            $cartdata=mysqli_query($conn,$sql2);
                            $cartrow=mysqli_fetch_assoc($cartdata);
                            $_SESSION["cart_id"]=intval($cartrow["Cart_ID"]);

                            $productid=intval($row["Product_ID"]);
                            $sql3="INSERT INTO cart_product (Cart_ID, Product_ID, Quantity) VALUES ('$_SESSION[cart_id]', $productid, '$_POST[quantity]')";
                            if (!mysqli_query($conn,$sql3)){
                                die('Error: ' . mysqli_error($conn));
                            }
                            echo "<script>alert('The item has been added into cart!');</script>";
                        }
                    }
                ?>
            </div>
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