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
          <h1>Add New Item for Transit</h1>
          <p class="margin-bottom-15"><u><b>Fill This and Observe The Status of your Good Using the Name</b></u></p>
          <div class="row">
            <div class="col-md-12">
			<form role="form" id="templatemo-preferences-form" method="post">
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Insert Name of Good" required>
					<br/>
					<label for="firstName" class="control-label">Type of Good</label>
                    <input type="text" class="form-control" id="type" name="type"  placeholder="Categorize your good" required>
					<br/>
					<label for="firstName" class="control-label">Approximate Weight</label>
                    <select class="form-control margin-bottom-15" id="singleSelect" name="weight" required>
						<option></option>
						<option value="less than 1 kg">Less than 1 Kg</option>
						<option value="less than 10 kg">Less than 10 Kg</option>
						<option value="less than 20 kg">less than 20 Kg</option>
						<option value="less than 30 kg">less than 30 Kg</option>
						<option value="less than 40 kg">less than 40 Kg</option>
						<option value="less than 50 kg">less than 50 Kg</option>
						<option value="less than 100 kg">less than 100 Kg</option>
						<option value="less than 200 kg">less than 200 Kg</option>
						<option value="less than 1 tonne">less than 1 Tonne</option>
						<option value="more than 1 tonne">More than 1 Tonne</option>
					</select>
					<br/>
					<label for="firstName" class="control-label">From</label>
                    <select class="form-control margin-bottom-15" id="singleSelect" name="fromm" required>
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
					<br/>
					<label for="firstName" class="control-label">To(Destination)</label>
                    <select class="form-control margin-bottom-15" id="singleSelect" name="tto" required>
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
					<br/>
					<label for="firstName" class="control-label">Recipient</label>
                    <input type="text" class="form-control" id="location" placeholder="Official Names of Recipient" name="recipient" required>
					<br/>
					<label for="firstName" class="control-label">Recipient ID Number</label>
                    <input type="number" class="form-control" id="location" placeholder="Recipient National ID Number" name="reidno" required>
					<br/>
					<label for="firstName" class="control-label">Approval Code</label>
                    <input type="text" class="form-control" name="code" id="location" placeholder="The recipient will have to issue this code at reception" maxlength="8" required>
					<br/>
                  </div>
				  <div class="col-md-6 margin-bottom-15">                  
                  </div>
				  
                </div>
              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="submit" name="update" class="btn btn-primary">Request Transit</button>
                  <button type="reset" class="btn btn-default">Reset</button>    
                </div>
              </div>
            </form>
<?php
if(isset($_POST['update']))
{
	$sender=$_SESSION['usid'];
	$name=$_POST['name'];
	$type=$_POST['type'];
	$weight=$_POST['weight'];
	$fromm=$_POST['fromm'];
	$tto=$_POST['tto'];
	$recipient=$_POST['recipient'];
	$reidno=$_POST['reidno'];
	$code=$_POST['code'];
	$ins=mysqli_query($conn, "insert into goods(goid,name,type,fromm,tto,recipient,recidno,approval,sender,weight)
								values
								   ('','$name','$type',$fromm,$tto,'$recipient',$reidno,'$code',$sender,'$weight')");
	if($ins)
	{
		header("location:indexcus.php?suc=");
	}
}
if(isset($_GET['suc']))
{
	echo "<script>alert('Good added successfully')</script>";
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