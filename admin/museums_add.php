<?php

include( '../includes/database.php' );
include( '../includes/config.php' );
include( '../includes/functions.php' );

secure();

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['address'] and $_POST['type'] and $_POST['summary'] and $_POST['phone'] and $_POST['url'] and $_POST['ward'] and $_POST['postalcode'] )
  {
    
    $query = 'INSERT INTO museums (
        `name`,
        `address`,
        `postalcode`,
        `type`,
        `summary`,
        `phone`,
        `url`,
        `ward`
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['address'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['postalcode'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['summary'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['phone'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['ward'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Museum has been added' );
    
  }
  
  header( 'Location: museums.php' );
  die();
  
}

include( '../includes/header.php' );

?>

<h2>Add Museum</h2>

<form method="post">
  
  <label for="name">Museum Name:</label>
  <input type="text" name="name" id="name">
    
  <br>
  
  <label for="address">Address:</label>
  <input type="text" name="address" id="address">

  <br>
  
  <label for="postalcode">Postal Code:</label>
  <input type="text" name="postalcode" id="postalcode">
        
  <br>
  
  <label for="type">Type:</label>
  <input type="text" name="type" id="type">
  
  <br>
  
  <label for="summary">Summary:</label>
  <input type="text" name="summary" id="summary">
  
  <br>

  <label for="phone">Phone Number:</label>
  <input type="text" name="phone" id="phone">
  
  <br>

  <label for="url">Website:</label>
  <input type="text" name="url" id="url">
  
  <br>

  <label for="ward">Ward:</label>
  <input type="text" name="ward" id="ward">
  
  <br>
  
  <input type="submit" value="Add Museum">
  
</form>

<p><a href="museums.php"><i class="fas fa-arrow-circle-left"></i> Return to Museums List</a></p>


<?php

include( '../includes/footer.php' );

?>