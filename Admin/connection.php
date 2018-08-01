<?php
// MySQL database connection file
$SERVER = "localhost"; // MySQL SERVER
$USER = "root"; 		// MySQL USER
$PASSWORD = "mysql";		// MySQL PASSWORD

$link = @mysql_connect($SERVER,$USER,$PASSWORD);
$db = mysql_select_db("svceconnect");

?>