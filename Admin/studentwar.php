<?php
session_start();
if(!isset($_SESSION['aid'])){
  $id=$_POST['aid'];
 header("location:teachlog.php"); 
}

$succe="";
include "conn.php";
$id=$_GET['aid'];
$errorMsg='';	
$thisRandNum='';
$user_pic = "";
	if (isset($_POST['Submit'])) {
     $usn = $_POST['usn']; 
 $title = $_POST['title']; 
 $desc = $_POST['desc']; 
  
   
 $errorMsg="";
     // Error handling for missing data
     if ((!$title)||(!$desc)) { 

     $errorMsg = 'ERROR: You did not submit the following required information:<br /><br />';
      if(!$usn){ 
       $errorMsg .= ' * Please Enter USN of Student<br />';

     } 
   if(!$title){ 
       $errorMsg .= ' * Please Enter Mistake of Student<br />';

     } 
     if(!$desc){ 
       $errorMsg .= ' * Please Enter Message to Student<br />';

     } 
} else {

mysqli_query($con,"INSERT INTO notifys VALUES ('0', '$title',now(),'$desc','$usn','Administor')");
$succe="Message Send successfully";
}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<me0ta name="Description" content="Register to yourdomain" />
<meta name="Keywords" content="register, yourdomain" />
<meta name="rating" content="General" />
<title>Warning For Students</title>
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
        <form action="studentwar.php?aid=<?php echo $id;  ?>" method="post" enctype="multipart/form-data">
          <?php print $errorMsg; ?> 
     

     <td width="114" bgcolor="#FFFFFF"><div align="left">Student USN:<span class="brightRed"> *</span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="usn" type="text" class="form-control" id="title" value=""/>
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Enter USN</span></span></span></div></td>
          </tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left">What Mistake:<span class="brightRed"> *</span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="title" type="text" class="form-control" id="title" value=""/>
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Enter Mistake</span></span></span></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><div align="left">Message:<span class="brightRed"> *</span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="desc" type="textarea" class="form-control" id="desc" value=""/>
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor">Message for Students</span></span></span></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
<p></p>
            <td align="left" bgcolor="#FFFFFF"><input type="submit" class="btn btn-embossed btn-success" name="Submit" value="Send Warning Msg" id="Submit" /></form><a href="studentblock.php"> <align="left" bgcolor="#FFFFFF"><input type="submit" class="btn btn-embossed btn-success" name="block" value="Block Account" id="block" /></a><a href="clearwarning.php"> <align="left" bgcolor="#FFFFFF"><input type="submit" class="btn btn-embossed btn-success" name="delete" value="Delete Message" id="delete" /></a>



         
      </table>

     <center>     <a href="admin.php">    <img height="x" src="../img/home.png"></a></center>

<br />
      <br /></td>
    <td width="160" valign="top"></td>
  </tr>
</table>

</body>
</html>