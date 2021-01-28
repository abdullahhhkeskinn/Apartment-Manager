<?php
require("../../Php-Connection.php");
if (isset($_POST['userSubmit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $dob = $_POST['dob'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $md5_password = md5($pass);
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNum'];
        $apartmentNo = $_POST['flatNo'];
        $admin = $_POST['admin'];
        $userId = $_POST['userId'];
        

        $sql = "UPDATE `users` SET `fname`='$name',`surname`='$surname',`dob`='$dob',`username`='$username',`pass`='$md5_password',`mail`='$email',
        `phoneNo`='$phoneNumber',`isAdmin`='$admin' WHERE `userId` = $userId"; 
        
        $sql2 = "UPDATE user_flat SET apartmentNum = '$apartmentNo' WHERE userId = '$userId'";

        if (mysqli_query($conn, $sql)) {
            if(mysqli_query($conn, $sql2)){
                echo "<script type='text/javascript'>alert('User Succesfully Updated');</script>";
                echo ("<script>window.location ='../Register-Admin.php';</script>"); 
            }
            else
            echo "a";
        }
        else
        print_r($_REQUEST);
    }
}
?>