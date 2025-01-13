<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <link href = "css/admin.css" rel = "stylesheet">
    </head>
    <style>
        #side_nav {
            height: 680px;
        }
    </style>


    <body>
        <?php
            session_start();
            if (!isset($_SESSION["admin_name"])){
                echo "<script>window.location.href= \"admin_login.php\";</script>";
            }
        ?>
        <div class="panelheader">
            <div id="logo">
                PetParadise
                <a href="adminlogout.php"><button id="adminlogout">Logout</button></a>
            </div>
        </div>
        <div class="container">
            <div id="side_nav">
                <ul>
                    <li><a class="active" href="admin_panel.php">Home</a></li>
                    <li><a href="manage_product.php">Product</a></li>
                    <li><a href="view_order.php">Order</a></li>
                    <li><a href="view_member.php">Member</a></li>
                </ul>
            </div>
            <div id="admincontent">
                <?php
                    $admin=$_SESSION["admin_name"]
                ?>
                <h1>Welcome to admin panel, <?php echo "$admin"?>!</h1>
                <h2><u>Available Functionalities</u></h2>
                <div class="functionalities">
                    <a href="manage_product.php"><image class="icon" src="images/manageproducticon.png"><br>Manage Product</a>
                    <a href="view_order.php"><image class="icon" src="images/viewordericon.png"><br>View Order</a>
                    <a href="view_member.php"><image class="icon" src="images/viewmembericon.png"><br>View Member</a>
                </div>
            </div>
        </div>
    </body>
</html>