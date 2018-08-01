<?php include('scripts/conn.php'); ?>
<?php

// variables
if (isset($_POST['Submit'])) {
 
$from = $_POST["title"];
$usn = $_POST["desc"];




 


$sql = mysqli_query($con,"INSERT INTO usnver VALUES ('$from', '$usn',NULL)");

// if message was sent then redirect user to the chat messages else display error

  // PHP redirection
  $succe="<h4>Thank Your For Your Request </h4><br><strong>".$from."</strong><br><br>Your USN Will Activate in 24 HRS<br>After 24 HRS You Can Create Your Account";
  //echo "<center><h4>Thank Your For Your Message</h4>",'<br><strong>'.$from.'</strong><br>';
//echo "Within 24 HRS Your USN Will be Verify by Admin<br>";
//echo "After 24 HRS You can able for Registration";



}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<me0ta name="Description" content="Register to yourdomain" />
<meta name="Keywords" content="register, yourdomain" />
<meta name="rating" content="General" />
<title>Application For Verification USN</title>
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
<body>
  <br>
  
<center>  <img height="" width="" src="img/logo.png"></center>
<Br>
  <p align="center"><?php echo $succe;?></p>
      <table id="fortemp" width="600" align="center" class="tile" cellpadding="8" cellspacing="0">
        <form action="usnrequest.php" method="post" enctype="multipart/form-data">
          <?php print $errorMsg; ?> 
     

    

            <td width="114" bgcolor="#FFFFFF"><div align="left">Your Name:<span class="brightRed"> *</span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="title" type="text" class="form-control" id="title" value=""/>
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Enter Your Name</span></span></span></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><div align="left">Your USN:<span class="brightRed"> *</span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="desc" type="textarea" class="form-control" id="desc" value=""/>
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor">Enter Your USN To Verify by Admin</span></span></span></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
<p></p>
            <td align="left" bgcolor="#FFFFFF"><input type="submit" class="btn btn-embossed btn-success" name="Submit" value="Apply For Verification" id="Submit" /> 
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