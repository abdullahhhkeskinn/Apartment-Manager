<?php
    require("Php-Connection.php");

    $userID=$_GET['userId'];
    $deleteQuery = mysqli_query($conn, "DELETE FROM nonuser WHERE nonUserId = '$userID'");
    header('location: ../List-Admin.php');  
?>
