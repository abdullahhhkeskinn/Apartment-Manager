<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Apartment Manager Register</title>


    <?php require("../Php-Connection.php") ?>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <?php require("Php/Header-User.php") ?>
    <?php
    $int = $_SESSION["userId"];
    $result = mysqli_query($conn, "SELECT * FROM users INNER JOIN user_flat USING (userId) WHERE userId = '$int' ");
    $results = mysqli_fetch_array($result);
    ?>


    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-1"> </div>
            <div style="background-color: rgb(201, 181, 212); height: 100%; padding-bottom: 3%;" class="col-10">

                <div style="margin-top: 3%;" id="accordion">

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Monthly Revenues And Expenses
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row justify-content-around">
                                    <div style="background-color: white; margin-top: 2%; padding:3%" class="col-11">
                                       <?php require("Php/Chart-Admin.php") ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Unpaid Dues and Expenses
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row justify-content-around">
                                    <div style="background-color: white; margin-top: 2%; padding:3%" class="col-10">
                                        <table class="table table-stripped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Due-Expense Detail</th>
                                                    <th scope="col">Due-Expense Date</th>
                                                    <th scope="col">Fee</th>
                                                    <th scope="col">#</th>
                                                </tr>
                                            </thead>

                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM `dues` INNER JOIN due_user_flat USING (dueId) WHERE userId = '$int' AND is_paid = 0");

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($results = mysqli_fetch_array($result)) {
                                                    echo
                                                    "<tbody> <tr> ";
                                                    echo "<td> DUE </td>";
                                                    echo "<td>" . $results['dueDetail'] . "</td>";
                                                    echo "<td>" . $results['dueDate'] . "</td>";
                                                    echo "<td>" . $results['fee'] . "</td>";
                                            ?>
                                                    <td><a href="Php/Pay_Due.php?userId=<?php echo $results['userId'] ?>&dueId=<?php echo $results['dueId'] ?>"><button type='button' class='btn btn-primary'>Pay</button></a></td>
                                            <?php
                                                    echo "</tr></tbody>";
                                                }
                                            }
                                            ?>

                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM `expenses` INNER JOIN expense_user_flat USING (expenseId) WHERE userId = '$int' AND is_paid = 0");

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($results = mysqli_fetch_array($result)) {
                                                    echo
                                                    "<tbody> <tr> ";
                                                    echo "<td> EXPENSE </td>";
                                                    echo "<td>" . $results['expenseDetail'] . "</td>";
                                                    echo "<td>" . $results['expenseDate'] . "</td>";
                                                    echo "<td>" . $results['fee'] . "</td>"; ?>
                                                    <td><a href="Php/Pay_Expense.php?userId=<?php echo $results['userId'] ?>&expenseId=<?php echo $results['expenseId'] ?>"><button type='button' class='btn btn-primary'>Pay</button></a></td>
                                            <?php
                                                    echo "</tr></tbody>";
                                                }
                                            }
                                            ?>
                                            <hr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Paid Dues and Expenses
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row justify-content-around">
                                    <div style="background-color: white; margin-top: 2%; padding:3%" class="col-10">
                                        <table class="table table-stripped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Due-Expense Detail</th>
                                                    <th scope="col">Due-Expense Date</th>
                                                    <th scope="col">Fee</th>
                                                    <th scope="col">Pay Date</th>
                                                </tr>
                                            </thead>

                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM `dues` INNER JOIN due_user_flat USING (dueId) WHERE userId = '$int' AND is_paid = 1");

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($results = mysqli_fetch_array($result)) {
                                                    echo
                                                    "<tbody> <tr> ";
                                                    echo "<td> DUE </td>";
                                                    echo "<td>" . $results['dueDetail'] . "</td>";
                                                    echo "<td>" . $results['dueDate'] . "</td>";
                                                    echo "<td>" . $results['fee'] . "</td>";
                                                    echo "<td>" . $results['pay_date'] . "</td>";
                                                    echo "</tr></tbody>";
                                                }
                                            }
                                            ?>

                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM `expenses` INNER JOIN expense_user_flat USING (expenseId) WHERE userId = '$int' AND is_paid = 1");

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($results = mysqli_fetch_array($result)) {
                                                    echo
                                                    "<tbody> <tr> ";
                                                    echo "<td> EXPENSE </td>";
                                                    echo "<td>" . $results['expenseDetail'] . "</td>";
                                                    echo "<td>" . $results['expenseDate'] . "</td>";
                                                    echo "<td>" . $results['fee'] . "</td>";
                                                    echo "<td>" . $results['pay_date'] . "</td>";
                                                    echo "</tr></tbody>";
                                                }
                                            }
                                            ?>
                                            <hr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"> </div>
        </div>
    </div>
</body>

</html>