<?php 
  session_start();
  error_reporting(0);
  include '../db.php';
  if (!isset($_SESSION['userName'])) 
  {
      echo "<script>window.location='../logout.php';</script>";
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include '../tab_title.php'; ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
 <link rel="stylesheet" type="text/css" href="../style.css">
 <link rel="stylesheet" type="text/css" href="style.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>

<?php include '../navbar.php'; ?>

<div class="container-fluid">
  <div class="row content">
    <?php include '../sidebar.php'; ?>
    
    
    <div class="col-sm-10">
      <div class="well navbarColor">
        <div class="row">
          <div class="col-md-9"> 
          <h4>Books</h4>
          </div>
          <div class="col-md-3">
            <?php include '../logo.php'; ?>
          </div>
        </div>
      </div>
      <?php 
        $id = $_GET['id'];
        $Query ="SELECT * FROM student_registration WHERE id = '$id'";
        $QueryResult = mysqli_query($connection,$Query);
        $students = mysqli_fetch_array($QueryResult);
      ?>
      <label>&nbsp;</label>
      <a href="../Student_List/"><i class="fa fa-arrow-circle-o-left" style="font-size:36px; color: #FF1493;"></i></a>
      <br><br>
      <div class="col-md-2">
        <label>Student ID</label>
        <input type="text" name="" value="<?php echo $students['student_id']; ?>" style="background-color: black; border-color: #ccc; color: white;" readonly class="form-control">
      </div>
      <div class="col-md-6"></div>
      <br><br><br><br>
      <div class="col-md-3">
        <label>Register No</label>
        <input type="text" name="" value="<?php echo $students['reg_no']; ?>" readonly class="form-control">
      </div>
      <div class="col-md-3">
        <label>Student Name</label>
        <input type="text" name="" value="<?php echo $students['student_name']; ?>" readonly class="form-control">
      </div>
      <div class="col-md-3">
        <label>Year</label>
        <input type="text" name="" value="<?php echo $students['student_year']; ?>" readonly class="form-control">
      </div>
      <div class="col-md-3">
        <label>Group</label>
        <input type="text" name="" value="<?php echo $students['student_group']; ?>" readonly class="form-control">
      <br>
      </div>
      <hr style="border: 1px solid #ccc;">
      <!--Student Details End-->
      <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr style="background-color: #FF1493;color: white;">
              <th>S.No</th>
              <th>Book ID</th>
              <th>Book Code</th>
              <th>Book Name</th>
              <th>Book Type</th>
              <th>Issued Date</th>
              <th>Status</th>
              <th>Returned Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <?php 
              $s=1;
              $id = $_GET['id'];
              $Query = "SELECT * FROM add_books WHERE status = 'Active' AND s_id = '$id' ORDER BY id DESC";
              $QueryResult =mysqli_query($connection,$Query);
              while($add_books = mysqli_fetch_array($QueryResult)){
              
              ?>
            <tr>
              <td><?php echo $s++; ?></td>
                  <td><?php echo $add_books['book_id'];?></td>
                  <td><?php echo $add_books['book_code'];?></td>
                  <td><?php echo $add_books['book_name'];?></td>
                  <td><?php echo $add_books['book_type'];?></td>
                  <td><?php echo $add_books['issued_date'];?></td>
                  <?php 
                  if (isset($add_books['book_id']))
                    $book_id = $add_books['book_id'];
                    $query = "SELECT book_id FROM status WHERE status = 'Active' AND book_id = '$book_id'";
                    $result = mysqli_fetch_array(mysqli_query($connection,$query));
                    $checkReturn = $result['book_id'];
                  ?>
                  <td>
                    <?php if($checkReturn != ''){ ?>
                      <label style="font-size: 10px; color: green;"><i class="fa fa-check" style="font-size: 20px;"> &nbsp;Returned</i></label>
                    <?php }else{ ?>
                      <label style="font-size: 10px; color: orange;"><i class="fa fa-clock-o" style="font-size: 20px;"> &nbsp;Pending</i></label>
                    <?php } ?>
                  </td>
                  <?php 
                    $book_id = $add_books['book_id'];
                    $statusQuery = "SELECT * FROM status WHERE status = 'Active' AND book_id = '$book_id'";
                    $statusQueryResult = mysqli_query($connection,$statusQuery);
                    $status = mysqli_fetch_array($statusQueryResult);
                  ?>
                  <td><?php echo $status['returned_date']; ?></td>
                  <td style="width: 9%;">
                    <a href="../Status/?bId=<?php echo $add_books['book_id']; ?>&bookcode=<?php echo $add_books['book_code']; ?>&s_id=<?php echo $add_books['s_id']; ?>&sName=<?php echo $students['student_name']; ?>"><i class="fa fa-hourglass-half" title="status" style="color: #7627aa;"></i></a>
                    <!-- <a href="../Add_Books/?eId=<?php echo $add_books['id'];?>"><i class="fa fa-edit" title="Edit"></i></a> -->
                    <a href="../Add_Books/controller.php?dId=<?php echo $add_books['id'];?>"><i class="fa fa-trash" title="Delete" style="color: red"></i></a>
                  </td>
              </tr>
           <?php } ?>
          </tbody>
         </table>
       </div>
</div>
</div>
</div>

 
<?php include '../footer.php'; ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#myTable').DataTable();
  });
</script>

</body>
</html>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>

