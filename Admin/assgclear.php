<?php
session_start();
if(!isset($_SESSION['aid'])){


 header("location:teachlog.php"); 
}
?>
<?php
$id=$_GET['aid'];
include "conn.php";
$errorMsg=''; 
$succmsg=''; 
$thisRandNum='';
$user_pic = "";
	if (isset($_POST['Submit'])) {

  // filter everything but letters and numbers
 $asid=$_POST['asid'];
// filter everything but letters and numbers

    
 $errorMsg="";
     // Error handling for missing data
     if ((!$asid)) { 

     $errorMsg = 'ERROR: You did not submit the following required information:<br /><br />';
    if(!$asid){ 
       $errorMsg .= ' * Please Enter Assignment ID<br />';
     } 

     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     // Add user info into the database table for the main site table

} else {

// ------- PARSING PICTURE UPLOAD ---------


mysqli_query($con,"DELETE FROM `svceconnect`.`assignment` WHERE `assignment`.`aid` = '$asid'");

$files=glob("../assignment/$asid/*");
foreach ($files as $file) {
  if(is_file($file))
    unlink($file);
  # code...
}
rmdir("../assignment/$asid");


$succmsg='Assignment ID:<font color="red">'.$asid.'</font> Deleted successfully';
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
<title>Delete Assignment</title>
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

</head>



<body>

<center>  <img src="../img/logo.png">
<h3>Delete Assignment</h3>
<h4><?php echo $succmsg;?></h4>
</center>

<tabl0e class="mainBodyTable" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="738" valign="top">
      <table id="fortemp" width="600" align="center" cellpadding="8" cellspacing="0" style="border:#999 1px solid; background-color:#FBFBFB;">
        <form action="assgclear.php?aid=<?php echo $id;  ?>" method="post" enctype="multipart/form-data">
          <tr>
            <td align="left" colspan="2"><?php print $errorMsg; ?>			</td>
          </tr>
     <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Assignment ID:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="asid" type="text" class="formFields" id="b_name" value="" size="32" placeholder="ex:DSA1" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
   
          <tr>
            <td bgcolor="#FFFFFF">
            <td align="left" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="Delete Assignmet" id="Submit" />
        </form>
      </table>
</td>
    <td width="160" valign="top"></td>

  </tr><br>

</table>
         <center>     <a href="teachadmin.php?aid=<?php echo $id;?>">    <img height="x" src="../img/home.png"></a></center>
</body>
</html>