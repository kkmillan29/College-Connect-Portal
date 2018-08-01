<?php
$db_host="localhost";
$db_username="root";
$db_pass="mysql";
$db_name="svceconnect";


$con = mysqli_connect($db_host,$db_username,$db_pass,$db_name);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


?>