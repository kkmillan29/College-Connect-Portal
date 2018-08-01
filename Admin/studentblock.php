<?php
session_start();
if(!isset($_SESSION['aid'])){
 header("location:officiallog.php"); 
}

$succe="";
include "conn.php";
$errorMsg=''; 
$thisRandNum='';
$user_pic = "";
  if (isset($_POST['Submit'])) {
 $aptid = $_POST['apptid']; 

  
   
 $errorMsg="";
     // Error handling for missing data
     if ((!$aptid)) { 

     $errorMsg = 'ERROR: You did not submit the following required information:<br /><br />';
   if(!$title){ 
       $errorMsg .= ' * Please Enter User ID <br />';

     } 
     
} else {


// Query member data from the database and ready it for display
$sql = mysqli_query($con,"SELECT * FROM student WHERE Reg_No='$aptid' LIMIT 1");

if(count($sql)>0){
  $row=$sql->fetch_array(MYSQLI_ASSOC);
      $blocked=$row['blocked'];
    $name=$row['Name'];
    $branch = $row['branch'];
    $sem =$row['sem'];
    $sec = $row['sec'];
     if($blocked=="1"){
$succe="<h4><strong>This Account is Blocked Now</strong></h4><br><strong>click Unlblock button to Unlblock</strong>";}



    }
    else{
       $errorMsg="No Record Found!!!";

    }
}
}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<me0ta name="Description" content="Register to yourdomain" />
<meta name="Keywords" content="register, yourdomain" />
<meta name="rating" content="General" />
<title>Block Student Account</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<script src="js/jquery-1.4.2.js" type="text/javascript"></script>
<?php

if (isset($_POST['Update'])) {
 $aptid = $_POST['apptid']; 







  
   
 $errorMsg="";
     // Error handling for missing data
    


// Query member data from the database and ready it for display
$sql = mysqli_query($con,"UPDATE `svceconnect`.`student` SET `blocked` = '1' WHERE `student`.`Reg_No` = '$aptid'");
echo "<h4><strong>Account Blocked Successfully</strong></h4>"; 
}



?>

<style type="text/css">
<!--
.style26 {color: #FF0000}
.style28 {font-size: 14px}
.brightRed {
  color: #F00;
}
.textSize_9px {
  font-size: 9px;
}
body {
  background: url('../img/bg.jpg');
  background-repeat: no-repeat;
  background-size: 100%;
  margin-top: 0px;
}
#fortemp{
  background-color:#f5f5f5;
  padding:15px;
  
  -moz-border-radius:12px;
  -khtml-border-radius: 12px;
  -webkit-border-radius: 12px;
  border-radius:12px;
}

-->
</style>

<link href="../css/flat-ui.css" rel="stylesheet">
    <link href="../css/demo.css" rel="stylesheet">
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

</head>

<body>
  <br>
  
<center>  <img height="" width="" src="../img/logo.png"></center>
<Br>
  <p align="center"><?php echo $succe;?></p>
      <table id="fortemp" width="600" align="center" class="tile" cellpadding="8" cellspacing="0">
        <form action="studentblock.php" method="post" enctype="multipart/form-data">
          <?php print $errorMsg; ?> 

    

            <td width="114" bgcolor="#FFFFFF"><div align="left">USN NO:</div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="apptid" type="text" class="form-control"  id="title">
             </span>
            <td bgcolor="#FFFFFF">
<p></p>
            <td align="left" bgcolor="#FFFFFF"> <input type="submit" class="btn btn-embossed btn-success" name="Submit" value="Fetch Detail" id="Submit" /> </form> 
        </div>
       
     
      </table><br><b><br><br><br>
            <table id="fortemp" width="600" align="center" class="tile" cellpadding="8" cellspacing="0">
<form name="update" action="studentblock.php" method="POST">
 <td width="114" bgcolor="#FFFFFF"><div align="left">USN  NO:<span class="brightRed"> *</span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="apptid" type="text" class="form-control" id="title" value="<?php echo "$aptid"; ?>"/>
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor"><br></span></span></span></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><div align="left">Name:<span class="brightRed"> *</span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="name" type="textarea" class="form-control" id="desc" value="<?php echo "$name"; ?>"/>
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor"><br></span></span></span></div></td>
          </tr>
          <tr>
          <td bgcolor="#FFFFFF"><div align="left">Branch:<span class="brightRed"> *</span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="dept" type="textarea" class="form-control" id="desc" value="<?php echo "$branch"; ?>"/>
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor"><br></span></span></span></div></td>
          </tr>
          <tr>
          <td bgcolor="#FFFFFF"><div align="left">Semester:<span class="brightRed"> *</span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="email" type="textarea" class="form-control" id="desc" value="<?php echo "$sem"; ?>"/>
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor"><br></span></span></span></div></td>
          </tr>
          <tr>
          <td bgcolor="#FFFFFF"><div align="left">Section:<span class="brightRed"> *</span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="phone" type="textarea" class="form-control" id="desc" value="<?php echo "$sec"; ?>"/>
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor"><br></span></span></span></div></td>
          </tr>
          
           <td bgcolor="#FFFFFF"><td align="left" bgcolor="#FFFFFF"><input type="submit" class="btn btn-embossed btn-success" name="Update" value="Block Account" id="Update" /> </form>
           <br>

           <br>
           <a href="unblock.php"><input type="submit" class="btn btn-embossed btn-success" name="unblock" value="Unblock Account" id="unblock" /></a></td></td></form>  







<br><br>


            </table><br><br><Br>







   <center>     <a href="admin.php">    <img height="x" src="../img/home.png"></a></center>
<br />
      <br /></td>
 
  </tr>
</table>

</body>
</html>


