<?php 
	if (isset($_SESSION['msg'])) 
        {
          ?>
          <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <p align="center">
              <strong>Success! </strong> <?php echo $_SESSION['msg']; ?>
            </p>
          </div>
          <script type="text/javascript">
            $("#success-alert").fadeTo(3000, 500).slideUp(500, function() {
              $("#success-alert").slideUp(500);
            });
          </script>

          <?php
          unset($_SESSION['msg']);
          unset($_SESSION['e_msg']);
          // echo"<meta http-equiv='refresh' content='3; url=../mapping/?clear'>";
        }
        elseif(isset($_SESSION['e_msg']))
        {
          ?>
          <div class="alert alert-danger" id="danger-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <p align="center">
              <strong>Error! </strong> <?php echo $_SESSION['e_msg']; ?>
            </p>
          </div>
          <script type="text/javascript">
            $("#danger-alert").fadeTo(3000, 500).slideUp(500, function() {
              $("#danger-alert").slideUp(500);
            });
          </script>

          <?php
          unset($_SESSION['msg']);
          unset($_SESSION['e_msg']);

        } 
?>