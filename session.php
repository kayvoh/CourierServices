<?php
include('conn.php');
session_start();
if (!isset($_SESSION['username']) || ($_SESSION['password'] == '')) 
{
	header("location:logout.php");
	exit();	
}
?>
