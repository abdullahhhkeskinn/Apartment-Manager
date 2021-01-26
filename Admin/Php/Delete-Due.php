<?php
    require("../../Php-Connection.php");

    $dueId=$_GET['dueId'];
    $deleteQuery = mysqli_query($conn, "DELETE FROM dues WHERE dueId = '$dueId' ");
    header("location: ../Transaction-Admin.php");  
?>
