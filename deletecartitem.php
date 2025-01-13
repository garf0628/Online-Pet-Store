<?php
    include("conn.php");
    session_start();
    $product_id = intval($_GET["Product_ID"]);

    $result = mysqli_query($conn,"DELETE FROM cart_product WHERE Cart_ID = '$_SESSION[cart_id]' AND Product_ID = $product_id ");

    mysqli_close($conn);
    echo "<script>window.location.href='cart.php';</script>";

?>

