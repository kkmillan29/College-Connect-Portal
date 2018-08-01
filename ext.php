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


    $gl1="";
  $gl2="";
  $gl3="";
  $gl4="";
  $gl5="";
  $gl6="";
  $gl7="";
  $gl8="";
// Query member data from the database and ready it for display
$sql = mysqli_query($con,"SELECT * FROM result WHERE usn='$id' AND sem='$sem' AND branch='$branch' AND type='EXT' LIMIT 1");

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
    if($sub1=='0'){
$gl1="F";

    }
        if($sub1=='4'){
$gl1="E";

    }
        if($sub1=='5'){
$gl1="D";

    }
        if($sub1=='6'){
$gl1="C";

    }
        if($sub1=='7'){
$gl1="B";

    }
        if($sub1=='8'){
$gl1="A";

    }
        if($sub1=='9'){
$gl1="S";

    }
        if($sub1=='10'){
$gl1="S+";

    }
        if($sub2=='0'){
$gl2="F";

    }
        if($sub2=='4'){
$gl2="E";

    }
        if($sub2=='5'){
$gl2="D";

    }
        if($sub2=='6'){
$gl2="C";

    }
        if($sub2=='7'){
$gl2="B";

    }
        if($sub2=='8'){
$gl2="A";

    }
        if($sub2=='9'){
$gl2="S";

    }
        if($sub2=='10'){
$gl2="S+";

    }
        if($sub3=='0'){
$gl3="F";

    }
        if($sub3=='4'){
$gl3="E";

    }
        if($sub3=='5'){
$gl3="D";

    }
        if($sub3=='6'){
$gl3="C";

    }
        if($sub3=='7'){
$gl3="B";

    }
        if($sub3=='8'){
$gl3="A";

    }
        if($sub3=='9'){
$gl3="S";

    }
        if($sub3=='10'){
$gl3="S+";

    }
        if($sub4=='0'){
$gl4="F";

    }
        if($sub4=='4'){
$gl4="E";

    }
        if($sub4=='5'){
$gl4="D";

    }
        if($sub4=='6'){
$gl4="C";

    }
        if($sub4=='7'){
$gl4="B";

    }
        if($sub4=='8'){
$gl4="A";

    }
        if($sub4=='9'){
$gl4="S";

    }
        if($sub4=='10'){
$gl4="S+";

    }
        if($sub5=='0'){
$gl5="F";

    }
        if($sub5=='4'){
$gl5="E";

    }
        if($sub5=='5'){
$gl5="D";

    }
        if($sub5=='6'){
$gl5="C";

    }
        if($sub5=='7'){
$gl5="B";

    }
        if($sub5=='8'){
$gl5="A";

    }
        if($sub5=='9'){
$gl5="S";

    }
        if($sub5=='10'){
$gl5="S+";

    }
            if($sub6=='0'){
$gl6="F";

    }
        if($sub6=='4'){
$gl6="E";

    }
        if($sub6=='5'){
$gl6="D";

    }
        if($sub6=='6'){
$gl6="C";

    }
        if($sub6=='7'){
$gl6="B";

    }
        if($sub6=='8'){
$gl6="A";

    }
        if($sub6=='9'){
$gl6="S";

    }
        if($sub6=='10'){
$gl6="S+";

    }
            if($lab1=='0'){
$gl7="F";

    }
        if($lab1=='4'){
$gl7="E";

    }
        if($lab1=='5'){
$gl7="D";

    }
        if($lab1=='6'){
$gl7="C";

    }
        if($lab1=='7'){
$gl7="B";

    }
        if($lab1=='8'){
$gl7="A";

    }
        if($lab1=='9'){
$gl7="S";

    }
        if($lab1=='10'){
$gl7="S+";

    }
            if($lab2=='0'){
$gl8="F";

    }
        if($lab2=='4'){
$gl8="E";

    }
        if($lab2=='5'){
$gl8="D";

    }
        if($lab2=='6'){
$gl8="C";

    }
        if($lab2=='7'){
$gl8="B";

    }
        if($lab2=='8'){
$gl8="A";

    }
        if($lab2=='9'){
$gl8="S";

    }
        if($lab2=='10'){
$gl8="S+";

    }
  $cp1=$sub1*4;
  $cp2=$sub2*4;
  $cp3=$sub3*4;
  $cp4=$sub4*4;
  $cp5=$sub5*4;
  $cp6=$sub6*4;
  $cp7=$lab1*2;
  $cp8=$lab2*2;
