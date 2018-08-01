<?php
session_start();



if($_SESSION['Reg_No']==null){
 header("location:login.php"); 
}
else{ 
include "scripts/conn.php";
$aid = $_SESSION['Reg_No'];
$s1="";
$s2="";
$s3="";
$s4="";
$s5="";
$s6="";

$sql=mysqli_query($con,"SELECT * FROM student WHERE Reg_No='$aid'");

if(count($sql)>0){
  $row=$sql->fetch_array(MYSQLI_ASSOC);
  $reg=$row['Reg_No'];
    $username=$row['Name'];
    $batch = $row['Batch'];
    $streetname =$row['Street'];
    $city = $row['City'];
      $branch = $row['branch'];
     $sem = $row['sem'];
    
      $sec = $row['sec'];
    $statename = $row['State'];
    $country = $row['Country'];
    $contact = $row['Contact_No'];
///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
  $check_pic = "Students/$aid/pic1.jpg";
  $default_pic ="images/icons/png/user.png";
  if (file_exists($check_pic)) {
    $user_pic = '<img height="80px" width="80px"  src="'.$check_pic.'">';
  } else {
    $user_pic = '<img class="" height="80px" width="80px"  src="'.$default_pic.'">';
      }
       if($sem=="1" AND $branch=="CSE"||$branch=="ISE"||$branch=="ME"){
$s1="MAT1";
$s2="PHY";
$s3="CIV";
$s4="EME";
$s5="ELE";
$s6="CPH";



      }
            if($sem=="1" AND $branch=="ECE"||$branch=="CIV"||$branch=="EEE"){
$s1="MAT1";
$s2="CHE";
$s3="CAED";
$s4="PCD";
$s5="ELN";
$s6="EVS";



      }
            if($sem=="2" AND $branch=="ECE"||$branch=="CIV"||$branch=="EEE"){
$s1="MAT2";
$s2="PHY";
$s3="CIV";
$s4="EME";
$s5="ELE";
$s6="CPH";



      }
            if($sem=="2" AND $branch=="CSE"||$branch=="ISE"||$branch=="ME"){
$s1="MAT2";
$s2="CHE";
$s3="CAED";
$s4="PCD";
$s5="ELN";
$s6="EVS";



      }

      if($sem=="3" AND $branch=="CSE" ||$branch=="ISE"){

$s1="MAT3";
$s2="ADE";
$s3="CO";
$s4="DSA";
$s5="USP";
$s6="DMS";



      }
            if($sem=="3" AND $branch=="ECE"){

$s1="MAT3";
$s2="AE";
$s3="DE";
$s4="NA";
$s5="EI";
$s6="EE";



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


  //////  Mechanism to Display Location Info or not  //////////////////////////
  if ($country == "" && $statename == "" && $city == "" && $streetname=="") {
    $locationInfo = "";
  } else {
  $locationInfo = "$city &middot; $statename<br />$country ".''; 
  }

}
}
  


?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
$sql=mysql_query("SELECT * FROM student WHERE Reg_No='$aid'");



  ?>

    <meta charset="utf-8">
    <title>SVCEConnct</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <!-- BEGIN TimelineJS -->
        <link rel="stylesheet" type="text/css" href="http://cdn.knightlab.com/libs/timeline/latest/css/timeline.css">

        <script type="text/javascript" src="http://cdn.knightlab.com/libs/timeline/latest/js/storyjs-embed.js"></script>
        <script>
            $(document).ready(function() {
                createStoryJS({
                    type:       'timeline',
                    width:      '100%',
                    height:     '600',
                    source:     'https://docs.google.com/spreadsheet/pub?key=0AsAkV_lJnmq4dDdXLTRYcTZqQXU4MG5EUlFIRHJ4eEE&output=html',
                    embed_id:   'my-timeline'
                });
            });
        </script>
  </head>
  <body>
    <br>  
<?php  include_once('Master/header.php');
?>
	<!-- /sdfds-->
	
		<!-- /Opening Friend Requests Div-->
	<div class="col-xs-10">
	<h4>Welcome back:  <?php echo $username;?></h4>

	<div class="row">

       
<?php


$sql=mysqli_query($con,"SELECT * FROM assignment WHERE sec='".$sec."' AND sem='".$sem."' AND branch='".$branch."'AND sub='".$s1."'"); 
  //  $row=$sql->fetch_array(MYSQLI_ASSOC);

if(count($sql)>0){

foreach ($sql as $key => $row) {

$aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];
$doc=$row['doc'];
$from=$row['from'];
$doc =$row['subdate'];

echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>Assignment</h6>';
                      echo '  <p><strong>'.$form.'</strong></p>  ' 
          ;
          echo '  <p><strong>'.$title.'</strong></p>  ' 
          ;
          echo '  <p><strong>Submit On:'.$doc.'</strong></p>  ' 
          ;
          echo '<p>'.$desc.'</p>';
echo'<a href="assignment/'.$aid.'/'.$aid.'.pdf">Download</a>'; 
                       echo'</div> </div>';

}


}



