<html>

<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="Css/allCSS.css?v=<?php echo time(); ?>">
  <title>Sign in</title>
</head>

<body>

  <?php
  require("Php-Connection.php");
  ?>

  <div class="main">
    <p class="sign" align="center">Sign in</p>
    <form class="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input class="un " type="text" align="center" name="Uname" placeholder="Username">
      <input class="pass" type="password" align="center" name="password" placeholder="Password">
      <input type="submit" class="submit" align="center"></a>
  </div>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['Uname'];
    $password = $_POST['password'];
    $md5_password = md5($password);
    $checkInfoSql = "SELECT * FROM users WHERE username = '$userName' AND pass = '$md5_password' ";

    $result = mysqli_query($conn, $checkInfoSql);
    if (isset($userName) && isset($password)) {
      if (mysqli_num_rows($result) == 1) {
        $isMoved = $results['isMoved'];
        if ($isMoved == 0) {
          $results = mysqli_fetch_array($result);
          $userId = $results['userId'];
          $flatNo = $results['flatNo'];
          $_SESSION['isAdmin'] = $results['isAdmin'];
          $_SESSION["userId"] = $userId;
          $_SESSION["flatNo"] = $flatNo;
          if ($results['isAdmin'] == 1) {

            header("Location: Admin/Home-Admin.php");
            
            exit();
          } else {
            header("Location: User/Home-User.php");
            
            exit();
          }
        } else {
          echo "<script type='text/javascript'>alert('This user is no longer resides in this Apartment');</script>";
        }
      } else {
        echo "<script type='text/javascript'>alert('Wrong password or username');</script>";
      }
    }
  }
  ?>

</body>
<footer>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</footer>

</html>