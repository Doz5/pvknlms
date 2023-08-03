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
            
          <h4>Books</h4>
          </div>
          <div class="col-md-3">
            <?php include '../logo.php'; ?>
          </div>
        </div>
      </div>
      <?php 
        $s_id = $_GET['s_id'];
        $bId = $_GET['bId'];
        $bookcode = $_GET['bookcode'];
        $sName = $_GET['sName'];
      ?>
      <label>&nbsp;</label>
      <a href="../Books/?id=<?php echo $s_id; ?>"><i class="fa fa-arrow-circle-o-left" style="font-size:36px; color: #FF1493;"></i></a>
      <br><br>
      <form method="POST" action="controller.php">
        <div class="col-md-3">
          <label>Book Id</label>
          <input type="text" name="book_id" value="<?php echo $bId; ?>" readonly class="form-control">
        </div>
        <div class="col-md-3">
          <label>Book Code</label>
          <input type="text" name="book_code" readonly="" value="<?php echo $bookcode; ?>" class="form-control">
        </div>
        <div class="col-md-3">
          <label>Student Name</label>
          <input type="text" name="sName" readonly="" value="<?php echo $sName; ?>" class="form-control">
        </div>
        <div class="col-md-3">
          <label>Returned Date</label>
          <input type="date" name="returned_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
        </div>
        <div class="col-md-10"></div>
        <div class="col-md-2">
          <label>&nbsp;</label>
          <input type="hidden" name="s_id" value="<?php echo $s_id; ?>">
          <input type="submit" name="saveData" style="background-color: #FF1493;" value="Save" class="btn btn-info form-control">
        </div>
      </form>
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
