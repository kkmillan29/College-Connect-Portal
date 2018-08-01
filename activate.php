<?php

if(isset($_GET['Reg_No']))
{
include "scripts/conn.php";
$aid = $_GET['Reg_No'];

$sql=mysqli_query($con,"SELECT * FROM student WHERE Reg_No='$aid'");

 function generatePIN($digit=4){
$i=0;
$pin="";
while ($i<$digit) {
  $pin.=mt_rand(0,9);
  $i++;
}
return $pin;


}
$pin=generatePIN();
if(count($sql)>0){
  $row=$sql->fetch_array(MYSQLI_ASSOC);
    $email=$row['Email'];
   
    $otp =$row['vercode'];
$mobile=$row['mobile'];
$sucmsg='<font color="green" size="4">Verification Code Sent to:</font><font color="red">'.$email.'</font>';

    }
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

}


?>


<!DOCTYPE html>

  <head>
    <meta charset="utf-8">
    <title>Account Activation</title>
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
include "scripts/conn.php";
  $ad=$aid;
if (isset($_POST['Submit'])) {

 $email=$_POST['email']; 
if($otp==$email){

$sql = mysqli_query($con,"UPDATE student SET created='1' WHERE Reg_No='$ad'");

$sucmsg='Account has been Activated Successfully!<br><a href="login.php">Login Now</a>';
     


}
else{

$sucmsg='<font color="red" size="4">Invalid Verification Code!</font>';

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
<?php  echo $sucmsg;  ?>
<?php echo $errorMSG;?>
<form action="activate.php?Reg_No=<?php echo $ad?>" method="POST">
          <div class="login-form">
            <div class="form-group">
              <input type="text" name="email" class="form-control login-field" value="" placeholder="Enter Verificatio Code" id="login-name" />
              <label class="login-field-icon fui-mail" for="login-name"></label>
            </div>
       
                      <input type="submit" name="Submit" class="btn btn-primary btn-lg btn-block" value="Activate">
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
