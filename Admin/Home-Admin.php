<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Apartment Manager Home</title>
  <?php require("../Php-Connection.php") ?>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <?php require("Php/Header-Admin.php") ?>

  <div class="container-fluid">
    <div class="row justify-content-around">
      <div class="col-1"> </div>
      <div style="background-color: rgb(201, 181, 212); height: 100%; padding-bottom: 3%;" class="col-10">

        <div style=" box-shadow: 5px 10px 15px #888888; margin:3%" class="jumbotron">
          <h1 class="display-4">Welcome to Our Apartment System</h1>
          <p class="lead">You can see all the announcements here </p>
          <hr class="my-4">
          <table class="table table-stripped">
            <thead class="thead-light">
              <tr>
                <th scope="col">Announcement</th>
                <th scope="col">Announcement Date</th>
                <th scope="col">#</th>
              </tr>
            </thead>

            <?php
            $result = mysqli_query($conn, "SELECT * FROM announcement ORDER BY id DESC ");
            if (mysqli_num_rows($result) > 0) {
              while ($results = mysqli_fetch_array($result)) {
                echo
                  "<tbody>
                    <tr> ";
                echo "<td>" . $results['announce'] . "</td>";
                echo "<td>" . $results['announceDate'] . "</td>";
            ?>
                <td><a href="Php/Delete-Announcement.php?announceId=<?php echo $results['id'] ?>"><button type='button' class='btn btn-light'>Delete</button></a></td>
            <?php
                echo "</tr>
                  </tbody>";
              }
            }
            ?>
          </table>
        </div>

        <form action="Php/Add-Announcement.php" method="POST">
          <div class="container">
            <div class="row">
              <div class="col-6"></div>
              <div class="col-5">
                <div class="form-group">
                  <label for="AnnouncementTextArea">New Announcement</label>
                  <textarea name="textArea"  cols="40" rows="8"></textarea>
                </div>
                <button style="padding: 3%;" class="btn btn-primary" name="AnnouncementADD" type="submit">Announce</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-1"> </div>
    </div>
  </div>
</body>

</html>