<?php include "scripts/conn.php"; ?>
<?PHP
session_start();
// variables

  $sid=$_SESSION['Reg_No'];
$from = $_POST["from"];
$sub = $_POST["sub"];
$message = $_POST["msg"];



 


$sql = mysqli_query($con,"INSERT INTO adminmsg VALUES('$from', '$sub','$message',NULL)");

// if message was sent then redirect user to the chat messages else display error

  // PHP redirection
  echo "<h6>Thank Your For Your Message</h6>",'<strong>'.$from.'</strong>';
echo '<p><a href="home.php?Reg_No='.$sid.'">Go Back</a> to Home</p>';



?>