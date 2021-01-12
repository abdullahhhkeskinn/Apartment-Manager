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
      <div style="background-color: rgb(201, 181, 212); height: 100%; padding-bottom: 3%" class="col-10">
        <div class="row justify-content-around" style="margin-top: 3%;">
          <div style="background-color: white; margin:3%" class="col-11">
            <p style="font-size: medium; text-align:center;">Flat Info</p>
            <table class="table table-stripped">
              <thead class="thead-light">
                <tr>

                  <th scope="col">Username</th>
                  <th scope="col">Name</th>
                  <th scope="col">Surname</th>
                  <th scope="col">Date of Birth</th>
                  <th scope="col">Social Security Number</th>
                  <th scope="col">Mail</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Flat Number</th>
                  <th scope="col">#</th>
                </tr>
              </thead>

              <?php
              $result = mysqli_query($conn, "SELECT * FROM users");
              $result2 =mysqli_query($conn, "SELECT apartmentNum FROM users_flat, users WHERE users.userId = users_flat.userId");
              $results2 = mysqli_fetch_array($result2);

              if (mysqli_num_rows($result) > 0) {
                while ($results = mysqli_fetch_array($result)) {
                  echo
                    "<tbody>
                    <tr> ";
                  echo "<td>" . $results['username'] . "</td>";
                  echo "<td>" . $results['fname'] . "</td>";
                  echo "<td>" . $results['surname'] . "</td>";
                  echo "<td>" . $results['dob'] . "</td>";
                  echo "<td>" . $results['ssn'] . "</td>";
                  echo "<td>" . $results['mail'] . "</td>";
                  echo "<td>" . $results['phoneNo'] . "</td>";
                  echo "<td>" . $results2['apartmentNum'] . "</td>";
                  
              ?>
                  <td>
                    <div class="container">
                      <div class="row">
                        <div class="col6">
                          <a href="Php/moveOut-User.php?userId=<?php echo $results['userId'] ?>"><button type='button' class='btn btn-light'>Move Out</button></a>
                        </div>
                        <div class="col-6">
                          <a href="Update-Admin.php?userId=<?php echo $results['userId'] ?>"><button type='button' class='btn btn-light'>Update</button></a>
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
</body>

</html>