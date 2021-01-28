<?php
require("../../Php-Connection.php");

if (isset($_POST['dueSubmit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fee = $_POST['due'];
        $detailText = $_POST['dueDetail'];
        $addFee = "INSERT INTO dues (dueDetail, fee) VALUES ('$detailText','$fee')";
        $sql =  "SELECT userId FROM users";

        if (mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM dues WHERE MONTH(dueDate) = MONTH(CURRENT_DATE()) AND YEAR(dueDate) = YEAR(CURRENT_DATE())")) == 0) {
            if (mysqli_query($conn, $addFee)) {
                $dueIdArr = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM dues WHERE dueId=(SELECT max(dueId) FROM dues)"));
                $dueId = $dueIdArr['dueId'];
                $result = mysqli_query($conn, $sql);
                while ($results = mysqli_fetch_array($result)) {
                    $b = $results['userId'];
                    mysqli_query($conn, "INSERT INTO `due_user_flat`(`userId`, `dueId`) VALUES ('$b','$dueId')");
                }
                if (1) {
                    $_SESSION['confirmationMessage'] = "Monthly Due has been added to all flats";
                    $date = date('Y-m-d');
                    header("location: ../Transaction-Admin.php?currentDate=$date");
                }
            } else {
                $_SESSION['errorMessage'] = "A Problem Has Occured During Adding. Please Try Again";
                $date = date('Y-m-d');
                header("location: ../Transaction-Admin.php?currentDate=$date");
            }
        } else {
            $_SESSION['errorMessage'] = "A Problem Has Occured During Adding. This month's due has been already added";
            $date = date('Y-m-d');
            header("location: ../Transaction-Admin.php?currentDate=$date");
        }
    }
}
