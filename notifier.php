<?php

// variables
if (isset($_POST['Submit'])) {

  


// Escape user inputs for security

$email =$_POST['email'];


if($email=="")
{

$errorMsg="Please Fill the Required Fields";

}
else{

// attempt insert query execution
 require_once 'lib/swift_required.php'; 
$transport = Swift_SmtpTransport::newInstance('smtp.mailgun.org', 25)
  ->setUsername('postmaster@svceconnect.in')
  ->setPassword('dd86670d8398e88980ef557979b27b5e');

     $mailer = Swift_Mailer::newInstance($transport);



function emailTemplate(){
      //set the root
  $templateRaw = file_get_contents("info.html");

    //grab the template content             
    //replace all the tags
  //$template="";

  // $result = preg_replace(
 //    array('{pin}',$pin),
 //    array('{email}',$email)

 //    );
    $template=$templateRaw;
   // $template+= preg_replace('{email}',$email, $templateRaw);
  //  $template+= preg_replace('{regno}',$regno, $templateRaw);
    return $template;

}

$body = emailTemplate();
// Create a message
$message = Swift_Message::newInstance('Invitation Mail SVCEConnect')
  ->setFrom(array('noreply@svceconnect.in' => 'Invitation Mail'))
  //->setTo(array($email)
 //   ->setFrom(array('john@doe.com' => 'John Doe'))
  ->setTo(array($email,'other@domain.org' => 'SVCESTUDENT'))
  ->setBody("$body","text/html");
  $result = $mailer->send($message);




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
<title>Application Book Appoinment</title>
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
        <form action="notifier.php" method="post" enctype="multipart/form-data">
          <?php print $errorMsg; ?> 
     

    

            <td width="114" bgcolor="#FFFFFF"><div align="left">Your Emails:<span class="brightRed"> *</span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="email" type="text" class="form-control" id="title" value=""/>
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Enter email</span></span></span></div></td>
          </tr>
       
            <td bgcolor="#FFFFFF">
<p></p>
            <td align="left" bgcolor="#FFFFFF"><input type="submit" class="btn btn-embossed btn-success" name="Submit" value="Send now" id="Submit" /> </td></td></tr></form>
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