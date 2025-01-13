<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
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
        <div id="cartcontent"> 
            <h1>Cart</h1>
            <table id="cartproduct">
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price (RM)</th>
                    <th>Quantity</th>
                    <th>Cancel</th>
                </tr>
                    
                <?php
                    if (isset($_SESSION["cart_id"])){
                        include("conn.php");
                        $sql1="SELECT * FROM cart_product AS cp
                        INNER JOIN product AS p ON cp.Product_ID = p.Product_ID
                        WHERE cp.Cart_ID = '$_SESSION[cart_id]'";
                        $cart=mysqli_query($conn, $sql1);
                        $totalprice=0;
                        while ($result=mysqli_fetch_assoc($cart)) {
                            echo "<tr>
                                    <td><image src=\"products/$result[Product_Image]\" width=100px height=100px></td>
                                    <td>$result[Product_Name]</td>
                                    <td>".$result['Price(RM)']."</td>
                                    <td>$result[Quantity]</td>
                                    <td><a href=\"deletecartitem.php?Product_ID=$result[Product_ID]\">Cancel</a></td>
                                </tr>";
                            $totalprice+=$result["Price(RM)"]*$result["Quantity"];
                        }
                    }
                    else {
                        echo "<script>alert('Your cart is empty!');</script>";
                        echo "<script>window.location.href='index.php';</script>";
                    }
                ?>
            </table>
            <h2>Total Price = RM <?php echo sprintf('%0.2f', $totalprice) ?></h2>
            <a href="index.php"><button id="cancel">Cancel</button></a>
            <a href="checkout.php"><button id="checkout">Check Out</button></a>
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