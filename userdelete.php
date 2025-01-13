<?php
	include ("conn.php");
		
	$userid = intval($_GET['user_id']);
	
	$sql = "DELETE FROM user WHERE User_ID = $userid". 
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_query($conn, $sql)) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}
	mysqli_close($conn);
	header('Location: view_member.php');
?>
	