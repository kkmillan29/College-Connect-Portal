<?php
# connect to the database
include_once('connection.php');

// database query
$sql = mysql_query('SELECT * FROM  usnver ORDER BY time ASC');

# show database results
while($row = mysql_fetch_array($sql))
{
	echo '<b>Message ID:<font color="red">'.$row['0'].'</b></font><br><b>From: '.($row['1']).'<br>USN<u><strong><font color="red">: '.($row['2'])."</strong></font><br><br><br>";
}
mysql_close($link);


?>