<?php 
	include '../db.php';



	if(isset($_POST['save']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = password_hash($password, PASSWORD_DEFAULT);
		$role = $_POST['role'];
		

		$status = "Active";
		$created_by = 1;
		$created_at = date('Y-m-d H:i:s');

		$Query = "INSERT INTO user (username, password, role, status, created_by, created_at) VALUES ('$username', '$password', '$role', '$status', '$created_by', '$created_at')";
		$insertResult = mysqli_query($connection,$Query);
		if($insertResult)
		{
			echo "Data Saved";
			header("Location:../users/");
		}
		else
		{
			echo "Data Not Saved";
		}
	}
	if(isset($_GET['dId']))
	{
		$id = $_GET['dId'];

		$Query = "DELETE FROM user WHERE id = '$id'";
		$DeleteResult = mysqli_query($connection,$Query);
		if($DeleteResult)
		{
			echo "Data Deleted";
			header("Location:../users/");
		}
		else
		{
			echo "Data Not Deleted";
		}
	}
?>