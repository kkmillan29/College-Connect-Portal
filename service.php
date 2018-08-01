<?php
session_start();
if(!isset($_SESSION['Reg_No'])){
 header("location:login.php"); 
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


<?php
 // Must start session first thing

$user_pic="";//Intilization of variables
    $successMSG ="";





//Connect to the database through our include 
include_once "scripts/conn.php";
// Place Session variable 'id' into local variable
$id = $_SESSION['Reg_No'];
// Process the form if it is submit
$s1="";
$s2="";
$s3="";
$s4="";
$s5="";
$s6="";
$l1="";
$l2="";


// Query member data from the database and ready it for display
$sql = mysqli_query($con,"SELECT * FROM student WHERE Reg_No='$id' LIMIT 1");

if(count($sql)>0){
  $row=$sql->fetch_array(MYSQLI_ASSOC);
    
    $username=$row['Name'];
    $branch = $row['branch'];

       $branch = $row['branch'];
           $sem = $row['sem'];
            $sec = $row['sec'];
    $statename = $row['State'];
    $country = $row['Country'];
    $contact = $row['Contact_No'];
    
    }
      $check_pic = "Students/$id/pic1.jpg";
  $default_pic ="images/icons/png/user.png";
  if (file_exists($check_pic)) {
    $user_pic = '<img height="80px" width="80px"  src="'.$check_pic.'">';
  } else {
    $user_pic = '<img height="80px" width="80px"  src="'.$default_pic.'">';
      }


?>




  
  <body>
        <?php echo $successMSG;?>

  <br>	
   <?php  include_once('Master/header.php');
?>
   	<!-- /sdfds-->
	<div class="row">
		<!-- /Opening Friend Requests Div-->
	<div class="col-xs-10">
	
  <center><h4>Services Provided For Students</h4></center><br>
<a href="stdres.php"><input type="submit" name="result" id="submit" class="col-xs-10" value="RESULTS" ></a><br><br><br><Br>
<img src="images/edumob.png"><br>Learn High Level Language Programming Like(<b>PHP,JAVASCRIPT,HTML5,JAVA AND MORE</b>)<br>
What Course Your Life Will Take!
<br>
Certificate Affliation With: <b>Amzano , J2EE , ORACLE , E-KART ETC..  </b> <Br><br>
<a href="http://www.edumob.in">
<input type="submit" name="submit" id="submit" class="col-xs-10" value="Join Today To Become Developer" /></a><br><br>
<Br><br>
  <div class="row">

    <div class="col-xs-6">



	
	</div>
	</div>
	</div>
	<!-- /Closing Friend Requests Div-->
	<div class="col-xs-2">
					
	</div>
	</div><br>
  
  </div>

  </div>
	<!-- /sdfds-->
    <!-- /.container -->
<br><br>

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