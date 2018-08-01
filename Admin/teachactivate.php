<?php
session_start();
if(!isset($_SESSTION['aid']))
{

$id =$_GET['aid'];

}

include "conn.php";
$sql = mysqli_query($con,"SELECT * FROM teacher WHERE aid='$id'"); 

if(count($sql)>0){
  $row=$sql->fetch_array(MYSQLI_ASSOC);
        $vercoe=$row['otp'];


}
?>

<?php

$errorMsg=''; 
$succmsg=''; 
$thisRandNum='';
$user_pic = "";
  if (isset($_POST['Submit'])) {
$code=$_POST['otp1'];


 if($code==""){ 
       $errorMsg .= ' * Please Enter Activation Code<br />';
     } else{
 if($vercoe==$code){
$sql = mysqli_query($con,"UPDATE `svceconnect`.`teacher` SET `activate` = '1' WHERE `teacher`.`aid` = '$id'");
$succmsg="Acconnt Activated Successfully!<br><br><a href='teachlog.php'>Login Now!</a>";



 }else
 {

$errorMsg="You have entered Wrong Activation Coed!!!"; 

 }



     }


}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <script type="text/javascript" src="js/mootools-1.2.1-core-yc.js"></script>
  <script type="text/javascript" src="js/process.js"></script>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
<title>Faculty Account Activation</title>
  <link rel="shortcut icon" href="../images/favicon.ico">

<style type="text/css">
<!--
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
</style></head>
<body>
<p>&nbsp;</p>



<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center">

  <img height="" width="" src="../img/logo.png">
  <center><font size="4"><b>Faculty Account Activation</center></b><br>You have not activated yet your account please activate now!<br><br>
 <font color="red"> Activation Code has been sent to Your Registered Email!!</font></font><br><br>
 <font color="red"><?php echo $succmsg; ?><?php  echo $errorMsg;?></font>
<table id="fortemp" width="400" align="center" cellpadding="6" style="background-color:#FFF; border:#666 1px solid;">
  <form action="teachactivate.php?aid=<?php echo $id; ?>" method="post"  name="signinform" id="signinform">
    <tr>
    </tr>

    <tr>
      <td width="21%"><strong>Activation Code:</strong></td>
      <td width="51%"><input name="otp1" type="text" id="" style="width:60%;" /></td>
    </tr>
    <tr>
     
        <br /></td>
    </tr>
    <tr>
 <td>
<input id="Submit" type="submit" name="Submit" value="Activate Now"></td>
    </tr>
  </form>
  



</table>
</fieldset>
</center><p><br />
  <br />
</p>
</body>
</html>