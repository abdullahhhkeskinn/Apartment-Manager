<?php
session_start();
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "apartmentmanager";
$conn  = mysqli_connect($sname, $uname, $password, $db_name);

if (isset($_SESSION['errorMessage'])) { ?>
  <script type='text/javascript'>
    alert = "An error has occured during process please try again"
    confirm(alert);
  </script>
<?php
  unset($_SESSION['errorMessage']);
}
?>