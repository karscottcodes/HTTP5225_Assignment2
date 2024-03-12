<?php

include( '../includes/database.php' );
include( '../includes/config.php' );
include( '../includes/functions.php' );

secure();

include( '../includes/header.php' );

?>

<ul id="dashboard">
  <li>
    <a href="museums.php">
      Manage Museums
    </a>
  </li>
  <li>
    <a href="comments.php">
      Manage Comments
    </a>
  </li>
  <li>
    <a href="users.php">
      Manage Users
    </a>
  </li>
  <li>
    <a href="logout.php">
      Logout
    </a>
  </li>
</ul>

<?php

include( '../includes/footer.php' );

?>
