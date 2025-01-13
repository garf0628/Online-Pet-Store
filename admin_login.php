<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link href = "css/admin.css" rel = "stylesheet">
    </head>
    <body id="adminloginbg">
        <div class="adminlogin">
            <h1><center>Admin Login</center></h1>
            <form id="adminloginform" method="post">
                <div class="input_field">
                    <label>Username</label><br>
                    <input type="text" id="admin_name" name="admin_name" placeholder="Enter your username" required = "required">    
                </div> 
                <div class="input_field">
                    <label>Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required = "required"> 
                </div>
                <input type="submit" id ="login" name="login" value="Login">
            </form>
        </div>
    </body>
</html>

<?php
    include ("conn.php");
    if (isset($_POST["login"])){
        $sql="SELECT * FROM admin WHERE Admin_Name='$_POST[admin_name]' AND Password='$_POST[password]'";
        $result=mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result)==1){
            session_start();
            $row=mysqli_fetch_assoc($result);
            $_SESSION["admin_name"]=$row["Admin_Name"];
            echo "<script>alert(\"Login Successful!\");
                 window.location.href= \"admin_panel.php\";
                 </script>";
        } 
        else {
            echo "<script>alert(\"Wrong username or password\")</script>";
        }
        mysqli_close($conn);
    }
?>