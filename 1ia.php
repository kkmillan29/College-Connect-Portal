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
      if($sem=="1" AND $branch=="CSE"||$branch=="ISE"||$branch=="ME"){
$s1="Engineering Mathematics I";
$s2="Engineering Physics";
$s3="Elements of Civil Engineering";
$s4="Mechanical Engineering";
$s5="Basic Electrical";
$s6="Consitution Of India";
$l1="Engineering Physics Lab";
$l2="Workshop";


      }
            if($sem=="1" AND $branch=="ECE"||$branch=="CIV"||$branch=="EEE"){
$s1="Engineering Mathematics I";
$s2="Engineering Chemistry";
$s3="Computer Aided Engineering Drawing";
$s4="Programmig In C & Data";
$s5="Basic Electronics";
$s6="Enviroment Studes";
$l1="Engineering Chemistry Lab";
$l2="PCD Lab";


      }
            if($sem=="2" AND $branch=="ECE"||$branch=="CIV"||$branch=="EEE"){
$s1="Engineering Mathematics II";
$s2="Engineering Physics";
$s3="Elements of Civil Engineering";
$s4="Mechanical Engineering";
$s5="Basic Electrical";
$s6="Consitution Of India";
$l1="Engineering Physics Lab";
$l2="Workshop";


      }
            if($sem=="2" AND $branch=="CSE"||$branch=="ISE"||$branch=="ME"){
$s1="Engineering Mathematics II";
$s2="Engineering Chemistry";
$s3="Computer Aided Engineering Drawing";
$s4="Programmig In C & Data";
$s5="Basic Electronics";
$s6="Enviroment Studes";
$l1="Engineering Chemistry Lab";
$l2="PCD Lab";


      }

      if($sem=="3" AND $branch=="CSE" ||$branch=="ISE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
            if($sem=="3" AND $branch=="ECE"){

$s1="Engineering Mathematics III";
$s2="Analog Electronics";
$s3="Digital Electronics";
$s4="Network Analysis";
$s5="Electronics Instrumentation";
$s6="Engineering Electromagnetics";
$l1="Analog Electronics Lab";
$l2="Digital Electronics Lab";


      }
                  if($sem=="3" AND $branch=="CIV"){

$s1="Engineering Mathematics III";
$s2="Analog Electronics";
$s3="Digital Electronics";
$s4="Network Analysis";
$s5="Electronics Instrumentation";
$s6="Engineering Electromagnetics";
$l1="Analog Electronics Lab";
$l2="Digital Electronics Lab";


      }
                  if($sem=="3" AND $branch=="EEE"){

$s1="Engineering Mathematics III";
$s2="Analog Electronics";
$s3="Digital Electronics";
$s4="Network Analysis";
$s5="Electronics Instrumentation";
$s6="Engineering Electromagnetics";
$l1="Analog Electronics Lab";
$l2="Digital Electronics Lab";


      }
                  if($sem=="3" AND $branch=="ME"){

$s1="Engineering Mathematics III";
$s2="Analog Electronics";
$s3="Digital Electronics";
$s4="Network Analysis";
$s5="Electronics Instrumentation";
$s6="Engineering Electromagnetics";
$l1="Analog Electronics Lab";
$l2="Digital Electronics Lab";


      }
                        if($sem=="4" AND $branch=="CSE"||$branch=="ISE"){

$s1="Engineering Mathematics IV";
$s2="Analog Electronics";
$s3="Digital Electronics";
$s4="Network Analysis";
$s5="Electronics Instrumentation";
$s6="Engineering Electromagnetics";
$l1="Analog Electronics Lab";
$l2="Digital Electronics Lab";


      }
                        if($sem=="4" AND $branch=="ME"){

$s1="Engineering Mathematics IV";
$s2="Analog Electronics";
$s3="Digital Electronics";
$s4="Network Analysis";
$s5="Electronics Instrumentation";
$s6="Engineering Electromagnetics";
$l1="Analog Electronics Lab";
$l2="Digital Electronics Lab";


      }
                        if($sem=="4" AND $branch=="ECE"){

$s1="Engineering Mathematics IV";
$s2="Analog Electronics";
$s3="Digital Electronics";
$s4="Network Analysis";
$s5="Electronics Instrumentation";
$s6="Engineering Electromagnetics";
$l1="Analog Electronics Lab";
$l2="Digital Electronics Lab";


      }
                        if($sem=="4" AND $branch=="CIV"){

$s1="Engineering Mathematics IV";
$s2="Analog Electronics";
$s3="Digital Electronics";
$s4="Network Analysis";
$s5="Electronics Instrumentation";
$s6="Engineering Electromagnetics";
$l1="Analog Electronics Lab";
$l2="Digital Electronics Lab";


      }
                        if($sem=="4" AND $branch=="EEE"){

$s1="Engineering Mathematics IV";
$s2="Analog Electronics";
$s3="Digital Electronics";
$s4="Network Analysis";
$s5="Electronics Instrumentation";
$s6="Engineering Electromagnetics";
$l1="Analog Electronics Lab";
$l2="Digital Electronics Lab";


      }

           if($sem=="5" AND $branch=="CSE" ||$branch=="ISE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                 if($sem=="5" AND $branch=="ME"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                 if($sem=="5" AND $branch=="ECE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                 if($sem=="5" AND $branch=="CIV"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                 if($sem=="5" AND $branch=="EEE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                       if($sem=="6" AND $branch=="CSE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                       if($sem=="6" AND $branch=="ISE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                       if($sem=="6" AND $branch=="ME"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                       if($sem=="6" AND $branch=="ECE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                       if($sem=="6" AND $branch=="CIV"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                       if($sem=="6" AND $branch=="EEE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                             if($sem=="7" AND $branch=="CSE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                             if($sem=="7" AND $branch=="ISE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                             if($sem=="7" AND $branch=="ME"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
     if($sem=="7" AND $branch=="ECE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                             if($sem=="7" AND $branch=="CIV"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                             if($sem=="7" AND $branch=="EEE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                                   if($sem=="8" AND $branch=="CSE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                                   if($sem=="8" AND $branch=="ISE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                                   if($sem=="8" AND $branch=="ME"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                                   if($sem=="8" AND $branch=="ECE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                                   if($sem=="8" AND $branch=="CIV"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }
                                   if($sem=="8" AND $branch=="EEE"){

$s1="Engineering Mathematics III";
$s2="Analog & Digital Electronics";
$s3="Computer Organization";
$s4="Data Structure & Aplication";
$s5="UNIX & Shell Programmig";
$s6="Discrete Mathematics & Structure";
$l1="Data Structure Lab";
$l2="Analog & Digital Lab";


      }



?>




  </head>


  <?php
// Query member data from the database and ready it for display
$sql = mysqli_query($con,"SELECT * FROM result WHERE usn='$id' AND sem='$sem' AND branch='$branch' AND type='1IA' LIMIT 1");

if(count($sql)>0){
  $row=$sql->fetch_array(MYSQLI_ASSOC);
    $sub1=$row['sub1'];
    $sub2 = $row['sub2'];
$ia=$row['type'];
       $sub3 = $row['sub3'];
           $sub4 = $row['sub4'];
            $sub5 = $row['sub5'];
    $sub6 = $row['sub6'];
    $lab1 = $row['lab1'];
    $lab2 = $row['lab2'];
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
  
  <center><h4>Results For Students of I(IA)</h4></center><br>



<table class="col-xs-10" border="1">

<tr>
<td><center><?php echo "$username"; ?></center></td> <td><center>Branch: <?php echo "$branch"; ?></center></td>  <td><center>Sem: <?php echo "$sem"; ?></center></td>  <td><center>Section: <?php echo "$sec"; ?></center></td> <td><center>Type: <?php echo "$ia"; ?></center></td>
</tr></table><br>

<br>
<table class="col-xs-10" border="1">
<tr>
<td><center>Subjects</center></td> <td><center>Full Marks</center></td>  <td><center> Pass Marks</center></td> <td><center> Score</center></td>
</tr>
<tr>
<td><center><?php echo $s1; ?></center></td> <td><center> 20</center></td>  <td><center>12</center></td> <td><center> <?php echo "$sub1"; ?></center></td>
</tr>
  <tr>
<td><center><?php echo $s2; ?></center></td> <td><center> 20</center></td>  <td><center> 12</center></td> <td><center> <?php echo "$sub2"; ?></center></td>
</tr>
<tr>
<td><center><?php echo $s3; ?></center></td> <td><center>20</center></td>  <td><center> 12</center></td> <td><center> <?php echo "$sub3"; ?></center></td>
</tr>
<tr>
<td><center><?php echo $s4; ?></center></td> <td><center>20</center></td>  <td><center> 12</center></td> <td><center> <?php echo "$sub4"; ?></center></td>
</tr>
<tr>
<td><center><?php echo $s5; ?></center></td> <td><center>20</center></td>  <td><center>12</center></td> <td><center> <?php echo "$sub5"; ?></center></td>
</tr>
<tr>
<td><center><?php echo $s6; ?></center></td> <td><center> 20</center></td>  <td><center>12</center></td> <td><center> <?php echo "$sub6"; ?></center></td>
</tr>
<tr>
<td><center><?php echo $l1; ?></center></td> <td><center> 20</center></td>  <td><center> 12</center></td> <td><center> <?php echo "$lab1"; ?></center></td>
</tr>
<tr>
<td><center><?php echo $l2; ?></center></td> <td><center> 20</center></td>  <td><center> 12</center></td> <td><center> <?php echo "$lab2"; ?></center></td>
</tr>





</table>
  <div class="row">

    <div class="col-xs-6">



  
  </div>
  </div>
  </div>
  <!-- /Closing Friend Requests Div-->
  <div class="col-xs-2">
          
  </div>
  </div><br>
   <div class="row">
  <div class="col-xs-12">
      <h4>Contact:reply@svceconnect.in | <a href="adminmsg.php"> Push Message to Admin</a></h4>
      <div class="timelineborder">
        <div id="my-timeline"></div>
</div>
  </div>
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