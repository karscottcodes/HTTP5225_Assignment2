<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['address'] and $_POST['type'] and $_POST['summary'] )
  {
    
    $query = 'INSERT INTO museums (
        `name`,
        `address`,
        `type`,
        `summary`
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['address'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['summary'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Museum has been added' );
    
  }
  
  header( 'Location: museums.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Museum</h2>

<form method="post">
  
  <label for="name">Museum Name:</label>
  <input type="text" name="name" id="name">
    
  <br>
  
  <label for="address">Address:</label>
  <input type="text" name="address" id="address">
        
  <br>
  
  <label for="type">type:</label>
  <input type="text" name="type" id="type">
  
  <br>
  
  <label for="summary">summary:</label>
  <input type="text" name="summary" id="summary">
  
  <br>
  
  <input type="submit" value="Add Museum">
  
</form>

<p><a href="museums.php"><i class="fas fa-arrow-circle-left"></i> Return to Museums List</a></p>


<?php

include( 'includes/footer.php' );

?>