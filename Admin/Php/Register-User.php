<?php
require("../../Php-Connection.php");
if(isset($_POST['userSubmit'])){
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

    $check = "SELECT * FROM users WHERE username = '$username' ";
    $result = mysqli_query($conn, $check);
    if (mysqli_num_rows($result) == 1) {
        echo "<script type='text/javascript'>alert('This username is already taken');</script>";
        echo("<script>window.location ='../Register-Admin.php';</script>");
    } else {
        $sql =  "INSERT INTO users(`fname`, `surname`, `dob`, `username`, `pass`, `mail`, `phoneNo`, `isAdmin`) VALUES ('$name','$surname','$dob',
        '$username','$md5_password','$email','$phoneNumber','$admin')";

        if (mysqli_query($conn, $sql)) {
            $userIdArr = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE userId=(SELECT max(userId) FROM users)"));
            $userId = $userIdArr['userId'];
            mysqli_query($conn,"INSERT INTO user_flat(`userId`, `apartmentNum`) VALUES ('$userId','$apartmentNo')");
            echo "<script type='text/javascript'>alert('User Succesfully Created');</script>";
            echo("<script>window.location ='../Register-Admin.php';</script>");
            
            }
        }
    }
}

?>
