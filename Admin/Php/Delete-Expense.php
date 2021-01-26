<?php
    require("../../Php-Connection.php");

    $expenseId=$_GET['expenseId'];
    $deleteQuery = mysqli_query($conn, "DELETE FROM expenses WHERE expenseId = '$expenseId' ");
    header("location: ../Transaction-Admin.php");  
?>