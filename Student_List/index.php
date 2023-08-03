<?php 
  session_start();
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
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

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
            
          <h4>Students</h4>
          </div>
          <div class="col-md-3">
            <?php include '../logo.php'; ?>
          </div>
        </div>
      </div>
      <div class="col-md-9"></div>
      <div class="col-md-3">
        <a href="../Student_Registration/" class="btn btn-success form-control" style="background-color: #FF1493;font-weight: bold;"><i class="fa fa-plus"></i>&nbsp;Add Student</a>
      </div>
      <br><br><br>
      <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr style="background-color: #FF1493;color: white;">
              <th>S.No</th>
              <th>Student ID</th>
              <th>Student Name</th>
              <th>Register No</th>
              <th>Year</th>
              <th>Group</th>
              <th>Action</th>
            </tr>
          </thead>
            <tbody>
              <?php 
              $s=1;
              $Query = "SELECT * FROM student_registration WHERE status = 'Active' ORDER BY id DESC";
              $QueryResult =mysqli_query($connection,$Query);
              while($students = mysqli_fetch_array($QueryResult)){
              ?>
              <tr>
                <td><?php echo $s++; ?></td>
                <td><?php echo $students['student_id'];?></td>
                <td><?php echo $students['student_name'];?></td>
                <td><?php echo $students['reg_no'];?></td>
                <td><?php echo $students['student_year'];?></td>
                <td><?php echo $students['student_group'];?></td>
                <td style="width: 9%;">
                  <a href="../Add_Books/?id=<?php echo $students['id'];?>"><i class="fa fa-book" style="color: orange;" title="Add Book"></i></a>
                  <a href="../Books/?id=<?php echo $students['id'];?>"><i class="fa fa-eye" style="color: green;" title="Book"></i></a>
                  <a href="../Student_Registration/?eId=<?php echo $students['id'];?>"><i class="fa fa-edit" title="Edit"></i></a>
                  <a href="../Student_Registration/controller.php?dId=<?php echo $students['id'];?>"><i class="fa fa-trash" title="Delete" style="color: red"></i></a>
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
