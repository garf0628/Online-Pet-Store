<?php
    session_start();
    include("conn.php");
    $date=date("Y-m-d");
    echo $date;
    $sql="INSERT INTO `order` (Cart_ID, Order_Date) VALUES ($_SESSION[cart_id] , '$date')";
    if (!mysqli_query($conn,$sql)){
        die('Error: ' . mysqli_error($conn));
    }
    mysqli_close($conn);
    unset($_SESSION["cart_id"]);
    echo "<script>alert('Thank you for your payment!');</script>";
    echo "<script>window.location.href='index.php';</script>";
    
?>