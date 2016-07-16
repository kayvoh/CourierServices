	  <?php
		include('conn.php');
		include('session.php');
	  ?>
	  <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
		  <li>
			  <li><a href="goodfield.php"><h4><b><?php echo $_SESSION['fname'].' '.$_SESSION['lname']?></b></h4><h5><br/><u><?php echo $_SESSION['us']?></u></h5></a></li>
          </li>
		  <br/>
          <li><a href="goodfield.php"><i class="fa fa-home"></i>Manage Goods</a></li>
          <li><a href="passfield.php"><i class="fa fa-star"></i>Change Password</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div>
	  	  <?php
		if($_SESSION['us']!='Field Personnel')
		{
			header("location:logout.php");
		}
	  ?>