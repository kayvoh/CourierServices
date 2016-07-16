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
	  ?>
	  <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <h1>Status of My Goods</h1>
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
			  <br/>
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Appr. Mass in kg</th>
                      <th>Recipient</th>
                      <th>To</th>
                      <th>From</th>
                      <th>Personnel</th>
                      <th>Charges</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$me=$_SESSION['usid'];
$get=mysqli_query($conn, "select * from goods where sender=$me");
while($geta=mysqli_fetch_array($get))
{
?>
                    <tr>
                      <td><?php echo $geta['goid']?></td>
                      <td><?php echo $geta['name']?></td>
                      <td><?php echo $geta['type']?></td>
                      <td><?php echo $geta['weight']?></td>
                      <td><?php echo $geta['recipient']?></td>
                      <td>
						<?php
							$tto=$geta['tto'];
							$h=mysqli_query($conn, "select * from office where ofid=$tto");
							$ha=mysqli_fetch_array($h);
							echo $ha['name'].' in '.$ha['location'];
						?>
					  </td>
                      <td>
					  <?php
							$fromm=$geta['fromm'];
							$h=mysqli_query($conn, "select * from office where ofid=$fromm");
							$ha=mysqli_fetch_array($h);
							echo $ha['name'].' in '.$ha['location'];
					  ?>
					  </td>
                      <td>
						<?php
							if($geta['personnel']==0)
							{
								echo '-';
							}
							else
							{
								$per=$geta['personnel'];
								$fet=mysqli_query($conn, "select * from user where usid=$per");
								$feta=mysqli_fetch_array($fet);
								echo $feta['fname'].' '.$feta['lname'];
							}
						?>
					  </td>
                      <td><?php echo $geta['charges']?></td>
                      <td><?php echo $geta['status']?></td>
                    </tr>
<?php
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