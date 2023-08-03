<?php 
	include '../db.php';
	if (isset($_POST['saveData'])) 
	{
		if (isset($_POST['book_id'])) 
		{
			$id = $_POST['s_id'];
			$book_id = $_POST['book_id'];
			$query = "SELECT * FROM status WHERE book_id = '$book_id'";
			$result = mysqli_query($connection,$query);
			if (mysqli_num_rows($result) > 0) 
			{
				echo "<script>alert('Book Already Returned...!');
				window.location.href='../Books/?id=$id';</script>";
				exit();
			}
		}
		$id = $_POST['s_id'];
		$book_id = $_POST['book_id'];
		$book_code = $_POST['book_code'];
		$sName  = $_POST['sName'];
		$returned_date = $_POST['returned_date'];
		$status = "Active";
		$created_by = 1;
		$created_at = date('Y-m-d H:i:s');

		$Query = "INSERT INTO status (book_id, book_code, sName, returned_date, status, created_by, created_at) VALUES ('$book_id', '$book_code', '$sName', '$returned_date', '$status', '$created_by', '$created_at')";
		$QueryResult = mysqli_query($connection,$Query);
		if ($QueryResult) 
		{
			echo "Data Inserted";
			header("Location:../Books/?id=$id");
		}
		else
		{
			echo "Data Not Saved";
		}
	}
?>