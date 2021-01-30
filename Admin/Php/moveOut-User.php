<?php
    require("../../Php-Connection.php");

    $userId=$_GET['userId'];
    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM due_user_flat WHERE userId = '$userId' AND is_paid = 0"))){
        echo "<script type='text/javascript'>alert('This User Has Unpaid Dues');</script>";
        echo("<script>window.location ='../List-Admin.php';</script>");
    }else{
        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM expense_user_flat WHERE userId = '$userId' AND is_paid = 0"))){
            echo "<script type='text/javascript'>alert('This User Has Unpaid Expenses');</script>";
            echo("<script>window.location ='../List-Admin.php';</script>");
        }else{
            if(mysqli_query($conn, "UPDATE users SET isMoved = 1 , moveOutDate = CURRENT_DATE() WHERE userId = '$userId' ")){
                    header("location: ../List-Admin.php");
            }
        }
    }    
?>
