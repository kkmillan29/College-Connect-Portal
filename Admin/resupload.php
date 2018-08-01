<?php
session_start('aid');
if(!isset($_SESSION['aid'])){


 header("location:teachlog.php"); 
}
?>
<?php
$id=$_GET['aid'];
include "conn.php";
$errorMsg=''; 
$succmsg=''; 
$thisRandNum='';
$user_pic = "";
	if (isset($_POST['Submit'])) {

 $name = $_POST['name']; // filter everything but letters and numbers

  // filter everything but letters and numbers
   $branch = $_POST['branch'];
  $sem = $_POST['sem'];
   $sec = $_POST['sec'];
    $aptid = $_POST['usn'];
 $ia =$_POST['ia'];
 $sub1 =$_POST['sub1'];
 $sub2 =$_POST['sub2'];
 $sub3 =$_POST['sub3'];
 $sub4 =$_POST['sub4'];
 $sub5 =$_POST['sub5'];
 $sub6 =$_POST['sub6'];
 $lab1 =$_POST['lab1'];
 $lab2 =$_POST['lab2'];
  // filter everything but letters and numbers

    
 $errorMsg="";
     // Error handling for missing data
     if ((!$ia)||(!$sub1)||(!$sub2)||(!$sub3)||(!$sub4)||(!$sub5)||(!$sub6)) { 

     $errorMsg = 'ERROR: You did not submit the following required information:<br /><br />';
   

  
	 if(!$sub1){ 
       $errorMsg .= ' *Plase Enter Subject(1) Marks<br />';      
     }
       if(!$sub2){ 
       $errorMsg .= ' * Plase Enter Subject(2) Marks<br />';      
     }
       if(!$sub2){ 
       $errorMsg .= ' * Plase Enter Subject(3) Marks<br />';      
     }
       if(!$sub4){ 
       $errorMsg .= ' * Plase Enter Subject(4) Marks<br />';      
     }
       if(!$sub5){ 
       $errorMsg .= ' * Plase Enter Subject(5) Marks<br />';      
     }
       if(!$sub6){ 
       $errorMsg .= ' * Plase Enter Subject(6) Marks<br />';      
     }


     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     // Add user info into the database table for the main site table

} else {

// ------- PARSING PICTURE UPLOAD ---------

mysqli_query($con,"INSERT INTO result VALUES('$aptid','$name','$branch','$sem','$sec','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$lab1','$lab2','$ia')");



$succmsg="Result Upload successfully";
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
<title>Result Upload</title>
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
<?php

  if (isset($_POST['Fetch'])) {
 $aptid = $_POST['usnf']; 

  
   
 $errorMsg="";
  $newmsg="";
     // Error handling for missing data
     if ((!$aptid)) { 

     $errorMsg = 'ERROR: You did not submit the following required information:<br /><br />';
   if(!$title){ 
       $errorMsg .= ' * Please Enter Student USN<br />';

     } 
     
} else {


// Query member data from the database and ready it for display
$sql = mysqli_query($con,"SELECT * FROM student WHERE Reg_No='$aptid' LIMIT 1");

if(count($sql)>0){
  $row=$sql->fetch_array(MYSQLI_ASSOC);
    $name=$row['Name'];
    $usn = $row['Reg_No'];
    $branch =$row['branch'];
    $sem = $row['sem'];
       $sec = $row['sec'];


    
  }
  else
  {

         $newmsg.= '* <font color="red" size="+1">Student Details Connot Find!</font><br />'; 
  }


}
}

?>


<body>

<center>  <img src="../img/logo.png">
<h3>Upload Results</h3>
<h4><?php echo $succmsg;?></h4>
</center>

<tabl0e class="mainBodyTable" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="738" valign="top">
      <table id="fortemp" width="600" align="center" cellpadding="8" cellspacing="0" style="border:#999 1px solid; background-color:#FBFBFB;">
        <form action="resupload.php?aid=<?php echo $id;?>" method="post" enctype="multipart/form-data">
  <tr>
            <td align="left" colspan="2">  <?php print $newmsg; ?>    </td>
          </tr>

 <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> USN:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="usnf" type="text" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"><input type="Submit" name="Fetch" id="Fetch" value="Fetch Student Details"></span></div></td>
          </tr>


        </form>

        </table><br>



<tabl0e class="mainBodyTable" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="738" valign="top">
      <table id="fortemp" width="600" align="center" cellpadding="8" cellspacing="0" style="border:#999 1px solid; background-color:#FBFBFB;">
        <form action="resupload.php?aid=<?php echo $id;  ?>" method="post" enctype="multipart/form-data">
          <tr>
            <td align="left" colspan="2"><?php print $errorMsg; ?>			</td>
          </tr>
   
          <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> USN:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="usn" type="text" class="formFields" id="b_name" readonly="" value="<?php echo "$aptid"; ?>" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><div align="left">Name:<span class="brightRed"> </span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="name" type="text" class="formFields" id="b_author"  readonly="" value="<?php echo "$name"; ?>" size="32" maxlength="20" />
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
                 <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Semester:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="sem" type="text" class="formFields" id="b_name" readonly="" value="<?php echo "$sem"; ?>" size="32" maxlength="3" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
             <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Branch:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="branch" type="text" class="formFields" readonly="" id="b_name" value="<?php echo "$branch"; ?>" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
             <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left">  Section:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="sec" type="text" class="formFields" readonly="" id="b_name" value="<?php echo "$sec"; ?>" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
         <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> IA Or EXT:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="ia" type="text" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
            <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Subject(1):<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="sub1" type="text" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
            <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Subject(2):<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="sub2" type="text" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>

 <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Subject(3):<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="sub3" type="text" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
           <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Subject(4):<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="sub4" type="text" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
           <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Subject(5):<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="sub5" type="text" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
           <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Subject(6):<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="sub6" type="text" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
           <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Lab(1):<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="lab1" type="text" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
           <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Lab(2):<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="lab2" type="text" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
       

              <input name="b_quantity" type="hidden" class="formFields" id="b_quantity" value="" size="32" maxlength="20" />
            </div></td>
          </tr>
         
            <td bgcolor="#FFFFFF">
            <td align="left" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="Upload Results" id="Submit" />
        </form>
      </table>
</td>
    <td width="160" valign="top"></td>

  </tr><br>

<td align="left" bgcolor="#FFFFFF"><center>

  </td></center>
</table>
         <center>     <a href="teachadmin.php?aid=<?php echo $id; ?>">    <img height="x" src="../img/home.png"></a></center>
</body>
</html>