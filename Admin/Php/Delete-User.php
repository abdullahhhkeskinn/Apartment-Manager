<?php
    require("../../Php-Connection.php");

    $userID=$_GET['userId'];
    $deleteQuery = mysqli_query($conn, "DELETE FROM users WHERE userId = '$userID'");
    header('location: ../List-Admin.php');  
?>
