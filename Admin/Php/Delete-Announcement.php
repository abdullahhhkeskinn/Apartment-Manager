<?php
    require("../../Php-Connection.php");

    $userID=$_GET['announceId'];
    $deleteQuery = mysqli_query($conn, "DELETE FROM announcement WHERE id = '$userID'");
    header('location: ../Home-Admin.php');  
?>