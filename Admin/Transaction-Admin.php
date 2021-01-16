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
            <div class="row justify-around-content">
              <div class="col-2"></div>
              <div style="background-color: white; margin-top: 3%; padding:2%" class="col-8">

                <form action="Php/Add-Due.php" method="post">
                  <div class="form-group">
                    <label for="due">Monthly Due</label>
                    <input type="number" name="due" class="form-control" placeholder="Due value of an flat" aria-label="due" aria-describedby="basic-addon1" min="1">
                  </div>
                  <div class="form-group">
                  <label for="AnnouncementTextArea">Due Details</label>
                  <input type="text" class="form-control" name="textArea" placeholder="Enter Announcement" required>
                  </div>
                  <button style="margin-top: 1%" class="btn btn-primary" name="dueSubmit" type="submit">Add Due to All</button>
                </form>
                <hr>
                <form action="Php/Add-Due.php" method="post">
                  <div class="form-group">
                    <label for="due">Expense</label>
                    <input type="number" name="due" class="form-control" placeholder="Expense price per person" aria-label="due" aria-describedby="basic-addon1" min="1">
                  </div>
                  <div class="form-group">
                  <label for="AnnouncementTextArea">Expense Details</label>
                  <input type="text" class="form-control" name="textArea" placeholder="Enter Announcement" required>
                  </div>
                  <button style="margin-top: 1%" class="btn btn-primary" name="expenseSubmit" type="submit">Add Due to All</button>
                </form>

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