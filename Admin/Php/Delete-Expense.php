<?php
    require("../../Php-Connection.php");
    
    $expenseId=$_GET['expenseId'];
    $deleteQuery = mysqli_query($conn, "DELETE FROM expenses WHERE expenseId = '$expenseId' ");
    $date = date('Y-m-d');
    header("location: ../Transaction-Admin.php?currentDate=$date"); ?>