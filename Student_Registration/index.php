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
            
          <h4>Student Registration</h4>
          </div>
          <div class="col-md-3">
            <?php include '../logo.php'; ?>
          </div>
        </div>
      </div>
      <?php if(isset($_GET['eId'])){ ?>
      <?php 
        $id = $_GET['eId'];

        $Query = "SELECT * FROM student_registration where id = '$id'";
        $QueryResult = mysqli_query($connection,$Query);
        $student_registration = mysqli_fetch_array($QueryResult);

      ?>
      <form method="POST" action="controller.php">
        <div class="col-md-3">
          <label>Student Id</label>
          <input type="text" name="student_id" autocomplete="off" readonly="" value="<?php echo $student_registration['student_id']; ?>" class="form-control">
        </div>
        <div class="col-md-6"></div>
        <br><br><br><br>
        <div class="col-md-3">
          <label>Student Name</label>
            <input type="text" name="student_name" value="<?php echo $student_registration['student_name']; ?>" class="form-control">
        </div>
        <div class="col-md-3">
          <label>Register No.</label>
            <input type="text" value="<?php echo $student_registration['reg_no']; ?>" name="reg_no" class="form-control">
        </div>
        <div class="col-md-3">
          <label>Year</label>
          <select name="student_year" class="form-control">
            <option value="<?php echo $student_registration['student_year']; ?>"><?php echo $student_registration['student_year']; ?> *</option>
            <?php 
              $Query = "SELECT * FROM masters WHERE status = 'Active' AND master_type = 'Year'";
              $QueryResult = mysqli_query($connection, $Query);
              while ($masters = mysqli_fetch_array($QueryResult)) {
            ?>
            <option value="<?php echo $masters['master_name']; ?>"><?php echo $masters['master_name']; ?></option>
          <?php } ?>
          </select>
        </div>
        <div class="col-md-3">
          <label>Group</label>
          <select name="student_group" class="form-control">
            <option value="<?php echo $student_registration['student_group']; ?>"><?php echo $student_registration['student_group']; ?> *</option>
            <?php 
              $Query = "SELECT * FROM masters WHERE status = 'Active' AND master_type = 'Group'";
              $QueryResult = mysqli_query($connection, $Query);
              while ($masters = mysqli_fetch_array($QueryResult)) {
            ?>
            <option value="<?php echo $masters['master_name']; ?>"><?php echo $masters['master_name']; ?></option>
          <?php } ?>
          </select>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-2">
          <label>&nbsp;</label>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="submit" value="Update" style="background-color: #FF1493;" name="updateData" class="btn btn-info form-control">
        </div>        
      </form>

    <?php }else{ ?>


      <form method="POST" action="controller.php">
        <div class="col-md-3">
          <label>Student Id</label>
          <?php 
            $CountQuery = "SELECT * FROM student_registration WHERE status = 'Active' ORDER BY id DESC";
            $CountQueryResult = mysqli_query($connection,$CountQuery);
            $CountQuery = mysqli_num_rows($CountQueryResult);

            $ino = 1;
            $incre = $CountQuery;
            if ($incre == 0) 
            {
              $incre += 1;
            }
            else
            {
              $incre += 1;
            }
          ?>
          <input type="text" name="student_id" autocomplete="off" readonly="" value="<?php echo "PVKNCS".$incre; ?>" class="form-control">
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-3">
          <label>&nbsp;</label>
          <a href="../Student_List/" class="btn btn-success form-control" style="background-color: #FF1493;font-weight: bold;"><i class="fa fa-eye"></i>&nbsp;View Students</a>
        </div>
        <br><br><br><hr style="border: 1px solid #ccc;">
        <div class="col-md-3">
          <label>Student Name</label>
            <input type="text" name="student_name" class="form-control">
        </div>
        <div class="col-md-3">
          <label>Register No.</label>
            <input type="text" name="reg_no" class="form-control">
        </div>
        <div class="col-md-3">
          <label>Year</label>
          <select name="student_year" class="form-control">
            <option value="">---SELECT---</option>
            <?php 
              $Query = "SELECT * FROM masters WHERE status = 'Active' AND master_type = 'Year'";
              $QueryResult = mysqli_query($connection, $Query);
              while ($masters = mysqli_fetch_array($QueryResult)) {
            ?>
            <option value="<?php echo $masters['master_name']; ?>"><?php echo $masters['master_name']; ?></option>
          <?php } ?>
          </select>
        </div>
        <div class="col-md-3">
          <label>Group</label>
          <select name="student_group" class="form-control">
            <option value="">---SELECT---</option>
            <?php 
              $Query = "SELECT * FROM masters WHERE status = 'Active' AND master_type = 'Group'";
              $QueryResult = mysqli_query($connection, $Query);
              while ($masters = mysqli_fetch_array($QueryResult)) {
            ?>
            <option value="<?php echo $masters['master_name']; ?>"><?php echo $masters['master_name']; ?></option>
          <?php } ?>
          </select>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-2">
          <label>&nbsp;</label>
          <input type="submit" name="saveData" style="background-color: #FF1493;" class="btn btn-info form-control">
        </div>        
      </form>
    <?php } ?>
</div>
</div>
</div>
 
<?php include '../footer.php'; ?>


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
