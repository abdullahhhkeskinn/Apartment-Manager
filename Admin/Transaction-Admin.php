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

  <div class="container-fluid">
    <div class="row justify-content-around">
      <div class="col-1"> </div>
      <div style="background-color: rgb(201, 181, 212); height: 100%; padding-bottom: 3%" class="col-10">
        <div class="row justify-content-around">
          <div class="container-fluid">
            <div class="row justify-content-center">
              <div style="background-color: white; margin-top: 3%; padding:2%" class="col-11">
                <div style=" box-shadow: 5px 10px 15px #888888; margin-bottom:3%" class="row justify-content-center">
                  <div  style="margin:2%" class="col-11">
                    <?php require("Php/Chart-Admin.php") ?>
                  </div>
                </div>
                <hr>
                <div style="margin: 3%;" class="row justify-content-center">
                  <div class="col-6">
                    <form action="Php/Add-Due.php" method="post">
                      <div class="form-group">
                        <label for="fee">Monthly Due</label>
                        <input type="number" name="due" class="form-control" placeholder="Please Enter the Fee As Per Flat" aria-label="due" aria-describedby="basic-addon1" min="1">
                      </div>
                      <div class="form-group">
                        <label for="AnnouncementTextArea">Due Details</label>
                        <input type="text" class="form-control" name="dueDetail" placeholder="Enter Announcement" required>
                      </div>
                      <button style="margin-top: 1%" class="btn btn-primary" name="dueSubmit" type="submit">Add Due to All</button>
                    </form>
                  </div>
                  <div class="col-6">
                    <form action="Php/Add-Expense.php" method="post">
                      <div class="form-group">
                        <label for="fee">Expense</label>
                        <input type="number" name="expense" class="form-control" placeholder="Please Enter The Full Fee Of Expense" aria-label="due" aria-describedby="basic-addon1" min="1">
                      </div>
                      <div class="form-group">
                        <label for="AnnouncementTextArea">Expense Details</label>
                        <input type="text" class="form-control" name="expenseDetail" placeholder="Enter Announcement" required>
                      </div>
                      <button style="margin-top: 1%" class="btn btn-primary" name="expenseSubmit" type="submit">Add Expense to All</button>
                    </form>
                  </div>
                </div>

                <div>
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
                    $result = mysqli_query($conn, "SELECT * FROM `dues` ORDER BY dueId DESC");

                    if (mysqli_num_rows($result) > 0) {
                      while ($results = mysqli_fetch_array($result)) {
                        echo
                        "<tbody> <tr> ";
                        echo "<td> DUE </td>";
                        echo "<td>" . $results['dueDetail'] . "</td>";
                        echo "<td>" . $results['dueDate'] . "</td>";
                        echo "<td>" . $results['fee'] . "</td>";
                    ?>
                        <td>
                        <a href="Php/Delete-Due.php?dueId=<?php echo $results['dueId'] ?>"><button type='button' class='btn btn-primary'>Delete</button></a>
                        <a href="Transaction-Due-Detail-Admin.php?dueId=<?php echo $results['dueId'] ?>"><button type='button' class='btn btn-primary'>Details</button></a>
                        </td>
                    <?php
                        echo "</tr></tbody>";
                      }
                    }
                    ?>

                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM `expenses` ORDER BY expenseId DESC");

                    if (mysqli_num_rows($result) > 0) {
                      while ($results = mysqli_fetch_array($result)) {
                        echo
                        "<tbody> <tr> ";
                        echo "<td> EXPENSE </td>";
                        echo "<td>" . $results['expenseDetail'] . "</td>";
                        echo "<td>" . $results['expenseDate'] . "</td>";
                        echo "<td>" . $results['fee'] . "</td>"; ?>
                        <td>
                        <a href="Php/Delete-Expense.php?expenseId=<?php echo $results['expenseId'] ?>"><button type='button' class='btn btn-primary'>Delete</button></a>
                        <a href="Transaction-Expense-Detail-Admin.php?expenseId=<?php echo $results['expenseId'] ?>"><button type='button' class='btn btn-primary'>Details</button></a>
                        </td>
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
      <div class="col-1"> </div>
    </div>
  </div>
</body>

</html>