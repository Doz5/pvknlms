<?php $role = $_SESSION['role']; ?>
<div class="col-sm-2 sidenav hidden-xs">
      <!-- <h3 style="color: white; text-align: left; color: #ffd200 !important;">SRI-Vidya</h3> -->
      <img src="../sri_assets/pvknlogo.png" width="150" style="margin-left: 9%;padding-top: 6%;">
      <hr>

      <ul class="nav nav-pills nav-stacked">

        <?php if($role == 'Admin' || $role == 'Staff'): ?>
        <li class="Active"><a class="sidehover" href="../Dashboard/" style="color: white;">Dashboard</a></li>
        <?php endif; ?>
        <?php if($role == 'Admin' || $role == 'Staff'): ?>
        <li><a class="sidehover" href="../Student_Registration/" style="color: white;">Student Registration</a></li>
        <li><a class="sidehover" href="../Student_List/" style="color: white;">Students List</a></li>
        <li><a class="sidehover" href="../Masters/" style="color: white;">Masters</a></li>
        <?php endif; ?>
        <?php if($role == 'Admin'): ?>
        <li><a class="sidehover" href="../users/" style="color: white;">Users</a></li>
        <?php endif; ?>
      

        
        <li><a class="sidehover" href="../logout.php" style="color: white;">Logout</a></li>
        
      </ul><br>
    </div>