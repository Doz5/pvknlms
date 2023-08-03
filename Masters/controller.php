<?php 
	include '../db.php';
	if(isset($_POST['saveData'])) 
	{
		$master_type = $_POST['master_type'];
		$master_name = $_POST['master_name'];

		$status ="Active";
		$created_by = 1;
		$created_at = date('Y-m-d H:i:s');


		echo $Query = "INSERT INTO lms.masters(master_type, master_name, status, created_by, created_at) VALUES ('$master_type', '$master_name', '$status', '$created_by', '$created_at')";
		$insertResult = mysqli_query($connection,$Query);
		if ($insertResult)
		{
			echo "Data Saved";
			header("Location:../Masters/");
		}	
		else
		{
			echo "Data not Saved";
		}
	}
	if (isset($_GET['dId']))
	{
		$id = $_GET['dId'];

		$Query = "DELETE FROM masters WHERE id = '$id'";
		$DeleteResult = mysqli_query($connection,$Query);
		if($DeleteResult)
		{
			echo "Data Deleted";
			header("Location:../Masters/");
		}	
		else
		{
			echo "Data Not Deleted";
		}	
	}
	if (isset($_POST['updateData']))
	{
		$id = $_POST['id'];
		$master_type = $_POST['master_type'];
		$master_name = $_POST['master_name'];

		$status = "Active";
		$created_by = 1;
		$created_at = date('Y-m-d H:i:s');

		$Query = "UPDATE masters SET master_type = '$master_type', master_name = '$master_name'  where id = '$id'";
		$insertResult = mysqli_query($connection,$Query);
		if($insertResult)
		{
			echo "Data Saved";
			header("Location:../Masters/");
		}
		else
		{
			echo "Data Not Saved";
		}
		
	}


?>