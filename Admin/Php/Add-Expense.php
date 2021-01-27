<?php
require("../../Php-Connection.php");
if (isset($_POST['expenseSubmit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fee = $_POST['expense'];
        $detailText = $_POST['expenseDetail'];
        $addFee = "INSERT INTO expenses (expenseDetail, fee) VALUES ('$detailText','$fee')";
        $sql =  "SELECT userId FROM users";

        if (mysqli_query($conn, $addFee)) {
            $expenseIdArr = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM expenses WHERE expenseId=(SELECT max(expenseId) FROM expenses)"));
            $expenseId = $expenseIdArr['expenseId'];
            $result = mysqli_query($conn, $sql);
            while ($results = mysqli_fetch_array($result)) {
                $b = $results['userId'];
                mysqli_query($conn, "INSERT INTO `expense_user_flat`(`userId`, `expenseId`) VALUES ('$b','$expenseId')");
            }
            if (1) {
                $_SESSION['errorMessage'] = "Requested amount of expense has been added to all flats";
                $date = date('Y-m-d');
                header("location: ../Transaction-Admin.php?currentDate=$date");
            }
        }

        print_r($_REQUEST);
    }
}
