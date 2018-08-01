<?php
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
error_reporting(E_ALL);
session_start();
$admin="";
$password="";
if (isset($_POST['admin'])) {
//Connect to the database through our include 
include_once "conn.php";
	$admin = $_POST['admin'];
	$pass = $_POST['pass'];
	$admin = stripslashes($_POST['admin']);
$admin = strip_tags($admin);
$pass = $_POST['pass']; // filter everything but numbers and letters

$query = "SELECT * FROM admin WHERE admin='$admin' AND password='$pass'";

$sql = mysqli_query($con,$query); 

$row_cnt = $sql->num_rows;

if($row_cnt > 0){ 

    $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
        // Get member ID into a session variable
        $aid = $row["aid"];   
        //session_register('aid'); 
        $_SESSION['aid'] = $aid;

           header("location:admin.php?id=$aid"); 
          exit();

    		
 
    } // close while
} else {
// Print login failure message to the user and link them back to your login page
  print '<br /><br /><font color="#FF0000">No match in our records, try again </font><br />
<br /><a href="index.php">Click here</a> to go back to the login page.';


}// close if post

?>