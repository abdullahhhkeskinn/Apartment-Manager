<?php
    require("../../Php-Connection.php");
    $announcementText=$_POST['textArea'];
    $addAnnouncement = mysqli_query($conn, "INSERT INTO `announcement`(`announce`) VALUES ('$announcementText')");
    header('location: ../Home-Admin.php');  
?>