<?php 
  session_start();
  include '../db.php';
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
