<?php

    include("conn.php");

    $id = intval($_GET['id']);

    $productimage=mysqli_query($conn,"SELECT `Product_Image` FROM product WHERE Product_ID = $id");

    $result = mysqli_query($conn,"DELETE FROM product WHERE Product_ID = $id");

    mysqli_close($conn);

    $image=mysqli_fetch_assoc($productimage);
    $path="products/$image[Product_Image]";
    unlink($path);
    
    header('Location: manage_product.php');
    
?>
