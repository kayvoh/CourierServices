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
          <h1>List of Customers</h1>
          <p>Delete Customer Accounts by clicking the delete button.</p>

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
                      <th>Packages sent</th>
                      <th>ID Number</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$sel=mysqli_query($conn,"select * from user where type='customer' and status='ACTIVE'");
while($sela=mysqli_fetch_array($sel))
{
?>
                    <tr>
                      <td><?php echo $sela['usid']?></td>
                      <td><?php echo $sela['fname']?></td>
                      <td><?php echo $sela['lname']?></td>
                      <td>
						<?php
							$user=$sela['usid'];
							$d=mysqli_query($conn, "select * from goods where sender=$user");
							$da=mysqli_num_rows($d);
							echo $da;
						?>
					  </td>
                      <td><?php echo $sela['idno']?></td>
                      <td><?php echo $sela['email']?></td>
                      <td><?php echo $sela['phone']?></td>
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
		header("location:customerad.php?");
	}
}
?>
                  </tbody>
                </table>
              </div>
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