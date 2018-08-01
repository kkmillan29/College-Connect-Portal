<?php
# connect to the database
include_once('connection.php');

// database query
$sql = mysql_query('SELECT * FROM chat ORDER BY time ASC');

# show database results
while($row = mysql_fetch_array($sql))
{
	echo '<b>'.$row['0'].'</b>: '.stripslashes($row['1'])."<br/>";
}
mysql_close($link);
# REFRESH PAGE
echo '<META HTTP-EQUIV="refresh" CONTENT="5">';
?>