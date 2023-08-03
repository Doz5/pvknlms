<?php 
	include '../db.php';

	if (isset($_POST['saveData'])) 
	{
		$s_id = $_POST['s_id'];
		$book_id = $_POST['book_id'];
		$book_code = $_POST['book_code'];
		$book_name = $_POST['book_name'];
		$book_type = $_POST['book_type'];
		$issued_date = $_POST['issued_date'];
		$status = "Active";
		$created_by = 1;
		$created_at = date('Y-m-d H:i:s');

		$Query = "INSERT INTO add_books (book_id, book_code, book_name, book_type, issued_date, s_id, status, created_by, created_at) VALUES ('$book_id', '$book_code', '$book_name', '$book_type', '$issued_date', '$s_id', '$status', '$created_by', '$created_at')";
		$QueryResult = mysqli_query($connection,$Query);
		if ($QueryResult) 
		{
			echo "Book Added";
			header("Location:../Student_List/");
		}
		else
		{
			echo "Book Not Added";
		}
	}

	// Update Query 

	if (isset($_POST['updateData']))
	{
		$id = $_POST['id'];
		$book_id = $_POST['book_id'];
		$book_code = $_POST['book_code'];
		$book_name = $_POST['book_name'];
		$book_type = $_POST['book_type'];
		$issued_date = $_POST['issued_date'];

		$status = "Active";
		$created_by = 1;
		$created_at = date('Y-m-d H:i:s');

		echo $Query = "UPDATE add_books SET book_code = '$book_code', book_name = '$book_name', book_type = '$book_type', issued_date = '$issued_date' where id = '$id'";
		$insertResult = mysqli_query($connection,$Query);
		if($insertResult)
		{
			echo "Data Saved";
			header("Location:../Books/?id=$id");
		}
		else
		{
			echo "Data Not Saved";
		}
	}

	// Delete

	if (isset($_GET['dId']))
	{
		$id = $_GET['dId'];

		$Query = "DELETE FROM add_books WHERE id = '$id'";
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

?>