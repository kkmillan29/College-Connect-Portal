<?php

// variables
if (isset($_POST['Submit'])) {

  
$link = mysqli_connect("localhost", "root", "mysql", "svceconnect");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 function generatePIN($digit=6){
$i=0;
$pin="";
while ($i<$digit) {
  $pin.=mt_rand(0,9);
  $i++;
}
return $pin;


}
$pin=generatePIN();
// Escape user inputs for security
$from = mysqli_real_escape_string($link, $_POST['name']);
$mobile = mysqli_real_escape_string($link, $_POST['mobile']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$adress = mysqli_real_escape_string($link, $_POST['adress']);
$purpose = mysqli_real_escape_string($link, $_POST['purpose']);
$date = mysqli_real_escape_string($link, $_POST['adate']);

if($from==""||$mobile==""||$email==""||$adress==""||$purpose==""||$date=="")
{

$errorMsg="Please Fill the all Required Fields";

}
else{

// attempt insert query execution
$sql = "INSERT INTO guest (aid,name, mobile,email,adress,purpose,adate,otp) VALUES ('Guest/$date/$pin', '$from', '$mobile','$email','$adress','$purpose','$date','$pin')";
  require_once 'lib/swift_required.php'; 
$transport = Swift_SmtpTransport::newInstance('smtp.mailgun.org', 25)
  ->setUsername('postmaster@svceconnect.in')
  ->setPassword('dd86670d8398e88980ef557979b27b5e');

     $mailer = Swift_Mailer::newInstance($transport);



function emailTemplate($pin,$date,$from){
      //set the root
  $templateRaw = file_get_contents("guestconf.html");

    //grab the template content             
    //replace all the tags
  //$template="";
  $arrayName = array('{otp}','{date}','{name}');
  $arrayName2 = array($pin,$date,$from);
  // $result = preg_replace(
 //    array('{pin}',$pin),
 //    array('{email}',$email)

 //    );
    $template= preg_replace($arrayName,$arrayName2, $templateRaw);
   // $template+= preg_replace('{email}',$email, $templateRaw);
  //  $template+= preg_replace('{regno}',$regno, $templateRaw);
    return $template;
}

$body = emailTemplate($pin,$date,$from);
// Create a message
$message = Swift_Message::newInstance('SVCEConnect Guest Booking Confirmation')
  ->setFrom(array('noreply@svceconnect.in' => 'Booking Confirmation'))
  //->setTo(array($email)
 //   ->setFrom(array('john@doe.com' => 'John Doe'))
  ->setTo(array($email,'other@domain.org' => 'SVCEGUSET'))
  ->setBody("$body","text/html");
  $result = $mailer->send($message);

if(mysqli_query($link, $sql)){
header("location:confguest.php?aid=Guest/$date/$pin"); 
exit();

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


}
 
// close connection
mysqli_close($link);
 }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<me0ta name="Description" content="Register to yourdomain" />
<meta name="Keywords" content="register, yourdomain" />
<meta name="rating" content="General" />
<title>Notifier System</title>
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
  
<center>  <img height="" width="220" src="img/logo.png"></center>
<Br>
  <p align="center"><?php echo $succe;?></p>
      <table id="fortemp" width="600" align="center" class="tile" cellpadding="8" cellspacing="0">
        <form action="guest.php" method="post" enctype="multipart/form-data">
          <?php print $errorMsg; ?> 
     

    

            <td width="114" bgcolor="#FFFFFF"><div align="left">Your Name:<span class="brightRed"> *</span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="name" type="text" class="form-control" id="title" value=""/>
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Enter Your Name</span></span></span></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><div align="left">Your Mobile:<span class="brightRed"> *</span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="mobile" type="textarea" class="form-control" id="desc" value=""/>
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor">Enter Your Mobile Number</span></span></span></div></td>
          </tr>
                 <tr>
            <td bgcolor="#FFFFFF"><div align="left">Your Email:<span class="brightRed"> *</span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="email" type="textarea" class="form-control" id="desc" value=""/>
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor">Enter Your Email</span></span></span></div></td>
          </tr>
                 <tr>
            <td bgcolor="#FFFFFF"><div align="left">Address:<span class="brightRed"> *</span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="adress" type="textarea" class="form-control" id="desc" value=""/>
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor">Enter Your Address for further Communication</span></span></span></div></td>
          </tr>
                 <tr>
            <td bgcolor="#FFFFFF"><div align="left">Purpose:<span class="brightRed"> *</span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="purpose" type="textarea" class="form-control" id="desc" value=""/>
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor">What Purpose you Booking for </span></span></span></div></td>
          </tr>
                 <tr>
            <td bgcolor="#FFFFFF"><div align="left">Appoinment Date:<span class="brightRed"> *</span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="adate" type="date" class="form-control" id="desc" value=""/>
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor">Select your Appoinment Date</span></span></span></div></td>
          </tr>

          <tr>
            <td bgcolor="#FFFFFF">
<p></p>
            <td align="left" bgcolor="#FFFFFF"><input type="submit" class="btn btn-embossed btn-success" name="Submit" value="Book Now" id="Submit" /> </td></td></tr></form>
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