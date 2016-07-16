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
		include('navfield.php');
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
                      <th>Receiver...ID Number</th>
                      <th>To</th>
                      <th>From</th>
                      <th>Charges</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$me=$_SESSION['usid'];
$f=mysqli_query($conn, "select * from goods where status='APPROVED' or status='PICKED' order by goid desc");
while($fa=mysqli_fetch_array($f))
{
	if($fa['personnel']==0 || $fa['personnel']==$me)
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
                      <td><?php echo $fa['recipient'].'..'.$fa['recidno']?></td>
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
                      <td><?php echo $ffa['name'].' - '.$ffa['location']?></td>
                      <td><?php echo $fa['charges']?></td>
<?php
if($fa['status']=='APPROVED')
{
?>
                    <td>
					  <form method="post">
						<input type="hidden" name="good" value="<?php echo $fa['goid']?>">
						<input type="submit" class="btn btn-primary btn-xs" name="pick" value="Pick...?">
						</form>
					</td>
<?php
}
else if($fa['status']=='PICKED'&&$fa['personnel']==$me)
{
?>
					<td>
					  <form method="post">
						<input type="hidden" name="good" value="<?php echo $fa['goid']?>">
						<input type="text" name="code" placeholder="Ask recipient for code">
						<input type="submit" class="btn btn-success btn-xs" name="deliver" value="Delivered..??">
						</form>
					</td>
<?php
}
?>
                    </tr>
<?php
}
}






if(isset($_POST['pick']))
{
	$good=$_POST['good'];
	$me=$_SESSION['usid'];
	$stat=mysqli_query($conn, "update goods set status='PICKED' where goid=$good");
	$stat2=mysqli_query($conn, "update goods set personnel=$me where goid=$good");
	if($stat2&$stat)
	{
		header("location:goodfield.php?");
	}
}
if(isset($_POST['deliver']))
{
	$good=$_POST['good'];
	$code=$_POST['code'];
	$pss=mysqli_query($conn, "select * from goods where goid=$good");
	$pssa=mysqli_fetch_array($pss);
	$cd=$pssa['approval'];
	if($code==$cd)
	{
		$upd=mysqli_query($conn, "update goods set status='DELIVERED' where goid=$good");
		if($upd)
		{
			header("location:goodfield.php?suc=");
			
		}
	}
	else
	{
		echo "<script>alert('wrong code')</script>";
	}
	
}
if(isset($_GET['suc']))
{
	echo "<script>alert('Successfully delivered ')</script>";
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