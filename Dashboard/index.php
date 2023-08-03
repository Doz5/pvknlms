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
 <link rel="stylesheet" type="text/css" href="style.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 <style type="text/css">
   .card{
    background-color: blue;
   }
 </style>

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
            
          <h4>Dashboard</h4>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3">
            <?php include '../logo.php'; ?>
          </div>
        </div>
      </div>
       <div class="cardBox">
                <a href="../Student_List/" style="text-decoration: none; color: black;"><div class="card" style="background-color: #FF1493;">
                    <div>
                      <?php 
                        $studentQuery = mysqli_query($connection,"SELECT * FROM student_registration");
                        $studentCount = mysqli_num_rows($studentQuery);
                      ?>
                        <div class="numbers"><?php echo $studentCount; ?></div>
                        <div class="cardName" style="font-size: 17px;">Students</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-circle-sharp"></ion-icon>
                    </div>
                </div></a>

                <a href="../Student_List/" style="text-decoration: none; color: black;"><div class="card" style="background-color: #FF1493;">
                    <div>
                      <?php 
                        $bookQuery = "SELECT * FROM add_books WHERE status = 'Active'";
                        $booksResult = mysqli_query($connection,$bookQuery);
                        $Books = mysqli_num_rows($booksResult);
                       ?>
                        <div class="numbers"><?php echo $Books; ?></div>
                        <div class="cardName" style="font-size: 17px;">Issued Books</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="book-outline"></ion-icon>
                    </div>
                </div>
              </a>

              <a href="../Student_List/" style="text-decoration: none; color: black;">
                <div class="card" style="background-color: #FF1493;">
                  <div>
                     <?php 
                      $returnQuery = mysqli_query($connection,"SELECT * FROM status WHERE status = 'Active'");
                      $returnCount = mysqli_num_rows($returnQuery);
                    ?>
                      <div class="numbers"><?php echo $returnCount; ?></div>
                      <div class="cardName" style="font-size: 17px;">Returned&nbsp;Books</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="bookmarks-outline" style="color: darkgreen;"></ion-icon>
                  </div>
                </div>
              </a>

              <a href="../Student_List/" style="text-decoration: none; color: black;">
                <div class="card" style="background-color: #FF1493;">
                  <div>
                      <div class="numbers"><?php echo $Books - $returnCount; ?></div>
                      <div class="cardName" style="font-size: 17px;">Pending Books</div>
                  </div>

                  <div class="iconBx">
                      <ion-icon name="bookmark-outline" style="color: darkred;"></ion-icon>
                  </div>
                </div>
              </a>
                
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