$total=$cp1+$cp2+$cp3+$cp4+$cp5+$cp6+$cp7+$cp8;
$sgp=$total/24;

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
  
  <center><h4>Results For Students of External Exams</h4></center><br>



<table class="col-xs-10" border="1">

<tr>
<td><center><?php echo "$username"; ?></center></td> <td><center>Branch: <?php echo "$branch"; ?></center></td>  <td><center>Sem: <?php echo "$sem"; ?></center></td>  <td><center>Section: <?php echo "$sec"; ?></center></td> <td><center>Type: <?php echo "$ia"; ?></center></td>
</tr></table><br>

<br>
<table class="col-xs-10" border="1">
<tr>
<td><center>Subjects</center></td> <td><center>Credits</center></td> <td><center>Grade Letter</center></td> <td><center> Grade Points</center></td><td><center> Credit Points</center></td>
</tr>
<tr>
<td><center><?php echo $s1; ?></center></td> <td><center>4</center></td>  <td><center><?php echo $gl1; ?></center></td><td><center><?php echo "$sub1"; ?></center></td> <td><center> <?php echo $cp1; ?></center></td>
</tr>
  <tr>
<td><center><?php echo $s2; ?></center></td> <td><center> 4</center></td> <td><center><?php echo $gl2; ?></center></td> <td><center> <?php echo "$sub2"; ?></center></td> <td><center><?php echo $cp2; ?> </center></td>
</tr>
<tr>
<td><center><?php echo $s3; ?></center></td> <td><center>4</center></td> <td><center><?php echo $gl3; ?></center></td> <td><center><?php echo "$sub3"; ?></center></td> <td><center><?php echo $cp3; ?> </center></td>
</tr>
<tr>
<td><center><?php echo $s4; ?></center></td> <td><center>4</center></td><td><center><?php echo $gl4; ?></center></td>  <td><center><?php echo "$sub4"; ?></center></td> <td><center> <?php echo $cp4; ?></center></td>
</tr>
<tr>
<td><center><?php echo $s5; ?></center></td> <td><center>4</center></td> <td><center><?php echo $gl5; ?></center></td> <td><center><?php echo "$sub5"; ?></center></td> <td><center> <?php echo $cp5; ?></center></td>
</tr>
<tr>
<td><center><?php echo $s6; ?></center></td> <td><center>4</center></td> <td><center><?php echo $gl6; ?></center></td> <td><center><?php echo "$sub6"; ?></center></td> <td><center><?php echo $cp6; ?> </center></td>
</tr>
<tr>
<td><center><?php echo $l1; ?></center></td> <td><center>2</center></td> <td><center><?php echo $gl7; ?></center></td> <td><center> <?php echo "$lab1"; ?></center></td> <td><center><?php echo $cp7; ?></center></td>
</tr>
<tr>
<td><center><?php echo $l2; ?></center></td> <td><center>2</center></td><td><center><?php echo $gl8; ?></center></td>  <td><center><?php echo "$lab2"; ?></center></td> <td><center><?php echo $cp8; ?> </center></td>
</tr>
<tr>
<td><center></center></td> <td><center><b>24</b></center></td> <td><center></center></td> <td><center></center></td> <td><center><b><?php echo $total; ?></b></center></td>
</tr>





</table><br><Br>  <div class="row">

    <div class="col-xs-6">



  
  </div>
  </div><br>
    <b>SGPA: <?php echo $sgp; ?></b>
  </div>

  <!-- /Closing Friend Requests Div-->
  <div class="col-xs-2">
          
  </div>
  </div><br>
   <div class="row">
  <div class="col-xs-12">
      <h4>Contact: reply@svceconnect.in | <a href="adminmsg.php"> Push Message to Admin</a></h4>
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