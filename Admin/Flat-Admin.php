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
  <script>
    function GetURLParameter(sParam) {
      var sPageURL = window.location.search.substring(1);
      var sURLVariables = sPageURL.split('&');
      for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
          return sParameterName[1];
        }
      }
    }​
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <?php require("Php/Header-Admin.php") ?>

  <div class="container-fluid">
    <div class="row justify-content-around">
      <div class="col-1"> </div>
      <div style="background-color: rgb(201, 181, 212); height: 100%; padding-bottom: 3%" class="col-10">
        <div class="row justify-content-around" style="margin-top: 5%;">
          <div style="background-color: white;" class="col-10">
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
                  <th scope="col">Debt</th>
                  <th scope="col">#</th>
                </tr>
              </thead>

              <?php
              $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];
              $arr = explode("=", $link);
              $int = intval($arr[1]);
              $result = mysqli_query($conn, "SELECT * FROM users WHERE flatno = $int");
              ?>
              <?php
              $result = mysqli_query($conn, "SELECT * FROM users WHERE flatNo= '$int' ORDER BY flatNo ASC");
              
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
                      echo "<td>" . $results['flatNo'] . "</td>";
                      echo "<td>" . mysqli_fetch_array(mysqli_query($conn, "SELECT debt FROM apartment,users WHERE flatNo = apartmentNum"))['debt'] . "</td>";
                      ?>
                       <td>
                    <div class="container">
                      <div class="row">
                        <div class="col6">
                          <a href="Php/Delete-User.php?userId=<?php echo $results['userId'] ?>"><button type='button' class='btn btn-light'>Move Out</button></a>
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
              <?php
              $result2 = mysqli_query($conn, "SELECT * FROM nonuser WHERE apartmentNum= '$int' ORDER BY apartmentNum ASC");
              if (mysqli_num_rows($result2) > 0) {
                while ($results2 = mysqli_fetch_array($result2)) {
                  echo
                    "<tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>" . $results2['fname'] . "</td>
                      <td>" . $results2['surname'] . "</td>
                      <td>" . $results2['dob'] . "</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>" . $results2['apartmentNum'] . "</td>";?>
                      <td><a href="Php/Delete-NonUser.php?userId=<?php echo $results2['nonUserId'] ?>"><button type='button' class='btn btn-light'>Delete</button></a></td>
                      <?php
                      echo
                    "</tr>
                  </tbody>";
                }
              }
              ?>
            </table>
          </div>
        </div>
      </div>
      <div class="col-1"> </div>
    </div>
  </div>
</body>

</html>