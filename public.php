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
<?php include_once('connection.php'); ?>
  <!-- /sdfds-->
  <div class="row">
    <!-- /Opening Friend Requests Div-->
  <div class="col-xs-10">
  <div class="row">
  <h6>SVCEConnect Public Chat Portal</h6><font color="red">Extra Care:<b>Faculty & Alumini Also Present.</b></font>
<iframe src="messages.php" class="form-control3"
   height="65%" width="50%" frameborder="5" scrolling="yes" title="All Messages">Sorry your neeed a browser upgrade to use this service. <br/>Please download <a href="http://www.mozilla.com/en-US/firefox/">firefox.com</a></iframe>
<br>
<br>
<form name="form1" method="post" action="send.php">
  <center>
  
    <input name="message" type="text" id="message" size="50" placeholder="Type your message here!"><br><br>
    

    <input type="submit" name="Submit" class="btn btn-lg btn-info btn-block input-icon fui-user" value="Send Message">

  </center>
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