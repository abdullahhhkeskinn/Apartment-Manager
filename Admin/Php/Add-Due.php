<?php
require("../../Php-Connection.php");

if (isset($_POST['dueSubmit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fee = $_POST['due'];
        $detailText = $_POST['dueDetail'];
        $addFee = "INSERT INTO dues (dueDetail, fee) VALUES ('$detailText','$fee')";
        $sql =  "SELECT userId FROM users";

        if (mysqli_query($conn, $addFee)) {
            $dueIdArr = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM dues WHERE dueId=(SELECT max(dueId) FROM dues)"));
            $dueId = $dueIdArr['dueId'];
            $result = mysqli_query($conn, $sql);
            while ($results = mysqli_fetch_array($result)) {
                $b = $results['userId'];
                mysqli_query($conn, "INSERT INTO `due_user_flat`(`userId`, `dueId`) VALUES ('$b','$dueId')");
            }
            if (1) {
                echo "<script type='text/javascript'>alert('Given value of ' + '$fee' + ' has been added to all flats as monthly due' );</script>";
                echo ("<script>window.location ='../Transaction-Admin.php';</script>");
            }
        } else {
            echo "<script type='text/javascript'>alert('A Problem Has Occured' );</script>";
            echo ("<script>window.location ='../Transaction-Admin.php';</script>");
        }
    }
}
