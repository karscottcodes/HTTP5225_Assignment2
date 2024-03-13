<?php

include( '../includes/database.php' );
include( '../includes/config.php' );
include( '../includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM comments
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Comment has been deleted' );
  
  header( 'Location: comments.php' );
  die();
  
}

include( '../includes/header.php' );

$query = 'SELECT *
  FROM comments
  ORDER BY id';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Comments</h2>

<table class="table">
  <thead>
  <tr>
    <th scope="col">Id</th>
    <th scope="col">User_Id</th>
    <th scope="col">Museum_Id</th>
    <th scope="col">Comment</th>
    <th scope="col">Date Added</th>
    <th scope="col">Edit Comment</th>
    <th scope="col">Delete</th>
  </tr>
  </thead>
  <tbody>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td><?php echo $record['id']; ?></td>
      <td>
        <?php echo $record['user_id']; ?>
    </td>
    <td>
        <?php echo $record['museum_id']; ?>
    </td>
    <td>
        <?php echo $record['comment']; ?>
    </td>
    <td>
        <?php echo $record['dateAdded']; ?>
    </td>
    <td>
        Edit Info
    </td>
    <td>
        Delete
    </td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>

<p><a href="comments_add.php"><i class="fas fa-plus-square"></i> Add Comments</a></p>


<?php

include( '../includes/footer.php' );

?>