	  <?php
		include('session.php');
		include('conn.php');
	  ?>
	  <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
          <li>
			  <li><a href="indexad.php"><h4><b><?php echo $_SESSION['fname'].' '.$_SESSION['lname']?></b></h4><h5><br/><u><?php echo $_SESSION['us']?></u></h5></a></li>
          </li>
		  <br/>
		  <li><a href="indexad.php"><i class="fa fa-home"></i>Add Office</a></li>
          <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Lists <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="employeead.php">Employees</a></li>
              <li><a href="officead.php">Offices</a></li>
              <li><a href="customerad.php">Customers</a></li>             
            </ul>
          </li>
		   <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-list"></i>Courier<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="gotad.php">Goods on Transit</a></li>
              <li><a href="pgad.php">Pending Goods</a></li>
              <li><a href="dgad.php">Delivered goods</a></li>             
            </ul>
          </li>
          <li><a href="passad.php"><i class="fa fa-star"></i>Password</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div>
	  <?php
		if($_SESSION['us']!='Admin')
		{
			header("location:logout.php");
		}
	  ?>