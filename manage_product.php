<!DOCTYPE html>
<html>
<head>
    <link href = "css/admin.css" rel = "stylesheet">
    <title> Manage Product </title>
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
                <li><a class="active" href="manage_product.php">Product</a></li>
                <li><a href="view_order.php">Order</a></li>
                <li><a href="view_member.php">Member</a></li>
            </ul>
        </div>
        <div id="admincontent">
            <div>
                <div>
                    <h2 class = "title">Manage Product</h2>
                </div>
                <div>
                    <form method="post" class = "style">
                        <input class = "searchbar" type="text" name="search_key" placeholder = "Enter Product Name"> 
                        <button class = "searchbutt" name="searchBtn" type="submit">Search</button>
                        <button id = "add_button" name="addproduct">Add Product</button>
                    </form>
                    <?php
                        if (isset($_POST["addproduct"])){
                            echo "<script>window.location.href='add_product.php';</script>";
                        }
                    ?>
                </div>
            </div>
            <?php
                include("conn.php");

                $search_key = "";

                if(isset($_POST['searchBtn'])){
                    $search_key = $_POST['search_key'];
                }
            
                $result=mysqli_query($conn,"SELECT * FROM product WHERE Product_Name LIKE '%$search_key%' ORDER BY Product_Name");
            ?>
            <div>
                <?php
                    while($row = mysqli_fetch_array($result)) {
                        $product_image = $row['Product_Image'];
        
                    
                        $product = '<center><div id = "product_box">
        
                        <div id = "product_left">
                            <img id = "product_image" src = "products/'.$product_image.'">
                        </div>
                        <div id = "product-detail">
                            <div class = "overflow">
                                <div>
                                    <div class = "product-label">Name        : </div>
                                    <div class = "productDetail">'.$row['Product_Name'].'</div><br>
                                    <div class = "product-label">Description : </div>
                                    <div class = "productDetail">'.$row['Description'].'</div><br>
                                </div>
                                <div id = "detail_bottom">
                                    <div class = "detail_left">
                                        <div class = "product-label">Type       : </div>
                                        <div class = "productDetail">'.$row['Type'].'</div><br>
                                        <div class = "product-label">Stock       : </div>
                                        <div class = "productDetail">'.$row['Inventory'].'</div>
                                    </div>
                                    <div class = "detail_right">
                                        <div class = "product-label">Category    : </div>
                                        <div class = "productDetail">'.$row['Pet_Category'].'</div><br>
                                        <div class = "product-label">Price       : </div>
                                        <div class = "productDetail">RM '.$row['Price(RM)'].'</div><br>
                                    </div>
                                </div>
                            </div><br><br>
                            <div id = "buttons">
                                <a class = "delete" onclick="return confirm(\'Delete '.$row['Product_Name'].' record?\');" href = "delete.php?id='.$row['Product_ID'].'">Delete</a>
                                <a class = "edit" href="edit_product.php?id='.$row['Product_ID'].'">Edit</a><br>
                            </div>
                        </div>
        
                        </div></center>';

                        echo $product;

                        }
                        mysqli_close($conn);
                ?>      
            </div>
        </div>
    </div>
</body>
</html>