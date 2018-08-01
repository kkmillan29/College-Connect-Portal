<?php
session_start(); // Must start session first thing
  $sid=$_SESSION['Reg_No'];

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
<link href="Admin/main.css" rel="stylesheet" type="text/css" />
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

       <h3>Now Booking Appoinment With Principal become Easier</h3>
       <h5>Fill Details Below</h5>
<form name="snd" action="apptbook.php" method="POST">
<div class="form-group">
<input type="text" name="from" class="form-control" id="user" value="  <?php @session_start(); echo $_SESSION['Name'];?>" placeholder="Your Chat Nickname" maxlength="200"/><br>
              <input type="text" name="purpus" class="form-control login-field" value="" placeholder="Appoinment Purpose" id="login-pass" />
              
            </div>
          <input name="b_publisher" type="date" class="formFields" id="b_publisher"  size="32" maxlength="20" />
       <span class="greyColor"><font size="3">Select Your Appoinment Date.</span></font><br><br>
<input type="submit" name="submit" id="submit" class="btn btn-lg btn-info btn-block input-icon fui-user" value="Book Now" />



       </form> 
    </div>
  </div>
  <!-- /Closing Friend Requests Div-->


<div class="col-xs-2">
<strong> Appoinment Activity</strong>
    <marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();">
                  <?php
                  include('scripts/conn.php');
                  $sql=mysqli_query($con,"SELECT * FROM appt  ORDER BY time ASC LIMIT 10 ");
                  if(count($sql)>0){
  $row=$sql->fetch_array(MYSQLI_ASSOC);
                  echo'       <p class="palette-paragraph">';

                  $sd=$row["aid"];
                  $date=$row["time"];
                  $desc=$row["status"];
                  $tme=$row['tme'];
                  $date =$row['adate'];

                  echo '<font color="red"><strong>Appoinment Activity</strong></font><br>';
                  echo '<strong>Appoinment ID:</strong><br>';
                    echo '<b><font color="red">'.$sd.'</b></font><br>';
                                      echo 'Updated on: <br>';
                    echo ''.$date.'<br>';

                  echo '<b>Status: <font color="red">'.$desc.'</b></font><br>';
                  echo '<font color="green">Appoinment Time:'.$tme.'</font>';
                  }?> 
                  <p>

                  </p>
          </marquee>
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