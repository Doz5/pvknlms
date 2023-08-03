<?php 
	include '../db.php';
	if(isset($_POST['saveData'])) 
	{
		$student_id = $_POST['student_id'];
		$student_name = $_POST['student_name'];
		$reg_no = $_POST['reg_no'];
		$student_year = $_POST['student_year'];
		$student_group = $_POST['student_group'];

		$status ="Active";
		$created_by = 1;
		$created_at = date('Y-m-d H:i:s');


		echo $Query = "INSERT INTO lms.student_registration(student_id, student_name, reg_no, student_year, student_group, status, created_by, created_at) VALUES ('$student_id', '$student_name', '$reg_no', '$student_year', '$student_group', '$status', '$created_by', '$created_at')";
		$insertResult = mysqli_query($connection,$Query);
		if ($insertResult)
		{
			echo "Data Saved";
			header("Location:../Student_Registration/");
		}	
		else
		{
			echo "Data not Saved";
		}
	}
	if (isset($_GET['dId']))
	{
		$id = $_GET['dId'];

		$Query = "DELETE FROM student_registration WHERE id = '$id'";
		$DeleteResult = mysqli_query($connection,$Query);
		if($DeleteResult)
		{
			echo "Data Deleted";
			header("Location:../Student_List/");
		}	
		else
		{
			echo "Data Not Deleted";
		}	
	}
	if (isset($_POST['updateData']))
	{
		$id = $_POST['id'];
		$student_id = $_POST['student_id'];
		$student_name = $_POST['student_name'];
		$reg_no = $_POST['reg_no'];
		$student_year = $_POST['student_year'];
		$student_group = $_POST['student_group'];

		$status = "Active";
		$created_by = 1;
		$created_at = date('Y-m-d H:i:s');

		$Query = "UPDATE student_registration SET student_name = '$student_name', reg_no = '$reg_no', student_year = '$student_year', student_group = '$student_group' where id = '$id'";
		$insertResult = mysqli_query($connection,$Query);
		if($insertResult)
		{
			echo "Data Saved";
			header("Location:../Student_List/");
		}
		else
		{
			echo "Data Not Saved";
		}
		
	}


?>