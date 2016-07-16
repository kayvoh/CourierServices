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
          <h1>List of Offices</h1>
          <p>Delete offices by clicking the delete button.</p>

          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
			  <br/>
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Location</th>
                      <th>Employees</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$sel=mysqli_query($conn,"select * from office where status='OPEN'");
while($sela=mysqli_fetch_array($sel))
{
?>
                    <tr>
                      <td><?php echo $sela['ofid']?></td>
                      <td><?php echo $sela['name']?></td>
                      <td><?php echo $sela['location']?></td>
                      <td>
						<?php 
							$ofid=$sela['ofid'];
							$s=mysqli_query($conn, "select * from user where office=$ofid");
							$sn=mysqli_num_rows($s);
							echo $sn;
						?>
					  </td>
                      <td>
							<form method="post">
								<input type="hidden" name="office" value="<?php echo $sela['ofid']?>"/>
								<input type="submit" name="del" value="Delete" class="btn btn-danger"/>
							</form>
					  </td>
                    </tr>
<?php
}
if(isset($_POST['del']))
{
	$ofid=$_POST['office'];
	$offdel=mysqli_query($conn, "update office set status='CLOSE' where ofid=$ofid");
	$usedel=mysqli_query($conn, "update user set status='INACT' where office=$ofid");
	if($offdel&$usedel)
	{
		header("location:officead.php?");
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