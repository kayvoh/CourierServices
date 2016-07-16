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
	  ?><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <h1>Add Office</h1>
          <p class="margin-bottom-15"><u><b>Customers and Employees Will Categorize Information According To This</b></u></p>
          <div class="row">
            <div class="col-md-12">
			<form role="form" id="templatemo-preferences-form" method="post">
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Insert Name of Office">                  
                  </div>
				  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" >                  
                  </div>
				  
                </div>
              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
                  <button type="reset" class="btn btn-default">Reset</button>    
                </div>
              </div>
            </form>
<?php
if(isset($_POST['update']))
{
	$name=$_POST['name'];
	$location=$_POST['location'];
	$add=mysqli_query($conn, "insert into office
								(ofid,name,location)
									values
										('','$name','$location')");
	if($add)
	{
		echo "<script>alert('Office has been added')</script>";
	}
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