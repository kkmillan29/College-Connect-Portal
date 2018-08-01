<?php
// variables
$user = $_POST['user'];
$ip = $_SERVER['REMOTE_ADDR'];
// escape any malicious characters
if (!get_magic_quotes_gpc())
{
 $user = addslashes($user);
}

if (empty($user))
{
	echo "Please enter a Chating  Nickname.";
}
else
	{
		# connect to the database
		include_once('Admin/connection.php');	
		// database query
		$sql = mysql_query("INSERT INTO chat VALUES ('$user','Just joins the chat!',NULL,'$ip')");	
		mysql_close($link);
		// create cookie and redierct user to chat page
		setcookie("name",$user,time()+3600,"/");	
		header("Location:public.php");	
	}	
?>
