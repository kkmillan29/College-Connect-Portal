<?php
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
session_start();
$admin="";
$password="";
if (isset($_POST['admin'])) {
//Connect to the database through our include 
include_once "conn.php";
	$admin = $_POST['adminname'];
	$pass = $_POST['pass'];
	$admin = stripslashes($_POST['adminname']);
$admin = strip_tags($admin);
$pass = $_POST['pass']; // filter everything but numbers and letters
$passwd=base64_encode($pass);


$sql ="SELECT * FROM teacher WHERE user='$admin' AND password='$passwd'"; 
$result=mysqli_query($con,$sql);
//var_dump($con->num_rows);
$row_cnt = $result->num_rows;


session_start();


if($row_cnt >0){ 
    while($row = mysqli_fetch_array($result)){ 
        $activate=$row['activate'];

        // Get member ID into a session variable
        $aid = $row["aid"];
      
       // session_register('aid'); 
        $_SESSION['aid'] = $aid;
      
        if($activate=="0"){

header("location:teachactivate.php?aid=$aid"); 

        }else{



header("location:teachadmin.php?aid=$aid");

        }
            
    		
 
    } // close while
} else {
// Print login failure message to the user and link them back to your login page
  print '<br /><br /><font color="#FF0000">No match in our records, try again </font><br />
<br /><a href="index.php">Click here</a> to go back to the login page.';

}
}// close if post

?>