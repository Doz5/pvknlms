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
          <div class="col-md-9 col-sm-6 col-xs-6 col-lg-9">
            
          <h4>Masters</h4>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3">
            <?php include '../logo.php'; ?>
          </div>
        </div>
      </div>
      <?php if(isset($_GET['eId'])){ ?>
      <?php 
        $id = $_GET['eId'];

        $Query = "SELECT * FROM masters where id = '$id'";
        $QueryResult = mysqli_query($connection,$Query);
        $masters = mysqli_fetch_array($QueryResult);

      ?>
      <form method="POST" action="controller.php">
        <div class="col-md-3">
          <label>Master Type</label>
            <select name="master_type" class="form-control" >
              <option value="<?php echo $masters['master_type']; ?>"><?php echo $masters['master_type']; ?> *</option>
              <option value="Book Type">Book Type</option>
              <option value="Group">Group</option>
              <option value="Role">Role</option>
              <option value="Year">Year</option>
            </select>
        </div>
        <div class="col-md-3">
          <label>Master Name</label>
            <input type="text" value="<?php echo $masters['master_name']; ?>" name="master_name" class="form-control">
        </div>
        
        <div class="col-md-2">
          <label>&nbsp;</label>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="submit" value="Update" style="background-color: #FF1493;" name="updateData" class="btn btn-info form-control">
          
        </div>        
      </form>
    <?php }else{ ?>
      <form method="POST" action="controller.php">
        <div class="col-md-3">
          <label>Master Type</label>
            <select name="master_type" class="form-control" >
              <option value="">--Select--</option>
              <option value="Book Type">Book Type</option>
              <option value="Group">Group</option>
              <option value="Role">Role</option>
              <option value="Year">Year</option>
            </select>
        </div>
        <div class="col-md-3">
          <label>Master Name</label>
            <input type="text" name="master_name" class="form-control">
        </div>
        
        <div class="col-md-2">
          <label>&nbsp;</label>
          <input type="submit" name="saveData" style="background-color: #FF1493;" class="btn btn-info form-control">
          
        </div>        
      </form>
    <?php } ?>
    <br><br><br><br>
    <div class="table-responsive">
      <table class="table table-bordered" id="myTable">
        <thead>
          <tr style="background-color: #FF1493;color: white;">
            <th>S.No</th>
            <th>Master Type</th>
            <th>Master Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $s=1;
          $Query = "SELECT * FROM masters WHERE status = 'Active' ORDER BY id DESC";
          $QueryResult =mysqli_query($connection,$Query);
          while($masters = mysqli_fetch_array($QueryResult)){
          
          ?>
          <tr>
            <td><?php echo $s++; ?></td>
            <td><?php echo $masters['master_type'];?></td>
            <td><?php echo $masters['master_name'];?></td>
            <td style="width: 9%;">
              <a href="../Masters/?eId=<?php echo $masters ['id'];?>"><i class="fa fa-edit" title="Edit"></i></a>
              <a href="../Masters/controller.php?dId=<?php echo $masters ['id'];?>"><i class="fa fa-trash" title="Delete" style="color: red"></i></a>
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
