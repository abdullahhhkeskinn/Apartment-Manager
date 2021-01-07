<?php
    require("../../Php-Connection.php");

    if(isset($_POST['dueSubmit'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Tdebt = $_POST['due'];
            $announcementText=$_POST['textArea'];
            $addAnnouncement = mysqli_query($conn, "INSERT INTO `announcement`(`announce`) VALUES ('$announcementText')");
            $sql =  "UPDATE apartment SET debt = debt + '$Tdebt'";
            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>alert('Given value of monthly due ' + '$Tdebt' + ' has been added to all flats' );</script>";
                echo("<script>window.location ='../Transaction-Admin.php';</script>");
            }
        }   
    }

    if(isset($_POST['debtSubmit'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $flatNo = $_POST['flatNo'];
            $Tdebt = $_POST['debt'];


            $check = "SELECT * FROM apartment WHERE apartmentNum = '$flatNo' ";
            $result = mysqli_query($conn, $check);
            if (mysqli_num_rows($result) == 0) {
                echo "<script type='text/javascript'>alert('Requested flat is not existing');</script>";
                echo("<script>window.location ='../Transaction-Admin.php';</script>");
            } else {
                $sql =  "UPDATE apartment SET debt = debt + '$Tdebt' WHERE apartmentNum = '$flatNo'";

                if (mysqli_query($conn, $sql)) {
                    echo "<script type='text/javascript'>alert('Debt of Flat ' + $flatNo + ' has been updated' );</script>";
                    echo("<script>window.location ='../Transaction-Admin.php';</script>");
                }
            }
        }   
    }
?>