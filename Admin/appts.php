<?php
# connect to the database
include('scripts/conn.php');

// database query
$sql = mysqli_query('SELECT * FROM  appt ORDER BY time ASC');

# show database results
while($row = mysqli_fetch_array($sql))
{
	echo '<b>Appoinment ID: <font color="red">'.$row['0'].'</b></font><br><b>From: '.($row['1']).'<br><u>Purpose: '.($row['2'])."<br>Appoinment Date: ".($row['3']).'</b></u><br><b>Status:<font color="red">'.($row['5']).'</b></font><br><br><br>';
}
mysql_close($link);
# REFRESH PAGE

?>