<?php
  session_start();
  include '../db.php';

  if (isset($_SESSION['userName'])) 
  {
    echo "<script>window.location='../Dashboard/';</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script
    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container">

    <div class="forms-container">
      <div class="signin-signup">
        <?php 

          if (isset($_POST['loginBtn'])) 
          {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $usernameCheck = "SELECT * FROM user WHERE username = '$username' AND status = 'Active'";
            $uRow = mysqli_query($connection,$usernameCheck);
            $uR = mysqli_fetch_array($uRow);
            $uCount = mysqli_num_rows($uRow);

            if($uCount > 0)
            {
              $role = $uR['role'];
              $password_hash = $uR['password'];
              if(password_verify($password, $password_hash))
              {

                  $_SESSION['userName'] = $username;
                  $_SESSION['role'] = $role;

                  if(isset($_SESSION['userName']))
                  {
                    echo "<script>window.location='../Dashboard/';</script>";

                  }

              }
              else
              {
                echo "<h3 align='center' style='color:red;'>Invalid Password</h3>";
              }
                
            }
            else
            {
                echo "<h3 align='center' style='color:red;'>Invalid Username</h3>";
            }

          }
         ?>
        <form  method="POST" class="sign-in-form">
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" />
          </div>
          <input type="submit" name="loginBtn" value="Login" class="btn solid" /><br>
          <a href="#" style="text-decoration: none;"><i class="fas fa-lock"></i> Change Password</a>
          <br>
          <a href="#" style="text-decoration: none;"><i class="fas fa-home"></i> Home</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</body>
</html>