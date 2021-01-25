<?php
require("../../Php-Connection.php");
    if(isset($_POST['expenseSubmit'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fee = $_POST['expense'];
            $detailText=$_POST['expenseDetail'];
            $addFee = "INSERT INTO expenses (expenseDetail, fee) VALUES ('$detailText','$fee')";
            $sql =  "SELECT userId FROM users";

            if(mysqli_query($conn,$addFee)){
                $expenseIdArr = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM expenses WHERE expenseId=(SELECT max(expenseId) FROM expenses)"));
                $expenseId = $expenseIdArr['expenseId'];
                $result = mysqli_query($conn, $sql);
                while($results = mysqli_fetch_array($result)){
                    $b = $results['userId'];
                    mysqli_query($conn,"INSERT INTO `expense_user_flat`(`userId`, `expenseId`) VALUES ('$b','$expenseId')");
                }
                if (1) {
                    echo "<script type='text/javascript'>alert('Given value of ' + '$fee' + ' has been added to all flats as expense' );</script>";
                    echo("<script>window.location ='../Transaction-Admin.php';</script>");
                }
            }

            print_r($_REQUEST);
        }   
    }
?>