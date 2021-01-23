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
    <div class="row justify-content-center">
      <div class="col-1"> </div>

      <div style="background-color: rgb(201, 181, 212); height: 100%; padding-bottom: 3%;" class="col-10">
        <div class="row justify-content-around">
          <div style="background-color:white; margin-top:3%; " class="col-11">
            <div class="row justify-content-center">
              <div class="col-3"></div>

              <div class="col-offset-6 centered">
                <div>
                  <p style="margin-top:3%">User Register</p>
                  <hr>
                  <form style="margin-left:30%" method="post" action="Php/Register-User.php">
                    <div class="form-row">

                      <div class="col-7">
                        <label style="margin-top:3%" for="name">First name</label>
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

      </div>

      <div class="col-1"> </div>
    </div>
  </div>
</body>
<footer>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</footer>

</html>