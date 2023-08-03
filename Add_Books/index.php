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
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
 <link rel="stylesheet" type="text/css" href="../style.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
 <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
            
          <h4>Add Books</h4>
          </div>
          <div class="col-md-3">
            <?php include '../logo.php'; ?>
          </div>
        </div>
      </div>
      <style>
        @keyframes blinking {
          60% { color: red; }
          40% { color: blue; }
          40% { color: violet; }
          40% { color: green; }
        }
      </style>
      <marquee behavior="scroll" direction="left" style="animation: blinking 1s infinite;font-size: 17px;font-weight: bold;">* * Note: Once The Book Details is Added Can't be Edited * *</marquee>
      <label>&nbsp;</label>
      <a href="../Student_List/"><i class="fa fa-arrow-circle-o-left" style="font-size:36px;color: #FF1493;"></i></a>
      <br><br>
      <?php if(isset($_GET['eId'])){ ?>
      <?php 
        $id = $_GET['eId'];
        $Query = "SELECT * FROM add_books where id = '$id'";
        $QueryResult = mysqli_query($connection,$Query);
        $add_books = mysqli_fetch_array($QueryResult);
      ?>

      <form method="POST" action="controller.php">
        <div class="col-md-3">
          <label>Book ID</label>
          <input type="text" name="book_id" autocomplete="off" readonly="" value="<?php echo $add_books['book_id']; ?>" class="form-control">
        </div>
        <!-- Details End  -->
        <br><br><br><hr style="border: 1px solid #ccc;">
        <div class="col-md-3">
          <label>Book Code</label>
          <input type="text" name="book_code" value="<?php echo $add_books['book_code']; ?>" required="" class="form-control">   
        </div>
        <div class="col-md-3">
          <label>Book Name</label>
          <input type="text" name="book_name" value="<?php echo $add_books['book_name']; ?>" required="" class="form-control">
        </div>
        <div class="col-md-3">
          <label>Book Type</label>
          <select name="book_type" required="" class="form-control">
            <option value="<?php echo $add_books['book_type']; ?>"><?php echo $add_books['book_type']; ?> *</option>
            <?php 
              $Query = "SELECT * FROM masters WHERE status = 'Active' AND master_type = 'Book Type'";
              $QueryResult = mysqli_query($connection, $Query);
              while($masters = mysqli_fetch_array($QueryResult)){
            ?>
            <option value="<?php echo $masters['master_name']; ?>"><?php echo $masters['master_name']; ?></option>
            <?php } ?>
          </select>
          <br>
        </div>
        <div class="col-md-3">
          <label>Date</label>
          <input type="date" name="issued_date" value="<?php echo $add_books['issued_date']; ?>" required="" class="form-control">
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2">
          <label>&nbsp;</label>
          <input type="text" name="id" value="<?php echo $id; ?>">
          <input type="submit" value="Update" style="background-color: #FF1493;" name="updateData" class="btn btn-info form-control">
        </div>        
      </form>

      <!-- Update Ends -->
      <?php }else{ ?>

      <form method="POST" action="controller.php">
        <div class="col-md-3">
          <label>Book ID</label>
          <?php 
            $CountQuery = "SELECT * FROM add_books WHERE status = 'Active' ORDER BY id DESC";
            $CountQueryResult = mysqli_query($connection,$CountQuery);
            $CountQuery = mysqli_num_rows($CountQueryResult);

            $ino = 1;
            $incre = $CountQuery;
            if ($incre == 0) 
            {
              $incre += 1001;
            }
            else
            {
              $incre += 1001;
            }
          ?>
          <input type="text" name="book_id" autocomplete="off" readonly="" value="<?php echo "PVKNCS".$incre; ?>" class="form-control">
        </div>
        <?php 
          $id = $_GET['id'];
          $Query ="SELECT * FROM student_registration WHERE id = '$id'";
          $QueryResult = mysqli_query($connection,$Query);
          $students = mysqli_fetch_array($QueryResult);
        ?>
        <div class="col-md-3">
          <label>Register No</label>
          <input type="text" name="" value="<?php echo $students['reg_no']; ?>" readonly class="form-control">
        </div>
        <div class="col-md-3">
          <label>Student Name</label>
          <input type="text" name="" value="<?php echo $students['student_name']; ?>" readonly class="form-control">
        </div>


        <!-- Details End  -->
        <br><br><br><hr style="border: 1px solid #ccc;">
        <div class="col-md-3">
          <label>Book Code</label>
          <input type="text" name="book_code" required="" class="form-control">   
        </div>
        <div class="col-md-3">
          <label>Book Name</label>
          <input type="text" name="book_name" required="" class="form-control">
        </div>
        <div class="col-md-3">
          <label>Book Type</label>
          <select name="book_type" required="" class="form-control">
            <option value="">---SELECT---</option>
            <?php 
              $Query = "SELECT * FROM masters WHERE status = 'Active' AND master_type = 'Book Type'";
              $QueryResult = mysqli_query($connection, $Query);
              while($masters = mysqli_fetch_array($QueryResult)){
            ?>
            <option value="<?php echo $masters['master_name']; ?>"><?php echo $masters['master_name']; ?></option>
            <?php } ?>
          </select>
          <br>
        </div>
        <div class="col-md-3">
          <label>Date</label>
          <input type="date" name="issued_date" value="<?php echo date('Y-m-d'); ?>" required="" class="form-control">
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2">
          <label>&nbsp;</label>
          <input type="hidden" name="s_id" value="<?php echo $id; ?>">
          <input type="submit" style="background-color: #FF1493;" name="saveData" class="btn btn-info form-control">
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
