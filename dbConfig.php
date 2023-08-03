<?php 
		date_default_timezone_set("Asia/Calcutta");
		$connection = mysqli_connect("localhost","root","","sri_ims");

		if(!$connection)
		{
				echo "Database not Connected";
		}
 ?>