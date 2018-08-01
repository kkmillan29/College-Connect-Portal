
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>forgot password</title>
    <meta name="description" content="Flat UI Kit Free is a Twitter Bootstrap Framework design and Theme, this responsive framework includes a PSD and HTML version."/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php
if(isset($_POST['submit']))
{ 
include"scripts/conn.php";
 $email=$_POST['email'];
 $sql = mysqli_query($con,"SELECT * FROM student WHERE Email='$email'"); 

if(count($sql)>0){
  $row=$sql->fetch_array(MYSQLI_ASSOC);
        // Get member ID into a session variable
        $name=$row["Name"];  


        $password=$row['Password'];
        $password=base64_decode($password);
    
     require_once 'lib/swift_required.php'; 
$transport = Swift_SmtpTransport::newInstance('smtp.mailgun.org', 25)
  ->setUsername('postmaster@svceconnect.in')
  ->setPassword('dd86670d8398e88980ef557979b27b5e');

     $mailer = Swift_Mailer::newInstance($transport);



function emailTemplate($name,$password){
      //set the root
  $templateRaw = file_get_contents("reset.html");

    //grab the template content             
    //replace all the tags
  //$template="";
  $arrayName = array('{name}','{password}');
  $arrayName2 = array($name,$password);
  // $result = preg_replace(
 //    array('{pin}',$pin),
 //    array('{email}',$email)

 //    );
    $template= preg_replace($arrayName,$arrayName2, $templateRaw);
   // $template+= preg_replace('{email}',$email, $templateRaw);
  //  $template+= preg_replace('{regno}',$regno, $templateRaw);
    return $template;
}

$body = emailTemplate($name,$password);
// Create a message
$message = Swift_Message::newInstance('SVCEConnect Password Forgot')
  ->setFrom(array('noreply@svceconnect.in' => 'Forgot Password'))
  //->setTo(array($email)
 //   ->setFrom(array('john@doe.com' => 'John Doe'))
  ->setTo(array($email,'other@domain.org' => 'SVCEUSER'))
  ->setBody("$body","text/html");
  $result = $mailer->send($message);
  echo "password has been sent to your registered email address";

 

 

}

}
?>
  <body>
    <div class="container">
     
<br>
      <div class="login" background="1.jpeg">
        <div class="login-screen">
          <div class="login-icon">
            <img src="images/icons/png/Infinity-Loop.png" alt="Welcome to Mail App" />
            <h4>Welcome to <small>SVCEConnect</small></h4>
          </div>
Forgot Password Panel
<?php echo $errorMSG;?>
<form action="forgot.php" method="POST">
          <div class="login-form">
            <div class="form-group">
              <input type="email" name="email" class="form-control login-field" value="" placeholder="Enter your email" id="login-name" />
              <label class="login-field-icon fui-mail" for="login-name"></label>
            </div>
       
                      <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" href="#" value="Send Password">
                        <a class="login-link" href="register.php">Create an account now!</a>
                         
          </div>
        </form>
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