?>


       
<?php

$sql=mysqli_query($con,"SELECT * FROM ppt WHERE sec='".$sec."' AND sem='".$sem."' AND branch='".$branch."' AND sub='".$s1."'"); 

if(count($sql)>0){

foreach ($sql as $key => $row) {
  # code...
  $aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];

$from=$row['from'];

echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>PPT</h6>';
               echo '  <p><strong>'.$form.'</strong></p>  ' 
          ;
          echo '  <p><strong>'.$title.'</strong></p>  ' 
          ;
       
          echo '<p>'.$desc.'</p>';
echo'<a href="ppts/'.$aid.'/'.$aid.'.ppt">Download</a>'; 
                       echo'</div> </div>';

}
}
mysql_close();

?>

     
<?php
$sql=mysqli_query($con,"SELECT * FROM notifys WHERE usn='".$reg."'"); 

if(count($sql)>0){
foreach ($sql as $key => $row) {

  $aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];
$doc=$row['doc'];
$from=$row['from'];
$doc =$row['date'];

echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <font color="red"><h6> Message!!!</h6></font>';
                 echo '  <p><font color="Red">From: <strong>'.$from.'</strong></font></p>  ' 
          ;

          echo '  <p><font color="Red"><strong>'.$title.'</strong></font></p>  ' 
          ;
          echo '  <p><strong>By:'.$doc.'</strong></p>  ' 
          ;
          echo '<p><font color="Red">'.$desc.'</font></p>';
echo'<a href="adminmsg.php">Reply Admin</a>'; 
                       echo'</div> </div>';

}
}


?>

       
<?php
$sql=mysqli_query($con,"SELECT * FROM appt WHERE status='Confirm'"); 

if(count($sql)>0){
foreach ($sql as $key => $row) {

  $ad=$row['aid'];

$desc=$row['frm'];
$doc=$row['status'];
$dat =$row['adate'];
$tme=$row['tme'];

echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
        
          echo '  <p>Appoinment ID:<br><font color="green"><strong>'.$ad.'</strong></font></p>';
          echo '  <p><strong>On:'.$dat.'</strong></p>  ' 
          ;
          echo '<p><font color="green">Appoinment Fix</font></p>';
echo'<font color="green">Appoinment Time:'.$tme.'</font></div></div>'; 
                       

}

}


?>




  

<?php
$sql=mysqli_query($con,"SELECT * FROM assignment WHERE sec='".$sec."' AND sem='".$sem."' AND branch='".$branch."'AND sub='".$s2."'"); 
if(count($sql)>0){
foreach ($sql as $key => $row) {
  $aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];
$doc=$row['doc'];
$from=$row['from'];
$doc =$row['subdate'];
echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>Assignment</h6>';
          echo '  <p><strong>'.$title.'</strong></p>  ' 
          ;
              echo '  <p>From:<strong>'.$from.'</strong></p>  ' 
          ;
          echo '  <p><strong>Submit On:'.$doc.'</strong></p>  ' 
          ;
          echo '<p>'.$desc.'</p>';
echo'<a href="assignment/'.$aid.'/'.$aid.'.pdf">Download</a>'; 
                       echo'</div> </div>';

}

}

?>
<?php

