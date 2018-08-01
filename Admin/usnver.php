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
       $errorMsg .= ' * Please Enter Appoinment ID <br />';

     } 
     
} else {


// Query member data from the database and ready it for display
$sql = mysqli_query($con,"SELECT * FROM student WHERE Reg_No='$aptid' LIMIT 1");
$row_cnt = $sql->num_rows;
if($row_cnt>0){
   $errorMsg = '<b> USN<font color="green"> '.$aptid.'</font> is Already Verified or Regitered!</b><br /><br />';
 // echo '<b>USN<font color="green">  '.$aptid.'</font> is Already Verified</b>';

}
else{
$errorMsg = '<b> USN<font color="red"> '.$aptid.'</font> Not yet Verified or Registered!</b><br /><br />';


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
<title>USN Verifying Manager</title>
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
$sql = mysqli_query($con,"INSERT INTO student (Reg_No) VALUES ('$aptid')");
echo '<h4>USN Verified<font color="green">'.$aptid.'</font> Successfully!</h4>'; 
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
        <form action="usnver.php" method="post" enctype="multipart/form-data">
          <?php print $errorMsg; ?> 

    

            <td width="114" bgcolor="#FFFFFF"><div align="left">USN:</div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="apptid" type="text" placeholder="Check weather USN is already registered or not!" class="form-control"  id="title">
             </span>
            <td bgcolor="#FFFFFF">
<p></p>
            <td align="left" bgcolor="#FFFFFF"> <input type="submit" class="btn btn-embossed btn-success" name="Submit" value="Fetch Detail" id="Submit" /> </form> 
        </div>
       
     
      </table><br><b><br><br><br>
            <table id="fortemp" width="600" align="center" class="tile" cellpadding="8" cellspacing="0">
<form name="update" action="usnver.php" method="POST">
 <td width="114" bgcolor="#FFFFFF"><div align="left">USN:<span class="brightRed"> *</span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="apptid" type="text" class="form-control" id="title" value="<?php echo "$aptid"; ?>"/>
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor"><br></span></span></span></div></td>
          </tr>
          <tr>
                     <td bgcolor="#FFFFFF"><td align="left" bgcolor="#FFFFFF"><input type="submit" class="btn btn-embossed btn-success" name="Update" value="Verify & Update USN" id="Update" />

      

           

</form><br><br>
 <a href="clearmsg.php"><input type="submit" class="btn btn-embossed btn-success" name="delete" value="Delete Verification Request" id="delete" /></a>

            </table><br><br><Br>







   <center>     <a href="admin.php">    <img height="x" src="../img/home.png"></a></center>
<br />
      <br /></td>
 
  </tr>
</table>

</body>
</html>


