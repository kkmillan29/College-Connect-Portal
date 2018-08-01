<?php


if(isset($_GET['aid']))
{
include "scripts/conn.php";
$aid = $_GET['aid'];

$sql=mysql_query("SELECT * FROM guest WHERE aid='$aid'");

 while($row = mysql_fetch_array($sql))
    {
    $from=$row['name'];
    $date = $row['adate'];
    $otp =$row['otp'];
$mobile=$row['mobile'];
$email=$row['email'];


    }
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
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
<title>Booking confirmation</title>
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
  background: url('img/bg.jpg');
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
<link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

</head>

<?php
include "scripts/conn.php";
  $ad=$aid;
if (isset($_POST['Submit'])) {

 $otp1=$_POST['otp1']; 
if($otp==$otp1){

$sql = mysql_query("UPDATE guest SET confirm='1' WHERE aid='$ad'");
 echo '<strong>Dear Mr. '.$from.'</strong><br><br>';
       echo "<b>Your Appoinment Booked Successfully</b><br><br>";
         echo "<b>Your Appoinment ID: </b>",'<font color="Red" size="4"><b>'.$aid.'</font></b><br><br>';

 echo "<b>Please Note Down Your Appoinment ID For Further Information!</b><br>";

      echo '<p><a href="login.php">Go Back</a></p>';
     


}
else{

echo '<h4><font color="red">Invalid OTP Try Again!</font></h4>';

}

 
}
?>


<body>
  <br>
  
<center>  <img height="" width="220" src="img/logo.png"></center>
<Br>
  <p align="center"><?php echo $succe;?></p>
      <table id="fortemp" width="600" align="center" class="tile" cellpadding="8" cellspacing="0">
        <form action="confguest.php?aid=<?php echo $ad?>" method="post" enctype="multipart/form-data">
          <?php print $errorMsg; ?> 
     
<center>
    
<b>Confirmation Code(******)</b> has been sent to your provide Email Address:<b><?php echo "$email";  ?></b><br><br></center>
            <td width="114" bgcolor="#FFFFFF"><div align="left">Enter Confirmation Code:<span class="brightRed"> *</span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="otp1" type="text" class="form-control" id="title" value=""/>
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Enter OTP</span></span></span></div></td>
          </tr>


          <tr>
            <td bgcolor="#FFFFFF">
<p></p>
            <td align="left" bgcolor="#FFFFFF"><input type="submit" class="btn btn-embossed btn-success" name="Submit" value="Confirm Booking" id="Submit" /> </td></td></tr></form>
      </table>
<br><br>

   <center>     <a href="login.php">   Go Back to  Login </a></center>
<br />
      <br /></td>
    <td width="160" valign="top"></td>
  </tr>
</table>

</body>
</html>