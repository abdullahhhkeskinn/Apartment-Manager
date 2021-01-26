<?php 
    require("../../Php-Connection.php");
    $userID=$_GET['userId'];
    $expenseId=$_GET['expenseId'];
    $deleteQuery = mysqli_query($conn, "UPDATE `expense_user_flat` SET `is_paid`='1',`pay_date`= now() WHERE userId = '$userID' AND expenseId = '$expenseId' ");
    header('location: ../Transaction-Admin.php');  
?>