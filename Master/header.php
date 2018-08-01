  <?php  
  session_start();
 
 


$id = $_SESSION['Reg_No'];
include_once "Admin/conn.php";
$sql = "SELECT * FROM student WHERE Reg_No='$id' LIMIT 1"; 
$result=mysqli_query($con,$sql);
 while($row = mysqli_fetch_array($result)){ 

$name=$row['Name'];





 }



  ?>
	
    <div class="container">
	 <!--Header -->
	 
	 <div class="row">
        <div class="col-xs-6">
    <img src="images/icons/png/logo.png" width="220" height="120">
		</div>
		 

      <div class="col-xs-6" align="right">
        <div class="row">
          <div class="col-xs-9">
            <?php echo $name; 



           


             ?>
      
          <div class="row">
          <div class="col-xs-12">
            <a href="logout.php"><b>Logout!</b></a>
          </div>
        </div>
          </div>

          <div class="col-xs-2" align="right">
          <?php echo $user_pic;?>

          </div>
</div>
		  </div>
     
		  </div>
		
	   <!-- Navigation Bar for Landing Page -->
    <div class="row">
        <div class="col-ls-12">
<nav class="navbar navbar-inverse navbar-embossed" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
      <span class="sr-only">Toggle navigation</span>
    </button>
  
  </div>
  <div class="collapse navbar-collapse" id="navbar-collapse-01">
    <ul class="nav navbar-nav">   
    <?php 
    session_start('Reg_No');
$id = $_GET['Reg_No'];

    ?>        
      
      <li class=""><a href="home.php?Reg_No=<?php echo $id?>">Home</a></li>
      <li><a href="edit.php?Reg_No=<?php echo $id?>">Profile</a></li>
    
      <li><a href="appt.php?Reg_No=<?php echo $id?>">Book Appoinment</a></li>
      <li><a href="nick.php?Reg_No=<?php echo $id?>">Public Chat</a></li>
	        <li><a href="service.php?Reg_No=<?php echo $id?>">Services</a></li>
            <li><a href="about.php?Reg_No=<?php echo $id?>">About</a></li>
			
    </ul>      
          
    <form class="navbar-form navbar-left" role="search" id="form3" name="form3" method="post" action="search.php">
      <div class="form-group">
        <div class="input-group">
          <input class="form-control" name="fname" id="fname" type="search" placeholder="Search College Friends">
          <span class="input-group-btn">
            <button type="submit" name="button3" type="submit" id="button3" class="btn"><span class="fui-search"></span></button>
          </span>            
        </div>
      </div>   
                <input type="hidden" name="listByq" value="by_firstname" />
            
    </form>	
  
  </div><!-- /.navbar-collapse -->
</nav>
    </div>
	<!-- /navbar -->
	
	
	</div>