$sql=mysqli_query($con,"SELECT * FROM assignment WHERE sec='".$sec."' AND sem='".$sem."' AND branch='".$branch."'AND sub='".$s3."'"); 
if(count($sql)>0){
  foreach ($sql as $key => $row) {

    $row=$sql->fetch_array(MYSQLI_ASSOC);
  $aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];
$doc=$row['doc'];
$from=$row['from'];
$doc =$row['subdate'];

echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>Assignment</h6>';
          echo '  <p><strong>'.$title.'</strong></p>  ' 
          ;
               echo '  <p>From:<strong>'.$from.'</strong></p>  ' 
          ;
          echo '  <p><strong>Submit On:'.$doc.'</strong></p>  ' 
          ;
          echo '<p>'.$desc.'</p>';
echo'<a href="assignment/'.$aid.'/'.$aid.'.pdf">Download</a>'; 
                       echo'</div> </div>';

}

}

?>
<?php

$sql=mysqli_query($con,"SELECT * FROM assignment WHERE sec='".$sec."' AND sem='".$sem."' AND branch='".$branch."'AND sub='".$s4."'"); 
if(count($sql)>0){
foreach ($sql as $key => $row) {
  $aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];
$doc=$row['doc'];
$from=$row['from'];
$doc =$row['subdate'];
echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>Assignment</h6>';
          echo '  <p><strong>'.$title.'</strong></p>  ' 
          ;
                echo '  <p>From:<strong>'.$from.'</strong></p>  ' 
          ;
          echo '  <p><strong>Submit On:'.$doc.'</strong></p>  ' 
          ;
          echo '<p>'.$desc.'</p>';
echo'<a href="assignment/'.$aid.'/'.$aid.'.pdf">Download</a>'; 
                       echo'</div> </div>';

}
}


?>
<?php

$sql=mysqli_query($con,"SELECT * FROM assignment WHERE sec='".$sec."' AND sem='".$sem."' AND branch='".$branch."'AND sub='".$s5."'"); 

if(count($sql)>0){
foreach ($sql as $key => $row) {
  $aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];
$doc=$row['doc'];
$from=$row['from'];
$doc =$row['subdate'];

echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>Assignment</h6>';
          echo '  <p><strong>'.$title.'</strong></p>  ' 
          ;
               echo '  <p>From:<strong>'.$from.'</strong></p>  ' 
          ;
          echo '  <p><strong>Submit On:'.$doc.'</strong></p>  ' 
          ;
          echo '<p>'.$desc.'</p>';
echo'<a href="assignment/'.$aid.'/'.$aid.'.pdf">Download</a>'; 
                       echo'</div> </div>';

}}


?>
<?php

$sql=mysqli_query($con,"SELECT * FROM assignment WHERE sec='".$sec."' AND sem='".$sem."' AND branch='".$branch."'AND sub='".$s6."'"); 
if(count($sql)>0){
foreach ($sql as $key => $row) {
  $aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];
$doc=$row['doc'];
$from=$row['from'];
$doc = strftime("%d %b, %Y", strtotime($doc));

echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>Assignment</h6>';
          echo '  <p><strong>'.$title.'</strong></p>  ' 
          ;
                echo '  <p>From:<strong>'.$from.'</strong></p>  ' 
          ;
          echo '  <p><strong>Submit On:'.$doc.'</strong></p>  ' 
          ;
          echo '<p>'.$desc.'</p>';
echo'<a href="assignment/'.$aid.'/'.$aid.'.pdf">Download</a>'; 
                       echo'</div> </div>';

}}


?>
       
<?php

$sql=mysqli_query($con,"SELECT * FROM ppt WHERE sec='".$sec."' AND sem='".$sem."' AND branch='".$branch."' AND sub='".$s2."'"); 

if(count($sql)>0){
foreach ($sql as $key => $row) {
  $aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];
$from=$row['from'];


echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>PPT</h6>';
          echo '  <p><strong>'.$title.'</strong></p>  ' 
          ;
               echo '  <p>From:<strong>'.$from.'</strong></p>  ' 
          ;
         
          echo '<p>'.$desc.'</p>';
echo'<a href="ppts/'.$aid.'/'.$aid.'.ppt">Download</a>'; 
                       echo'</div> </div>';

}
}


?>
       
<?php

$sql=mysqli_query($con,"SELECT * FROM ppt WHERE sec='".$sec."' AND sem='".$sem."' AND branch='".$branch."' AND sub='".$s3."'"); 

