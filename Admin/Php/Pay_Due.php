<?php 
    require("../../Php-Connection.php");
    $userID=$_GET['userId'];
    $dueId=$_GET['dueId'];
    $deleteQuery = mysqli_query($conn, "UPDATE `due_user_flat` SET `is_paid`='1',`pay_date`= now() WHERE userId = '$userID' AND dueId = '$dueId' ");
    header('location: ../Transaction-Admin.php');  
?>