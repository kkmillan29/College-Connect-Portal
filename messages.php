<?php
# connect to the database
include_once('Admin/connection.php');

// database query
$sql = mysql_query('SELECT * FROM chat ORDER BY time ASC');

# show database results
while($row = mysql_fetch_array($sql))
{
	echo '<b>'.$row['0'].'</b>: '.($row['1']).'-----------On:'.($row['2'])."<br/>";
}
mysql_close($link);
# REFRESH PAGE
echo '<META HTTP-EQUIV="refresh" CONTENT="5">';
?>