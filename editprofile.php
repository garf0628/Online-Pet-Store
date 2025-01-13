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
		<div class="editprofile">
			<div>
				<h1><center><u>Edit Details</u></center></h1>
			</div>
			<div id="editdetail">
				<?php
					include("conn.php");
					$memberid=$_SESSION["user_id"];
					$sql="Select * from user Where User_ID =$memberid";
					$member=mysqli_query($conn, $sql);
					$show=mysqli_fetch_assoc($member);
				?>
                <form method="post">
                    <lable><strong>Name:</strong></lable><br>
                    <input class="edit" type="text" value="<?php echo $show["User_Name"]?>" name="name">
                    <br>
                    <lable><strong>Date of Birth:</strong></lable><br>
                    <input class="edit" type="date" name="dob" value="<?php echo $show["Date_of_Birth"]?>">
                    <br>
                    <lable><strong>Contact Number:</strong></lable><br>
                    <input class="edit" type="tel" value="<?php echo $show["Contact_Number"]?>" name="contact_number">
                    <br>
                    <lable><strong>E-mail:</strong></lable><br>
                    <input class="edit" type="email" value="<?php echo $show["E-mail_Address"]?>" name="email_address">
                    <br>
                    <lable><strong>Address:</strong></lable><br>
                    <textarea id="addressfield" name="address"><?php echo $show["Address"]?></textarea>
                    <br>
                    <lable><strong>Old Password:</strong></lable><br>
                    <input class="edit" type="password" id="oldpassword" name="oldpassword" placeholder="Enter your old password">
                    <br>
                    <lable><strong>New Password:</strong></lable><br>
                    <input class="edit" type="password" id="newpassword" name="newpassword" placeholder="Enter your new password">
                    <br>
                    <button name="back">Back</button>
                    <input type="submit" id="save" name="save" value="Save">
                </form>
            
                    <?php
                        if (isset($_POST["save"])){
                            if ($_POST["oldpassword"]==$show["Password"]){
                                $sql="UPDATE user SET `User_Name`='$_POST[name]', `E-mail_Address`='$_POST[email_address]', `Address`='$_POST[address]', `Contact_Number`='$_POST[contact_number]',
                                 `Date_of_Birth`='$_POST[dob]' WHERE `User_ID`=$memberid";
                                if (!mysqli_query($conn,$sql)){
                                    die('Error: ' . mysqli_error($conn));
                                }
                                else {
                                    if ($_POST["newpassword"]!=""){
                                        $passwordsql="UPDATE user SET `Password`='$_POST[newpassword]' WHERE `User_ID`=$memberid";
                                        if (!mysqli_query($conn,$passwordsql)){
                                            die('Error: ' . mysqli_error($conn));
                                        }
                                    }
                                    echo '<script>alert("Successfully!");
                                    window.location.href = "account.php";
                                    </script>';
                                }
                            }
                            else {
                                echo "<script>alert('Your old password is wrong!');</script>";
                            }
                        }
                        if (isset($_POST["back"])){
                            echo "<script>window.location.href='account.php';</script>";
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