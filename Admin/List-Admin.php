<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Apartment Manager List</title>


  <?php require("../Php-Connection.php") ?>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <?php require("Php/Header-Admin.php") ?>

  <div class="container-fluid">
    <div class="row justify-content-around">
      <div class="col-1"> </div>
      <div style="background-color: rgb(201, 181, 212); height: 100%;min-height:900px; padding-bottom: 3%;" class="col-10">
        <div style="margin-top: 3%;" id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Current Tenants
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <div class="row justify-content-around">
                  <div style="background-color: white; margin-top: 2%; padding:3%" class="col-11">
                    <table style=" box-shadow: 5px 10px 15px #888888; margin-bottom:3%" class="table table-stripped">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Username</th>
                          <th scope="col">Name</th>
                          <th scope="col">Surname</th>
                          <th scope="col">Date of Birth</th>
                          <th scope="col">Mail</th>
                          <th scope="col">Phone Number</th>
                          <th scope="col">Flat Number</th>
                          <th scope="col">Move-In Date</th>
                          <th scope="col">#</th>
                        </tr>
                      </thead>

                      <?php
                      $result = mysqli_query($conn, "SELECT * FROM `users` INNER JOIN user_flat USING (userId) WHERE isMoved = 0");

                      if (mysqli_num_rows($result) > 0) {
                        while ($results = mysqli_fetch_array($result)) {
                          echo
                            "<tbody>
                                    <tr> ";
                          echo "<td>" . $results['username'] . "</td>";
                          echo "<td>" . $results['fname'] . "</td>";
                          echo "<td>" . $results['surname'] . "</td>";
                          echo "<td>" . $results['dob'] . "</td>";
                          echo "<td>" . $results['mail'] . "</td>";
                          echo "<td>" . $results['phoneNo'] . "</td>";
                          echo "<td>" . $results['apartmentNum'] . "</td>";
                          echo "<td>" . $results['moveInDate'] . "</td>";

                      ?>
                          <td>
                            <div class="container">
                              <div class="row justify-content-around">
                                <div class="col6">
                                  <a href="Php/moveOut-User.php?userId=<?php echo $results['userId'] ?>"><button type='button' class='btn btn-primary'>Move Out</button></a>
                                </div>
                                <div class="col-6">
                                  <a href="Update-Admin.php?userId=<?php echo $results['userId'] ?>"><button type='button' class='btn btn-primary'>Update</button></a>
                                </div>
                              </div>
                            </div>
                          </td>
                      <?php
                          echo "</tr>
                                    </tbody>";
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
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Moved-Out Tenants
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                <div class="row justify-content-around">
                  <div style="background-color: white; margin-top: 2%; padding:3%" class="col-11">
                    <table style=" box-shadow: 5px 10px 15px #888888; margin-bottom:3%" class="table table-stripped">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Username</th>
                          <th scope="col">Name</th>
                          <th scope="col">Surname</th>
                          <th scope="col">Date of Birth</th>
                          <th scope="col">Mail</th>
                          <th scope="col">Phone Number</th>
                          <th scope="col">Flat Number</th>
                          <th scope="col">Move-In Date</th>
                          <th scope="col">Move-Out Date</th>
                        </tr>
                      </thead>

                      <?php
                      $result = mysqli_query($conn, "SELECT * FROM `users` INNER JOIN user_flat USING (userId) WHERE isMoved = 1");

                      if (mysqli_num_rows($result) > 0) {
                        while ($results = mysqli_fetch_array($result)) {
                          echo
                            "<tbody>
                                        <tr> ";
                          echo "<td>" . $results['username'] . "</td>";
                          echo "<td>" . $results['fname'] . "</td>";
                          echo "<td>" . $results['surname'] . "</td>";
                          echo "<td>" . $results['dob'] . "</td>";
                          echo "<td>" . $results['mail'] . "</td>";
                          echo "<td>" . $results['phoneNo'] . "</td>";
                          echo "<td>" . $results['apartmentNum'] . "</td>";
                          echo "<td>" . $results['moveInDate'] . "</td>";
                          echo "<td>" . $results['moveOutDate'] . "</td>";
                          echo "</tr>
                                      </tbody>";
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