if(count($sql)>0){
foreach ($sql as $key => $row) {
  $aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];
$from=$row['from'];


echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>PPT</h6>';
          echo '  <p><strong>'.$title.'</strong></p>  ' 
          ;
                echo '  <p>From:<strong>'.$from.'</strong></p>  ' 
          ;
         
          echo '<p>'.$desc.'</p>';
echo'<a href="ppts/'.$aid.'/'.$aid.'.ppt">Download</a>'; 
                       echo'</div> </div>';

}}



?>
       
<?php

$sql=mysqli_query($con,"SELECT * FROM ppt WHERE sec='".$sec."' AND sem='".$sem."' AND branch='".$branch."' AND sub='".$s4."'"); 
if(count($sql)>0){
foreach ($sql as $key => $row) {
  $aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];
$from=$row['from'];



echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>PPT</h6>';
          echo '  <p><strong>'.$title.'</strong></p>  ' 
          ;
                   echo '  <p>From:<strong>'.$from.'</strong></p>  ' 
          ;
        
          echo '<p>'.$desc.'</p>';
echo'<a href="ppts/'.$aid.'/'.$aid.'.ppt">Download</a>'; 
                       echo'</div> </div>';

}
}


?>
       
<?php

$sql=mysqli_query($con,"SELECT * FROM ppt WHERE sec='".$sec."' AND sem='".$sem."' AND branch='".$branch."' AND sub='".$s5."'"); 

if(count($sql)>0){
foreach ($sql as $key => $row) {
  $aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];
$from=$row['from'];


echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>PPT</h6>';
          echo '  <p><strong>'.$title.'</strong></p>  ' 
          ;
                 echo '  <p>From:<strong>'.$from.'</strong></p>  ' 
          ;
       
          echo '<p>'.$desc.'</p>';
echo'<a href="ppts/'.$aid.'/'.$aid.'.ppt">Download</a>'; 
                       echo'</div> </div>';

}
}


?>
       
<?php

$sql=mysqli_query($con,"SELECT * FROM ppt WHERE sec='".$sec."' AND sem='".$sem."' AND branch='".$branch."' AND sub='".$s6."'"); 

if(count($sql)>0){
foreach ($sql as $key => $row) {
  $aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];
$from=$row['from'];


echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>PPT</h6>';
          echo '  <p><strong>'.$title.'</strong></p>  ' 
          ;
                 echo '  <p>From:<strong>'.$from.'</strong></p>  ' 
          ;
     
          echo '<p>'.$desc.'</p>';
echo'<a href="ppts/'.$aid.'/'.$aid.'.ppt">Download</a>'; 
                       echo'</div> </div>';

}
}


?>



</div>



        <BR>



  
		
	</div>


	<!-- /Closing Friend Requests Div-->
	

  <div class="col-xs-2">
<strong> Notification</strong>
    <marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();">
                  <?php
                  include('scripts/conn.php');
                  $sql=mysqli_query($con,"SELECT * FROM notification  ORDER BY date DESC LIMIT 10 ");
               if(count($sql)>0){
foreach ($sql as $key => $row) {
                  echo'       <p class="palette-paragraph"><font color="blue">';

                  $title=$row["title"];
                  $date=$row["date"];
                  $desc=$row["desc"];
                  $date =$row['date'];

                  echo '<font size="+1"><strong>'.$title.'</strong></font><br>';
                    echo 'Written on '.$date.'<br>';
                  echo $desc;
                  echo '</p></font>';
                  }}?> 
                  <p>

                  </p>
          </marquee>
  </div>


  <div class="col-xs-12">
     <h6> Follow Us: <a href="http://www.youtube.com/user/svceconnect"><img src= "images/icons/png/youtube.png"></a>  <a href="http://www.facebook.com/svceconnect"><img src= "images/icons/png/facebook.png"></a>  <a href="http://www.twitter.com/svceconnect"><img src= "images/icons/png/twitter.png"></a>  <a href="http://www.rss.feed.com/svceconnect"><img src= "images/icons/png/feed.png"></a></h6>
      <div class="timelineborder">
        </div>
        </div>
</div>
  </div>
  </div>

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