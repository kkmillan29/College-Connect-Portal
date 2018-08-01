<?php
session_start();

if($_SESSION['Reg_No']==null){
 header("location:login.php"); 
}

else
{
$id=$_SESSION['Reg_No'];


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
    $username ="";
    $batch = "";
    $streetname ="";
    $city = "";
    $statename = "";
    $country = "";
    $sec="";
    $sem="";

    $contact = "";




//Connect to the database through our include 
include_once "scripts/conn.php";
// Place Session variable 'id' into local variable
//$id = $_SESSION['Reg_No'];
// Process the form if it is submitted
if (isset($_POST['profile'])) {

    $username = $_POST['username'];
    $batch = $_POST['batch'];
    $streetname = $_POST['streetname'];
    $city = $_POST['city'];
    $branch = $_POST['branch'];

          $sem = $_POST['sem'];
             $sec = $_POST['sec']; 
    $statename = $_POST['statename'];
    $country = $_POST['country'];
    $contact = $_POST['contact'];

              $sql = mysqli_query($con,"UPDATE student SET Name='$username', Batch='$batch',sem='$sem',Street='$streetname', 
                  City='$city',State='$statename',Country='$country',Contact_No='$contact',branch='$branch',sec='$sec' WHERE Reg_No='$id'");
              
$successMSG=' <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
        <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
        Your profile is updated successfully.</p>

      </div>';       
            }
            ///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
  $check_pic = "Students/$id/pic1.jpg";
  $default_pic ="images/icons/png/user.png";
  if (file_exists($check_pic)) {
    $user_pic = '<img height="80px" width="80px"  src="'.$check_pic.'">';
  } else {
    $user_pic = '<img height="80px" width="80px"  src="'.$default_pic.'">';
      }
 // close if post
?>
<?php
// Query member data from the database and ready it for display
$sql = mysqli_query($con,"SELECT * FROM student WHERE Reg_No='$id' LIMIT 1");
if(count($sql)>0){
  $row=$sql->fetch_array(MYSQLI_ASSOC);

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
    }
?>

<script type="text/javascript">
<!-- Form Validation -->
function validate_form ( ) { 
valid = true; 
if ( document.editprofile.username.value == "" ) { 
alert ( "Please enter your User Name" ); 
valid = false;
}

if ( document.editprofile.streetname.value == "" ) { 
alert ( "Please enter your street" ); 
valid = false;
}

if ( document.editprofile.city.value == "" ) { 
alert ( "Please enter your city" ); 
valid = false;
}

if ( document.editprofile.statename.value == "" ) { 
alert ( "Please enter your state." ); 
valid = false;
}


if ( document.editprofile.country.value == "" ) { 
alert ( "In which Country you belongs" ); 
valid = false;
}


if ( document.editprofile.contact.value == "" ) { 
alert ( "Please enter your Mobile Number" ); 
valid = false;
}
if ( document.editprofile.branch.value == "" ) { 
alert ( "Please enter your branch" ); 
valid = false;
}
if ( document.editprofile.sem.value == "" ) { 
alert ( "Please enter your Semster" ); 
valid = false;
}
if ( document.editprofile.sec.value == "" ) { 
alert ( "Please enter your Section" ); 
valid = false;
}
return valid;
}
</script>


  </head>
  <body>
        <?php echo $successMSG;?>

  <br>	
   <?php  include_once('Master/header.php');
?>
   	<!-- /sdfds-->
	<div class="row">
		<!-- /Opening Friend Requests Div-->
	<div class="col-xs-10">
	<h4>Let's Have some change.</h4>
  <?php              include_once "pic_upload.php";?>

	<div class="row">
		<div class="col-xs-6">
	 <form action="edit.php?Reg_No=<?php echo $id;  ?>" method="POST" name="editprofile" id="editprofile" enctype="multipart/form-data" onSubmit="return validate_form();">
	<input type="hidden" name="profile">
  	<div class="form-group">What's Your Name
				<input type="text" name="username" id="username" value="<?php echo "$username"; ?>" class="form-control" placeholder="Name" />
		</div>
		
			<div class="form-group">When you drop your first step in our college.
				
				<div class="dropdown">


   <select name="batch"  class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <optgroup label="Batches">
            <option value="<?php echo "$batch"; ?>"><?php echo "$batch"; ?></option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
               <option value="2015">2016</option>
                <option value="2015">2017</option>
            </optgroup>
    </select>			
				</div>
				</div>
			

    <div class="form-group">Street
        <input type="text" name="streetname" id="streetname"  value="<?php echo "$streetname"; ?>" class="form-control" placeholder="What's your street." />
    </div>

    <div class="form-group">City
        <input type="text" name="city" class="form-control"  value="<?php echo "$city"; ?>" placeholder="What's your city." />
    </div>

    <div class="form-group">State
        <input type="text" name="statename" id="statename" class="form-control"  value="<?php echo "$statename"; ?>" placeholder="What's your state" />
    </div>

    <div class="form-group">Country
        <input type="text" name="country" class="form-control" placeholder="What's your country."  value="<?php echo "$country"; ?>" />
    </div>

			<div class="form-group">Wants to share your contact number
				<input type="text" name="contact" class="form-control" placeholder="Give your mobile number."  value="<?php echo "$contact"; ?>" />
			</div>
      <div class="form-group">Your Branch
        <input type="text" name="branch" class="form-control" placeholder="Enter your Branch (eg:CSE)."  value="<?php echo "$branch"; ?>" />
      </div>
        <div class="form-group"> Semester
        <input type="text" name="sem" class="form-control" placeholder="Enter your Semester."  value="<?php echo "$sem"; ?>" />
      </div>
        <div class="form-group"> Section
        <input type="text" name="sec" class="form-control" placeholder="Enter your Section."  value="<?php echo "$sec"; ?>" />
      </div>
			
			
            <input name="submit" type="submit" class="btn btn-embossed btn-success" value=" I'm bored just save it.">
		
		          </form>

	</div>
	</div>
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