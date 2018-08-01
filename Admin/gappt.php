<?php
# connect to the database
include_once('connection.php');

// database query
$sql = mysql_query("SELECT * FROM  guest  WHERE confirm='1'");

# show database results
while($row = mysql_fetch_array($sql))
{
  echo '<b>Appoinment ID: <font color="red">'.$row['0'].'</b></font><br><b>From: '.($row['1']).'<br>Mobile:'.($row['2']).'<br><u>Purpose: '.($row['5'])."<br>Appoinment Date: ".($row['6']).'</b></u><br><b>Status:<font color="red">'.($row['10']).'</b></font><br><br><br>';
}
mysql_close($link);
# REFRESH PAGE

?>