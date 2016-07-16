<!DOCTYPE html>
<head>
<?php
	include('conn.php');
?>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Courier Management</title>
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
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="username" placeholder="Username" name="username">
            </div>
          </div>              
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
          </div>
        </div>
		<br/>
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" value="Sign in" name="login" class="btn btn-info">
			  <a href="register.php" class="btn btn-link">New Customer?...Click Here to Register</a>
            </div>
          </div>
        </div>
      </form>
<?php
if(isset($_GET['fail']))
{
	echo "<script>alert('Login Failed, Please Recheck your Credentials')</script>";
}
if(isset($_POST['login']))
	{
		session_start();
		function clean($str) 
		{
			$str = @trim($str);
			if(get_magic_quotes_gpc()) 
			{
				$str = stripslashes($str);
			}
			return mysqli_real_escape_string(mysqli_connect("localhost", "root", "", "courier"), $str);
		}
	$username = clean($_POST['username']);
	$password = md5($_POST['password']);
	$finduser=mysqli_query($conn, "select * from user where username='$username' and status='ACTIVE'");
	$userarray=mysqli_fetch_array($finduser);
	$user=$userarray['type'];
	 // echo "<script>alert('$user')</script>";
		switch($user)
		{
			case "admin":
			$qryj="SELECT * FROM user WHERE username='$username' AND password='$password'";
			$result = mysqli_query($conn, $qryj);
			if($result)
			{
				if(mysqli_num_rows($result)>= 1 )
				{
					session_regenerate_id();
					$member = mysqli_fetch_assoc($result);
					$_SESSION['username'] = $member['username'];
					$_SESSION['password'] = $member['password'];
					$_SESSION['fname'] = $member['fname'];
					$_SESSION['lname'] = $member['lname'];
					$_SESSION['usid'] = $member['usid'];
					$_SESSION['phone'] = $member['phone'];
					$_SESSION['email'] = $member['email'];
					$_SESSION['idno'] = $member['idno'];
					$_SESSION['dob'] = $member['dob'];
					$_SESSION['us'] = 'Admin';
						session_write_close();
						header("location: indexad.php?");
						exit();
				}
				else
				{
					header("location:index.php?fail=");
				}
			}
			break;	
			case "customer":
			$qryj="SELECT * FROM user WHERE username='$username' AND password='$password'";
			$result = mysqli_query($conn, $qryj);
			if($result)
			{
				if(mysqli_num_rows($result)>= 1)
				{
					session_regenerate_id();
					$member = mysqli_fetch_assoc($result);
					$_SESSION['username'] = $member['username'];
					$_SESSION['password'] = $member['password'];
					$_SESSION['fname'] = $member['fname'];
					$_SESSION['lname'] = $member['lname'];
					$_SESSION['usid'] = $member['usid'];
					$_SESSION['phone'] = $member['phone'];
					$_SESSION['email'] = $member['email'];
					$_SESSION['idno'] = $member['idno'];
					$_SESSION['dob'] = $member['dob'];
					$_SESSION['us'] = 'Customer';
						session_write_close();
						header("location: indexcus.php?");
						exit();
				}
				else
				{
					header("location:index.php?fail=");
				}
			}
			break;
			
			case "employee":
			$qryj="SELECT * FROM user WHERE username='$username' AND password='$password'";
			$result = mysqli_query($conn, $qryj);
			if($result)
			{
				if(mysqli_num_rows($result)>= 1)
				{
					session_regenerate_id();
					$member = mysqli_fetch_assoc($result);
					$_SESSION['username'] = $member['username'];
					$_SESSION['password'] = $member['password'];
					$_SESSION['fname'] = $member['fname'];
					$_SESSION['lname'] = $member['lname'];
					$_SESSION['usid'] = $member['usid'];
					$_SESSION['phone'] = $member['phone'];
					$_SESSION['email'] = $member['email'];
					$_SESSION['idno'] = $member['idno'];
					$_SESSION['dob'] = $member['dob'];
					$_SESSION['us'] = 'Field Personnel';
						session_write_close();
						header("location: goodfield.php?");
						exit();
				}
				else
				{
					header("location:index.php?fail=");
				}
			}
			break;
			
			
			default:
				header("location:index.php?fail=");
		}			
}
?>
    </div>
  </div>
</body>
</html>
<?php
if(isset($_GET['reg']))
{
	echo "<script>alert('Registration was successful, Please login now')</script>";
}
?>