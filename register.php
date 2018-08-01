<?php
$from = ""; // Initialize the email from variable
$nError="";
$errorMsg="";
// This code runs only if the username is posted
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
if (isset($_POST['regform'])) {
$crea="";

    // Connect to database
     include_once "scripts/conn.php";
        $regno = $_POST['username'];
     $email = $_POST['email'];
     $pass = $_POST['pass'];

   
   // Add MD5 Hash to the password variable
     $db_password =base64_encode($pass); 
    
     // GET USER IP ADDRESS
  
     $modded ="SELECT reg FROM student WHERE Reg_No='$regno'";




     $result=mysqli_query($con,$modded);


     $resultReg= $result->fetch_array(MYSQLI_ASSOC);
//var_dump($con->num_rows);
//$row_cnt = $result->num_rows;
   if($row =$resultReg){
 $reg = $row["reg"];
if($reg=="1"){

 $nError= ' <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
        <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
        Your account is Already created.</p>

      </div>';
}
  else
  {
   // Add MD5 Hash to the password variable
        $sql = mysqli_query($con,"UPDATE student SET Email='$email',Password='$db_password',vercode='$pin',reg='1' WHERE Reg_No='$regno'"); 
    
   // Create directory(folder) to hold each user's files(pics, MP3s, etc.)    
     mkdir("Students/$regno"); 

     require_once 'lib/swift_required.php'; 
$transport = Swift_SmtpTransport::newInstance('smtp.mailgun.org', 25)
  ->setUsername('postmaster@svceconnect.in')
  ->setPassword('dd86670d8398e88980ef557979b27b5e');

     $mailer = Swift_Mailer::newInstance($transport);


     require_once 'scripts/template.php'; 

$template = new Template; 

$body = $template->emailTemplate('regmail.html',$pin,$email,$regno);
// Create a message
$message = Swift_Message::newInstance('SVCEConnect Account Activation')
  ->setFrom(array('noreply@svceconnect.in' => 'Account Activation'))
  //->setTo(array($email)
 //   ->setFrom(array('john@doe.com' => 'John Doe'))
  ->setTo(array($email,'other@domain.org' => 'SVCEUSER'))
  ->setBody("$body","text/html");
  $result = $mailer->send($message);
 $nError= ' <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
        <p><span class="ui-state-highlight ui-corner-all" style="float: left; margin-right: .3em;"></span> 
Thanks for creating account in SVCEConnect </p>
<a href="activate.php?Reg_No='.$regno.'">Activate Now!</a>
      </div>';

}

   }
    // Close else after duplication checks


}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <meta name="description" content="Flat UI Kit Free is a Twitter Bootstrap Framework design and Theme, this responsive framework includes a PSD and HTML version."/>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
<?php include_once('scripts/depend.php');?>
     

  </head>
  <body>
<div class="ui-widget">
     <?php echo $nError;?>
    </div>
  <script language="javascript" type="text/javascript"> 
function validateForm(){
  var username=document.forms["0"] ["username"].value;
  if (username==null || username=="")
  {
    alert("Please Enter Registration Number");
  }

    var email=document.forms["0"] ["email"].value;
  if (email==null || email=="")
  {
    alert("Please Enter Email Id");
  }

      var password=document.forms["0"] ["pass"].value;
  if (password==null || password=="")
  {
    alert("Enter your password.");
  }
}

$(document).ready(
  function() {
  $("#username").blur(function() {
    $("#nameresponse").removeClass().text('Checking Student registration...').fadeIn(1000);
    $.post("scripts/checkingstudent.php",{ username:$(this).val() } ,function(data) {
        $("#nameresponse").fadeTo(200,0.1,function() { 
        $(this).html(data).fadeTo(900,1); 
      });
        });
  });
}
);
function toggleSlideBox(x) {
    if ($('#'+x).is(":hidden")) {
      $('#'+x).slideDown(300);
    } else {
      $('#'+x).slideUp(300);
    }
}

</script>
    <div class="container">
     
<br>
      <div class="login">
        <div class="login-screen">
          <div class="login-icon">
        <img src="images/icons/png/Infinity-Loop.png" alt="Welcome to Mail App" />
        <h4>Welcome to <small>SVCEConnect</small></h4>
      </div>
Register Now!
          <div class="login-form">
		  			  <span id="nameresponse"></span>
	<form action="register.php" method="POST" onSubmit="validateForm()">
    <input type="hidden" name="regform" value="form-1">
            <div class="form-group">
              <input type="text" name="username" id="username" class="form-control login-field" value="" placeholder="Enter your Registration No" id="username" />
              <label class="login-field-icon fui-user" for="login-name"></label>
            </div>
			
			<div class="form-group">
              <input type="email" name="email" id="email" class="form-control login-field" value="" placeholder="Enter your email" id="login-name" />
              <label class="login-field-icon fui-mail" for="login-name"></label>
            </div>
			
		

            <div class="form-group">
              <input type="password" name="pass" id="pass" class="form-control login-field" value="" placeholder="Password" id="login-pass" />
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>
<input type="submit" name="register" class="btn btn-primary btn-lg btn-block" value="Register Now!">
                        <a class="login-link" href="login.php">Already hav an account!</a>

            </form>
		  </div>
        </div>
      </div>

    </div> <!-- /container -->

    
    <!-- Load JS here for greater good =============================-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery.stacktable.js"></script>
    <script src="http://vjs.zencdn.net/4.3/video.js"></script>
    <script src="js/application.js"></script>


	</body>
</html>
