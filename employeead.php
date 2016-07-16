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
		include('navad.php');
	  ?>
	  
	  
	  
	  
	  
	  <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <h1>List of Employees</h1>
          <p>Delete employees by clicking the delete button.</p>

          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
			  <br/>
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Office</th>
                      <th>Location</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$sel=mysqli_query($conn, "select * from user where type='employee' and status='ACTIVE'");
while($sela=mysqli_fetch_array($sel))
{
?>
                    <tr>
                      <td><?php echo $sela['usid']?></td>
                      <td><?php echo $sela['fname']?></td>
                      <td><?php echo $sela['lname']?></td>
                      <td><?php echo $sela['email']?></td>
                      <td><?php echo $sela['phone']?></td>
                      <td>
						<?php 
							$ofid=$sela['office'];
							$s=mysqli_query($conn, "select * from office where ofid=$ofid");
							$sa=mysqli_fetch_array($s);
							echo $sa['name'];
						?>
					  </td>                    
                      <td><?php echo $sa['location']?></td>                    
                      <td>
							<form method="post">
								<input type="hidden" name="user" value="<?php echo $sela['usid']?>"/>
								<input type="submit" name="del" value="Delete" class="btn btn-danger"/>
							</form>
					  </td>
                    </tr>
<?php
}
if(isset($_POST['del']))
{
	$usid=$_POST['user'];
	$userdel=mysqli_query($conn, "update user set status='INACT' where usid=$usid");
	if($userdel)
	{
		header("location:employeead.php?");
	}
}
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
		  <div class="template-page-wrapper">
		  
      <form class="form-horizontal templatemo-signin-form" role="form" method="post">
	  <div class="form-group">
	  <div class="col-md-8">
			<h1><u>Add new Employee</u></h1>
			</div>
		  </div>
	  
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
              <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required>
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
            <label for="username" class="col-sm-4 control-label">Office:</label>
            <div class="col-sm-8">
               <select class="form-control margin-bottom-15" id="singleSelect" name="office" required>
						<option></option>
<?php
$rt=mysqli_query($conn, "select * from office");
while($ra=mysqli_fetch_array($rt))
{
?>
						<option value="<?php echo $ra['ofid']?>"><?php echo $ra['location'].' - - - '.$ra['name']?></option>
<?php
}
?>
					</select>
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
            <div class="col-sm-offset-2 col-sm-4">
              <input type="submit" value="Register Employee" name="register" class="btn btn-success">
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
			$type='employee';
			$phone=$_POST['phone'];
			$dob=$_POST['dob'];
			$idno=$_POST['idno'];
			$email=$_POST['email'];
			$office=$_POST['office'];
			$username=$_POST['username'];			
			$password=md5($_POST['password']);
				$weka=mysqli_query($conn, "insert into user
											(usid,fname,lname,idno,phone,email,dob,type,username,password,status,office)
												values 
													('','$fname','$lname',$idno,'$phone','$email','$dob','$type','$username','$password','ACTIVE','$office')");
				if($weka)
				{
					header("location:employeead.php?reg=");
				}
			}
}
?>
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
<?php
if(isset($_GET['reg']))
{
	echo "<script>alert('Registration was successful')</script>";
}
?>