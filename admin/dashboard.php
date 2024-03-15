<?php

include( '../includes/database.php' );
include( '../includes/config.php' );
include( '../includes/functions.php' );

secure();

include( '../includes/header.php' );

?>
<div class="container">
  <div class="row g-1">

    <div class="col-lg-4">
      <a href="museums.php" class="dashboard-link">
      <i class="bi bi-bank2"></i> &nbsp; 
        Manage Museums
      </a>
    </div>

    <div class="col-lg-4">
      <a href="comments.php" class="dashboard-link">
      <i class="bi bi-chat-right-text-fill"></i> &nbsp; 
        Manage Comments
      </a>
    </div>

    <div class="col-lg-4">
      <a href="users.php" class="dashboard-link">
      <i class="bi bi-people"></i> &nbsp; 
        Manage Users
      </a>
    </div>
    
  </div>
  <div class="row g-1 mt-5">

    <div class="col-lg-4">
      <a href="logout.php" class="dashboard-link">
      <i class="bi bi-box-arrow-right"></i> &nbsp; 
        Logout
      </a>
    </div>
  </div>

</div>

<?php

include( '../includes/footer.php' );

?>
