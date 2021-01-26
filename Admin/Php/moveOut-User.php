<?php
    require("../../Php-Connection.php");

    $userId=$_GET['userId'];
    if(mysqli_query($conn, "UPDATE users SET isMoved = 1 , moveOutDate = CURRENT_DATE() WHERE userId = '$userId' ")){
        header("location: ../List-Admin.php");
    }
    echo date('Y-m-d');
?>
