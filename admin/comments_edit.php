<?php

include( '../includes/database.php' );
include( '../includes/config.php' );
include( '../includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: comments.php' );
  die();
  
}

if( isset( $_POST['comment'] ) )
{
  
  if( $_POST['comment'] and $_POST['user_id'] and $_POST['museum_id'] )
  {
    
    $query = 'UPDATE comments SET
    `user_id` = "'.mysqli_real_escape_string( $connect, $_POST['user_id'] ).'",
    `museum_id` = "'.mysqli_real_escape_string( $connect, $_POST['museum_id'] ).'",
    `comment` = "'.mysqli_real_escape_string( $connect, $_POST['comment'] ).'"
    WHERE id = '.$_GET['id'].'
    LIMIT 1';

    mysqli_query( $connect, $query );
    
    set_message( 'Comment has been updated' );
    
  }

  header( 'Location: comments.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM comments
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: comments.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( '../includes/header.php' );

?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">


<h2>Edit Comment</h2>

<p class="pt-3"><a class="btn btn-secondary text-white" href="comments.php"><i class="bi bi-arrow-bar-left"></i> Return to Comments List</a></p>

<form method="post">

  <input type="hidden" name="id" id="id" value="<?php echo $record['id']; ?>">
  
  <label class="form-label" for="user_id">User Name:</label>
  <input class="form-control" type="text" name="user_id" id="user_id" value="<?php echo htmlentities( $record['user_id'] ); ?>">
  
  <br>
  
  <label class="form-label" for="museum_id">Museum Name:</label>
  <input class="form-control" type="text" name="museum_id" id="museum_id" value="<?php echo htmlentities( $record['museum_id'] ); ?>">
  
  <br>
  <label class="form-label" for="comment">Comment:</label>
  <input class="form-control" type="text" name="comment" id="comment" value="<?php echo htmlentities( $record['comment'] ); ?>">
  
  <br>
  
  <input class="btn btn-secondary text-white" type="submit" value="Edit Comment">
  
</form>
</div>
  </div>
</div>

<?php

include( '../includes/footer.php' );

?>