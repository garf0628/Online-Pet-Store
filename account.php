<!DOCTYPE html>
<html>
    <head>
        <title>Personal Details</title>
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
		<div class="myaccount">
			<div>
				<h1><center><u>Personal Details</u></center></h1>
			</div>
			<div id="viewdetail">
				<?php
					include("conn.php");
					$memberid=$_SESSION["user_id"];
					$sql="Select * from user Where User_ID =$memberid";
					$member=mysqli_query($conn, $sql);
					$show=mysqli_fetch_assoc($member);
				?>
				<strong>Name:</strong><br>
				<?php echo $show["User_Name"]?>
				<br>
				<strong>Date of Birth:</strong><br>
				<?php echo $show["Date_of_Birth"]?>
				<br>
				<strong>Contact Number:</strong><br>
				<?php echo $show["Contact_Number"]?>
				<br>
				<strong>E-mail:</strong><br>
				<?php echo $show["E-mail_Address"]?>
				<br>
				<strong>Address:</strong><br>
				<?php echo $show["Address"]?>
				<br>
				<a href="index.php"><button>Back</button></a>
				<a href="editprofile.php"><button>Edit</button></a>
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