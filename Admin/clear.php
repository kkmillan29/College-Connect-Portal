<?php

session_start();
if(!isset($_SESSION['aid'])){
  $id=$_POST['aid'];

 header("location:index.php"); 
}
?>
<?php
$con=mysqli_connect("localhost","root","mysql","svceconnect");
if(mysqli_connect_errno($con)){
echo "Failed to Connect Database".mysqli_connect_errno();



}
$sql="TRUNCATE TABLE chat";
echo "Chat Data has been Cleared Now!";
echo '<p><a href="admin.php?id=1">Go Back</a> to Your Admin Panel</p>';

mysqli_query($con,$sql) or die(mysqli_error());





?>