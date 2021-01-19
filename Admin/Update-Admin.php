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

    <?php require("Php/Header-Admin.php") ?>
    <?php
    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];
    $arr = explode("=", $link);
    $int = intval($arr[1]);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE userId = '$int' ");
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
                                    Update User
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row justify-content-around">
                                    <div style="background-color: white;  padding:3%" class="col-10">
                                        <form style="margin-left:30%" method="post" action="Php/Register-User.php">
                                            <div class="form-row">

                                                <div class="col-7">
                                                    <label for="name">First name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="First name" required>
                                                </div>

                                                <div class="col-7">
                                                    <label style="margin-top:3%" for="surname">Last name</label>
                                                    <input type="text" class="form-control" name="surname" placeholder="Last name" required>
                                                </div>

                                                <div class="col-7">
                                                    <label style="margin-top:3%" for="dob">Date of Birth</label>
                                                    <input type="date" class="form-control" name="dob" placeholder="Date of Birth" required>
                                                </div>


                                                <div class="col-7">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" placeholder="placeholder@gmail.com" required>
                                                </div>

                                                <div class="col-7">
                                                    <label for="username">Username</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" name="inputGroupPrepend2">@</span>
                                                        </div>
                                                        <input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
                                                    </div>
                                                </div>

                                                <div class="col-7">
                                                    <label for="pass">Password</label>
                                                    <input type="password" class="form-control" name="pass" placeholder="Password" required>
                                                </div>


                                                <div class="col-7">
                                                    <label for="phoneNum">Phone Number</label>
                                                    <input type="tel" class="form-control" name="phoneNum" placeholder="Phone Number" maxlength="11" required>
                                                </div>

                                                <div class="col-7">
                                                    <label for="flatNo">Flat Number</label>
                                                    <input type="number" class="form-control" name="flatNo" placeholder="Flat Number" min="1" max="10" required>
                                                </div>

                                                <div class="col-7">
                                                    <label for="admin">Admin Status</label>
                                                    <input type="number" class="form-control" name="admin" placeholder="0 for normal user 1 for Admin" min="0" max="1" required>
                                                </div>
                                            </div>
                                            <hr>
                                            <button style="margin-right:40%; margin-bottom:3%" class="btn btn-primary" name="userSubmit" type="submit">Submit form</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
                                                    <th scope="col">Due-Expense ID</th>
                                                    <th scope="col">Due-Expense Date</th>
                                                    <th scope="col">Fee</th>
                                                    <th scope="col">#</th>
                                                </tr>
                                            </thead>

                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM `users` INNER JOIN user_flat USING (userId) WHERE isMoved = 0");

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($results = mysqli_fetch_array($result)) {
                                                    echo
                                                    "<tbody> <tr> ";
                                                    echo "<td>" . $results['username'] . "</td>";
                                                    echo "<td>" . $results['fname'] . "</td>";
                                                    echo "<td>" . $results['surname'] . "</td>";

                                            ?>
                                                    <td><a href="Php/moveOut-User.php?userId=<?php echo $results['userId'] ?>"><button type='button' class='btn btn-light'>Move Out</button></a></td>
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
                                                    <th scope="col">Due-Expense ID</th>
                                                    <th scope="col">Due-Expense Date</th>
                                                    <th scope="col">Fee</th>
                                                    <th scope="col">#</th>
                                                </tr>
                                            </thead>

                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM `users` INNER JOIN user_flat USING (userId) WHERE isMoved = 0");

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($results = mysqli_fetch_array($result)) {
                                                    echo
                                                    "<tbody> <tr> ";
                                                    echo "<td>" . $results['username'] . "</td>";
                                                    echo "<td>" . $results['fname'] . "</td>";
                                                    echo "<td>" . $results['surname'] . "</td>";

                                            ?>
                                                    <td><a href="Php/moveOut-User.php?userId=<?php echo $results['userId'] ?>"><button type='button' class='btn btn-light'>Move Out</button></a></td>
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
                </div>
            </div>
            <div class="col-1"> </div>
        </div>
    </div>
</body>

</html>