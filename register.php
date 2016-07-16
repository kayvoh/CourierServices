<!DOCTYPE html>
<?php
	include('conn.php');
?>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Courier Management System</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/templatemo_main.css">
<!-- 
Dashboard Template 
http://www.templatemo.com/preview/templatemo_415_dashboard
-->
</head>
<body>
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>Courier Management System</h1></div>
      </div>   
    </div>
    <div class="template-page-wrapper">
      <form class="form-horizontal templatemo-signin-form" role="form" method="post">
        <div class="form-group">
          <div class="col-md-12">
            <label for="fname" class="col-sm-4 control-label">First Name:</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" required>
            </div>
          </div>              
        </div>
		<div class="form-group">
		<div class="col-md-12">
            <label for="lname" class="col-sm-4 control-label">Last Name:</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" required>
            </div>
          </div>              
        </div>
		<div class="form-group">
		<div class="col-md-12">
            <label for="idno" class="col-sm-4 control-label">ID No:</label>
            <div class="col-md-8">
              <input type="number" class="form-control" id="idno" placeholder="National ID Number" name="idno" required>
            </div>
          </div>              
        </div>
		<div class="form-group">
		<div class="col-md-12">
            <label for="username" class="col-sm-4 control-label">Date of Birth:</label>
            <div class="col-md-8">
              <input type="date" class="form-control" id="dob" placeholder="Date Of Birth" name="dob" required>
            </div>
          </div>              
        </div>
		
		<div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-4 control-label">Email:</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" id="email" placeholder="Your Email Address" name="email" required>
            </div>
          </div>              
        </div>
		<div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-4 control-label">Phone:</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="phone" placeholder="Phone Number" name="phone" required>
            </div>
          </div>              
        </div>
		
		<div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-4 control-label">Username:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
            </div>
          </div>              
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="password" class="col-sm-4 control-label">Password:</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
          </div>
        </div>
		<br/>
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-8">
              <input type="submit" value="Register" name="register" class="btn btn-success">
			  <a href="index.php" class="btn btn-link">Already Registered?...Click Here to Login</a>
            </div>
          </div>
        </div>
      </form>
<?php
if (isset($_POST['register']))
{
			$username=$_POST['username'];
			$checkunad=mysqli_query($conn, "select * from user where username='$username'");
			$numad=mysqli_num_rows($checkunad);
			if($numad>0)
			{	
			echo 		"<script>
						alert('Please  choose another Username, That is not currently available');	
						</script>";
			}
			else
			{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$type='customer';
			// $location=$_POST['location'];
			$phone=$_POST['phone'];
			$dob=$_POST['dob'];
			$idno=$_POST['idno'];
			$email=$_POST['email'];
			$username=$_POST['username'];			
			$password=md5($_POST['password']);
			
				$weka=mysqli_query($conn, "insert into user (usid,fname,lname,idno,phone,email,dob,type,username,password,status)
									values 
									('','$fname','$lname',$idno,'$phone','$email','$dob','$type','$username','$password','ACTIVE')");
				// $sel=mysqli_query($conn, "select * from user where username='$username'");
				// $sela=mysqli_fetch_array($sel);
				// $uid=$sela['uid'];
				// $weka2=mysqli_query($conn, "insert into cus_det(did,uid,location,phone,idno,meter)values('',$uid,'$location',$phone,$idno,$meter)");
				if($weka)
				{
					header("location:index.php?reg=");
				}
			}
}
?>
    </div>
  </div>
</body>
</html>