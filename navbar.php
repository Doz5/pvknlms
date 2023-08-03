<?php $role = $_SESSION['role']; ?>
<nav class="navbar visible-xs" style="background-color: #FF1493;">
  <div class="container-fluid">
    <div class="navbar-header" style="color: white !important">
      <button type="button"  class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <i class="fa fa-bars"></i>                      
      </button>

      <a class="navbar-brand" href="#" style="color: white; font-weight: bold;">PVKN (AUTONOMOUS)</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" style="color: white;">
        <?php if($role == 'Admin' || $role == 'Staff'): ?>
        <li class="active"><a href="../Dashboard/" style="color: white;">Dashboard</a></li>
        <?php endif; ?>
        <?php if($role == 'Admin' || $role == 'Staff'): ?>
        <li><a href="../Student_Registration/" style="color: white;">Student Registration</a></li>
        <li><a href="../Student_List/" style="color: white;">Students List</a></li>
        <li><a href="../Masters/" style="color: white;">Masters</a></li>
        <?php endif; ?>
        <?php if($role == 'Admin'): ?>
        <li><a href="../users/" style="color: white;">Users</a></li>
        <?php endif; ?>
        <li><a href="../logout.php" style="color: white;">Logout</a></li>
        <!-- <li><a href="../leavesPermissionsMaster/" style="color: white;">Leaves Permissions Master</a></li>
        <li><a href="../leaveRequest/" style="color: white;">Leave Request</a></li>
        <li><a href="../leaveApprovalGrantReject/" style="color: white;">Leave Approval Grant / Reject</a></li>
         <li><a href="../permissionRequest/" style="color: white;">Permission Request</a></li>
        <li><a href="../permissionApprovalReject/" style="color: white;">Permission Approval / Reject</a></li> -->
        <!-- <li><a href="../Masters/" style="color: white;">Masters</a></li> -->
        <!-- <li><a href="../MasterType/" style="color: white;">Master Type</a></li> -->
      </ul>
    </div>
  </div>
</nav>