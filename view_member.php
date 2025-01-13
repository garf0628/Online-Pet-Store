<!DOCTYPE html> 
<html>
	<head>
		<title>View Detail</title>
		<link href = "css/admin.css" rel = "stylesheet">
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
                    <li><a href="view_order.php">Order</a></li>
                    <li><a class="active" href="view_member.php">Member</a></li>
                </ul>
            </div>
			<div id="view_member"> 
				<h1 class = "title">View Member Details</h1>	
				<div>
					<table id="member_table">
						<tr>
							<th scope="col">User ID</th>
							<th scope="col">User Name</th>
							<th scope="col">Date of Birth</th>
							<th scope="col">E-mail</th>
							<th scope="col">Contact Number</th>
							<th scope="col">Address</th>
							<th scope="col">Delete</th>
						</tr>
					<?php 
						include("conn.php");
						$user="SELECT * FROM user";
						$result=mysqli_query($conn,$user);
						while ($row=mysqli_fetch_assoc($result)) {
				
							echo"<tr>	
									<td>$row[User_ID]</td>
									<td>$row[User_Name]</td>
									<td>$row[Date_of_Birth]</td>
									<td>".$row['E-mail_Address']."</td>
									<td>$row[Contact_Number]</td>
									<td>$row[Address]</td>	
									<td><a href='userdelete.php?user_id=$row[User_ID]'>Delete</a></td>
								</tr>";	
						};
					?>
					</table>
				</div>
			</div>
		</div>	
	</body>
</html>	