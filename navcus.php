<?php
include('session.php');
include('conn.php');
?>
	  <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
		  <li>
			  <li><a href="indexcus.php"><h4><b><?php echo $_SESSION['fname'].' '.$_SESSION['lname']?></b></h4><h5><br/><u><?php echo $_SESSION['us']?></u></h5></a></li>
          </li>
		  <br/>
          <li><a href="indexcus.php"><i class="fa fa-home"></i>Add Good on Transit</a></li>
          <li><a href="gotcus.php"><i class="fa fa-car"></i>View Status of Goods</a></li>
          <li><a href="passcus.php"><i class="fa fa-star"></i>Change Password</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div>
	  	  <?php
		if($_SESSION['us']!='Customer')
		{
			header("location:logout.php");
		}
	  ?>