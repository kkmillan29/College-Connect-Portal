<?PHP
// variables
$name = $_COOKIE["name"];
$message = $_POST["message"];
$ip = $_SERVER['REMOTE_ADDR'];

# checks that the user nickname is present
if( empty($name) )
{
	exit('You must <a href="public.php">login</a> in to chat!');
}
else# checks that the user message is present
	if( empty($message) )
	{
		exit('You must type a message!');
	}
// escape any malicious characters
if (!get_magic_quotes_gpc())
{
 $message = addslashes($message);
}
# connect to the database
include_once('connection.php');

// database query
$sql = mysql_query("INSERT INTO chat VALUES('$name', '$message',NULL,'$ip')");

// if message was sent then redirect user to the chat messages else display error
if (mysql_affected_rows() == 1)
{
	// PHP redirection
	header("Location:chat.html");	
}
else
	{
		echo "Sorry, your message could not be sent!";
	}
mysql_close($link);
?>