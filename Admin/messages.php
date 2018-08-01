<?php
# connect to the database
include_once('connection.php');

// database query
$sql = mysql_query('SELECT * FROM  adminmsg ORDER BY time ASC');

# show database results
while($row = mysql_fetch_array($sql))
{
	echo '<b>'.$row['0'].'</b>:<br>Subject: '.($row['1']).'<br><u>Message:'.($row['2'])."</u><br/><br>";
}
mysql_close($link);
# REFRESH PAGE

?>