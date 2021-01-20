<?php
    require("../../Php-Connection.php");

    $userID=$_GET['userId'];
    $deleteQuery = mysqli_query($conn, "UPDATE users SET isMoved = 1 ");
    header("location: ../Update-Admin.php?userId= '$userID'");  
?>
