<!DOCTYPE html>
<html>
    <head>
        <link href = "css/admin.css" rel = "stylesheet" type = "text/css">
        <title>View Order</title>
        <style>
            #side_nav {
                height: 680px;
            }
        </style>
    </head>
    <body>
        <div class="panelheader">
            <div id="logo">
                PetParadise
                <a href="adminlogout.php"><button id="adminlogout">Logout</button></a>
            </div>
        </div>
        <div class="container">
            
            <div id="side_nav">
                <ul>
                    <li><a href="admin_panel.php">Home</a></li>
                    <li><a href="manage_product.php">Product</a></li>
                    <li><a class="active" href="view_order.php">Order</a></li>
                    <li><a href="view_member.php">Member</a></li>
                </ul>
            </div>
                
            <div id = "view_order">
                <h1 class = "title">View Order</h1>
                <?php
                    include("conn.php");
                    $result = mysqli_query($conn,
                    "SELECT * FROM `order` INNER JOIN `cart` 
                    ON `order`.`Cart_ID` = `cart`.`Cart_ID`
                    INNER JOIN `user`
                    ON `cart`.`User_ID` = `user`.`User_ID`
                    INNER JOIN `cart_product`
                    ON `cart`.`Cart_ID` = `cart_product`.`Cart_ID`
                    INNER JOIN `product`
                    ON `cart_product`.`Product_ID` = `product`.`Product_ID`")
                ?>
        
                <div>
                    <table id = "order_table">
                        <tr>
                            <th>Order ID</th>
                            <th>Cart ID</th>
                            <th>Member Name</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Order Date</th>
                        </tr>
                        <?php
                            while($row=mysqli_fetch_array($result)){
                                echo "<tr>";
                                echo "<td>";
                                echo $row['Order_ID'];
                                echo "</td>";
                                echo "<td>";
                                echo $row['Cart_ID'];
                                echo "</td>";
                                echo "<td>";
                                echo $row['User_Name'];
                                echo "</td>";
                                echo "<td>";
                                echo $row['Product_Name'];
                                echo "</td>";
                                echo "<td>";
                                echo $row['Quantity'];
                                echo "</td>";
                                echo "<td>";
                                echo sprintf('%0.2f', $row['Quantity']*$row['Price(RM)']); 
                                echo "</td>";
                                echo "<td>";
                                echo $row['Order_Date'];
                                echo "</td>";
                                echo "</tr>";
                            }
                            mysqli_close($conn);
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>