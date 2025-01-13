<!DOCTYPE html>
<html>
    <head>
        <title>Petparadise</title>
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
        
        <div class="body">
            <div id="cover">
                <image src="images/image.png" width=100% height=450px>
                <h1>Welcome to PetParadise!</h1>
            </div>
            <div id="content">
                <div class="category">
                    <h3>Dog</h3>
                    <a href="category(food).php?petcategory=Dog"><image class="cimage" src="images/dogfood.png"><center>Food</center></a><br><br>
                    <a href="category(treats).php?petcategory=Dog"><image class="cimage" src="images/dogtreats.png"><center>Treats</center></a><br><br>
                    <a href="category(othersupplies).php?petcategory=Dog"><image class="cimage" src="images/dogsupplies.png"><center>Other Supplies</center></a>
                </div>
                <div class="category">
                    <h3>Cat</h3>
                    <a href="category(food).php?petcategory=Cat"><image class="cimage" src="images/catfood.png"><center>Food</center></a><br><br>
                    <a href="category(treats).php?petcategory=Cat"><image class="cimage" src="images/cattreat.png"><center>Treats</center></a><br><br>
                    <a href="category(othersupplies).php?petcategory=Cat"><image class="cimage" src="images/catsupplies.png"><center>Other Supplies</center></a>
                </div>
                <div class="category">
                    <h3>Small Animal</h3>
                    <a href="category(food).php?petcategory=Small Animal"><image class="cimage" src="images/smallanimalfood.png"><center>Food</center></a><br><br>
                    <a href="category(treats).php?petcategory=Small Animal"><image class="cimage" src="images/smallanimaltreats.png"><center>Treats</center></a><br><br>
                    <a href="category(othersupplies).php?petcategory=Small Animal"><image class="cimage" src="images/smallanimalsupplies.png"><center>Other Supplies</center></a>
                </div>
                <div class="category">
                    <h3>Aquatic</h3>
                    <a href="category(food).php?petcategory=Aquatic"><image class="cimage" src="images/aquaticfood.png"><center>Food</center></a><br><br>
                    <a href="category(treats).php?petcategory=Aquatic"><image class="cimage" src="images/aquatictreats.png"><center>Treats</center></a><br><br>
                    <a href="category(othersupplies).php?petcategory=Aquatic"><image class="cimage" src="images/aquaticsupplies.png"><center>Other Supplies</center></a>
                </div>
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