<?php
session_start();
if(!isset($_SESSION['aid'])){
  $id=$_POST['aid'];

 header("location:officiallog.php"); 
}

$succe="";
include "conn.php";
$errorMsg='';	
$thisRandNum='';
$user_pic = "";




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<me0ta name="Description" content="Register to yourdomain" />
<meta name="Keywords" content="register, yourdomain" />
<meta name="rating" content="General" />
<title>book</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<script src="js/jquery-1.4.2.js" type="text/javascript"></script>

<style type="text/css">
<!--
.style26 {color: #FF0000}
.style28 {font-size: 14px}
.brightRed {
	color: #F00;
}
.textSize_9px {
	font-size: 9px;
}
body {
  background: url('../img/bg.jpg');
  background-repeat: no-repeat;
  background-size: 100%;
  margin-top: 0px;
}
#fortemp{
  background-color:#f5f5f5;
  padding:15px;
  
  -moz-border-radius:12px;
  -khtml-border-radius: 12px;
  -webkit-border-radius: 12px;
  border-radius:12px;
}

-->
</style>
<link href="../css/flat-ui.css" rel="stylesheet">
    <link href="../css/demo.css" rel="stylesheet">
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

</head>
<body>
  <br>
  
<center>  <img height="" width="" src="../img/logo.png"></center>
<Br>
  <p align="center"><?php echo $succe;?></p>
      <table id="fortemp" width="600" align="center" class="tile" cellpadding="8" cellspacing="0">
        <form action="book.php" method="post" enctype="multipart/form-data">
          <?php print $errorMsg; ?> 
     

     <font size="+2"><center>ADMIN INBOX</center></font>
<iframe src="messages.php" class="form-control3"
   height="85%" width="100%" frameborder="5" scrolling="yes" title="All Messages">Sorry your neeed a browser upgrade to use this service. <br/>Please download <a href="http://www.mozilla.com/en-US/firefox/">firefox.com</a></iframe><br>

        </form>
      </table><center>
  <a href="inboxclear.php">    <td align="left" bgcolor="#FFFFFF"><input type="submit" class="btn btn-embossed btn-success" name="clear" value="Clear Inbox" id="Submit" /></td></a></center>
               <center>     <a href="admin.php?id=1">    <img height="x" src="../img/home.png"></a></center>


<br />
      <br /></td>
    <td width="160" valign="top"></td>
  </tr>
</table>

</body>
</html>