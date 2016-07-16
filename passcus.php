<!DOCTYPE html>
<?php
	include('head.php');
?>
<body>
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>Courier Management System</h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>
    <div class="template-page-wrapper">
      <?php
		include('navcus.php');
	  ?><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <h1>Change Your Password</h1>
          <p class="margin-bottom-15"><b>Write the Password and confirm it again</b></p>
          <div class="row">
            <div class="col-md-12">
			<form role="form" id="templatemo-preferences-form" method="post">
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Password</label>
                    <input type="password" class="form-control" id="name" name="pass" placeholder="Preferred Password" required>                  
                  </div>
				  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Confirm Password</label>
                    <input type="password" class="form-control" id="location" name="passc" placeholder="Confirm Your Password" required>                  
                  </div>
				  
                </div>
              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="submit" name="update" class="btn btn-warning">Update Password</button>
                  <button type="reset" class="btn btn-default">Reset</button>    
                </div>
              </div>
            </form>
<?php
if(isset($_POST['update']))
{
	$me=$_SESSION['usid'];
	$pass=$_POST['pass'];
	$passc=$_POST['passc'];
	if($pass==$passc)
	{
		$pss=md5($pass);
		$upd=mysqli_query($conn, "update user set password='$pss' where usid=$me");
		if($upd)
		{
			header("location:passcus.php?suc");
		}
	}
	else
	{
		header("location:passcus.php?fail=");
	}
}
if(isset($_GET['suc']))
{
	echo "<script>alert('Password Update was Successful')</script>";
}
if(isset($_GET['fail']))
{
	echo "<script>alert('FAILED!!...Passwords do not match')</script>";
}
?>
          </div>
        </div>
      </div>
    </div>
       <?php
		include('modallogout.php');
		include('footer.php');
	   ?>
  </div>
</div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/templatemo_script.js"></script>
</body>
</html>