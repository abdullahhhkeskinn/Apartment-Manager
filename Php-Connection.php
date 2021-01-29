<?php
session_start();
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "apartmentmanager";
$conn  = mysqli_connect($sname, $uname, $password, $db_name);
?>