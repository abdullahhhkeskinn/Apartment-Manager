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

  <div class="container-fluid">
    <div class="row justify-content-around">
      <div class="col-1"> </div>
      <div style="background-color: rgb(201, 181, 212); height: 100%; padding-bottom: 3%" class="col-10">
        <div class="row justify-content-around">
          <div class="container-fluid">
            <div class="row justify-around-content">
              <div class="col-2"></div>
              <div style="background-color: white; margin-top: 3%; padding:2%" class="col-8">

                <form method="post" action="Php/Debt-User.php">
                  <div class="form-group">
                    <label for="debt">Pay Debts</label>
                    <?php
                    $flatID = $_SESSION['flatNo'];
                    $query = "SELECT debt FROM apartment WHERE apartmentNum ='$flatID'";
                    $result = mysqli_query($conn,$query);
                    $results = mysqli_fetch_array($result);
                     ?>
                    <input type="number" name="debt" class="form-control" placeholder="Debt" aria-label="debt" aria-describedby="basic-addon1" min="0" 
                          max="<?php echo $results['debt'] ?>">
                  </div>
                  <div class="form-group">
                    <input style="display:none;" type="number" name="flatNo" class="form-control" placeholder="Flat Number" aria-label="flatNo" aria-describedby="basic-addon1" value="<?php echo $_SESSION['flatNo'] ?>" >
                  </div>
                  <button style="margin-top: 3%" class="btn btn-primary" name="debtSubmit" type="submit">Change Debt of the Flat</button>
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