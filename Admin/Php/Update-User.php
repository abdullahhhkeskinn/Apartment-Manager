<?php
require("../../Php-Connection.php");
if (isset($_POST['userSubmit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $dob = $_POST['dob'];
        $ssn = $_POST['ssn'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $md5_password = md5($pass);
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNum'];
        $apartmentNo = $_POST['flatNo'];
        $admin = $_POST['admin'];
        $userId = $_POST['userId'];

        $sql =  "UPDATE `users` SET `fname`='$name',`surname`='$surname',`dob`='$dob',`ssn`='$ssn',`username`='$username',
        `pass`='$md5_password',`mail`='$email',`phoneNo`='$phoneNumber',`flatNo`='$apartmentNo',`isAdmin`='$admin' WHERE userId = '$userId'";

        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>alert('User Succesfully Created');</script>";
            echo ("<script>window.location ='../Register-Admin.php';</script>");
        }
    }
}

if(isset($_POST['nonUserSubmit'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $dob = $_POST['dob'];
        $apartmentNo = $_POST['flatNo'];
        

        $check = "SELECT * FROM nonuser WHERE fname = '$name' AND surname ='$surname' AND dob = '$dob'";
        $result = mysqli_query($conn, $check);
        if (mysqli_num_rows($result) == 1) {
            echo "<script type='text/javascript'>alert('This user is already registered');</script>";
        } else {
            $sql =  "INSERT INTO nonuser (fname,surname,dob,apartmentNum) 
            VALUES('$name','$surname','$dob','$apartmentNo')";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>alert('User Succesfully Created');</script>";
                echo("<script>window.location ='../Register-Admin.php';</script>");
            }
        }
    }
}
?>