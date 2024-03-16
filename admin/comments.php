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
<div class="container">
  <div class="row">
    <div class="col-sm-12">


<h2>Manage Comments</h2>

<p class="pt-3"><a class="btn btn-secondary text-white" href="comments_add.php"><i class="bi bi-plus-square"></i> &nbsp;Add New Comment</a></p>

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
        <a class="btn btn-secondary text-white" href="comments_edit.php?id=<?php echo $record['id'];?>"><i class="bi bi-body-text"></i> &nbsp;Edit</a>
    </td>
    <td>
        <a class="btn btn-secondary text-white" href="comments.php?delete=<?php echo $record['id'];?>" onclick="javascript:confirm('Are you sure you want to delete this museum?');"><i class="bi bi-trash3"></i> &nbsp;Delete</i></a>
    </td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>
</div>
  </div>
</div>




<?php

include( '../includes/footer.php' );

?>