<?php 
	$server = "localhost";
	$user = "root";
	$pass = "root@123";
	$dbName = "lms";
	$connection = mysqli_connect($server,$user,$pass,$dbName);

	if(!$connection)
	{
		echo "DB not Connected";
	}
?>