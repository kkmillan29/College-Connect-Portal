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
<center>

          <img src="img/logo.png" width="220" height="120"></center>
       <h2><font color="#1980ea">SVCEConnect</h2></font><h4>Version:#1.1.2</h4>
       <BR>
       <H3> DEVELOPED BY: MD TABREZ ANSARI</H3><h5><a href="http://www.facebook.com/tabrezkhanprofile">More About Tabrez Ansari</a></h5><bR>
<H4> FEATURES DESIGN BY: YAWAR ABBAS NAJAR</H4><h5><a href="http://www.facebook.com/yawar4ali">More About Yawar Abbas</a></h5><bR><br>
       <br><h5>Powered By:</h5>
       <h6>Our Education Partner: </h6>  <td class="mcnImageContent" style="padding-right: 0px;padding-left: 0px;padding-top: 0;padding-bottom: 0;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top">
                                
                                    
                                        <img alt="" src="img/edumob.png" style="max-width: 257px;padding-bottom: 0;display: inline !important;vertical-align: bottom;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" class="mcnImage" align="left" width="257">
                                    
                                
                            </td><br><br><br>
       <br>
	   <H6> Our Helper: SADDAM ALI</H6><h6><a href="http://www.facebook.com/saddam.sam.161">More About Saddam Ali</a></h6><bR>
	    <H6> Our Helper: GAURAV NAYAK</H6><h6><a href="http://www.facebook.com/yawar4ali">More About Gaurav Nayak</a></h6><bR>
<center>
<h5>Copyright@2016 SVCEConnect</h5>

</center>







        
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