
<?php
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

include "conn.php";
$errorMsg=''; 
$succmsg=''; 
$thisRandNum='';
$user_pic = "";
  if (isset($_POST['Submit'])) {
$user=$_POST['user'];
 $name = $_POST['name']; // filter everything but letters and numbers
 $email = $_POST['email'];
  // filter everything but letters and numbers
 $phone=$_POST['phone'];
   $dept = $_POST['dept'];
  $pass1 = $_POST['pass1'];
   $pass2 = $_POST['pass2'];
 // filter everything but letters and numbers

    
 $errorMsg="";
     // Error handling for missing data
     if ((!$user)||(!$name)||(!$email)  || (!$phone) || (!$dept)||(!$pass1)) { 

     $errorMsg = 'ERROR: You did not submit the following required information:<br /><br />';
      if(!$user){ 
       $errorMsg .= ' * Please Enter User ID<br />';
     } 
    if(!$name){ 
       $errorMsg .= ' * Please Enter Name<br />';
     } 
     if(!$email){ 
       $errorMsg .= ' * Please Enter Eamil<br />';
     } 
     if(!$phone){ 
       $errorMsg .= ' * Please Enter Phone Number<br />';
     }  
       if(!$dept){ 
       $errorMsg .= ' * Please Enter Department<br />';
     }  
      if(!$pass1){ 
       $errorMsg .= ' * Please Enter Password<br />';
     }  
     
     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     // Add user info into the database table for the main site table

} else {

// ------- PARSING PICTURE UPLOAD ---------
if($pass1==$pass2){
  $passwd=base64_encode($pass1);
mysqli_query($con,"INSERT INTO teacher VALUES('0','$user','$name','$email','$phone','$dept','$passwd','$pin','0')");

 require_once '../lib/swift_required.php'; 
$transport = Swift_SmtpTransport::newInstance('smtp.mailgun.org', 25)
  ->setUsername('postmaster@svceconnect.in')
  ->setPassword('dd86670d8398e88980ef557979b27b5e');

     $mailer = Swift_Mailer::newInstance($transport);



function emailTemplate($pin,$email,$user){
      //set the root
  $templateRaw = file_get_contents("regmail.html");

    //grab the template content             
    //replace all the tags
  //$template="";
  $arrayName = array('{pin}','{email}','{user}');
  $arrayName2 = array($pin,$email,$user);
  // $result = preg_replace(
 //    array('{pin}',$pin),
 //    array('{email}',$email)

 //    );
    $template= preg_replace($arrayName,$arrayName2, $templateRaw);
   // $template+= preg_replace('{email}',$email, $templateRaw);
  //  $template+= preg_replace('{regno}',$regno, $templateRaw);
    return $template;
}

$body = emailTemplate($pin,$email,$regno);
// Create a message
$message = Swift_Message::newInstance('SVCEConnect Faculty Account Activation')
  ->setFrom(array('noreply@svceconnect.in' => 'Account Activation'))
  //->setTo(array($email)
 //   ->setFrom(array('john@doe.com' => 'John Doe'))
  ->setTo(array($email,'other@domain.org' => 'SVCEFACULTY'))
  ->setBody("$body","text/html");
  $result = $mailer->send($message);
$succmsg='You Are Registered successfully<br><Br>Activation Pin has been send to your Email Address<br><a href="teachactivate.php?aid='.$aid.'">Activate Now</a>';
}else{

$succmsg='Your Password Does not Match';

}
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
<title>Faculty Registration</title>
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
<h3>Faculty Registration</h3>
<h4><?php echo $succmsg;?></h4>
</center>

<tabl0e class="mainBodyTable" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="738" valign="top">
      <table id="fortemp" width="600" align="center" cellpadding="8" cellspacing="0" style="border:#999 1px solid; background-color:#FBFBFB;">
        <form action="teachregister.php" method="post" enctype="multipart/form-data">
          <tr>
            <td align="left" colspan="2"><?php print $errorMsg; ?>      </td>
          </tr>
           <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> User ID:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="user" type="text" class="formFields" id="b_name" value="" size="32" maxlength="40" />
              <span id="nameresponse"></span></div></td>
          </tr>
     <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Name:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="name" type="text" class="formFields" id="b_name" value="" size="32"  maxlength="40" />
              <span id="nameresponse"></span></div></td>
          </tr>
          <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Email:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="email" type="text" class="formFields" id="b_name" value="" size="32" maxlength="40" />
              <span id="nameresponse"></span></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><div align="left">Mobile Number:<span class="brightRed"> </span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="phone" type="text" class="formFields" id="b_author" value="" size="32" maxlength="12" />
              <span id="nameresponse2"></span></div></td>
          </tr>
                 <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Department:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="dept" type="text" class="formFields" id="b_name" value="" size="32" maxlength="3" />
              <span id="nameresponse"></span></div></td>
          </tr>
             <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Password:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="pass1" type="password" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"></span></div></td>
          </tr>
             <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Password Confirm:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="pass2" type="password" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"></span></div></td>
          </tr>
         
         
         
          <tr>
            <td bgcolor="#FFFFFF">
            <td align="left" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="Register Now" id="Submit" />
        </form>
      </table>
</td>
    <td width="160" valign="top"></td>

  </tr><br>

<td align="left" bgcolor="#FFFFFF"><center>
<a href="teachlog.php"><input type="button" name="button" value="Already have an account" /></a><br>
  </td></center>
</table>

</body>
</html>