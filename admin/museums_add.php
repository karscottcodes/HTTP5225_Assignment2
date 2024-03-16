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

<div class="container">
  <div class="row">
    <div class="col-sm-12">
    <h2>Add Museum</h2>

    <p class="pt-3">
      <a class="btn btn-secondary text-white" href="museums.php"><i class="bi bi-arrow-bar-left"></i> Return to Museums List</a></p>
      <form method="post">
        
        <label class="form-label" for="name">Museum Name:</label>
        <input class="form-control" type="text" name="name" id="name">
          
        <br>
        
        <label class="form-label" for="address">Address:</label>
        <input class="form-control" type="text" name="address" id="address">

        <br>
        
        <label class="form-label" for="postalcode">Postal Code:</label>
        <input class="form-control" type="text" name="postalcode" id="postalcode">
              
        <br>
        
        <label class="form-label" for="type">Type:</label>
        <input class="form-control" type="text" name="type" id="type">
        
        <br>
        
        <label class="form-label" for="summary">Summary:</label>
        <input class="form-control" type="text" name="summary" id="summary">
        
        <br>

        <label class="form-label" for="phone">Phone Number:</label>
        <input class="form-control" type="text" name="phone" id="phone">
        
        <br>

        <label class="form-label" for="url">Website:</label>
        <input class="form-control" type="text" name="url" id="url">
        
        <br>

        <label class="form-label" for="ward">Ward:</label>
        <input class="form-control" type="text" name="ward" id="ward">
        
        <br>
        
        <input class="btn btn-secondary text-white" type="submit" value="Add Museum">      
      </form>
    </div>
  </div>
</div>






<?php

include( '../includes/footer.php' );

?>