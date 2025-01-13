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
            <div class="manageproductbox">
                <div>
                    <h1><center><u>Add Product</u></center></h1>
                </div>
                <div id="manageproduct">
                    <form method="post" enctype="multipart/form-data">
                        <lable><strong>Product Name:</strong></lable><br>
                        <input class="managedetails" type="text"  name="productname">
                        <br>
                        <lable><strong>Pet Category:</strong></lable><br>
                        <select class="managedetails" name="petcategory">
                            <option value="">Select Category</option>
                            <option value="Dog">Dog</option>
                            <option value="Cat">Cat</option>
                            <option value="Small Animal">Small Animal</option>
                            <option value="Aquatic">Aquatic</option>
                        </select>
                        <br>
                        <lable><strong>Type:</strong></lable><br>
                        <select class="managedetails" name="type">
                            <option value="">Select Type</option>
                            <option value="Food">Food</option>
                            <option value="Treats">Treats</option>
                            <option value="Other Supplies">Other Supplies</option>
                        </select>
                        <br>
                        <lable><strong>Price (RM)</strong></lable><br>
                        <input class="managedetails" name="price" type="number" min="0.00" max="10000.00" step="0.01">
                        <br>
                        <lable><strong>Description:</strong></lable><br>
                        <textarea id="descriptionfield" name="description"></textarea>
                        <br>
                        <lable><strong>Inventory:</strong></lable><br>
                        <input class="managedetails" name="inventory" type="number" min="1"> 
                        <br>
                        <lable><strong>Product Image:</strong></lable><br>
                        <input class="managedetails" type="file" name="productimage">
                        <br>
                        <button name="back">Back</button>
                        <input type="submit" id="save" name="save" value="Save">
                    </form>
                    <?php
                        if (isset($_POST["save"])){
                            include("conn.php");
                            $path="products/".basename($_FILES['productimage']['name']);
                            $image=$_FILES['productimage']['name'];
                            $price=sprintf('%0.2f', $_POST["price"]);
                            $sql="INSERT INTO product (`Product_Name`, `Pet_Category`, `Type`, `Price(RM)`, `Description`, `Inventory`, `Product_Image`)
                            VALUES ('$_POST[productname]', '$_POST[petcategory]', '$_POST[type]', $price, '$_POST[description]', $_POST[inventory], '$image')";
                            if (!mysqli_query($conn,$sql)){
                                die('Error on Pic: ' . mysqli_error($conn));
                            }

                            move_uploaded_file($_FILES['productimage']['tmp_name'], $path);
                            echo "<script>alert('One product has been added!');</script>";

                        }

                        if (isset($_POST["back"])){
                            echo "<script>window.location.href='manage_product.php';</script>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>