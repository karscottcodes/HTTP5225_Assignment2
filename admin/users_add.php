<?php

include( '../includes/database.php' );
include( '../includes/config.php' );
include( '../includes/functions.php' );

secure();

if( isset( $_POST['first'] ) )
{
  
  if( $_POST['first'] and $_POST['last'] and $_POST['email'] and $_POST['password'] )
  {
    
    $query = 'INSERT INTO users (
        `first`,
        `last`,
        `email`,
        `password`,
        `active`,
        `permission`
      ) VALUES (
        "'.mysqli_real_escape_string( $connect, $_POST['first'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['last'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
        "'.md5( $_POST['password'] ).'",
        "'.$_POST['active'].'",
        "'.$_POST['permission'].'"
      )';

    mysqli_query( $connect, $query );
    
    set_message( 'User has been added' );
    
  }

  /*
  // Example of debugging a query
  print_r($_POST);
  print_r($query);
  die();
  */

  header( 'Location: users.php' );
  die();
  
}

include( '../includes/header.php' );

?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">




<h2>Add User</h2>

<p class="pt-3"><a class="btn btn-secondary text-white" href="users.php"><i class="bi bi-arrow-bar-left"></i> &nbsp;Return to User List</a></p>

<form method="post">
  
  <label class="form-label" for="first">First Name:</label>
  <input class="form-control" type="text" name="first" id="first">
  
  <br>
  
  <label class="form-label" for="last">Last Name:</label>
  <input class="form-control" type="text" name="last" id="last">
  
  <br>
  
  <label class="form-label" for="email">Email:</label>
  <input class="form-control" type="email" name="email" id="email">
  
  <br>
  
  <label class="form-label" for="password">Password:</label>
  <input class="form-control" type="password" name="password" id="password">

  <br>

  <label class="form-label" for="permission">Admin?</label>
  <select class="form-select" name="permission" id="permission">
    <option value="1">Yes</option>
    <option value="0">No</option>
  </select>

  <br>
  
  <label for="active">Active:</label>
  <?php
  
  $activevalues = array( 'Yes', 'No' );
  
  echo '<select class="form-select" name="active" id="active">';
  foreach( $activevalues as $key => $value2 )
  {
    echo '<option value="'.$value2.'"';
    echo '>'.$value2.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  
  <input class="btn btn-secondary text-white" type="submit" value="Add User">
  
</form>

</div>
  </div>
</div>




<?php

include( '../includes/footer.php' );

?>