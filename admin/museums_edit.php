<?php

include( '../includes/database.php' );
include( '../includes/config.php' );
include( '../includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: museums.php' );
  die();
  
}

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['address'] and $_POST['type'] and $_POST['summary'] )
  {
    
    $query = 'UPDATE museums SET
    `name` = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
    `address` = "'.mysqli_real_escape_string( $connect, $_POST['address'] ).'",
    `type` = "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'",
    `summary` = "'.mysqli_real_escape_string( $connect, $_POST['summary'] ).'"
    WHERE id = '.$_GET['id'].'
    LIMIT 1';

    mysqli_query( $connect, $query );
    
    set_message( 'Museum has been updated' );
    
  }

  header( 'Location: museums.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM museums
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: museums.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( '../includes/header.php' );

?>

<h2>Edit Museum</h2>

<form method="post">
  
  <label for="name">Museum Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name'] ); ?>">
  
  <br>
  
  <label for="address">Address:</label>
  <input type="text" name="address" id="address" value="<?php echo htmlentities( $record['address'] ); ?>">
  
  <br>
  <label for="postalcode">Postal Code:</label>
  <input type="text" name="postalcode" id="postalcode" value="<?php echo htmlentities( $record['postalcode'] ); ?>">
  
  <br>
  
  <label for="type">Type:</label>
  <input type="text" name="type" id="type" value="<?php echo htmlentities( $record['type'] ); ?>">
  
  <br>
  
  <label for="summary">Summary:</label>
  <input type="text" name="summary" id="summary" value="<?php echo htmlentities( $record['summary'] ); ?>">
  
  <br>

  <label for="phone">Phone Number:</label>
  <input type="text" name="phone" id="phone" value="<?php echo htmlentities( $record['phone'] ); ?>">
  
  <br>

  <label for="url">Website:</label>
  <input type="text" name="url" id="url" value="<?php echo htmlentities( $record['url'] ); ?>">
  
  <br>

  <label for="ward">Ward:</label>
  <input type="text" name="ward" id="ward" value="<?php echo htmlentities( $record['ward'] ); ?>">
  
  <br>
  
  <input type="submit" value="Edit Museum">
  
</form>

<p><a href="museums.php"><i class="fas fa-arrow-circle-left"></i> Return to Museum List</a></p>


<?php

include( '../includes/footer.php' );

?>