<?php
session_start();
  $sid=$_SESSION['Reg_No'];
  if(!isset($_SESSION['Reg_No'])){
 header("location:login.php"); 
}
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
include "scripts/conn.php";
 function generatePIN($digit=4){
$i=0;
$pin="";
while ($i<$digit) {
  $pin.=mt_rand(0,9);
  $i++;
}
return $pin;


}
$pin=generatePIN();
// Escape user inputs for security
$from =$_POST['from'];
$purpus =$_POST['purpus'];
$date =$_POST['b_publisher'];



// attempt insert query execution
$sql = "INSERT INTO appt (aid,frm, pupus,adate,usn,status) VALUES ('$sid/$pin', '$from', '$purpus','$date','$sid','Pending')";
if(mysqli_query($con, $sql)){
      echo '<strong>Dear Mr. '.$from.'</strong><br><br>';
       echo "<b>Your Appoinment Booked Successfully</b><br><br>";
         echo "<b>Your Appoinment ID: </b>",'<font color="Red" size="4"><b>'.$sid.'/'.$pin.'</font></b><br><br>';

 echo "<b>Please Note Down Your Appoinment ID For Further Information!</b><br>";

      echo '<p><a href="home.php?Reg_No='.$sid.'">Go Back</a> to Home</p>';

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection

?>