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
        $sql =  "INSERT INTO users (fname,surname,dob,ssn,username,pass,mail,phoneNo,flatNo,isAdmin) 
                VALUES('$name','$surname','$dob','$username','$md5_password','$email','$phoneNumber','$admin')";

        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>alert('User Succesfully Created');</script>";
            echo("<script>window.location ='../Register-Admin.php';</script>");
            
            }
        }
    }
}

?>
