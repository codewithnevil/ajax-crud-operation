<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "ajax_crud";

$con = mysqli_connect("$server","$user","$pass","$database");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>