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
            
          <h4>Users</h4>
          </div>
          <div class="col-md-3">
            <?php include '../logo.php'; ?>
          </div>
        </div>
      </div>
      <form method="POST" action="controller.php">
            <div class="col-md-3">
              <label>Username</label>
              <input type="text" name="username" required="" class="form-control">
            </div>
            <div class="col-md-3">
              <label>Password</label>
              <input type="password" name="password" required="" class="form-control">
            </div>
            <div class="col-md-3">
              <label>Select Role</label>
              <select name="role" class="form-control">
                <option value="">--Select--</option>
                <?php 

                  $Query = "SELECT * FROM masters WHERE status = 'Active' AND master_type = 'Role'";
                  $QueryResult =mysqli_query($connection,$Query);
                  while($masters = mysqli_fetch_array($QueryResult)){
                 ?>
                 <option value="<?php echo $masters['master_name']; ?>"><?php echo $masters['master_name']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-2">
              <label>&nbsp;</label>
              <input type="submit" name="save" value="Add" style="background-color: #FF1493;color: white;" class="btn btn- form-control">
            </div>
        </form>
        <br><br><br><br>
        <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
          <tr style="background-color: #FF1493;color: white;">
            <th>S.No</th>
            <th>User Name</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
          <?php
            $s=1; 
            $Query = "SELECT * FROM user WHERE status = 'Active' ";
            $QueryResult =mysqli_query($connection,$Query);
            while($user = mysqli_fetch_array($QueryResult)){

           ?>
           <tr>
            <td><?php echo $s++; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['role']; ?></td>
            <td>
              <i class="fa fa-key" title="Key"></i>
              <a href="controller.php?dId=<?php echo $user['id'];?>"><i class="fa fa-trash" title="Delete"></i></a>
            </td>
          </tr>
          <?php } ?>
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
