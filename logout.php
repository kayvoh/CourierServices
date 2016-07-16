<?php
mysqli_connect("localhost","root","","gormahia");
session_start();
session_destroy();
header('location:index.php');
?>