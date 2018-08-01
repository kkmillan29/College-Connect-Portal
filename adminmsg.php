<?php
session_start(); // Must start session first thing
  $sid=$_SESSION['Reg_No'];
if(!isset($_SESSION['Reg_No'])){
 header("location:login.php"); 
}
  ///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
  $check_pic = "Students/$sid/pic1.jpg";
  $default_pic = "images/icons/png/user.png";
  if (file_exists($check_pic)) {
    $user_pic = "<img src=\"$check_pic\" width=\"80px\" border=\"0\" />"; // forces picture to be 120px wide and no more
  } else {
  $user_pic = "<img src=\"$default_pic\" width=\"80px\"  border=\"0\" />"; // forces default picture to be 120px wide and no more
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SVCEConnect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">
  </head>
  <body>
    <br>  
<?php  include_once('Master/header.php');
?>
  <!-- /sdfds-->
  <div class="row">
    <!-- /Opening Friend Requests Div-->
  <div class="col-xs-10">
  <div class="row">

       <h3>Send Message Or Give Suggestion to Admin</h3>
       <h5>TO: Admin Of SVCEConnect</h5>
<form name="snd" action="adms.php" method="POST">
<div class="form-group">
<input type="text" name="from" class="form-control" id="user" value="  <?php @session_start(); echo $_SESSION['Name'];?>" placeholder="Your Chat Nickname" maxlength="200"/><br>
              <input type="text" name="sub" class="form-control login-field" value="" placeholder="Subject" id="login-pass" />
              
            </div>
            <textarea class="input" id="watermark" name="msg" placeholder="Type your Message Here!" cols="77" rows="3"></textarea><br>
<input type="submit" name="send" id="submit" class="btn btn-lg btn-info btn-block input-icon fui-user" value="Send" />



       </form> 
    </div>
  </div>
  <!-- /Closing Friend Requests Div-->




  </div>
  <br>
  <!-- /sdfds-->
    <!-- /.container -->


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
  </body>
</html>