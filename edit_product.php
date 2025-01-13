<!DOCTYPE html> 
<html>
	<head>
		<title>Edit Product</title>
        <link href = "css/admin.css" rel = "stylesheet">
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
						<h1><center><u>Edit Product</u></center></h1>
					</div>
					<?php
						include("conn.php");
						$id = intval($_GET['id']);
						$result = mysqli_query($conn,"SELECT * FROM product WHERE Product_ID=$id");
						while($row = mysqli_fetch_array($result))
						{
					?>

					<div id="manageproduct">
						<form method="post" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $row['Product_ID'] ?>">
							<lable><strong>Product Name :</strong></lable><br>
							<input class="managedetails" type="text" value = "<?php echo $row["Product_Name"] ?>" name="product_name" required = "required">
							<br>
							<lable><strong>Pet Category :</strong></lable><br>
							<select class="managedetails" name="category" required = "required">
								<option value="">Select Category</option>
								<option
								<?php
									if ($row["Pet_Category"]=="Dog"){
										echo 'selected="selected"';
									}
								?>
								value="Dog">Dog</option>
								
								<option
								<?php
									if ($row["Pet_Category"]=="Cat"){
										echo 'selected="selected"';
									}
								?>
								value="Cat">Cat</option>
								
								<option
								<?php
									if ($row["Pet_Category"]=="Small Animal"){
										echo 'selected="selected"';
									}
								?>
								value="Small Animal">Small Animal</option>
								
								<option
								<?php
									if ($row["Pet_Category"]=="Aquatic"){
										echo 'selected="selected"';
									}
								?>
								value="Aquatic">Aquatic</option>
							</select>
							<br>
							<lable><strong>Type :</strong></lable><br>
							<select class="managedetails" name="type" required = "required">
							<option value="">Select Type</option>
								<option
								<?php
									if ($row["Type"]=="Food"){
										echo 'selected="selected"';
									}
								?>
								value="Food">Food</option>
								
								<option
								<?php
									if ($row["Type"]=="Treats"){
										echo 'selected="selected"';
									}
								?>
								value="Treats">Treats</option>
								
								<option
								<?php
									if ($row["Type"]=="Other Supplies"){
										echo 'selected="selected"';
									}
								?>
								value="Other Supplies">Other Supplies</option>
							</select>	
							<br>
							<lable><strong>Price(RM) :</strong></lable><br>
							<input class="managedetails" type="number" value = "<?php echo $row["Price(RM)"] ?>" name="product_price" min = "0" step="any" required = "required">
							<br>
							<lable><strong>Description :</strong></lable>
							<textarea id="descriptionfield" name="description"><?php echo $row["Description"] ?></textarea>
							<br>
							<lable><strong>Inventory :</strong></lable><br>
							<input class="managedetails" type="number" value = "<?php echo $row["Inventory"] ?>" name="product_quantity" min = "0" required = "required">
							<br>
							<lable><strong>Product Image :</strong></lable>
							<br>
							<?php 
							$product_image = $row['Product_Image'];
							$pic = '<img src = "products/'.$product_image.'" width=100px height=100px>';
							echo $pic; 
							?>
							<br>
							<input class="managedetails" type="file" value = "<?php echo $row["Product_Image"] ?>" name="product_image" multiple>
							<br>
							<button name="back">Back</button>
							<input type="submit" id="save" name="save" value="Save">
						</form>
					</div>
					<?php
						}
						mysqli_close($conn);
						if(isset($_POST['save'])) {
							include("conn.php");
					
							$sql = "UPDATE `product` SET 
							`Product_Name`='$_POST[product_name]',
							`Type`='$_POST[type]',
							`Pet_Category`='$_POST[category]',
							`Price(RM)`='$_POST[product_price]',
							`Inventory`='$_POST[product_quantity]',
							`Description`='$_POST[description]'
					
							WHERE `Product_ID`=$_POST[id];";
					
							$target_dir = "products/";
							$target_file = $target_dir . basename($_FILES["product_image"]["name"]);
					
							if (move_uploaded_file($_FILES["product_image"]["tmp_name"],$target_file)) 
							{
								$file_name = basename($_FILES["product_image"]["name"]);
								
								$sqls = "UPDATE `product` SET `Product_Image`='$file_name' WHERE `Product_ID`=$_POST[id];";
					
								if (!mysqli_query($conn,$sqls))
								{
									die('Error on Pic: ' . mysqli_error($conn));
								}
							}
							
							if (!mysqli_query($conn,$sql)){
								die('Error: ' . mysqli_error($conn));
							}
							if (mysqli_query($conn, $sql)){
								mysqli_close($conn);
								if ($_FILES["product_image"]["name"]!=""){
									$path="products/$product_image";
									unlink($path);
								}
								echo "<script>alert('Product edited ^^'); window.location.href='manage_product.php';</script>";
							}
					
						}
						if (isset($_POST["back"])){
							echo "<script>window.location.href='manage_product.php';</script>";
						}
					?>
				</div>
			</div>
	</body>
</html>