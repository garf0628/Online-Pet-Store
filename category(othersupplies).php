<!DOCTYPE html>
<html>
    <head>
        <title>Category</title>
        <link href="css/customer.css" rel="stylesheet">
    </head>
    <body>
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
        <div class="container">
            <div id="categoryside_nav">
                <b>Select Category</b>
                <ul>
                    <?php $category=$_GET["petcategory"];?>
                    <li id="listcategory"><b>Category</b></li>
                    <li><a href="category(food).php?petcategory=<?php echo $category?>">Food</a></li>
                    <li><a href="category(treats).php?petcategory=<?php echo $category?>">Treats</a></li>
                    <li><a class="active" href="category(othersupplies).php?petcategory=<?php echo $category?>">Other Supplies</a></li>
                </ul>
            </div>
            <div id="categorycontent">
                <?php
                    include("conn.php");
                    $result=mysqli_query($conn, "SELECT * FROM product WHERE Pet_Category='$category' AND Type='Other Supplies'");
                    while($row=mysqli_fetch_array($result)){
                       $product='<div class="products">
                       <a href="product.php?productid='.$row["Product_ID"].'"><image src="products/'.$row["Product_Image"].'" width=200px height=200px>
                       <h3>'.$row["Product_Name"].'</h3></a>
                       <h4>RM '.$row["Price(RM)"].'</h4>
                       </div>';

                       echo $product;

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