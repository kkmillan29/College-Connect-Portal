<?php
session_start();
if(!isset($_SESSION['aid'])){


 header("location:teachlog.php"); 
}
?>
<?php
$id=$_GET['aid'];
include "conn.php";
$sql="SELECT * FROM teacher WHERE aid='$id'";
  $result=mysqli_query($con,$sql);
  $R= $result->fetch_array(MYSQLI_ASSOC);
  //debug($R);
  $name=$R['name'];



?>
<?php

$errorMsg=''; 
$succmsg=''; 
$thisRandNum='';
$user_pic = "";
	if (isset($_POST['Submit'])) {
$sub=$_POST['sub'];
 $b_name = $_POST['b_name']; // filter everything but letters and numbers
 $b_author = $_POST['b_author'];
  // filter everything but letters and numbers
 $asid=$_POST['asid'];
   $branch = $_POST['branch'];
  $sem = $_POST['sem'];
   $sec = $_POST['sec'];
 $b_publisher =$_POST['b_publisher']; // filter everything but letters and numbers

    
 $errorMsg="";
     // Error handling for missing data
     if ((!$sub)||(!$asid)||(!$b_name)  || (!$b_author) || (!$b_publisher||(!$sec)||(!$sem)||(!$branch))) { 

     $errorMsg = 'ERROR: You did not submit the following required information:<br /><br />';
      if(!$sub){ 
       $errorMsg .= ' * Please Enter Subject Name<br />';
     } 
    if(!$asid){ 
       $errorMsg .= ' * Please Enter Assignment ID<br />';
     } 
     if(!$b_name){ 
       $errorMsg .= ' * Please Enter Title<br />';
     } 
     if(!$b_author){ 
       $errorMsg .= ' * Please Enter Description<br />';
     } 	
       if(!$branch){ 
       $errorMsg .= ' * Please Enter Branch<br />';
     }  
      if(!$sem){ 
       $errorMsg .= ' * Please Enter Semester<br />';
     }  
      if(!$sec){ 
       $errorMsg .= ' * Please Enter Section<br />';
     }  
	 if(!$b_publisher){ 
       $errorMsg .= ' * Please Select Date of submittion<br />';      
     }
     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     // Add user info into the database table for the main site table

} else {

// ------- PARSING PICTURE UPLOAD ---------

$hel=mysqli_query($con,"INSERT INTO assignment VALUES('$asid','$b_name','$b_author','$b_publisher','$b_publisher','$sec','$sem','$branch','$sub','$name')");

$id = mysql_insert_id();
mkdir("../assignment/$asid", 0755);

if ($_POST['parse_var'] == "pic"){
	
	// If a file is posted with the form
	if ($_FILES['fileField']['tmp_name'] != "") { 
            $maxfilesize = 5120000; // 51200 bytes equals 50kb... total size is 100MB
            if($_FILES['fileField']['size'] > $maxfilesize ) { 

                        $error_msg = '<font color="#FF0000">ERROR: Your file was too large, please try again.</font>';
						 unlink($_FILES['fileField']['tmp_name']); 

            } else if (!preg_match("/\.(gif|jpg|png|pdf)$/i", $_FILES['fileField']['name'] ) ) {

                        $error_msg = '<font color="#FF0000">ERROR: Your file was not one of the accepted formats, please try again.</font>';
				      unlink($_FILES['fileField']['tmp_name']); 

            } else { 
                        $newname =$asid.".pdf";
                        $place_file = move_uploaded_file( $_FILES['fileField']['tmp_name'], "../assignment/$asid/".$newname);
            }
    } 
}

$succmsg='Assignment Submitted successfully<br>Kindly Please Note your Assignment ID:<font color="red">'.$asid.'</font>';
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
<title>Assignment For Students</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<script src="js/jquery-1.4.2.js" type="text/javascript"></script>

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

</head>



<body>

<center>  <img src="../img/logo.png">
<h3>Add Assignment</h3>
<h4><?php echo $succmsg;?></h4>
</center>

<tabl0e class="mainBodyTable" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="738" valign="top">
      <table id="fortemp" width="600" align="center" cellpadding="8" cellspacing="0" style="border:#999 1px solid; background-color:#FBFBFB;">
        <form action="assig.php?aid=<?php echo $id;  ?>" method="post" enctype="multipart/form-data">
          <tr>
            <td align="left" colspan="2"><?php print $errorMsg; ?>			</td>
          </tr>
           <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Subject Name:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="sub" type="text" class="formFields" id="b_name" value="" size="32" placeholder="ex:DSA " maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
     <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Assignment ID:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="asid" type="text" class="formFields" id="b_name" value="" size="32" placeholder="ex:DSA1" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
          <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Title:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="b_name" type="text" class="formFields" id="b_name" value="" size="32" placeholder="ex: DSA Assignment" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><div align="left">Description:<span class="brightRed"> </span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="b_author" type="text" class="formFields" id="b_author" value="" size="32" placeholder="ex:Lab 1-5 Programme" maxlength="20" />
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
                 <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Branch:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="branch" type="text" class="formFields" id="b_name" value="" size="32" maxlength="3" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
             <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Semester:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="sem" type="text" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
             <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Section:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="sec" type="text" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><div align="left">Submittion Date:<span class="brightRed"> </span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="b_publisher" type="date" class="formFields" id="b_publisher"  size="32" maxlength="20" />
            </div></td>
          </tr>
          <tr>
    
              <input name="b_quantity" type="hidden" class="formFields" id="b_quantity" value="" size="32" maxlength="20" />
            </div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><div align="left"><?php echo $user_pic; ?></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
             Only PDF File Select (Upto 100MB)<input name="fileField" type="file" class="formFields" id="fileField" size="42" />
             <br>
  <input name="thisWipit" type="hidden" value="<?php echo $thisRandNum; ?>" />
              <input name="parse_var" type="hidden" value="pic" />
            </div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            <td align="left" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="Submit" id="Submit" />
        </form>
      </table>
</td>
    <td width="160" valign="top"></td>

  </tr><br>

<td align="left" bgcolor="#FFFFFF"><center>
<a href="assgclear.php?aid=<?php echo $id; ?>"><input type="submit" name="Submit" value="Delete Assignment" id="Submit" /></a><br>
  </td></center>
</table>
         <center>     <a href="teachadmin.php?aid=<?php echo $id;  ?>">    <img height="x" src="../img/home.png"></a></center>
</body>
</html>