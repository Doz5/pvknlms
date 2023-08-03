<?php 
	session_start();
	unset($_SESSION['userName']);
	unset($_SESSION['Role']);

	echo "<script>window.location='login/';</script>";

 ?>