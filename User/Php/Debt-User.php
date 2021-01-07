<?php
require("../../Php-Connection.php");
    if(isset($_POST['debtSubmit'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $flatNo = $_SESSION['flatNo'];
            $Tdebt = $_POST['debt'];


            $check = "SELECT * FROM apartment WHERE apartmentNum = '$flatNo' ";
            $result = mysqli_query($conn, $check);
            if (mysqli_num_rows($result) == 0) {
                echo "<script type='text/javascript'>alert('Requested flat is not existing');</script>";
                echo("<script>window.location ='../Home-User.php';</script>");
            } else {
                $sql =  "UPDATE apartment SET debt = debt - '$Tdebt' WHERE apartmentNum = '$flatNo'";

                if (mysqli_query($conn, $sql)) {
                    echo "<script type='text/javascript'>alert('Debt of Flat ' + $flatNo + ' has been updated' );</script>";
                    echo("<script>window.location ='../Home-User.php';</script>");
                }
            }
        }   
    }
?>