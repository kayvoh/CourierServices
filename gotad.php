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
          <h1><u>On Transit</u></h1>
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
                      <th>Sender</th>
                      <th>Receiver</th>
                      <th>To</th>
                      <th>From</th>
                      <th>Charges</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$f=mysqli_query($conn, "select * from goods where status='APPROVED' or status='PICKED'");
while($fa=mysqli_fetch_array($f))
{
?>
                    <tr>
                      <td><?php echo $fa['goid']?></td>
                      <td><?php echo $fa['name']?></td>
                      <td><?php echo $fa['type']?></td>
                      <td><?php echo $fa['weight']?></td>
                      <td>
						<?php
							$sen=$fa['sender'];
							$send=mysqli_query($conn,"select * from user where usid=$sen");
							$senda=mysqli_fetch_array($send);
							echo $senda['fname'].' '.$senda['lname'];
						?>
					  </td>
                      <td><?php echo $fa['recipient']?></td>
                      <td>
						<?php
							$tto=$fa['tto'];
							$fromm=$fa['fromm'];
							$ft=mysqli_query($conn,"select * from office where ofid=$tto");
							$ff=mysqli_query($conn,"select * from office where ofid=$fromm");
							$fta=mysqli_fetch_array($ft);
							$ffa=mysqli_fetch_array($ff);
							echo $fta['name'].' - '.$fta['location'];
						?>
					  </td>
                      <td><?php echo $ffa['name'].' '.$ffa['location']?></td>
                      <td><?php echo $fa['charges']?></td>
                    </tr>
<?php
}
if(isset($_POST['bill']))
{
	$good=$_POST['good'];
	$charge=$_POST['charge'];
	$upd=mysqli_query($conn, "update goods set charges=$charge where goid=$good");
	$stat=mysqli_query($conn, "update goods set status='APPROVED' where goid=$good");
	if($upd&$stat)
	{
		header("location:pgad.php?");
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