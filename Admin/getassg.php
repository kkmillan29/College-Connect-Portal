<?php
session_start();

if($_SESSION['aid']==null){
 header("location:login.php");
}else{

include "conn.php";

$id = $_SESSION['aid'];

}


$sql="SELECT * FROM teacher WHERE aid='$id'";
  $result=mysqli_query($con,$sql);
  $R= $result->fetch_array(MYSQLI_ASSOC);
  //debug($R);

?>
<?php
# connect to the database
include_once('conn.php');

	$name="fdf";
// database query
$sql = mysql_query('SELECT * FROM  assignment WHERE from='$name' ORDER BY id ASC');

# show database results
while($row = mysql_fetch_array($sql))
{
	echo '<b>Message ID:<font color="red">'.$row['0'].'</b></font><br><b>From: '.($row['1']).'<br>USN<u><strong><font color="red">: '.($row['2'])."</strong></font><br><br><br>";
}
mysql_close($link);


?>
